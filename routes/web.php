<?php

    /**
     * Necessary packages
     */
    use App\Core\Libs\Router;

    /**
     * Necessary controllers
     */


    /**
     * Application routes
     */
    Router::get(path: '/', callback: function () {
        return view(view: 'welcome');
    });