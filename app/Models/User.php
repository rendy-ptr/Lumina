<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
    public function visitorProfile()
    {
        return $this->hasOne(VisitorProfile::class);
    }

    public function authorProfile()
    {
        return $this->hasOne(AuthorProfile::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'author_followers', 'author_id', 'follower_id')->withTimestamps();
    }

    public function followingAuthors()
    {
        return $this->belongsToMany(User::class, 'author_followers', 'follower_id', 'author_id')->withTimestamps();
    }

    public function likedBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_likes', 'user_id', 'blog_id')->withTimestamps();
    }
}
