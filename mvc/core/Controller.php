<?php
    class Controller {

        //call file model php to get data
        public function model($model){
            require_once "./mvc/models/". $model ."_Model.php";
            return new ($model."_Model");
        }

        //call file view php to show data from model
        public function view ($view, $data=[]) {
            require_once "./mvc/views/pages/".$view."_View.php";
        }
}
?>