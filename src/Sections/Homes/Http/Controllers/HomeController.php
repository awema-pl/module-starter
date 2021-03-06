<?php

namespace AwemaPL\Starter\Sections\Homes\Http\Controllers;

use AwemaPL\Auth\Controllers\Traits\RedirectsTo;
use AwemaPL\Starter\Sections\Installations\Http\Requests\StoreInstallation;
use AwemaPL\VirtualTour\Tour;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display installation form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('starter::sections.homes.index');
    }

    /**
     * Virtual tour from beginning
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function virtualTourFromBeginning()
    {
        Tour::setFromBeginning();
        return back();
    }
}
