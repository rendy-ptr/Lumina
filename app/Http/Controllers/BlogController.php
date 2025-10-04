<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with(['user.authorProfile', 'category'])->latest();
        $categories = Category::all();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        return view('blog.index', [
            'blogs' => $query->paginate(9)->withQueryString(),
            'categories' => $categories
        ]);
    }


    public function show($slug)
    {
        $query = Blog::with([
            'user.authorProfile',
            'user.visitorProfile',
            'category',
            'comments.user'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedBlogs = Blog::with(['user.authorProfile', 'category'])
            ->where('user_id', $query->user_id)
            ->where('id', '!=', $query->id)
            ->latest()
            ->get();



        return view('blog.detail', [
            'blog' => $query,
            'relatedBlogs' => $relatedBlogs
        ]);
    }

    public function byAuthor($userId)
    {
        $blogs = Blog::with(['user.authorProfile', 'category'])
            ->whereHas('user', function ($q) {
                $q->where('role', 'author');
            })
            ->where('user_id', $userId)
            ->latest()
            ->paginate(9);

        return view('blog.blog-by-author', [
            'blogs' => $blogs,
        ]);
    }
}
