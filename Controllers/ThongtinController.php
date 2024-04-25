<?php
class ThongtinController extends BaseController{
    private $homemodel;
    public function __construct(){
        $this ->loadModel('HomeModel');
        $this->homemodel= new HomeModel;
    }
    public function index(){
    $home=$this->homemodel->getAll(['pid','pname'],['column'=>'pid','order' => 'asc']);
       return $this->view('frontend.thongtins.index',['home'=>$home]);
    }
    public function show(){
        echo __METHOD__;
    }
}
?>