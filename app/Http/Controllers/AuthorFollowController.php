<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorFollowController extends Controller
{
    public function __invoke(Request $request, User $author)
    {
        $user = $request->user();

        abort_if(is_null($user), 403);
        abort_if($author->role !== 'author', 404);
        abort_if($author->id === $user->id, 403, 'You cannot follow yourself.');

        $alreadyFollowing = $user->followingAuthors()
            ->where('users.id', $author->id)
            ->exists();

        $action = $request->input('action');

        if ($alreadyFollowing) {
            if ($action === 'unfollow') {
                $user->followingAuthors()->detach($author->id);
                $this->syncFollowerCount($author);

                return back()->with('status', 'You unfollowed ' . $author->name . '.');
            }

            return back()->with('status', 'You already follow ' . $author->name . '.');
        }

        if ($action === 'unfollow') {
            return back()->with('status', 'You are not following ' . $author->name . '.');
        }

        $user->followingAuthors()->attach($author->id);

        $this->syncFollowerCount($author);

        return back()->with('status', 'You are now following ' . $author->name . '.');
    }

    private function syncFollowerCount(User $author): void
    {
        $authorProfile = $author->authorProfile;

        if (! $authorProfile) {
            return;
        }

        $authorProfile->update([
            'follower' => $author->followers()->count(),
        ]);
    }
}
