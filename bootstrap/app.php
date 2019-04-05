<?php

/**
 * @package Antipsen
 * @author Cyber Six
 * @copyright Copyright (c) 2019, Cyber Six, IT Club SMAN 6 Depok
 * @license https://opensource.org/licenses/Apache-2.0 Apache License 2.0
 * @version 0.1.0
*/

require __DIR__."/../vendor/autoload.php";

$app = new Antipsen\Application(
    realpath(__DIR__.'/../')
);

$app->run();
