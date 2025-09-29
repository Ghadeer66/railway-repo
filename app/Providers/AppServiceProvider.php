<?php


namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Redis caching example
        \Illuminate\Support\Facades\Cache::put('test_key', 'Hello Redis!', 600); // cache for 10 minutes
        $value = \Illuminate\Support\Facades\Cache::get('test_key');
        Log::info('Redis cache value for test_key: ' . $value);
    }
}
