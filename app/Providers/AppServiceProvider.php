<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Status\CategoryStatusContext;
use App\Status\Strategies\DefaultCategoryStatus;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CategoryStatusContext::class, function ($app) {
            return new CategoryStatusContext(new DefaultCategoryStatus());
        });
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}