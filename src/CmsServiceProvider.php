<?php

namespace Syedhamidalishahofficial\Cms;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DatabaseCommand::class,
                MiddlewareCommand::class,
                ModelsCommand::class,
                ControllersCommand::class,
                ViewsCommand::class,
                RoutesCommand::class,
                AssetsCommand::class,
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Route::mixin(new AuthRouteMethods);
    }
}
