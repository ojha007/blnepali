<?php

namespace Tests\Feature\Http\Controllers;

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
}
