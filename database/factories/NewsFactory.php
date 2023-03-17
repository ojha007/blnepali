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
        $categories = Category::pluck('id')->toArray();
        $catId = $this->faker->randomElement($categories);

        return [
            'title' => $this->faker->text,
            'c_id' => $this->faker->unique()->numerify('######'),
            'category_id' => $catId,
            'sub_title' => $this->faker->text,
            'reporter_id' => fn() => Reporter::factory(),
            'is_anchor' => $this->faker->boolean,
            'is_special' => $this->faker->boolean,
            'image' => $this->faker->imageUrl,
            'image_description' => $this->faker->word,
            'publish_date' => now()->subHours($this->faker->numerify('#'))->format('Y-m-d\TH:i'),
            'short_description' => $this->faker->word,
            'description' => $this->faker->text,
            'slug' => $this->faker->slug,
            'created_by' => fn() => User::factory(),
            'date_line' => $this->faker->address,
        ];
    }
}
