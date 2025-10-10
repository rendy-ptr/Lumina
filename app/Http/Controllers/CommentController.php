<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    /**
     * Store a newly created comment for the given blog.
     */
    public function store(Request $request, string $slug): RedirectResponse
    {
        $user = $request->user();

        abort_if(is_null($user), 403, 'You must be logged in to comment.');

        $blog = Blog::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:3', 'max:2000'],
        ]);

        $content = trim($validated['content']);

        if ($content === '') {
            throw ValidationException::withMessages([
                'content' => 'Comment content cannot be empty.',
            ]);
        }

        $blog->comments()->create([
            'user_id' => $user->id,
            'content' => $content,
        ]);

        $this->syncCommentsCount($blog);

        return redirect()
            ->route('blog.show', $blog->slug)
            ->with('status', 'Comment posted successfully.');
    }

    /**
     * Ensure the cached comments count stays in sync with the database.
     */
    private function syncCommentsCount(Blog $blog): void
    {
        $count = $blog->comments()->count();

        $blog->forceFill(['comments_count' => $count])->saveQuietly();
    }
}
