<?php
include 'BaseController.php';
include_once 'model/TypeProductModel.php';

class TypeProductController extends BaseController{
    function getTypePage(){

        $urlType =  $_GET['url'];
        $model = new TypeProductModel;
        // c1
        // $type = $model->selectCategoriesByUrl($urlType);

        //c2
        $type = $model->selectCategories($urlType);
        if(!$type){
            header('Location:404.html');
            return;
        }
        // get product by type

        return $this->loadView('type-product');
    }
}



?>