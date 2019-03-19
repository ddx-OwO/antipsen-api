<?php

namespace Antipsen;

class Application
{

    public $appConfig;

    public function __construct($baseDir = '') 
    {
        $this->appConfig = require $baseDir."/config/app.php";
        require $baseDir."/src/helpers.php";

        date_default_timezone_set($this->appConfig['timezone']);

        $cors = $this->appConfig['enable_cors'] ? 
                    header('Access-Control-Allow-Origin: '.$this->appConfig['cors_domain']):'';

        header('Content-Type: application/json; charset='.strtolower($this->appConfig['charset']));
        header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, HEAD');
    }

    public function version() 
    {
        return 'Antipsen version 0.0.1';
    }

    public function run()
    {
        
    }
}