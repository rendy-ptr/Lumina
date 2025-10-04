<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPost = Blog::with(['user.authorProfile'])
            ->orderBy('likes_count', 'desc')
            ->first();


        $otherTopPosts = Blog::with(['user.authorProfile', 'category'])
            ->where('id', '!=', optional($featuredPost)->id)
            ->orderBy('likes_count', 'desc')
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredPost', 'otherTopPosts'));
    }
}
