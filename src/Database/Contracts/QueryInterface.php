<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\Database\Contracts;

use Antipsen\Exceptions\DatabaseException;

interface QueryInterface
{
    public function setQuery($query);

    public function resultRow();

    public function resultArray();

    public function resultObject();
}