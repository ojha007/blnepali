<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'parent_id' => null,
            'header_position' => $this->faker->randomDigitNotZero(),
            'body_position' => $this->faker->randomDigitNotZero(),
        ];
    }

    public function withParent(): CategoryFactory
    {
        return $this->state(function () {
            return [
                'parent_id' => Category::factory()->create(),
            ];
        });
    }
}
