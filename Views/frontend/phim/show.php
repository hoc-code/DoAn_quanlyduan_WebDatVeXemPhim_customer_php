<?php
   $this->view('partitions.header');

   // echo '<pre>';
   // print_r($lichchieu);
   $this->view('frontend.phim._detail',['thongtin'=>$thongtin ,'lichchieu'=>$lichchieu]);

   $this->view('partitions.footer');
?>