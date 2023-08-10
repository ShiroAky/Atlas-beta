<?php

    /**
     * Autoloader:
     */
    require_once __DIR__ . '/app/core/helpers/Autoload.php';

    /**
     * New application instance:
     */
    $app = new App\Core\Application();

    /**
     * Start the application:
     */
    $app->start(application: 'Atlas Framework');

    echo $_ENV['APP_TECNOLOGY'];