<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthorProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        abort_unless($user && $user->role === 'author', 403);

        $profile = $user->authorProfile;
        $articlesCount = $user->blogs()->count();
        $profile->follower = $profile->follower;

        $socialLinks = [
            [
                'label' => 'Website',
                'icon' => 'fas-globe',
                'url' => $profile?->website_url,
            ],
            [
                'label' => 'LinkedIn',
                'icon' => 'fab-linkedin',
                'url' => $profile?->linkedin_url,
            ],
            [
                'label' => 'Twitter / X',
                'icon' => 'fab-x-twitter',
                'url' => $profile?->twitter_url,
            ],
            [
                'label' => 'Facebook',
                'icon' => 'fab-facebook',
                'url' => $profile?->facebook_url,
            ],
            [
                'label' => 'Instagram',
                'icon' => 'fab-instagram',
                'url' => $profile?->instagram_url,
            ],
            [
                'label' => 'Email',
                'icon' => 'fas-envelope',
                'url' => $profile?->email,
            ],
        ];

        $stats = [
            [
                'label' => 'Articles',
                'value' => $articlesCount,
            ],
            [
                'label' => 'Followers',
                'value' => $profile->follower,
            ],
        ];


        return view('author.profile.index', [
            'user' => $user,
            'profile' => $profile,
            'socialLinks' => $socialLinks,
            'stats' =>  $stats,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        abort_unless($user && $user->role === 'author', 403);

        $profile = $user->authorProfile;

        return view('author.profile.edit', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        abort_unless($user && $user->role === 'author', 403);

        $profile = $user->authorProfile;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:1000'],
            'job_title' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        if (! $profile) {
            $profile = $user->authorProfile()->create();
        }

        $avatarUrl = null;

        if ($request->hasFile('avatar')) {
            $avatarUrl = $this->uploadAvatarToCloudinary($request->file('avatar'), (int) $user->id);
        }

        $profile->fill([
            'bio' => $validated['bio'],
            'job_title' => $validated['job_title'],
            'quote' => $validated['quote'],
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'twitter_url' => $validated['twitter_url'] ?? null,
            'facebook_url' => $validated['facebook_url'] ?? null,
            'instagram_url' => $validated['instagram_url'] ?? null,
            'website_url' => $validated['website_url'] ?? null,
            'email' => $validated['email'] ?? null,
        ]);
        $profile->save();

        $oldName = $user->name;
        $user->name = $validated['name'];

        if ($avatarUrl) {
            $user->avatar_url = $avatarUrl;
        } elseif ($oldName !== $validated['name']) {
            $user->avatar_url = 'https://ui-avatars.com/api/?name=' . urlencode($user->name);
        }

        $user->save();

        return back()->with('status', 'Profile updated successfully.');
    }

    protected function uploadAvatarToCloudinary(UploadedFile $avatar, int $userId): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');
        $folder = trim((string) config('services.cloudinary.folder'), '/');

        if (! $cloudName || ! $apiKey || ! $apiSecret) {
            throw ValidationException::withMessages([
                'avatar' => __('Image upload service is not configured.'),
            ]);
        }

        $publicIdSuffix = $userId . '-' . Str::lower(Str::random(12));
        $publicId = $folder ? $folder . '/' . $publicIdSuffix : $publicIdSuffix;
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
            ->attach('file', file_get_contents($avatar->getRealPath()), $avatar->getClientOriginalName())
            ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
                'public_id' => $publicId,
            ]);

        if ($response->failed()) {
            throw ValidationException::withMessages([
                'avatar' => __('Failed to upload avatar. Please try again later.'),
            ]);
        }

        $data = $response->json();
        $avatarUrl = $data['secure_url'] ?? $data['url'] ?? null;

        if (! $avatarUrl) {
            throw ValidationException::withMessages([
                'avatar' => __('Image upload did not return a valid URL.'),
            ]);
        }

        return $avatarUrl;
    }
}
