<?php

namespace Antipsen\API;

use Antipsen\Contracts\API\APIFormatInterface;

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

        // We only honour a jsonp callback which are valid javascript identifiers
        elseif (preg_match('/^[a-z_\$][a-z0-9\$_]*(\.[a-z_\$][a-z0-9\$_]*)*$/i', $callback))
        {
            // Return the data as encoded json with a callback
            return $callback.'('.json_encode($data, $this->jsonParameter).');';
        }

        // An invalid jsonp callback function provided.
        // Though I don't believe this should be hardcoded here
        $data['warning'] = 'INVALID JSONP CALLBACK: '.$callback;

        return json_encode($data, $this->jsonParameter);
    }

    public function toArray($data = NULL)
    {

    }
}