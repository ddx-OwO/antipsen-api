<?php

namespace Antipsen\Database\PDO;

use PDO;
use PDOStatement;
use Antipsen\Database\Contracts\ConnectionInterface;

class Connection implements ConnectionInterface
{
    private $config;

    private $pdo;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function connect()
    {
        $dsn = 'mysql:host='.$this->config['server_host'].
        ';dbname='.$this->config['dbName'];
        $username = $this->config['username'];
        $password = $this->config['password'];

        try {
            $this->$pdo = new PDO($dsn, $username, $password);
            $this->$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->pdo;
    }

    public function reconnect()
    {
        $this->pdo = null;
        $this->connect();
    }

    public function setDatabase(string $dbName)
    {
        $this->config['db_name'] = $dbName;

        return self;
    }

    public function getDatabase()
    {
        $this->pdo->query()
    }

    public function __destruct()
    {
        $this->pdo = null;
        unset($this->pdo);
    }
}