<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database\Contracts;

interface ConnectionInterface
{
    public function connect();

    public function reconnect();

    public function setDatabase(string $dbName);

    public function getDatabase(): string;

    public function getError(): array;

    public function table($tableName);
}