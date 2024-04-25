<?php
   $this->view('partitions.header');

   // echo '<pre>';
   // print_r($home[1]['pimg']);
    $this->view('frontend.phim.index',['home'=>$home,'phimchuachieu'=> $phimchuachieu]);

   $this->view('partitions.footer');
?>