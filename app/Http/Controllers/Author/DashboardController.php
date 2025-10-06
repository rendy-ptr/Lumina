<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $publicProfileUrl = $user ? route('blog.byAuthor', $user->id) : route('blog.index');

        $articleActions = collect([
            [
                'title' => 'Write New Article',
                'description' => 'Capture your next idea in a focused editor.',
                'icon' => 'heroicon-o-pencil-square',
                'route' => route('author.posts.create'),
                'accent' => 'from-blue-500 to-indigo-500',
            ],
            [
                'title' => 'Manage Articles',
                'description' => 'Review drafts, continue writing, or publish when ready.',
                'icon' => 'heroicon-o-document-text',
                'route' => route('author.posts.index'),
                'accent' => 'from-purple-500 to-pink-500',
            ],
            [
                'title' => 'View Published Articles',
                'description' => 'Keep tabs on live stories and their performance.',
                'icon' => 'heroicon-o-sparkles',
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

        $drafts = collect([
            [
                'title' => 'Designing for Calm Interfaces',
                'updated' => Carbon::now()->subDays(1)->diffForHumans(),
                'words' => '1.2k words',
            ],
            [
                'title' => 'Habits for Intentional Productivity',
                'updated' => Carbon::now()->subDays(3)->diffForHumans(),
                'words' => '840 words',
            ],
        ]);

        $published = collect([
            [
                'title' => 'Finding Focus in a Noisy World',
                'published' => Carbon::now()->subWeeks(1)->format('M j, Y'),
                'reads' => '2.4k reads',
            ],
            [
                'title' => 'Creating Narrative Around Data',
                'published' => Carbon::now()->subWeeks(2)->format('M j, Y'),
                'reads' => '1.1k reads',
            ],
        ]);

        $accountTasks = collect([
            [
                'title' => 'Upload profile photo',
                'description' => 'A familiar face helps readers connect with you.',
                'icon' => 'heroicon-o-camera',
                'cta' => 'Upload photo',
            ],
            [
                'title' => 'Refresh your LinkedIn URL',
                'description' => 'Point collaborators to your professional profile.',
                'icon' => 'heroicon-o-link',
                'cta' => 'Add link',
            ],
            [
                'title' => 'Update author bio',
                'description' => 'Share the themes and stories you care about most.',
                'icon' => 'heroicon-o-identification',
                'cta' => 'Edit bio',
            ],
        ]);

        $profileLinks = collect([
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
                'label' => 'Support & resources',
                'icon' => 'heroicon-o-lifebuoy',
                'route' => '#',
            ],
        ]);

        return view('author.dashboard', [
            'user' => $user,
            'articleActions' => $articleActions,
            'drafts' => $drafts,
            'published' => $published,
            'accountTasks' => $accountTasks,
            'profileLinks' => $profileLinks,
            'publicProfileUrl' => $publicProfileUrl,
        ]);
    }

    public function posts()
    {
        $user = Auth::user();
        $posts = $this->samplePosts();

        return view('author.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function createPost()
    {
        $user = Auth::user();

        return view('author.posts.create', [
            'user' => $user,
        ]);
    }

    public function editPost(int $id)
    {
        $user = Auth::user();
        $post = $this->samplePosts()->firstWhere('id', $id);

        abort_if(is_null($post), 404);

        return view('author.posts.edit', [
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
