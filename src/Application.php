<?php

namespace Antipsen;

require __DIR__.'/helpers.php';

use Antipsen\Database\Database;

class Application
{
    const ANTIPSEN_VERSION = '0.1.0';

    protected $appConfig;

    protected $basePath;

    public function __construct($basePath = '') 
    {
        $this->appConfig = require $basePath."/config/app.php";
        $this->basePath = $basePath;

        date_default_timezone_set($this->appConfig['timezone']);
    }

    public function version() 
    {
        return self::ANTIPSEN_VERSION;
    }

    public function run()
    {
        $cors = $this->appConfig['enable_cors'] 
        ? header('Access-Control-Allow-Origin: '.$this->appConfig['cors_domain']):'';

        header('Content-Type: application/json; charset='.strtolower($this->appConfig['charset']));
        header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, HEAD');

        // Hide all errors in production environment
        $this->appConfig['APP_ENV'] !== 'production' ? error_reporting(-1) : error_reporting(0);
    }
}