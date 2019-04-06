<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database\MySQLi;

use Mysqli;
use Antipsen\Database\Contracts\ConnectionInterface;
use Antipsen\Exceptions\DatabaseException;

class Connection implements ConnectionInterface
{
    private $config;

    protected $connection;

    protected $hostname;

    protected $port = 3306;

    protected $username;

    protected $password;

    protected $database;

    protected $databaseCollat;

    protected $charset;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Connect to database based on configuration
     *
     * @throws \Antipsen\Exceptions\DatabaseException
     * @return Connection
    */
    public function connect()
    {
        $this->hostname = $this->config['hostname'];
        $this->port = isset($this->config['port']) ? $this->config['port'] : $this->port;
        $this->username = $this->config['username'];
        $this->password = $this->config['password'];
        $this->database = $this->config['db_name'];
        $this->databaseCollat = $this->config['db_collat'];
        $this->charset = $this->config['charset'];

        $this->connection = new mysqli(
            $this->hostname, 
            $this->username, 
            $this->password, 
            $this->database,
            $this->port
        );

        $this->setCharset($this->charset);

        if ($this->connection->connect_error) {
            throw new DatabaseException('Database Error: '.$this->connection->connect_error);
        }

        return $this;
    }

    /**
     * Returns an instance of the query builder for this connection.
     *
     * @param string $tableName
     *
     * @return BaseBuilder
     * @throws DatabaseException
     */
    public function table($tableName)
    {
        if (empty($tableName))
        {
            throw new DatabaseException('You must set the database table to be used with your query.');
        }

        $className = str_replace('Connection', 'Query', get_class($this));

        return new $className($tableName, $this);
    }

    /**
     * Mengubah tipe charset pada koneksi database
     *
     * @param string    $charset
     *
     * @return void
    */
    protected function setCharset(string $charset = 'utf8')
    {
        $this->connection->set_charset($charset);
        $this->charset = $charset;
    }

    /**
     * Mencoba mengkoneksi ulang ke database
     *
     * @throws \Antipsen\Exceptions\DatabaseException
     * @return MySQLi object
    */
    public function reconnect()
    {
        if (! $this->connection) {
            throw new DatabaseException('Database Error: You have not any connection to database');
        }

        $this->connection->close();
        $this->connection = NULL;

        return $this->connect();
    }

    /**
     * Connect to database based on configuration
     *
     * @param string $dbName
     *
     * @throws \Antipsen\Exceptions\DatabaseException
     * @return Connection
    */
    public function setDatabase(string $dbName)
    {
        if (! $this->connection->select_db($dbName)) {
            $errors = $this->getError();
            throw new DatabaseException('Database Error: ['.$error['code'].'] '.$errors['message']);
        }

        $this->database = $dbName;
        return $this;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function getError(): array
    {
        $errorMessage = $this->connection->error;
        $errorCode = $this->connection->errno;

        return [
            'code' => $errorCode,
            'message' => $errorMessage
        ];
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}