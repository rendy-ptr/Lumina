<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


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


    public function show(Request $request, $slug)
    {
        $query = Blog::with([
            'user.authorProfile',
            'user.visitorProfile',
            'category',
            'comments.user'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $viewerCacheKey = sprintf('blog:%d:view:%s', $query->id, $request->ip());

        if (Cache::add($viewerCacheKey, true, now()->addDay())) {
            $query->increment('views');
        }

        $relatedBlogs = Blog::with(['user.authorProfile', 'category'])
            ->where('user_id', $query->user_id)
            ->where('id', '!=', $query->id)
            ->latest()
            ->get();



        $isFollowingAuthor = false;
        $hasLikedArticle = false;

        if (Auth::check()) {
            $user = Auth::user();

            $isFollowingAuthor = $user
                ->followingAuthors()
                ->where('users.id', $query->user_id)
                ->exists();

            $hasLikedArticle = $user
                ->likedBlogs()
                ->where('blogs.id', $query->id)
                ->exists();
        }

        return view('blog.detail', [
            'blog' => $query,
            'relatedBlogs' => $relatedBlogs,
            'isFollowingAuthor' => $isFollowingAuthor,
            'isLiked' => $hasLikedArticle,
        ]);
    }

    public function byAuthor($userId)
    {
        $user = User::where('role', 'author')->findOrFail($userId);
        $blogs = Blog::with(['user.authorProfile', 'category'])
            ->where('user_id', $userId)
            ->latest()
            ->paginate(9);

        return view('blog.blog-by-author', [
            'blogs' => $blogs,
            'author' => $user
        ]);
    }
}
