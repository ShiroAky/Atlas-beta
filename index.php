<?php

    /**
     * Autoloader:
     */
    require_once __DIR__ . '/app/core/helpers/Autoload.php';

    /**
     * New application instance:
     */
    $app = new App\Core\Application();
    use App\Core\Libs\Router;

    /**
     * Start the application:
     */
    $app->start(application: 'Atlas Framework');

    // Router::resolve();