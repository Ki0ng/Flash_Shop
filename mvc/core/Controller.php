<?php
    class Controller {

        protected $call_get;
        protected $call_model;
        protected $data;
    //====================================> construct ()
        public function __construct($model) {
            $this->method_get();
            $this->call_model = $this->model($model);
            $this->data = [];
        }

    //====================================> model () call file model.php to get data
        public function model($model){
            if (file_exists("./mvc/models/". $model ."Model.php")) {
                require_once "./mvc/models/". $model ."Model.php";
                return new ($model."Model");
            } else {
                return false;
            }
        }

    //====================================> view () call file view.php to show data
        public function view ($view, $data=[]) {
            require_once "./mvc/views/".$view.".php";
        }

    //====================================> method_get () get method
        private function method_get () {
            $this->call_get = [];
            $url = $_SERVER["REQUEST_URI"];
            $process = explode(	"?", $url);
            $get = "";
            for( $i = 0; $i < count($process); $i++ ) {
                if ($i > 0) {
                    $get .= $process[$i];
                }
            }
            parse_str($get, $this->call_get);
        }
        //show error
        public function error ($data) {
            $this->view("User", [
                "Page" => "User/Error",
                "data" => $data
            ]);
        }
}
