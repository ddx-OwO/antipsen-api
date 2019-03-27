<?php

namespace Antipsen\Contracts\API;

interface APIFormatInterface 
{
    public static function factory($data);
    /**
     * Encode data as json
     *
     * @return string
     */
    public function toJSON($data);

    public function toArray($data);
}