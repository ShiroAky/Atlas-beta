<?php

    namespace App\Core\Libs;

    class Response
    {

        /**
         * Sets the http state of the server as needed
         *
         * @param integer $code
         * @return void
         */
        public static function set_status_code(int $code)
        {
            http_response_code($code);
        }

    }