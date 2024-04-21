<?php

namespace Tests\Feature\Controllers;

use App\Support\Facades\OdysseyService;
use Database\Factories\OdysseyBookFactory;
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
     * When the home route is requested via get
     * And the appropriate data is found
     * Assert that the page returns a success status and the page header is found
     *
     * @test
     */
    public function test_show_odyssey_home(): void
    {
        $page = OdysseyBookFactory::new()->make([
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

    /**
     * When the home route is requested via get
     * And the data is missing from the database
     * Assert that the page returns a 500
     *
     * @test
     */
    public function test_show_odyssey_home_with_no_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(500);
    }
}
