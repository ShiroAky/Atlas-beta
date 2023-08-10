<?php

    namespace App\Core\Libs;

    /**
     * Necessary packages
     */
    use Exception;

    /**
     * Render class
     * @package Render
     */
    class Render
    {

        /**
         * Views path
         * @var string
         */
        private string $viewPath = __DIR__ . '/../../../views/';

        /**
         * Modules path
         *
         * @var string
         */
        private string $modulePath = __DIR__ . '/../../../views/modules/';

        /**
         * Methods
         */

        public function view(string $view, array | object $data = []): string
        {
            $path = $this->viewPath . $view . '.php';

            if (!file_exists($path)) {
                throw new Exception("View file does not exist: $view");
            }

            ob_start();
            extract($data);
            require_once $path;
            return ob_get_clean();

        }

        public function module(string $module, array | object $data = []): string
        {
            $path = $this->modulePath . $module . '.php';

            if (!file_exists($path)) {
                throw new Exception("View file does not exist: $module");
            }

            ob_start();
            extract($data);
            require_once $path;
            return ob_get_clean();
        }

        public function json(string | array | object $data)
        {
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }

    }