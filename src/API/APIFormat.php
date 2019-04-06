<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @since Version 0.1.0
*/

namespace Antipsen\API;

use Antipsen\API\Contracts\APIFormatInterface;

class APIFormat implements APIFormatInterface
{
    protected $data;

    protected $jsonParameter = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;

    public function __construct($data = NULL)
    {
        $this->data = $data;
    }

    public static function factory($data)
    {
        return new static($data);
    }

    public function toJSON($data = NULL) 
    {
        // If no data is passed as a parameter, then use the data passed
        // via the constructor
        if ($data === NULL && func_num_args() === 0)
        {
            $data = $this->data;
        }

        // Get the callback parameter (if set)
        $callback = isset($_GET['callback']) ? $_GET['callback'] : FALSE;

        if (empty($callback) === TRUE)
        {
            return json_encode($data, $this->jsonParameter);
        }

        // Validate jsonp callback which are valid javascript identifiers
        elseif (preg_match('/^[a-z_\$][a-z0-9\$_]*(\.[a-z_\$][a-z0-9\$_]*)*$/i', $callback))
        {
            // Return the data as encoded json with a callback
            return $callback.'('.json_encode($data, $this->jsonParameter).');';
        }

        // An invalid jsonp callback function provided.
        $data['warning'] = 'INVALID JSONP CALLBACK: '.$callback;

        return json_encode($data, $this->jsonParameter);
    }

    public function toArray($data = NULL)
    {

    }
}