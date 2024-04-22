<?php

namespace Tests\Unit\External;

use App\External\ChatGpt\ChatGptClient;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * Class ChatGptClientTest
 *
 * @package Tests\Unit\Services
 *
 * @test
 * @small
 */
class ChatGptClientTest extends TestCase
{
    /**
     * Given a valid chatGPT config
     * When calling the ChatGPT client
     * Test that it returns the expected response without failure.
     *
     * @return void
     */
    public function testQuery()
    {
        $config = [
            'api_key' => 'API_KEY',
            'endpoint' => 'https://api.openai.com/v1/engines/davinci-codex/completions',
            'max_tokens' => 150
        ];

        $mockResponse = '{"choices":[{"message":{"content":"This is a mock response from ChatGPT."}}]}';

        Http::fake([
            '*' => Http::response($mockResponse, 200),
        ]);


        $client = new ChatGptClient($config);

        $response = $client->query('Test prompt');

        $this->assertEquals('This is a mock response from ChatGPT.', $response);
    }
}
