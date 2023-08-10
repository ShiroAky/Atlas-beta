<?php

    namespace App\Core\Libs;

    use Exception;

    class DotEnvProcessor 
    {

        /**
         * Loads the .env file and stores the information in the $_ENV super global variable.
         *
         * @param string $filePath The path to the .env file.
         * @return bool True if the .env file was loaded successfully, false otherwise.
         */
        public static function loadEnvFile($filePath) 
        {
            try {
                // Check if the file exists
                if (!file_exists($filePath)) {
                    throw new Exception("The .env file does not exist.");
                }
                
                // Read the file contents
                $contents = file_get_contents($filePath);
                
                // Split the contents into lines
                $lines = explode("\n", $contents);
                
                // Process each line
                foreach ($lines as $line) {
                    // Ignore empty lines and comments
                    if (empty($line) || strpos($line, '#') === 0) {
                        continue;
                    }
                    
                    // Split the line into key-value pairs
                    $parts = explode('=', $line, 2);
                    
                    // Ignore lines without a valid key-value pair
                    if (count($parts) !== 2) {
                        continue;
                    }
                    
                    // Trim whitespace from the key and value
                    $key = trim($parts[0]);
                    $value = trim(str_replace('"', '', $parts[1]));
                    
                    // Store the key-value pair in the $_ENV super global variable
                    $_ENV[$key] = $value;
                }
                
                return true;
            } catch (Exception $e) {
                // Log the error
                error_log("Error loading .env file: " . $e->getMessage());
                return false;
            }
        }

    }