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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($user) {
    //         if ($user->role === 'visitor') {
    //             $user->visitorProfile()->create([
    //                 'avatar_url' => 'https://ui-avatars.com/api/?name=' . urlencode($user->name)
    //             ]);
    //         } elseif ($user->role === 'author') {
    //             $user->authorProfile()->create([
    //                 'avatar_url' => 'https://ui-avatars.com/api/?name=' . urlencode($user->name),
    //                 'linkedin_url' => 'https://linkedin.com/in/' . fake()->userName(),
    //                 'bio' => fake()->paragraph(3),
    //                 'follower' => 0,
    //             ]);
    //         }
    //     });
    // }
}
