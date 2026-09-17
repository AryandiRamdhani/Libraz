<?php

namespace Tests\Feature;

use Tests\TestCase;

class LibraryPageTest extends TestCase
{
    /**
     * A basic library page test.
     */
    public function test_the_library_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('BiblioZ');
    }
}
