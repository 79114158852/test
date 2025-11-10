<?php

namespace App\Providers;

use App\Contracts\GuideServiceContract;
use App\Services\GuideService;
use Illuminate\Support\ServiceProvider;

class GuideServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GuideServiceContract::class, GuideService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
