<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'CONSULTORIO-SONRIE',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' =>true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b>Consultorio-Sonrie</b>',
    //'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img' => 'vendor/adminlte/dist/img/Dienteicono.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Dienteicono',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'bg-gradient-dark' ,
    'classes_auth_header' => '' ,
    'classes_auth_body' => 'bg-gradient-dark' ,
    'classes_auth_footer' => 'text-center' ,
    'classes_auth_icon' => 'text-light' ,
    'classes_auth_btn' => 'btn-flat btn-light' ,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

   'classes_body' => '',
    'classes_brand' => 'bg-primary',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-primary navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'light',
    'right_sidebar_slide' => false,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',




    [
        'text' => 'profile',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-fw fa-user',
    ],
    [
        'text' => 'change_password',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-fw fa-lock',
    ],

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [

        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],

        [
            'text' => 'Inicio',
            'route'  => 'home',
            'icon'   => 'fas fa-fw fa-hospital',
        ],
        [
            'text'    => 'ADM Atencion',
            'icon'    => 'fas fa-wheelchair -x2 ',
            'icon_color'=>'primary',
            'submenu' => [
                [
                    'text' => 'Gestionar Servicios',
                    'icon'    => " fas fa-plus-square",
                    'url'  => 'servicio',
                    'icon_color'=>'info',
                    'can'=>'Ver lista de servicios'
                ],
                [
                    'text' => 'Gestionar Atencion',
                    'icon'    => " fas fa-plus-square",
                    'route'  => 'admin.atencions.index',
                    'icon_color'=>'info',
                    'can'=>'Ver lista de atenciones'
                ],
                [
                    'text' => 'Odontograma',
                    'icon'    => "fas fa-tooth",
                    'route'  => 'admin.odontogramas.index',
                    'icon_color'=>'info',
                ],
                [
                    'text' => 'Gestionar Producto',
                    'icon'    => "fas fa-tooth",
                    'url'  => 'producto',
                    'icon_color'=>'info',
                    'can'=>'Ver lista de productos'
                ],
                [
                    'text' => 'Registrar Tratamiento',
                    'icon'    => 'fas fa-notes-medical',
                    'icon_color'=>'info',
                    'url'  => 'tratamiento',
                    // 'can'=>'Ver lista de tratamientos'
                ],
                [
                    'text' => 'Realizar Receta',
                    'icon'    => 'fas fa-pills',
                    'icon_color'=>'primary',
                    'url'  => 'receta',
                ],
            ]

        ],

        [
            'text'    => 'ADM Reserva',
            'icon'    => 'fas fa-fw fa-calendar-alt',
            'icon_color'=>'primary',


            'submenu' => [

                [
                    'text' => 'Gestionar Paciente',
                    'icon'    => 'fas fa-fw fa-user',
                    'icon_color'=>'info',
                    'url'  => 'paciente',
                    'can'=>'Ver lista de pacientes'
                ],

                [
                    'text' => 'Gestionar Reserva',
                    'icon'    => 'fas fa-fw fa-calendar-check',
                    'url'=>'reserva',
                    'icon_color'=>'info',
                    'can'=>'Ver lista de reservas'
                ],

                [
                    'text' => 'Agenda',
                    'icon'    => 'fas fa-fw fa-calendar-week',
                    'url'  => 'agenda',
                    'icon_color'=>'info',
                ],



            ]

        ],

        [
            'text'    => 'ADM Personal',
            'icon'    => 'fas fa-fw fa-hospital-user',
            'icon_color'=>'primary',
            'submenu' => [
                [
                    'text' => 'Odontologo',
                    'icon'    => 'fas fa-fw fa-user-md',
                    'icon_color'=>'info',
                    'url'  => 'odontologo',
                    'can'=>'Ver lista de odontologos'
                ],
                [
                    'text' => 'Recepcionista',
                    'icon'    => 'fas fa-fw fa-user',
                    'icon_color'=>'info',
                    'url'  => 'recepcionista',
                    'can'=>'Ver lista de recepcionistas'
                ],

                [
                    'text'    => 'Usuarios',
                    'icon'    => 'fas fa-user-lock',
                    'icon_color'=>'primary',
                    'can' => 'Ver lista de usuarios',

                    'submenu' => [
                        [
                            'text' => 'Usuarios',
                            'icon'    => 'fas fa-user-circle',
                            'url'  => 'Users',
                            'icon_color'=>'info',
                            'can' => 'Ver lista de usuarios',

                        ],
                        [
                            'text' => 'Roles',
                            'icon'    => 'fas fa-users-cog',
                            'url'  => 'roles',
                            'icon_color'=>'info',
                        ],
                        [
                            'text' => 'Permisos',
                            'icon'    => 'fas fa-user-plus',
                            'url'  => 'permisos',
                            'icon_color'=>'info',
                        ],
                        [
                            'text' => 'Bitácora',
                            'icon'    => 'fas fa-user-plus',
                            'url'  => 'bitacora',
                            'icon_color'=>'info',
                        ],
                     ]
                ],

                ]
        ],
        /*


        [
            'text' => 'ADM Receta',
            'icon'    => 'fas fa-fw fa-user',
            'icon_color'=>'primary',
            'url'  => 'receta',
        ],
        */






        [
            'text'    => 'ADM Flujo C.',
            'icon'    => 'fas fa-fw fa-calendar-check',
            'icon_color'=>'primary',

            'submenu' => [
                [

                    'text' => 'Gestionar Pago',
                    'icon'    => 'fas fa-fw fa-user',
                    'icon_color'=>'info',
                    'url'  => 'pago',
                ],

                [
                    'text' => 'Gestionar Plan de Pago',
                    'icon'    => 'fas fa-fw fa-user',
                    'icon_color'=>'info',
                    'url'  => 'plan',
                ],
                [
                    'text' => 'Gestionar Factura',
                    'icon'    => 'fas fa-fw fa-user',
                    'icon_color'=>'info',
                    'url'  => 'factura',
                ],
            ]

        ],










       /* [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],*/
     /*   ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
