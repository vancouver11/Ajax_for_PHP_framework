<?php

use function PHPSTORM_META\type;

class controller
{
    protected $layoutFile = 'index';
    protected $templatesDir = false;
    protected $models = [];
    protected $is_ajax = false;
    protected $json =[];
    protected $templatesList = null;

    protected function getModel($modelName, $newModel = false)
    {
        include_once core::app()->models_dir . $modelName . '.php';
        if ($newModel) {
            return new $modelName;
        }

        if (!isset($this->models[$modelName])) {
            $this->models[$modelName] = new $modelName;
        }
        return $this->models[$modelName];
    }
    

    protected function renderLayout($data = [])
    {

            foreach ($data as $varName => $varValue) {
                $$varName = $varValue;
            }
            ob_start();
            include core::app()->layout_dir . $this->layoutFile . '.php';
            return ob_get_clean();
           
    }

    protected function renderTemplate($templateName, $data = [])
    {
       
       
            foreach ($data as $varName => $varValue) {
                $$varName = $varValue;
            }
            if ($this->templatesDir === false) {
                $this->templatesDir = core::app()->input->controller . DS;
            }
            
            ob_start();
            include core::app()->views_dir . $this->templatesDir . $templateName . '.php';
            $result = ob_get_clean();
            if($this->is_ajax && is_null($this->templatesList)){

                    $this->json[$templateName] = $result;

            } else if($this->is_ajax && !is_null($this->templatesList) ){

                foreach ($this->templatesList as $key => $value) {
                   if($templateName === $value){
                    $this->json[$templateName] = $result;
                   }
                }

            }
            
            else{
                return $result;
            }
            
    }
    
    public function beforeAction(){

       // print_r( core::app()->input->get);
        if(isset(core::app()->input->get['is_ajax'])){
            $this->is_ajax = true;
           if(isset(core::app()->input->get['templates'])  && is_array(core::app()->input->get['templates']) ){
                    $this->templatesList = core::app()->input->get['templates'];
                }  
        }
    
        
        
    }
    public function afterAction(){
        if($this->is_ajax){
          $all =  json_encode([
               $this->json
               
            ],JSON_HEX_TAG); 
            var_dump($all);
            return $all;
        }
       
    }
    
    public function response($outputData = '')
    {
        if (is_array($outputData)) {
            echo json_encode($outputData);
        } else {
            echo $outputData;
        }
        //print_r($outputData);
    }
}