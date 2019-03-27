<?php

namespace Antipsen\Database\Contracts;

interface ConnectionInterface
{
    public function connect();

    public function reconnect();

    public function setDatabase(string $dbName);

    public function getDatabase(): string;

    public function getError(): string;
}