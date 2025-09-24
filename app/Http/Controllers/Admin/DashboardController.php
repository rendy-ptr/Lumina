<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data\MockBlogData;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock data for dashboard
        $recentPosts = MockBlogData::getPosts()->take(5);
        $recentActivities = collect([
            (object) [
                'type' => 'post',
                'message' => 'New post "The Future of AI" was published',
                'created_at' => Carbon::parse('2024-12-05 14:30:00')
            ],
            (object) [
                'type' => 'comment',
                'message' => 'New comment on "Work-Life Balance" by Alex Rivera',
                'created_at' => Carbon::parse('2024-12-05 12:15:00')
            ],
            (object) [
                'type' => 'user',
                'message' => 'New user "Sarah Johnson" registered',
                'created_at' => Carbon::parse('2024-12-05 10:45:00')
            ],
            (object) [
                'type' => 'post',
                'message' => 'Post "Startup Guide" was updated',
                'created_at' => Carbon::parse('2024-12-05 09:20:00')
            ],
            (object) [
                'type' => 'comment',
                'message' => 'Comment flagged for review on "AI in Business"',
                'created_at' => Carbon::parse('2024-12-05 08:30:00')
            ]
        ]);

        return view('admin.dashboard', compact('recentPosts', 'recentActivities'));
    }

    public function posts()
    {
        $posts = MockBlogData::getPosts();
        return view('admin.posts.index', compact('posts'));
    }

    public function createPost()
    {
        return view('admin.posts.create');
    }

    public function editPost($id)
    {
        $posts = MockBlogData::getPosts();
        $post = $posts->firstWhere('id', $id);
        return view('admin.posts.edit', compact('post'));
    }

    public function categories()
    {
        $categories = collect([
            (object) ['id' => 1, 'name' => 'Technology', 'posts_count' => 12],
            (object) ['id' => 2, 'name' => 'Lifestyle', 'posts_count' => 8],
            (object) ['id' => 3, 'name' => 'Business', 'posts_count' => 6],
            (object) ['id' => 4, 'name' => 'Design', 'posts_count' => 4]
        ]);
        return view('admin.categories.index', compact('categories'));
    }

    public function comments()
    {
        $comments = MockBlogData::getComments();
        return view('admin.comments.index', compact('comments'));
    }

    public function users()
    {
        $users = collect([
            (object) [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@lumina.com',
                'role' => 'Administrator',
                'avatar_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face',
                'created_at' => Carbon::parse('2024-01-15')
            ],
            (object) [
                'id' => 2,
                'name' => 'Lisa Park',
                'email' => 'lisa@lumina.com',
                'role' => 'Author',
                'avatar_url' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=40&h=40&fit=crop&crop=face',
                'created_at' => Carbon::parse('2024-03-22')
            ]
        ]);
        return view('admin.users.index', compact('users'));
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
}
