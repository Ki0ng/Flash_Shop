<?php
    class Controller {

        //call file model php to get data
        public function model($model){
            if (file_exists("./mvc/models/". $model ."Model.php")) {
                require_once "./mvc/models/". $model ."Model.php";
                return new ($model."Model");
            } else {
                return false;
            }
        }

        //call file view php to show data from model
        public function view ($view, $data=[]) {
            require_once "./mvc/views/".$view.".php";
        }
        
}
?>