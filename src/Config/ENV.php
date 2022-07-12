<?php
namespace App\Config;

use Exception;

class ENV {
    public static function get(string $key, $defaultValue = null){
        $pathToEnvFile = __DIR__ . '/../../.env';
        if(file_exists($pathToEnvFile)){
            $fileEnv = parse_ini_file($pathToEnvFile);
            if(isset($fileEnv[$key])){
                return $fileEnv[$key];
            }    
        }
    
        $value = getenv($key);
        if($value){
            return $value;
        }
        
        return $defaultValue;
    }
}
