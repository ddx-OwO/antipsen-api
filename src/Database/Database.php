<?php

/**
 * @author Dewa Andhika Putra <dewaandhika18@gmail.com>
 * @license MIT
 * @version 0.0.1
*/

namespace Antipsen\Database;

class Database 
{
    protected $connection;

    private $config;

    private $pdo;

    /**
     * Constructor.
     */
    public function __construct() 
    {
        $this->config = require_once BASEPATH."/config/database.php";
    }

    public function load()
    {
        // No DB specified? Beat them senseless...
        if (empty($this->config['db_driver']))
        {
            throw new \InvalidArgumentException('You have not selected a database driver to connect to.');
        }

        $className = strpos($this->config['db_driver'], '\\') === false
            ? 'Antipsen\Database\\' . $this->config['db_driver'] . '\\Connection'
            : $this->config['db_driver'] . '\\Connection';

        $class = new $className($this->config);

        // Store the connection
        $this->connection = $class;

        return $this->connection;
    }
}
