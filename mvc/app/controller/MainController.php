<?php
namespace App\Controller;
use App\Model\MainModel;
class MainController extends MainModel{
    public $obj;
    public function __construct(){
        $this->obj=new MainModel;

    }
    public function show(){
      $output=$this->obj->all();
    //   $result=mysqli_fetch_assoc($output);
      return $output;
    }

}


?>