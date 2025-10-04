<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($name);
        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'avatar_url' => $avatarUrl,
            'role' => 'visitor',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function author()
    {
        return $this->state(fn(array $attributes) => [
            'role' => 'author',
        ])->afterCreating(function ($user) {
            $user->authorProfile()->create(
                AuthorProfileFactory::new()->make()->toArray()
            );
        });
    }


    public function visitor()
    {
        return $this->state(fn(array $attributes) => [
            'role' => 'visitor',
        ]);
    }
}
