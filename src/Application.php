<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen;

require __DIR__.'/helpers.php';

use Antipsen\Database\Database;

class Application
{
    const ANTIPSEN_VERSION = '0.1.0';

    public $db;

    public $basePath;

    protected $appConfig;

    protected $dbConfig;

    public function __construct($basePath = '') 
    {
        $this->appConfig = require $basePath."/config/app.php";
        $this->dbConfig = require $basePath.'/config/database.php';
        $this->basePath = $basePath;

        date_default_timezone_set($this->appConfig['timezone']);
    }

    public function version() 
    {
        return self::ANTIPSEN_VERSION;
    }

    public function run()
    {
        ($this->appConfig['enable_cors'] !== FALSE)
            ? header('Access-Control-Allow-Origin: '.$this->appConfig['cors_domain']):'';

        header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type');
        header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, PATCH, OPTIONS, HEAD');
        header('Content-Type: application/json; charset='.strtolower($this->appConfig['charset']));
        header('X-XSS-Protection: 1; mode=block'); // XSS Header Protection

        // Hide all errors in production environment
        $this->appConfig['APP_ENV'] !== 'production' ? error_reporting(-1) : error_reporting(0);

        // Initialize Database Configuration
        $this->db = Database::load($this->dbConfig);

        if (isset($_SERVER['REQUEST_METHOD']) && in_array($_SERVER['REQUEST_METHOD'], ['OPTIONS', 'HEAD'])) {
            http_response_code(200);
            exit;
        }
    }
}