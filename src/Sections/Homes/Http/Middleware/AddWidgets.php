<?php

namespace AwemaPL\Starter\Sections\Homes\Http\Middleware;

use AwemaPL\Auth\Facades\Auth;
use AwemaPL\Navigation\NavChecker;
use AwemaPL\Navigation\NavGenerator;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AddWidgets
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $widgets = config('starter.widgets', []);
        array_multisort(array_column($widgets, 'order'), SORT_ASC, $widgets);
        View::composer('*', function ($view) use ($widgets) {
            $view->with('dashboardWidgets', $widgets);
        });
        return $next($request);
    }
}
