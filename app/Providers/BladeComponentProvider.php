<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Blade::component('admin.layouts.app','admin-layout-app');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}