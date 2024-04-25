<?php
class LoginModel extends BaseModel{
    const TABLE = 'user';
    public function getAll($select=['*'],$username,$password){
        return $this->all(self::TABLE,$select,$username,$password);
    }

}
?>