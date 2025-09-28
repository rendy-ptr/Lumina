<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Blog;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $post = Blog::inRandomOrder()->first();
        $comment = User::inRandomOrder()->first();
        return [
            'blog_id' => $post ? $post->id : Blog::factory(),
            'user_id' => $comment ? $comment->id : User::factory(),
            'content' => fake()->sentences(3, true),
            'likes_count' => fake()->numberBetween(0, 100),
        ];
    }
}
