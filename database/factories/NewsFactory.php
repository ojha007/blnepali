<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text,
            'c_id' => 1,
            'category_id' => Category::factory()->create(),
            'sub_title' => $this->faker->text,
            'reporter_id' => Reporter::factory()->create(),
            'is_anchor' => $this->faker->boolean,
            'is_special' => $this->faker->boolean,
            'image' => $this->faker->imageUrl,
            'image_description' => $this->faker->word,
            'publish_date' => $this->faker->dateTime(),
            'short_description' => $this->faker->word,
            'description' => $this->faker->text,
            'slug' => $this->faker->slug,
            'created_by' => User::factory()->create(),
            'date_line' => $this->faker->address,
        ];
    }
}
