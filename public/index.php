<?php

require __DIR__ . '/../bootstrap/app.php';

echo json_encode(
    prepare_response([
        'version' => $app->version()
    ])
, JSON_PRETTY_PRINT);

