<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            [
                'name' => 'Technology',
                'description' => 'Latest trends in tech and innovation',
                'icon' => 'heroicon-o-cpu-chip',
                'from_color' => 'from-purple-500',
                'to_color' => 'to-pink-500',
            ],
            [
                'name' => 'Design',
                'description' => 'Creative inspiration and tutorials',
                'icon' => 'heroicon-o-paint-brush',
                'from_color' => 'from-blue-500',
                'to_color' => 'to-teal-500',
            ],
            [
                'name' => 'Business',
                'description' => 'Strategies for modern entrepreneurs',
                'icon' => 'heroicon-o-chart-bar',
                'from_color' => 'from-green-500',
                'to_color' => 'to-emerald-500',
            ],
            [
                'name' => 'Lifestyle',
                'description' => 'Tips for living your best life',
                'icon' => 'heroicon-o-star',
                'from_color' => 'from-orange-500',
                'to_color' => 'to-red-500',
            ],
            [
                'name' => 'Health',
                'description' => 'Wellness and healthy living',
                'icon' => 'heroicon-o-heart',
                'from_color' => 'from-rose-500',
                'to_color' => 'to-pink-500',
            ],
            [
                'name' => 'Travel',
                'description' => 'Discover beautiful destinations',
                'icon' => 'heroicon-o-globe-alt',
                'from_color' => 'from-cyan-500',
                'to_color' => 'to-blue-500',
            ],
            [
                'name' => 'Food',
                'description' => 'Recipes and culinary adventures',
                'icon' => 'heroicon-o-cake',
                'from_color' => 'from-yellow-500',
                'to_color' => 'to-orange-500',
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Movies, music, and pop culture',
                'icon' => 'heroicon-o-film',
                'from_color' => 'from-indigo-500',
                'to_color' => 'to-purple-500',
            ],
            [
                'name' => 'Sports',
                'description' => 'Updates and analysis from the field',
                'icon' => 'heroicon-o-trophy',
                'from_color' => 'from-lime-500',
                'to_color' => 'to-green-500',
            ],
            [
                'name' => 'Science',
                'description' => 'Discoveries and innovations in science',
                'icon' => 'heroicon-o-beaker',
                'from_color' => 'from-sky-500',
                'to_color' => 'to-indigo-500',
            ],
        ];

        $category = $this->faker->unique()->randomElement($categories);

        return [
            'name' => $category['name'],
            'slug' => Str::slug($category['name']),
            'description' => $category['description'],
            'icon' => $category['icon'],
            'from_color' => $category['from_color'],
            'to_color' => $category['to_color'],
        ];
    }
}
