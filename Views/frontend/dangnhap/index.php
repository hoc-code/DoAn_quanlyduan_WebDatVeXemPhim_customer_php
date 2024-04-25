<?php
   $this->view('partitions.header');
   // echo '<pre>';
   // print_r($lichchieu);
   
   $this->view('frontend.dangnhap.login',["result"=>$result]);
   $this->view('partitions.footer');
?>