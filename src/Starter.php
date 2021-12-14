<?php

namespace AwemaPL\Starter;

use Illuminate\Database\Migrations\Migrator;
use Illuminate\Routing\Router;
use AwemaPL\Starter\Contracts\Starter as StarterContract;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class Starter implements StarterContract
{
    /** @var Router $router */
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Routes
     */
    public function routes()
    {
        if ($this->isActiveRoutes()) {
            if ($this->canInstallation()) {
                $this->installationRoutes();
            }
            if ($this->isActiveCreatorRoutes()) {
                $this->creatorRoutes();
            }
            if ($this->isActiveExampleRoutes()) {
                $this->exampleRoutes();
            }
            if ($this->isActiveWelcomeRoutes()) {
                $this->welcomeRoutes();
            }
            if ($this->isActiveHomeRoutes()) {
                $this->homeRoutes();
            }
        }
    }

    /**
     * Installation routes
     */
    protected function installationRoutes()
    {
        $prefix = config('starter.routes.installation.prefix');
        $namePrefix = config('starter.routes.installation.name_prefix');
        $this->router->prefix($prefix)->name($namePrefix)->group(function () {
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Installations\Http\Controllers\InstallationController@index')
                ->name('index');
            $this->router->post('/', '\AwemaPL\Starter\Sections\Installations\Http\Controllers\InstallationController@store')
                ->name('store');
        });

    }

    /**
     * Creator routes
     */
    protected function creatorRoutes()
    {

        $prefix = config('starter.routes.creator.prefix');
        $namePrefix = config('starter.routes.creator.name_prefix');
        $middleware = config('starter.routes.creator.middleware');
        $this->router->prefix($prefix)->name($namePrefix)->middleware($middleware)->group(function () {
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Creators\Http\Controllers\CreatorController@index')
                ->name('index');
            $this->router
                ->post('/', '\AwemaPL\Starter\Sections\Creators\Http\Controllers\CreatorController@store')
                ->name('store');
            $this->router
                ->get('/histories', '\AwemaPL\Starter\Sections\Creators\Http\Controllers\CreatorController@scope')
                ->name('scope');
            $this->router
                ->get('/download/{filename}', '\AwemaPL\Starter\Sections\Creators\Http\Controllers\CreatorController@download')
                ->name('download');
        });
    }

    /**
     * Example routes
     */
    protected function exampleRoutes()
    {

        $prefix = config('starter.routes.example.prefix');
        $namePrefix = config('starter.routes.example.name_prefix');
        $middleware = config('starter.routes.example.middleware');
        $this->router->prefix($prefix)->name($namePrefix)->middleware($middleware)->group(function () {
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Examples\Http\Controllers\ExampleController@index')
                ->name('index');
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Examples\Http\Controllers\ExampleController@index')
                ->name('index');
            $this->router
                ->get('/virtual-tour-from-beginning', '\AwemaPL\Starter\Sections\Examples\Http\Controllers\ExampleController@virtualTourFromBeginning')
                ->name('virtual_tour_from_beginning');
        });
    }

    /**
     * Welcome routes
     */
    protected function welcomeRoutes()
    {
        $prefix = config('starter.routes.welcome.prefix');
        $namePrefix = config('starter.routes.welcome.name_prefix');
        $middleware = config('starter.routes.welcome.middleware');
        $this->router->prefix($prefix)->name($namePrefix)->middleware($middleware)->group(function () {
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Welcomes\Http\Controllers\WelcomeController@index')
                ->name('index');
        });
    }

    /**
     * Home routes
     */
    protected function homeRoutes()
    {
        $prefix = config('starter.routes.home.prefix');
        $namePrefix = config('starter.routes.home.name_prefix');
        $middleware = config('starter.routes.home.middleware');
        $this->router->prefix($prefix)->name($namePrefix)->middleware($middleware)->group(function () {
            $this->router
                ->get('/', '\AwemaPL\Starter\Sections\Homes\Http\Controllers\HomeController@index')
                ->name('index');
        });
    }

    /**
     * Can installation
     *
     * @return bool
     */
    public function canInstallation()
    {
        $canForPermission = $this->canInstallForPermission();
        return $this->isActiveRoutes()
            && $this->isActiveInstallationRoutes()
            && $canForPermission
            && !$this->isMigrated();
    }

    /**
     * Is migrated
     *
     * @return bool
     */
    public function isMigrated()
    {
        $tablesInDb = \DB::connection()->getDoctrineSchemaManager()->listTableNames();

        $tables = array_values(config('starter.database.tables'));
        foreach ($tables as $table){
            if (!in_array($table, $tablesInDb)){
                return false;
            }
        }
        return true;
    }

    /**
     * Is active routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function isActiveRoutes()
    {
        return config('starter.routes.active');
    }

    /**
     * Is active starter routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function isActiveCreatorRoutes()
    {
        return config('starter.routes.creator.active');
    }

    /**
     * Is active installation routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private function isActiveInstallationRoutes()
    {
        return config('starter.routes.installation.active');
    }

    /**
     * Is active example routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private function isActiveExampleRoutes()
    {
        return config('starter.routes.example.active');
    }

    /**
     * Is active welcome routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private function isActiveWelcomeRoutes()
    {
        return config('starter.routes.welcome.active');
    }

    /**
     * Is active home routes
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private function isActiveHomeRoutes()
    {
        return config('starter.routes.home.active');
    }
    
    /**
     * Include lang JS
     */
    public function includeLangJs()
    {
        $lang = config('indigo-layout.frontend.lang', []);
        $lang = array_merge_recursive($lang, app(\Illuminate\Contracts\Translation\Translator::class)->get('starter::js')?:[]);
        app('config')->set('indigo-layout.frontend.lang', $lang);
    }

    /**
     * Can install for permission
     *
     * @return bool
     */
    private function canInstallForPermission()
    {
        $userClass = config('auth.providers.users.model');
        if (!method_exists($userClass, 'hasRole')) {
            return true;
        }

        if ($user = request()->user() ?? null){
            return $user->can(config('starter.installation.auto_redirect.permission'));
        }

        return false;
    }

    /**
     * Menu merge in navigation
     */
    public function menuMerge()
    {
        if ($this->canMergeMenu()){
            $starterMenu = config('starter-menu.navs', []);
            $navTemp = config('temp_navigation.navs', []);
            $nav = array_merge_recursive($navTemp, $starterMenu);
            config(['temp_navigation.navs' => $nav]);
        }
    }

    /**
     * Can merge menu
     *
     * @return boolean
     */
    private function canMergeMenu()
    {
        return !!config('starter-menu.merge_to_navigation') && self::isMigrated();
    }

    /**
     * Execute package migrations
     */
    public function migrate()
    {
         Artisan::call('migrate', ['--force' => true, '--path'=>'vendor/awema-pl/module-starter/database/migrations']);
    }

    /**
     * Install package
     */
    public function install()
    {
        $this->migrate();
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }

    /**
     * Add permissions for module permission
     */
    public function mergePermissions()
    {
       if ($this->canMergePermissions()){
           $starterPermissions = config('starter.permissions');
           $tempPermissions = config('temp_permission.permissions', []);
           $permissions = array_merge_recursive($tempPermissions, $starterPermissions);
           config(['temp_permission.permissions' => $permissions]);
       }
    }

    /**
     * Can merge permissions
     *
     * @return boolean
     */
    private function canMergePermissions()
    {
        return !!config('starter.merge_permissions');
    }
}
