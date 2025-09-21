<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\MockBlogData;

class BlogController extends Controller
{
    public function index()
    {
        $posts = MockBlogData::getPosts();
        return view('blog.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = MockBlogData::getPosts();
        $post = $posts->firstWhere('id', $id);

        if (!$post) {
            abort(404);
        }

        // Get related posts (excluding current post)
        $relatedPosts = $posts->filter(function ($p) use ($id) {
            return $p->id != $id;
        })->take(3);

        $comments = MockBlogData::getComments();
        $popularPosts = MockBlogData::getPopularPosts();

        return view('blog.detail', compact('post', 'relatedPosts', 'comments', 'popularPosts'));
    }
}
