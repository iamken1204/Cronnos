<?php
namespace controllers;

use cronnos\printers\Printer;

class TestController
{
    public function index()
    {
        echo "index function is here";
    }

    public function post()
    {
        echo "post function is here";
    }

    public function show()
    {
        $p = new Printer;
        $p->view('view_index.php');
    }

    public function echoFunc($id)
    {
        echo "$id<BR>";
    }

    public function getForm()
    {
        $p = new Printer;
        $p->view('view_form_test.php');
    }

    public function postForm($name)
    {
        var_dump($_POST);
        var_dump($name);
    }
}
