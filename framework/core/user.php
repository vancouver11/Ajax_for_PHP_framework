<?php

class user{

    protected $db = false;
    public function __construct()
    {
        $this->db = new queryBuilder;
    }

    public function registration($user=[]){
        if(empty($user['email'])){
            throw new Exception ('Пустой email',4 );
        }
        if(empty($user['password'])){
            throw new Exception ('Пустой пароль',4 );
        }
        if(empty($user['repassword'])){
            throw new Exception ('Пустое поле с подтверждением',4 );
        }
    }
}