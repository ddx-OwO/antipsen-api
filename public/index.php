<?php

require __DIR__ . '/../bootstrap/app.php';

use Antipsen\API\API;

API::response([
    'version' => 'Antipsen v'.$app->version()
], 200);

