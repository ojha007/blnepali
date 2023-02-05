<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Tests\TestCase;

class NewsController extends TestCase
{

    /** @test */
    public function it_can_create_anchor_news_database_view_when_news_is_anchor_type()
    {
        News::factory()->create(['title' => 'demo', 'is_anchor' => true]);

        $this->assertDatabaseCount('anchor_news', 5);
    }

    /** @test */
    public function it_can_create_special_news_database_view_when_news_is_special_type()
    {
        News::factory()->create(['is_special' => true]);

        $this->assertDatabaseCount('special_news', 6);
    }

    /** @test */
    public function it_can_update_special_news_database_view_when_news_is_special_type()
    {
        $news = News::factory(['title' => 'demo'])->create(['is_special' => false]);

        $news->update(['is_special' => true]);

        $this->assertDatabaseCount('special_news', 6);
        $this->assertDatabaseHas('special_news', ['title' => 'demo']);
    }

    /** @test */
    public function it_can_create_videos_news_database_view_when_news_category_is_video()
    {
        News::factory()->create([
            'title' => 'demo',
            'category_id' => Category::factory()->create(['is_video' => true])
        ]);

        $this->assertDatabaseHas('videos_news', ['title' => 'demo']);
    }
}
