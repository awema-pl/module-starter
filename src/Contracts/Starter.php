<?php

namespace AwemaPL\Starter\Contracts;

interface Starter
{
    /**
     * Register routes.
     *
     * @return void
     */
    public function routes();

    /**
     * Can installation
     *
     * @return mixed
     */
    public function canInstallation();

    /**
     * Include Lang JS
     */
    public function includeLangJs();


    /**
     * Menu merge in navigation
     */
    public function menuMerge();

    /**
     * Install package
     */
    public function install();

    /**
     * Add permissions for module permission
     *
     * @return mixed
     */
    public function mergePermissions();
}
