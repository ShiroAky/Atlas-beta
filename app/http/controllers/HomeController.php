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
    class HomeController 
    {

        public static function index(string $user, int $id)
        {
            return view('welcome', [ 'user' => $user, 'id' => $id ]);
        }

        public static function show()
        {
            
        }

    }