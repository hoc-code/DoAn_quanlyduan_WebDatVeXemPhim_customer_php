<?php

class HomeController extends BaseController
{   private $homemodel;
    private $lichchieumodel;
    public function __construct(){
        $this ->loadModel('HomeModel');
        
        $this->homemodel= new HomeModel;
        $this ->loadModel('LichchieuModel');
        $this->lichchieumodel= new LichchieuModel;
    }
    public function index(){
        $home=$this->homemodel->finddangchieu(['*']);
        $phimchuachieu= $this->homemodel->findchuachieu(['*']);
       
        $this->view('frontend.homes.index',['home' => $home ,'phimchuachieu'=> $phimchuachieu]);
    }
    public function show(){
       $id=$_GET['id'];
       $thongtin=$this->homemodel->findById($id);
       $lichchieu=$this->lichchieumodel->findbyid1($id);
       $this->view('frontend.phim.show',['thongtin' => $thongtin , 'lichchieu'=>$lichchieu]);

    }
    public function create(){
}
    public function store(){
        $data=[
            'pname'=> 'hoi sinh'

        ];
        $this->homemodel->store($data);
    }
    public function edit(){

    }

    public function update(){

    }
}
