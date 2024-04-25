<?php 
class BaseController{
    const VIEW_FOLDER_NAME='Views';
    const MODEL_FOLDER_NAME='Model';
    protected function view($viewpath , array $data=[]){
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;
        // $viewpath=self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewpath) . '.php';
        foreach($data as $key => $value){
            $$key = $value;
        }
          
        return require(self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewpath) . '.php');
       
    }
    protected function viewimg($viewpath){
        $parts = explode('.', $viewpath);
        return self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $parts[0]) . '.jpg';
    }
    protected function loadModel($modelPath)
    {
        return require(self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
    }
}