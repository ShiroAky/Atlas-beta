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

        public static function index(string $id)
        {
            return view('welcome', [ 'id' => $id ]);
            // print_r(Request::get_request_body());

            // $texto = "Hola {{ nombre }}, tu edad es {{ edad }}.";

            // // Array de variables
            // $variables = [
            //     'nombre' => 'Juan',
            //     'edad' => 25
            // ];

            // $resultado = preg_replace_callback('/{{\s*(\w+)\s*}}/', function($matches) use ($variables) {
            //     $variable = $matches[1];
            //     return isset($variables[$variable]) ? $variables[$variable] : $matches[0];
            // }, $texto);

            // echo $resultado;

        }

        public static function show()
        {
            
        }

    }