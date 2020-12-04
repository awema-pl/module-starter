<?php
return [
    // this resources has been auto load to layout
    'dist' => [
//        'js/main.js',
//        'js/main.legacy.js',
//        'css/main.css',
    ],
    'routes' => [
        // all routes is active
        'active' => true,
        // section installations
        'installation' => [
            'active' => false,
            'prefix' => '/installation/starter',
            'name_prefix' => 'starter.installation.',
            // this routes has beed except for installation module
            'expect' => [
                'module-assets.assets',
                'starter.installation.index',
                'starter.installation.store',
            ]
        ],
        'creator' => [
            'active' => false,
            'prefix' => '/starter/creator',
            'name_prefix' => 'starter.creator.',
            'middleware' => [
                'web',
                //'auth',
               // 'verified'
            ]
        ],
        'example' => [
            'active' => false,
            'prefix' => '/starter/example',
            'name_prefix' => 'starter.example.',
            'middleware' => [
                'web',
                'auth',
                'verified'
            ]
        ],
        'welcome' => [
            'active' => true,
            'prefix' => '/',
            'name_prefix' => 'starter.welcome.',
            'middleware' => [
                'web',
            ]
        ],
        'home' => [
            'active' => true,
            'prefix' => '/home',
            'name_prefix' => 'starter.home.',
            'middleware' => [
                'web',
                'auth',
                'verified'
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Use permissions in application.
    |--------------------------------------------------------------------------
    |
    | This permission has been insert to database with migrations
    | of module permission.
    |
    */
    'permissions' =>[
        'install_packages'
    ],

    /*
    |--------------------------------------------------------------------------
    | Can merge permissions to module permission
    |--------------------------------------------------------------------------
    */
    'merge_permissions' => true,

    'installation' => [
        'auto_redirect' => [
            // user with this permission has been automation redirect to
            // installation package
            'permission' => 'install_packages'
        ]
    ],

    'database' => [
        'tables' => [
            'users' =>'users',
            'starter_histories' =>'starter_histories',
        ]
    ],

    'socials' => [
        'facebook' =>'https://fb.me/nepraskg',
        'youtube' => 'https://www.youtube.com/channel/UCwGsv0grk_MDYjnklxi22lg',
    ]
];
