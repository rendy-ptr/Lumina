<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user.authorProfile', 'category'])
            ->latest()
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with([
            'user.authorProfile',
            'user.visitorProfile',
            'category',
            'comments.user'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.detail', compact('post', 'relatedPosts'));
    }
}
