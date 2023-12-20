<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Response::macro('data', function ($key, $message, $statusCode = 200) {
            return response()->baseResponse([
                'key' => $key,
                'message' => $message,
            ], $statusCode);
        });

        Response::macro('baseResponse', function ($data, $statusCode = 200, $contentType = 'application/json') {
            return response()->json($data, $statusCode, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        });
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

    }
}
