<?php
class Home_Controller extends Controller {
    function __construct() {
        $home_model = $this -> model("Home");
        $home_data = ["home_data" => $home_model -> get_home_data()];
        $home_view = $this -> view("Home", $home_data);    
    }
}
?>