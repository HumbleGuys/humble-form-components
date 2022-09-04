<?php

namespace HumbleFormComponents;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources', 'form');
    }

    public function boot(): void
    {
    }
}
