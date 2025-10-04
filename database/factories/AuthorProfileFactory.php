<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorProfile>
 */
class AuthorProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->paragraph(),
            'job_title' => $this->faker->jobTitle(),
            'quote' => $this->faker->sentence(),
            'linkedin_url' => 'https://linkedin.com/in/' . $this->faker->userName(),
            'twitter_url' => 'https://twitter.com/' . $this->faker->userName(),
            'facebook_url' => 'https://facebook.com/' . $this->faker->userName(),
            'instagram_url' => 'https://instagram.com/' . $this->faker->userName(),
            'website_url' => $this->faker->url(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
