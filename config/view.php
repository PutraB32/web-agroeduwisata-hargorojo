<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most views live in resources/views. Keeping this explicit makes the view
    | cache behavior predictable, especially on Windows local development.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Blade compiles templates into PHP files here. On Windows, browser refreshes
    | can collide while compiling, so the app should use a pre-warmed cache.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views')) ?: storage_path('framework/views')
    ),

    'relative_hash' => false,

    'cache' => env('VIEW_CACHE', true),

    'compiled_extension' => 'php',

    /*
    |--------------------------------------------------------------------------
    | Compiled View Timestamp Checks
    |--------------------------------------------------------------------------
    |
    | Keep timestamp checks enabled by default so local Blade changes are picked
    | up automatically. For production/pre-warmed cache, this can be disabled
    | explicitly with VIEW_CHECK_CACHE_TIMESTAMPS=false.
    |
    */

    'check_cache_timestamps' => env('VIEW_CHECK_CACHE_TIMESTAMPS', true),

];
