<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $randomBoolean = false;
        $parentIds = Category::pluck('id')->toArray();
        if (!empty($parentIds)) {
            $randomBoolean = $this->faker->boolean;
        }

        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'is_active' => $this->faker->boolean,
            'parent_id' => $randomBoolean
                ? $this->faker->randomElements($parentIds)
                : null
        ];
    }
}
