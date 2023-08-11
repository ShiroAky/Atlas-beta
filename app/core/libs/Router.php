<?php

    namespace App\Core\Libs;

    /**
     * Necessary packages
     */
    use Closure;
    use App\Core\Libs\Request;
    use App\Core\Libs\Response;

    /**
     * Router class
     * @package Router
     */
    class Router
    {

        
        /**
         * Stores all application routes for later use
         *
         * @var array
         */
        private static array $routes = [];

        /**
         * Stores all application get routes for later use
         *
         * @param string $path
         * @param Closure $action
         * @return void
         */
        public static function get(string $path, Closure $action)
        {
            $method = Request::HttpMethod();
            if ($method !== 'GET') return;

            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);

            self::$routes[$path] = $action;
        }

        /**
         * Stores all application post routes for later use
         *
         * @param string $path
         * @param Closure $action
         * @return void
         */
        public static function post(string $path, Closure $action)
        {
            $method = Request::HttpMethod();
            if ($method !== 'POST') return;

            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);
            
            self::$routes[$path] = $action;
        }

        /**
         * resolves all route addresses assigned to the application
         *
         * @return void
         */
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
                Response::set_status_code(404);
                render_view('_404');
                exit;
            }

            call_user_func($callback, ...$params);

        }

    }