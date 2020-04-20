<?php

class model{

    protected static $db = false; 
  
    public function __construct(){
    
        if((self::$db  === false)){
            self::$db = new queryBuilder;
        }else{
            return self::$db;
        }
    }

}