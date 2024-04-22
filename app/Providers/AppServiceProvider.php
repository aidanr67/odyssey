<?php

namespace App\Providers;

use App\Services\ChatGptClient;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('ChatGptClient', function ($app) {
            return new ChatGptClient(Config::get('api.chatGpt'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
