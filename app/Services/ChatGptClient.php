<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Class ChatGptClient
 *
 * @package App\Services
 */
class ChatGptClient
{
    /**
     * ChatGPT endpoint for literature queries.
     *
     * @var string
     */
    private string $endpoint;

    /**
     * ChatGPT API key.
     *
     * @var string
     */
    private string $apiKey;

    /**
     * Constructor.
     *
     * @param array<string,string,int> $config
     */
    public function __construct(array $config)
    {
        $this->apiKey = $config['api_key'];
        $this->endpoint = $config['endpoint'];
    }

    /**
     * Runs the query against ChatGPT's API.
     *
     * @param string $query
     * @return string
     * @throws RuntimeException
     */
    public function query(string $query): string
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->apiKey}",
        ])->post($this->endpoint, [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                0 => [
                    'content' => $query,
                    'role' => 'user',
                ]
            ]
        ]);

        if ($response->failed()) {
            throw new RuntimeException("Error: {$response->status()}");
        }

        $responseArray = json_decode($response->body());

        //TODO: add fault tolerance here.
        return $responseArray->choices[0]->message->content;
    }
}
