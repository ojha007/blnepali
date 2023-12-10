<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class NewsFactory extends Factory
{
    protected $model = News::class;

    public function configure(): NewsFactory
    {
        return $this->afterMaking(function (News $news) {
            $news->slug = Str::slug($news->title);
            $news->category_id = Category::query()->inRandomOrder()->first()->id;
            $news->reporter_id = Reporter::query()->inRandomOrder()->first()->id;
            $news->created_by = User::query()->inRandomOrder()->first()->id;
        });
    }

    public function definition(): array
    {
        return [
            'title' => $this->faker->text,
            'c_id' => $this->faker->unique()->numerify('######'),
            'category_id' => fn() => Category::factory(),
            'sub_title' => $this->faker->text,
            'reporter_id' => fn() => Reporter::factory(),
            'is_anchor' => $this->faker->boolean,
            'is_special' => $this->faker->boolean,
            'image' => $this->faker->imageUrl,
            'image_description' => $this->faker->word,
            'publish_date' => now()->subHours($this->faker->numerify('#'))->format('Y-m-d\TH:i'),
            'short_description' => $this->faker->word,
            'description' => $this->faker->text,
            'created_by' => fn() => User::factory(),
            'date_line' => $this->faker->address,
            'guest_id' => null
        ];
    }
}
