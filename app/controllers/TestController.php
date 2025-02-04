<?php 
namespace app\controllers;
use app\views\Test;
class TestController{
    public function index(){
    include_once '..\app\views\Test.php';

    }
    public function edit($id,$name){
       echo  $id;
       echo $name;
    }
}
?>