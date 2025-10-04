<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'bio',
        'job_title',
        'quote',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'instagram_url',
        'website_url',
        'email',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
