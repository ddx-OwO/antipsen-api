<?php

require __DIR__."/../vendor/autoload.php";

$app = new Antipsen\Application(
    realpath(__DIR__.'/../')
);

$app->run();

/* if (isset($_SERVER['REQUEST_METHOD']) && in_array($_SERVER['REQUEST_METHOD'], ['OPTIONS', 'HEAD'])) {
    http_response_code(200);
    exit;
} */
