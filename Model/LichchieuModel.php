<?php

class LichchieuModel extends BaseModel{
    const TABLE ='lichchieu';
    
    public function findbyid1($id)
    {
       
        return $this->find1(self::TABLE,$id);
    }
}

