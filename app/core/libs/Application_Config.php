<?php

    namespace App\Core\Libs;

    /**
     * Application_Config class
     * @package Application_Config
     */
    class Application_Config
    {

        /**
         * Validates if the cors are active or not
         *
         * @var boolean
         */
        private static bool $cors;

        /**
         * Validates if the errors are active or not
         *
         * @var boolean
         */
        private static bool $errors;

        /**
         * Automatically load some parameters of the application
         */
        public function __construct()
        {
            header_remove('X-Powered-By');
        }

        /**
         * set if cors are active or not
         *
         * @param boolean $option
         * @return void
         */
        public static function use_cors(bool $option)
        {
            self::$cors = $option;
            if (self::$cors !== true) return;
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:  POST, PUT, GET, DELETE');
            header("Access-Control-Allow-Headers: Content-Type, Authorization");
            return self::$cors;
        }

        /**
         * set if errors are active or not
         *
         * @param boolean $option
         * @return void
         */
        public static function hide_mistakes(bool $option)
        {
            self::$errors = $option;
            if (self::$errors !== true) return;
            error_reporting(0);
            return self::$errors;
        }

    }