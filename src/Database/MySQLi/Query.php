<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database\MySQLi;

use Antipsen\Database\Contracts\ConnectionInterface;
use Antipsen\Database\Contracts\QueryInterface;
use Antipsen\Exceptions\DatabaseException;

class Query implements QueryInterface
{
    public function __construct($tableName, ConnectionInterface &$db)
    {
        
    }
}
