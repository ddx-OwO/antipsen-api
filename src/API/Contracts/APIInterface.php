<?php

namespace Antipsen\Contracts\API;

interface APIInterface
{
    /**
     * @return static
     */
    public static function response($data, int $httpCode, bool $continue);
}