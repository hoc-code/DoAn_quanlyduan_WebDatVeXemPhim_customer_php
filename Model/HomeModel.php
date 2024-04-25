 
<?php
class HomeModel extends BaseModel{
    const TABLE ='phim';
    public function getAll($select= ['*'],$pstatus,$orderby =[]){
        return $this->all(self::TABLE,$select,$pstatus,$orderby);
    }
    public function  finddangchieu($select= ['*']){
        
        return $this->phimchieu(self::TABLE,$select);
    }
    public function  findchuachieu($select= ['*']){
        
        return $this->phimchuachieu(self::TABLE,$select);
    }
    public function findById($id){
        return $this->find(self::TABLE,$id);
    }
    public function store($data){
        return $this->create(self::TABLE,$data);
    }
}