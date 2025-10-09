<?php

namespace App\Data;

class AuthorDashboardData
{
    public static function articleActions($user)
    {
        return collect([
            [
                'title' => 'Write New Article',
                'description' => 'Capture your next idea in a focused editor.',
                'icon' => 'heroicon-o-pencil-square',
                'route' => route('author.blogs.create'),
                'accent' => 'from-blue-500 to-indigo-500',
            ],
            [
                'title' => 'Manage Articles',
                'description' => 'Review drafts, continue writing, or publish when ready.',
                'icon' => 'heroicon-o-document-text',
                'route' => route('author.blogs.index'),
                'accent' => 'from-purple-500 to-pink-500',
            ],
            [
                'title' => 'View Published Articles',
                'description' => 'Keep tabs on live stories and their performance.',
                'icon' => 'heroicon-o-globe-alt',
                'route' => route('blog.byAuthor', $user->id),
                'accent' => 'from-emerald-500 to-teal-500',
            ],
            [
                'title' => 'Profile View',
                'description' => 'See how your profile appear to readers.',
                'icon' => 'heroicon-o-eye',
                'route' => route('author.profile.index'),
                'accent' => 'from-amber-500 to-orange-500',
            ],
        ]);
    }
    public static function profileLinks()
    {
        return collect([
            [
                'label' => 'View public profile',
                'icon' => 'heroicon-o-user-circle',
                'route' => route('author.profile.index'),
            ],
            [
                'label' => 'Edit profile',
                'icon' => 'heroicon-o-pencil-square',
                'route' => route('author.profile.edit'),
            ],
            [
                'label' => 'Account settings',
                'icon' => 'heroicon-o-cog-6-tooth',
                'route' => route('author.setting.edit'),
            ],
            [
                'label' => 'Home Page',
                'icon' => 'heroicon-o-home',
                'route' => route('home'),
            ],
        ]);
    }
}
