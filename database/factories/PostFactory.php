<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = User::where('role', 'author')->inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        $title = fake()->sentence(6);

        return [
            'user_id' => $author ? $author->id : User::factory()->author(),
            'category_id' => $category ? $category->id : null,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'title' => $title,
            'excerpt' => fake()->paragraph(2),
            'thumbnail_url' => 'https://picsum.photos/id/' . fake()->numberBetween(1, 1000) . '/600/400',
            'content' => collect(fake()->paragraphs(5))
                ->map(fn($p) => "<p>$p</p>")->implode(''),
            'likes_count' => fake()->numberBetween(0, 500),
            'comments_count' => 0,
        ];
    }
}
