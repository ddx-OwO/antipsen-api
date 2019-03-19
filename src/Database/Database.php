<?php

/**
 * @author Dewa Andhika Putra <dewaandhika18@gmail.com>
 * @license MIT
 * @version 0.0.1
*/

namespace Antipsen\Database;

use PDO;

final class Database 
{

    private $pdo;

    private $config;

    private $responses;

    /**
     * Constructor.
     */
    public function __construct() 
    {
        $this->config = require_once BASEPATH."/config/database.php";
        $dsn = "mysql:host={$this->config['server_host']};dbname={$this->config['dbName']}";
        $username = $this->config['username'];
        $password = $this->config['password'];
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
