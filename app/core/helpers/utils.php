<?php

    use App\Core\Libs\Render;

    /**
    * @param string $view view path
    * @param array|object $data content data
    */
    function render_view(string $view, array | object $data = []) 
    {
        $render = new Render();
        echo $render->view(view: $view, data: $data);
    }

    /**
    * @param string $module module path
    * @param array|object $data content data
    */
    function render_module(string $module, array | object $data = [])
    {
        $render = new Render();
        echo $render->module(module: $module, data: $data);
    }

    /**
    * @param string|array|object $data the data you want to convert to json
    */
    function render_json(string | array | object $data)
    {
        $render = new Render();
        echo $render->json(data: $data);
    }