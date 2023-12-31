<?php

    namespace App\Core\Libs;

    /**
     * Necessary packages
     */
    use App\Core\Libs\Request;
    use App\Core\Libs\Response;

    /**
     * Router class
     * @package Router
     */
    class Router
    {
        
        /**
         * @return array $routes Stores all the routes of the application.
         */
        private static array $routes = [];

        public static function get(string $path, $callback)
        {
            $method = Request::HttpMethod();
            if ($method !== 'GET') return;
            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);
            self::$routes[$path] = $callback;
        }

        public static function post(string $path, $callback)
        {
            $method = Request::HttpMethod();
            if ($method !== 'POST') return;
            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);
            self::$routes[$path] = $callback;
        }

        public static function resolve()
        {
            $method = Request::HttpMethod();
            $path = Request::getPath();
            $uri = Request::URI();

            $callback = '';
            $action = trim($uri, '/');
            $params = [];

            foreach (self::$routes as $route => $handler) {
                if (preg_match("%^{$route}$%", $action, $matches) === 1) {
                    $callback = $handler;
                    unset($matches[0]);
                    $params = $matches;
                    break;
                }
            }

            if (!is_callable($callback) || !$callback) {
                return render_error(404);
                Response::set_status_code(404);
                exit;
            }

            call_user_func($callback, ...$params);

        }

    }