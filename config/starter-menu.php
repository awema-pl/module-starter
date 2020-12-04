<?php

return [
    'merge_to_navigation' => true,

    'navs' => [
        'sidebar' =>[
            [
                'name' => 'Home',
                'link' => '/home',
                'icon' => 'speed',
                'key' => 'starter::menus.home',
                'children_top' => [
                    [
                        'name' => 'Home',
                        'link' => '/home',
                        'key' => 'starter::menus.home',
                    ],
                ],
            ]
        ],
        'guestSidebar' =>[]
    ]
];
