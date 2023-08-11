<?php 

    namespace App\Core;

    /**
     * Necessary packages
     */
    use Exception;
    use App\Core\Libs\DotEnvProcessor as DotEnv;
    use App\Core\Libs\Application_Config as Config;
    use App\Core\Libs\Router;

    /**
     * Application class
     * @package Application
     */
    class Application
    {

        /**
         * Start the application process
         *
         * @param string $application
         * @return void
         */
        public function start(string $application)
        {

            /**
             * Instances
             */
            $dotenv = new DotEnv();
            $config = new Config();

            /**
             * Cofigurations
             */
            $config->use_cors(option: true);
            $config->hide_mistakes(option: true);
            $dotenv->loadEnvFile(filePath: __DIR__ . '/../../.env');

            /**
             * Load necesary files
             */
            $loadRoutesFiles = $this->load_all_files_from(path: __DIR__ . '/../../routes/');
            $loadHelpersFiles = $this->load_all_files_from(path: __DIR__ . '/../../app/core/helpers/');
            $loadInterfacesFiles = $this->load_all_files_from(path: __DIR__ . '/../../app/core/Interfaces/');

            /**
             * Executions
             */
            Router::resolve();

        }

        /**
         * Load all files from the specified directory
         *
         * @param string $path
         * @return void
         */
        private function load_all_files_from(string $path)
        {
            try {

                if (!is_dir($path)) {
                    throw new Exception("Error Processing Request", 1);
                }

                $files = scandir($path);
                $files = array_diff($files, array('.', '..', 'Autoload.php'));

                foreach ($files as $file) {
                    $filepath = $path . $file;
                    if (is_file($filepath) && pathinfo($filepath, PATHINFO_EXTENSION) === 'php') {
                        require_once $filepath;
                    }
                }

                return $files;

            } catch (\Exception $e) {
                error_log('Error: ' . $e->getMessage());
                return [];
            }
        }

    }