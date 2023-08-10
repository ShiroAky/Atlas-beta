<?php 

    namespace App\Core;

    use Exception;
    use App\Core\Libs\DotEnvProcessor as DotEnv;
    use App\Core\Libs\Application_Config as Config;

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

            /**
             * Executions
             */
            $loadfiles = $this->load_all_files_from(path: __DIR__ . '/../../app/core/helpers/');
            $dotenv->loadEnvFile(filePath: __DIR__ . '/../../.env');

        }

        private function load_all_files_from($path)
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