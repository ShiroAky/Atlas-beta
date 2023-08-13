<?php

    namespace App\Http\Controllers;

    /**
     * Necessary packages
     */
    use App\Http\Controllers\BaseController;
    use App\Core\Libs\Request;

    /**
     * ApiController class
     * @package ApiController
     */
    class ApiController 
    {

        public static function index(string $user, int $id)
        {
            
        }

        public static function show(string $user, int $id)
        {
            return render_json([ 'user' => $user, 'id' => $id ]);
        }

    }