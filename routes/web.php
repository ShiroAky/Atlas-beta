<?php

    /**
     * Necessary packages
     */
    use App\Core\Libs\Router;

    /**
     * Necessary controllers
     */
    use App\Http\Controllers\HomeController;

    /**
     * Application routes
     */
    Router::get(path: '/', callback: [ HomeController::class, 'index' ]);