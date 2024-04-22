<?php

return [
    'chatGpt' => [
        'endpoint' => 'https://api.openai.com/v1/chat/completions',
        'api_key' => env('CHAT_GPT_API_KEY', ''),
    ],
];
