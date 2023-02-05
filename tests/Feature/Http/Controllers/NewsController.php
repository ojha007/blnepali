<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsController extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user, 'web');
    }

    /** @test */
    public function it_can_hit_create_page()
    {
        $this->get(route('cms.news.create'))
            ->assertSuccessful()
            ->assertViewIs('backend.news.create')
            ->assertViewHas('categories');
    }

    /** @test */
    public function it_can_create_news()
    {
        $attributes = News::factory()->raw();

        $this->post(route('cms.news.store'), $attributes)
            ->assertRedirect(route('cms.news.index'));
    }

    /** @test */
    public function it_can_create_anchor_news_database_view_when_news_is_anchor_type()
    {
        News::factory()->create(['is_anchor' => true]);

        $this->assertDatabaseCount('anchor_news', 1);
    }

    /** @test */
    public function it_can_create_special_news_database_view_when_news_is_special_type()
    {
        News::factory()->create(['is_special' => true]);

        $this->assertDatabaseCount('special_news', 1);
    }

    /** @test */
    public function it_can_update_special_news_database_view_when_news_is_special_type()
    {
        $news = News::factory()->create(['is_special' => 0]);

        $news->update(['is_special' => 1]);

        $this->assertDatabaseCount('special_news', 1);
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
