<?php

namespace AwemaPL\Starter\Facades;

use AwemaPL\Starter\Contracts\Starter as StarterContract;
use Illuminate\Support\Facades\Facade;

class Starter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return StarterContract::class;
    }
}
