<?php
class LoginController extends BaseController{
    private $loginModel;
    public function __construct(){
        $this->loadModel('LoginModel');
        $this->loginModel= new LoginModel();
    }
    public function index(){
        $this->view('frontend.dangnhap.index');
    }
    public function login(){
        $result_mess=['mess'=>'false'];
       
        if(isset($_POST["submit1"]))
        {
        $username=$_POST['Username2'];
        $passwordinput=$_POST['Password2'];
        if(empty($_POST['Username2'])||empty($_POST['Password2']))
        {
            
            $this->view('frontend.dangnhap.index',["result"=>$result_mess]);
        }
        $result=$this->loginModel->getAll(['username','password'],$username,$passwordinput);
        if(count($result)>0)
        {
            foreach($result as $result)
            {
                $id=$result["ID"];
                $username=$result["username"];
                $password=$result["password"];
                
            }
            if($passwordinput==$password){
                $_SESSION["id"]=$id;
                $this->view('frontend.dangnhap.index',["result"=>$result_mess=["mess"=>'true']]);
            }
            else{

                $this->view('frontend.dangnhap.index',["result"=>$result_mess]);
             }

        }

        }
        else{
            
            $this->view('frontend.dangnhap.index',["result"=>$result_mess]);
        }
       
    }

}
?>