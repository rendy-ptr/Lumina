<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'avatar_url',
        'linkedin_url',
        'bio',
        'follower',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
