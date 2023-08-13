<?php

    /**
     * Necessary packages
     */
    use App\Core\Libs\Router;

    /**
     * Necessary controllers
     */
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ApiController;

    /**
     * Application routes
     */
    Router::get(path: '/get/{user}/{id}', callback: [ ApiController::class, 'show' ]);