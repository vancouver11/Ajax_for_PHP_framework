<?php


class controllerCatalog extends controller
{
    public function actionList()
    {
        $model = $this->getModel('test');
        $data = $model->getAll();
        $data = reset($data);
        $content = $this->renderTemplate('example', $data);
        echo $this->renderLayout(['content' => $content ]);
        

       $example = new queryBuilder;

     //------------------------------------SELECT-----------------------------------------
     // echo $example->select('id,name,surname')->from('students')->where('id=2')->getText();
      // $example->select('id,name,surname')->from('students')->where('id=2')->execute();

      // $example->select('id,name,surname')->from('students')->where('id>3')->order('id DESC') ->limit(2)->getText()->execute(); 
     //

    //------------------------------------INSERT-----------------------------------------
     //echo $example->insert(['name' => "IVAN", 'surname' => "IVANOV", 'group_st' => 4])->into('students') ->getText();
     // $example->insert(['name' => "IVAN", 'surname' => "SIDOROV", 'group_st' => 4])->into('students')->execute();
    //
        
    //------------------------------------UPDATE----------------------------------------
    //echo $example->set(['name'=>'Oleg', 'surname'=>'OPPP', 'group_st' => 6])->update('students')->where('id=22')->getText();
     // $example->update('students')->set (['name'=>'Oleg', 'surname'=>'OPPP', 'group_st' => 6])->where('id=2')->execute();
    //


    //------------------------------------DELETE----------------------------------------   
   //echo $example->delete()->from('students')->where('id=455')->getText();
   // $example->delete()->from('students')->where('id=455')->execute();
     

   //------------------------------------JOIN----------------------------------------   
   // echo $example->select('id,name,surname')->from('students as st')->join('classes as cl')->on('cl.id = st.id')->getText();
   //echo  $example->select('id,name,surname')->from('students as st')->join('classes as cl')->on('cl.id = st.id')->
   //join('teachers as t')->on('t.id = cl.id')->getText();

       //------------------------------------Подзапрос----------------------------------------   
       /*  $subquery =  '('.$example->select('id')->from('students')->where('name = "Ivan"')->getText() .')';
        echo $example->select('id,name,surname')->from('students')->where('id <'.$subquery)->getText();
        $example->select('id,name,surname')->from('students')->where('id <'.$subquery)->execute(); */


   
    }
    
    public function actionProduct()
    {
        echo 'YEEEE';
    }
}