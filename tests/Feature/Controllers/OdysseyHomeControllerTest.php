<?php

namespace Tests\Feature\Controllers;

use App\Models\OdysseyBook;
use App\Support\Facades\OdysseyService;
use Tests\TestCase;

/**
 * Class OdysseyHomeControllerTest
 *
 * @package Tests\Feature\Controllers
 *
 * @test
 * @small
 */
class OdysseyHomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_odyssey_home(): void
    {
        $page = OdysseyBook::make([
            'content' => 'test',
            'page_number' => 1,
        ]);

        OdysseyService::shouldReceive('fetchRandomOdysseyPage')
            ->withNoArgs()
            ->andReturn($page);

        $response = $this->get('/');

        $response->assertStatus(200);

        $this->assertStringContainsString('Homer\'s Odyssey', $response->content());
    }
}
