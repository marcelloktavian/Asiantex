<?php
class Controller{
    protected function view($viewName){
        $view = new View($viewName);
        return $view;
    }

    // protected function fileName($fileName){
    //     return $fileName;
    // }

    protected function model($modelName, $fileName){
        require_once ROOT.DS.'modules'.DS.$fileName.DS.'models'.DS.$modelName.'Model.php';
        $className=ucfirst($modelName).'Model';
        $this->$modelName = new $className();
    }

    protected function template($viewName,$data=array()){
        $view=$this->view('template');
        $view=bind('viewName',$viewName);
        $view=bind('data',$data);
    }

    public function redirect($url = "") {
        header("Location:" . $url);
    }

    protected function validate($data){
        return htmlentities(trim(strip_tags($data)));
    }
}