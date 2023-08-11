<?php

    namespace App\Http\Controllers;

    /**
     * Necessary packages
     */
    use App\Http\Controllers\BaseController;
    

    /**
     * HomeController class
     * @package HomeController
     */
    class HomeController extends BaseController
    {

        public static function index()
        {
            return view('welcome');
        }

        public static function show()
        {
            
        }

    }