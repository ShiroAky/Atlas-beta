<?php

    use App\Core\Libs\Render;

    /**
    * The function in charge of rendering the assigned view
    * @param string $view view path
    * @param array|object $data content data
    */
    function view(string $view, array | object $data = []) 
    {
        $render = new Render();
        echo $render->view(view: $view, data: $data);
    }

    /**
    * The function in charge of rendering the assigned module/component 
    * @param string $module module path
    * @param array|object $data content data
    */
    function render_module(string $module, array | object $data = [])
    {
        $render = new Render();
        echo $render->module(module: $module, data: $data);
    }

    /**
    * The function in charge of rendering the assigned error page
    * @param int $error error path
    * @param array|object $data content data
    */
    function render_error(int $error, array | object $data = []) 
    {
        $render = new Render();
        echo $render->error(error: $error, data: $data);
    }

    /**
    * The function in charge of rendering the data/value that you assign to it in json format
    * @param string|array|object $data the data you want to convert to json
    */
    function render_json(string | array | object $data)
    {
        $render = new Render();
        echo $render->json(data: $data);
    }