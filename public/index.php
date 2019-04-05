<?php

require __DIR__ . '/../bootstrap/app.php';

use Antipsen\API\API;

API::response([
    'version' => $app->version()
], API::HTTP_OK);
