<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database;

class Database 
{
    static protected $connection;

    public static function load(array $config = [])
    {
        // No DB specified? Beat them senseless...
        if (empty($config['db_driver']))
        {
            throw new \InvalidArgumentException('You have not selected a database driver to connect to.');
        }

        $className = strpos($config['db_driver'], '\\') === false
            ? 'Antipsen\Database\\' . $config['db_driver'] . '\\Connection'
            : $config['db_driver'] . '\\Connection';

        $class = new $className($config);

        // Store the connection
        self::$connection = $class;

        return self::$connection;
    }
}
