<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OdysseyHomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_odyssey_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $this->assertStringContainsString('<h1>Odyssey Home</h1>', $response->content());
    }
}
