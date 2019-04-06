<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database\PDO;

use PDO;
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
        $dsn = 'mysql:host='.$this->config['hostname'].
        ';port='.$this->config['port'].
        ';dbname='.$this->config['db_name'].
        ';charset='.$this->config['charset'];
        $username = $this->config['username'];
        $password = $this->config['password'];

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this;
    }

    public function fetch()
    {
        try {
            $pdo = $this->pdo;
            $stmt = $this->pdo
                 ->prepare('SELECT * FROM user');
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function reconnect()
    {
        $this->pdo = null;
        $this->connect();
    }

    public function setDatabase(string $dbName)
    {
        $this->config['db_name'] = $dbName;

        return $this;
    }

    public function getDatabase(): string
    {
        // $this->pdo->query();
    }

    public function getError(): array
    {

    }

    public function __destruct()
    {
        //$this->pdo = null;
        //unset($this->pdo);
    }
}