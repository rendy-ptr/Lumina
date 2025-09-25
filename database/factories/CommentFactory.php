<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;


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
        $post = Post::inRandomOrder()->first();
        $comment = User::inRandomOrder()->first();
        return [
            'post_id' => $post ? $post->id : Post::factory(),
            'user_id' => $comment ? $comment->id : User::factory(),
            'content' => fake()->sentences(3, true),
            'likes_count' => fake()->numberBetween(0, 100),
        ];
    }
}
