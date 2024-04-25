<?php

class Database
{
    public static function Connect()
        {
        $servername="localhost";
        $database="Web_dat_ve";
        $username="rootdb";
        $password="123456";
        $conn=mysqli_connect($servername,$username,$password,$database);
        if($conn->connect_error)
        {
            die("lỗi kết nối:". $conn->connect_error);
        }
        return $conn;
        }
}
?>