<?php
include "autoload_app.php";

use Pux\Mux;
use Pux\Executor;

$mux = new Mux;
$mux->get('/puxtest.php', ['controllers\TestController', 'index']);
$mux->get('/puxtest.php/post', ['controllers\TestController', 'post']);
$mux->get('/puxtest.php/show', ['controllers\TestController', 'show']);
$mux->get('/puxtest.php/echo/:id', ['controllers\TestController', 'echoFunc'], [
    'require' => ['id' => '\w+'],
    'default' => ['id' => 'none']
]);
$mux->get('/puxtest.php/form', ['controllers\TestController', 'getForm']);
$mux->post('/puxtest.php/form/:name', ['controllers\TestController', 'postForm'], [
    'default' => ['name' => 'defaultName']
]);
$route = $mux->dispatch($_SERVER['REQUEST_URI']);
Executor::execute($route);

?>
