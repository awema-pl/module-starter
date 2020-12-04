<?php

namespace AwemaPL\Starter\Sections\Welcomes\Http\Controllers;

use AwemaPL\Auth\Controllers\Traits\RedirectsTo;
use AwemaPL\Starter\Sections\Installations\Http\Requests\StoreInstallation;
use AwemaPL\VirtualTour\Tour;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    /**
     * Display installation form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('starter::sections.welcomes.index');
    }
}
