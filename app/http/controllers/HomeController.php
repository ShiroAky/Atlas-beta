<?php

    namespace App\Http\Controllers;

    /**
     * Necessary packages
     */
    use App\Http\Controllers\BaseController;
    use App\Core\Libs\Request;

    /**
     * HomeController class
     * @package HomeController
     */
    class HomeController extends BaseController
    {

        public static function index()
        {
            // return view('welcome');
            print_r(Request::get_request_body());
        }

        public static function show()
        {
            
        }

    }