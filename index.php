<?php
require __DIR__ . '/Router.php';
require __DIR__ . '/Response.php';


$app = new Router();

$app->post('/crawler',"crawler:parseData");
