<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReporterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'email' => $this->faker->safeEmail,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'image' => $this->faker->image,
            'caption' => $this->faker->title,
            'facebook_url' => $this->faker->url,
            'twitter_url' => $this->faker->url,
        ];
    }
}
