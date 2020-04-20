<?php

class controllerUsers extends controller{

    public function actionRegistration(){
        $error = "";
        if(core::app()->input->form === 1){
            try {
                core::app()->user->registration(core::app()->input->post);
            } catch (Exception $e) {
               $error = $e->getMessage();
            }
        }
        $content = $this->renderTemplate('registration',['error'=>$error]);
        echo $this->renderLayout(['content' => $content]);
    }


    public function actionTest(){
        $content = $this->renderTemplate('test',['mail'=>"read@mail.ru"]);
        $content .= $this->renderTemplate('registration',['error'=>""]);
        echo $this->renderLayout(['content' => $content]);
    }


}