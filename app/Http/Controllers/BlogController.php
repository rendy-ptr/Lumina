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

        $relatedBlogs = Blog::where('category_id', $query->category_id)
            ->where('id', '!=', $query->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.detail', [
            'blog' => $query,
            'relatedBlogs' => $relatedBlogs
        ]);
    }
}
