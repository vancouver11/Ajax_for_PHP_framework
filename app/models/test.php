<?php

class test  extends model{

    public function getAll(){
        return self::$db->select('*')->from('students')->where("id=2")->execute();
    }
}