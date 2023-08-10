<?php

    namespace App\Core\Libs;

    /**
     * Request class
     * @package Request
     */
    class Request
    {

        /**
         * gets the current path from the URI
         *
         * @return void
         */
        public static function getPath()
        {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $position = strpos($path, '?');
            if ($position === false) return $path;
            return substr($path, 0, $position);
        }

        /**
         * gets the data sent from the client in the request body
         *
         * @return array
         */
        public static function get_request_body(): array
        {
            return json_decode(file_get_contents('php://input'), true);
        }

        /**
         * get the http method of the request
         *
         * @return void
         */
        public static function HttpMethod()
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        /**
         * get full URI of current url
         *
         * @return void
         */
        public static function URI()
        {
            return $_SERVER['REQUEST_URI'];
        }

    }