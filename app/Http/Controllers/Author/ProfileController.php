<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        abort_unless($user && $user->role === 'author', 403);

        $profile = $this->resolveProfile($user);
        $publicProfileUrl = $user ? route('blog.byAuthor', $user->id) : route('blog.index');

        return view('author.profile.edit', [
            'user' => $user,
            'profile' => $profile,
            'publicProfileUrl' => $publicProfileUrl,
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        abort_unless($user && $user->role === 'author', 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $profile = $this->resolveProfile($user);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->store('author-avatars', 'public');

            if ($profile->avatar_url && Str::startsWith($profile->avatar_url, 'storage/')) {
                $relativePath = Str::after($profile->avatar_url, 'storage/');
                Storage::disk('public')->delete($relativePath);
            }

            $profile->avatar_url = Storage::url($path);
        }

        $profile->bio = $validated['bio'] ?? $profile->bio;
        $profile->linkedin_url = $validated['linkedin_url'] ?? $profile->linkedin_url;
        $profile->save();

        if ($user->name !== $validated['name']) {
            $user->name = $validated['name'];
            $user->save();
        }

        return back()->with('status', __('Profile updated successfully.'));
    }

    private function resolveProfile($user)
    {
        $profile = $user->authorProfile;

        if (! $profile) {
            $profile = $user->authorProfile()->create([
                'avatar_url' => $user->profile_photo_url
                    ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'bio' => '',
            ]);
        }

        return $profile;
    }
}
