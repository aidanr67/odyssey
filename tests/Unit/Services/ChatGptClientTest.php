<?php

namespace Tests\Unit\Services;

use App\Services\ChatGptClient;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ChatGptClientTest extends TestCase
{
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
