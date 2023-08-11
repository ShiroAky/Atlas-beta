<?php

    namespace App\Core\Interfaces;

    /**
     * Application class
     * @package Controller
     */
    interface Controller
    {

        /**
         * The controller's index method is the main method that commonly works with the view.
         * @return void
         */
        public static function index(): void;

        /**
         * The show method of the controller is the method in charge of working commonly with the database mainly for APIs.
         * @return void
         */
        public static function show(): void;

    }