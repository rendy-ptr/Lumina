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
        ]);
    }

    public function view($slug)
    {
        $user = Auth::user();

        $blog = Blog::with([
            'user.authorProfile',
            'user.visitorProfile',
            'category',
            'comments.user'
        ])
            ->where('slug', $slug)
            ->where('user_id', $user->id)
            ->firstOrFail();

        return view('author.blogs.view', [
            'user' => $user,
            'blog' => $blog,
        ]);
    }


    public function blogs()
    {
        $user = Auth::user();

        $published = Blog::with('category')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $articleCount = $published->count();
        $totalViews = $published->sum('views');
        $totalLikes = $published->sum('likes_count');
        $totalComments = $published->sum('comments_count');

        return view('author.blogs.index', [
            'user' => $user,
            'published' => $published,
            'articleCount' => $articleCount,
            'totalViews' => $totalViews,
            'totalLikes' => $totalLikes,
            'totalComments' => $totalComments,
        ]);
    }

    public function createBlog()
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $profileStatus = $this->resolveAuthorProfileStatus($user);
        $categories = Category::query()->orderBy('name')->get(['id', 'name']);

        return view('author.blogs.create', [
            'user' => $user,
            'categories' => $categories,
            'profileStatus' => $profileStatus,
        ]);
    }

    public function storeBlog(Request $request)
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $profileStatus = $this->resolveAuthorProfileStatus($user);

        if (! $profileStatus['is_complete']) {
            return redirect()
                ->route('author.blogs.create')
                ->with('profile_incomplete', $profileStatus['missing_fields']);
        }

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
                'thumbnail' => 'Image upload service is not configured.',
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
                'thumbnail' => 'Failed to upload image. Please try again later.',
            ]);
        }

        $data = $response->json();
        $thumbnailUrl = $data['secure_url'] ?? $data['url'] ?? null;

        if (! $thumbnailUrl) {
            throw ValidationException::withMessages([
                'thumbnail' => 'Image upload did not return a valid URL.',
            ]);
        }

        return $thumbnailUrl;
    }

    private function resolveUniqueSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = Str::random(8);
        }

        $uniqueSlug = $baseSlug;
        $suffix = 1;

        while (
            Blog::where('slug', $uniqueSlug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $uniqueSlug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $uniqueSlug;
    }

    public function updateBlog(Request $request, int $id)
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $blog = Blog::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['sometimes', 'nullable', 'string', 'max:255'],
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
            'excerpt' => ['sometimes', 'required', 'string'],
            'thumbnail' => ['sometimes', 'image', 'max:2048'],
            'content' => ['sometimes', 'required', 'string'],
        ]);

        $updates = [];

        if (array_key_exists('title', $validated)) {
            $updates['title'] = $validated['title'];
        }

        if (array_key_exists('category_id', $validated)) {
            $updates['category_id'] = $validated['category_id'];
        }

        if (array_key_exists('excerpt', $validated)) {
            $updates['excerpt'] = $validated['excerpt'];
        }

        if (array_key_exists('content', $validated)) {
            $updates['content'] = $validated['content'];
        }

        if (array_key_exists('slug', $validated)) {
            $resolvedSlug = $this->resolveUniqueSlug($validated['slug'], $validated['title'] ?? $blog->title, $blog->id);
            $updates['slug'] = $resolvedSlug;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnailUrl = $this->uploadThumbnailToCloudinary($request->file('thumbnail'), (int) $user->id);
            $updates['thumbnail_url'] = $thumbnailUrl;
        }

        if (! empty($updates)) {
            $blog->update($updates);
        }

        return redirect()
            ->route('author.blogs.edit', $blog->id)
            ->with('status', 'Article updated successfully.');
    }

    public function destroyBlog(int $id)
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $blog = Blog::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $blogTitle = $blog->title;
        $blog->delete();

        return redirect()
            ->route('author.blogs.index')
            ->with('status', 'Article "' . $blogTitle . '" deleted successfully.');
    }

    public function editBlog(int $id)
    {
        $user = Auth::user();
        abort_if(is_null($user), 403);

        $blog = Blog::with('category')
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $categories = Category::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('author.blogs.edit', [
            'user' => $user,
            'blog' => $blog,
            'categories' => $categories,
        ]);
    }

    private function resolveAuthorProfileStatus($user): array
    {
        $profile = $user->authorProfile;

        $requiredFields = collect([
            'Display name' => $user->name,
            'Bio' => $profile?->bio,
            'Job title' => $profile?->job_title,
            'Signature quote' => $profile?->quote,
        ]);

        $missingFields = $requiredFields
            ->filter(fn ($value) => blank($value))
            ->keys()
            ->values()
            ->all();

        return [
            'is_complete' => empty($missingFields),
            'missing_fields' => $missingFields,
        ];
    }
}
