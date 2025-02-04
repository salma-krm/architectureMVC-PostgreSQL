<?php
namespace app\Controllers;
class ErrourController{
    public function index()
    {
        $this->error();
    }

    public function error()
    {
       echo 'Not Found';

    }

}