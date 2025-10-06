<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Data\AuthorDashboardData;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $publicProfileUrl = $user ? route('blog.byAuthor', $user->id) : route('blog.index');

        $articleActions = AuthorDashboardData::articleActions($user);

        $profileLinks = AuthorDashboardData::profileLinks();

        $published = Blog::where('user_id', $user->id)
            ->orderByDesc('likes_count')
            ->orderByDesc('views')
            ->take(3)
            ->get();

        return view('author.dashboard', [
            'user' => $user,
            'articleActions' => $articleActions,
            'published' => $published,
            'profileLinks' => $profileLinks,
            'publicProfileUrl' => $publicProfileUrl,
        ]);
    }

    public function blogs()
    {
        $user = Auth::user();
        $posts = $this->samplePosts();

        return view('author.blogs.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function createBlog()
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $categories = Category::query()->orderBy('name')->get(['id', 'name']);

        return view('author.blogs.create', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function storeBlog(Request $request)
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'excerpt' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'max:2048'],
            'content' => ['required', 'string'],
        ]);

        $resolvedSlug = $this->resolveUniqueSlug($validated['slug'] ?? null, $validated['title']);
        $thumbnailUrl = $this->uploadThumbnailToCloudinary($request->file('thumbnail'), (int) $user->id);

        $blog = Blog::create([
            'user_id' => $user->id,
            'category_id' => $validated['category_id'],
            'slug' => $resolvedSlug,
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'],
            'thumbnail_url' => $thumbnailUrl,
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('author.blogs.index')
            ->with('status', 'Article "' . $blog->title . '" created successfully.');
    }

    private function uploadThumbnailToCloudinary(UploadedFile $thumbnail, int $userId): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');
        $folder = trim((string) config('services.cloudinary.folder'), '/');

        if (! $cloudName || ! $apiKey || ! $apiSecret) {
            throw ValidationException::withMessages([
                'thumbnail' => __('Image upload service is not configured.'),
            ]);
        }

        $publicIdSuffix = 'blog_' . $userId . '_' . Str::lower(Str::random(12));
        $publicIdBase = $folder ? $folder . '/blog-thumbnails' : 'blog-thumbnails';
        $publicId = trim($publicIdBase, '/') . '/' . $publicIdSuffix;
        $timestamp = time();

        $paramsToSign = [
            'public_id' => $publicId,
            'timestamp' => $timestamp,
        ];

        ksort($paramsToSign);

        $signatureBase = urldecode(http_build_query($paramsToSign));
        $signature = sha1($signatureBase . $apiSecret);

        $response = Http::timeout(20)
            ->retry(2, 250)
            ->asMultipart()
            ->attach('file', file_get_contents($thumbnail->getRealPath()), $thumbnail->getClientOriginalName())
            ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
                'public_id' => $publicId,
            ]);

        if ($response->failed()) {
            throw ValidationException::withMessages([
                'thumbnail' => __('Failed to upload image. Please try again later.'),
            ]);
        }

        $data = $response->json();
        $thumbnailUrl = $data['secure_url'] ?? $data['url'] ?? null;

        if (! $thumbnailUrl) {
            throw ValidationException::withMessages([
                'thumbnail' => __('Image upload did not return a valid URL.'),
            ]);
        }

        return $thumbnailUrl;
    }

    private function resolveUniqueSlug(?string $slug, string $title): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = Str::random(8);
        }

        $uniqueSlug = $baseSlug;
        $suffix = 1;

        while (Blog::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $uniqueSlug;
    }

    public function editBlog(int $id)
    {
        $user = Auth::user();
        $post = $this->samplePosts()->firstWhere('id', $id);

        abort_if(is_null($post), 404);

        return view('author.blogs.edit', [
            'user' => $user,
            'post' => $post,
        ]);
    }

    private function samplePosts(): Collection
    {
        return collect([
            [
                'id' => 1,
                'title' => 'Designing for Calm Interfaces',
                'status' => 'draft',
                'updated_at' => Carbon::now()->subDays(1),
                'reads' => '�',
                'summary' => 'Exploring UI systems that reduce cognitive noise and encourage focus.',
                'content' => 'Designing calm interfaces starts with intention. Consider how spacing, typography, and rhythm help the reader breathe...'
            ],
            [
                'id' => 2,
                'title' => 'Habits for Intentional Productivity',
                'status' => 'scheduled',
                'updated_at' => Carbon::now()->subDays(3),
                'reads' => '�',
                'summary' => 'A practical look at balancing creative energy with recovery.',
                'content' => 'Intentional productivity isn\'t about hustle; it\'s about aligning tasks with available energy...'
            ],
            [
                'id' => 3,
                'title' => 'Finding Focus in a Noisy World',
                'status' => 'published',
                'updated_at' => Carbon::now()->subWeek(),
                'reads' => '2.4k reads',
                'summary' => 'Shaping rituals and environments that protect deep work.',
                'content' => 'Focus is the byproduct of protecting attention. Begin with shrinking notifications and crafting micro-rituals...'
            ],
        ])->map(function ($post) {
            $post['updated_human'] = $post['updated_at']->diffForHumans();
            return $post;
        });
    }
}
