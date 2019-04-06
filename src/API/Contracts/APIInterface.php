<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\API\Contracts;

interface APIInterface
{
    /**
     * @return static
     */
    public static function response($data, int $httpCode, bool $continue);
}