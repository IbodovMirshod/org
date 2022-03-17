<?php

namespace App\Providers;

use App\Models\Collection;
use App\Models\Tool;
use App\Observers\CollectionObserver;
use App\Observers\ToolsObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Collection::observe(CollectionObserver::class);
//        Tool::observe(ToolsObserver::class);
    }
}
