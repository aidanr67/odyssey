<?php

namespace Tests\Feature\Controllers;

use App\Support\Facades\OdysseyService;
use Tests\TestCase;

class OdysseyHomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_odyssey_home(): void
    {
        OdysseyService::shouldReceive('fetchRandomOdysseyPage')
            ->withNoArgs()
            ->andReturn('test');

        $response = $this->get('/');

        $response->assertStatus(200);

        $this->assertStringContainsString('Homer\'s Odyssey', $response->content());
    }
}
