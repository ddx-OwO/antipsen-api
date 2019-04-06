<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\API\Contracts;

interface APIFormatInterface 
{
    /**
     * Construct APIFormat class
     * 
     * @param mixed $data
     *
     * @return APIFormat
     */
    public static function factory($data);

    /**
     * Encode data as json
     *
     * @param mixed $data
     *
     * @return string
     */
    public function toJSON($data);

    public function toArray($data);
}