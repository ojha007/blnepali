<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;


class NewsByCategoryControllerTest extends TestCase
{

    /** @test */
    public function it_can_load_non_category_page_successfully(): void
    {
        $this->get(route('newsByCategory', 'anchor'))->assertSuccessful();
    }

}
