<?php

namespace AwemaPL\Starter;

use AwemaPL\BaseJS\AwemaProvider;
use AwemaPL\Starter\Listeners\EventSubscriber;
use AwemaPL\Starter\Sections\Creators\Http\Middleware\StorageDownload;
use AwemaPL\Starter\Sections\Creators\Repositories\Contracts\HistoryRepository;
use AwemaPL\Starter\Sections\Creators\Repositories\EloquentHistoryRepository;
use AwemaPL\Starter\Sections\Homes\Http\Middleware\AddWidgets;
use AwemaPL\Starter\Sections\Installations\Http\Middleware\GlobalMiddleware;
use AwemaPL\Starter\Sections\Installations\Http\Middleware\GroupMiddleware;
use AwemaPL\Starter\Sections\Installations\Http\Middleware\Installation;
use AwemaPL\Starter\Sections\Installations\Http\Middleware\RouteMiddleware;
use AwemaPL\Starter\Contracts\Starter as StarterContract;
use Illuminate\Support\Facades\Event;

class StarterServiceProvider extends AwemaProvider
{

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'starter');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'starter');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->bootMiddleware();
        app('starter')->includeLangJs();
        app('starter')->menuMerge();
        app('starter')->mergePermissions();
        Event::subscribe(EventSubscriber::class);
        parent::boot();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/starter.php', 'starter');
        $this->mergeConfigFrom(__DIR__ . '/../config/starter-menu.php', 'starter-menu');
        $this->app->bind(StarterContract::class, Starter::class);
        $this->app->singleton('starter', StarterContract::class);
        $this->registerRepositories();
        parent::register();
    }


    public function getPackageName(): string
    {
        return 'starter';
    }

    public function getPath(): string
    {
        return __DIR__;
    }

    /**
     * Register and bind package repositories
     *
     * @return void
     */
    protected function registerRepositories()
    {
        $this->app->bind(HistoryRepository::class, EloquentHistoryRepository::class);
    }

    /**
     * Boot middleware
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function bootMiddleware()
    {
        $this->bootGlobalMiddleware();
        $this->bootRouteMiddleware();
        $this->bootGroupMiddleware();
    }

    /**
     * Boot route middleware
     */
    private function bootRouteMiddleware()
    {
        $router = app('router');
        $router->aliasMiddleware('starter', RouteMiddleware::class);
    }

    /**
     * Boot group middleware
     */
    private function bootGroupMiddleware()
    {
        $kernel = $this->app->make(\Illuminate\Contracts\Http\Kernel::class);
        $kernel->appendMiddlewareToGroup('web', GroupMiddleware::class);
        $kernel->appendMiddlewareToGroup('web', Installation::class);
        $kernel->appendMiddlewareToGroup('web', AddWidgets::class);
    }

    /**
     * Boot global middleware
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function bootGlobalMiddleware()
    {
        $kernel = $this->app->make(\Illuminate\Contracts\Http\Kernel::class);
        $kernel->pushMiddleware(GlobalMiddleware::class);
        $kernel->pushMiddleware(StorageDownload::class);
    }
}
