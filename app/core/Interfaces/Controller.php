<?php

    namespace App\Core\Interfaces;

    /**
     * Controller interface
     * @package Controller
     */
    interface Controller
    {

        /**
         * The controller's index method is the main method that commonly works with the view.
         * @return mixed
         */
        public static function index();

        /**
         * The show method of the controller is the method in charge of working commonly with the database mainly for APIs.
         * @return mixed
         */
        public static function show();

    }