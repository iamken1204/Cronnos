<?php
include "autoload_app.php";

use cronnos\printers\Printer;
use cronnos\helpers\Arr;
use cronnos\helpers\VarDumper;
use Pux\Mux;
use Pux\Executor;

echo "start<BR>";
$mux = new Mux;
$mux->get('/index.php', ['controllers\TestController', 'index']);
$mux->get('/index.php/post', ['controllers\TestController', 'post']);
$route = $mux->dispatch($_SERVER['REQUEST_URI']);
Executor::execute($route);
echo "<BR>done!";
exit;


// $form = new Form();
// // $res = $form->testCRUD();

// $p = new Printer();
// $p->view('partial/header.php');

// echo 'SV is coming!<BR>';
// $s = new SiteView();
// $s->validateViews();
// var_dump(SiteView::getViews());
$p = new Printer;
$p->view('view_index.php');

###########################################
##### route example #######################
###########################################
// $route = Arr::get($_POST, 'route', '');#
// if (function_exists($route))           #
//     $route();                          #
// else {                                 #
//     $p = new Printer();                #
//     $p->view('view_index.php');        #
// }                                      #
// function handleForm()                  #
// {                                      #
//     $form = new Form;                  #
//     $res = $form->insert($_POST);      #
//     echo json_encode($res);            #
// }                                      #
###########################################
##### route example #######################
###########################################
// test
?>
