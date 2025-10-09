<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogLikeController extends Controller
{
    public function __invoke(Request $request, Blog $blog)
    {
        $user = $request->user();

        abort_if(is_null($user), 403);

        $action = $request->input('action', 'like');

        $alreadyLiked = $user->likedBlogs()
            ->where('blogs.id', $blog->id)
            ->exists();

        if ($alreadyLiked && $action === 'unlike') {
            $user->likedBlogs()->detach($blog->id);
            $updatedCount = $this->syncLikesCount($blog);

            return $this->respond($request, $updatedCount, false);
        }

        if ($alreadyLiked) {
            return $this->respond($request, $blog->likes_count, true);
        }

        if ($action === 'unlike') {
            return $this->respond($request, $blog->likes_count, false);
        }

        $user->likedBlogs()->attach($blog->id);
        $updatedCount = $this->syncLikesCount($blog);

        return $this->respond($request, $updatedCount, true);
    }

    private function syncLikesCount(Blog $blog): int
    {
        $likes = $blog->likedUsers()->count();

        $blog->forceFill(['likes_count' => $likes])->saveQuietly();

        return $likes;
    }

    private function respond(Request $request, int $likesCount, bool $liked)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'likes_count' => $likesCount,
                'liked' => $liked,
            ]);
        }

        $message = $liked ? 'You liked this article.' : 'You removed your like.';

        return back()->with('status', $message);
    }
}
