<?php
class BaseModel extends Database{
    private $connect;
    public function __construct() {
        $this->connect= $this->connect();
    }
    public function  phimchieu($table,$select=['*']){
        $colum=implode(',',$select);
        $date=date('Y-m-d');

        $sql="select ${colum} from ${table} where pngay_bat_dau <= '${date}' and pngay_ket_thuc >= '${date}' ";
        $query =$this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return  $data;
    }
    public function  phimchuachieu($table,$select=['*']){
        $colum=implode(',',$select);
        $date=date('Y-m-d');
        
        $sql="select ${colum} from ${table} where pngay_bat_dau > '${date}' and pngay_ket_thuc > '${date}' ";
        $query =$this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return  $data;
    }
    public function all($table,$select=['*'],$name,$password){
        $colum=implode(',',$select);
    
        $sql ="select ${colum} from ${table} where username=${name} and password=${password} ";
        
        $query =$this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return  $data;
    }
    public function find($table,$id){
        $sql = "select * from ${table} where pid = ${id} limit 1";
        $query =$this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function find1($table,$id){
        $ngaychieu=date('Y-m-d');
        $sql = "select * from ${table} where pid = ${id} and ngaychieu = '${ngaychieu}' ";
        
        $query =$this->_query($sql);
        
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return  $data;
    }
    //them du lieu
    public function create($table,$data=[]){
        $colum =implode(',',array_keys($data));
        $newvalue=array_map(function($value){
            return "'${value}'";
        },array_values($data));
        $newvalue=implode(',',$newvalue);
        $sql="insert into ${table}(${colum}) values(${newvalue})";
        die($sql);
    }
    //update du lieu
    public function update(){

    }
    private function _query($sql){
        return mysqli_query($this->connect,$sql);
    }
}
?>