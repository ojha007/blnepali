<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryPositionFactory extends Factory
{
    protected $model = CategoryPosition::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create(),
            'front_header_position' => $this->faker->numerify('#'),
            'detail_header_position' => $this->faker->numerify('#'),
            'detail_body_position' => $this->faker->numerify('#'),
            'front_body_position' => $this->faker->numerify('#'),
        ];
    }
}
