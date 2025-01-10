<?php
class HomeController extends Controller {

    // ==================================> construct ()
    public function __construct() {
        parent::__construct("Products");
    }

    // ==================================> default -> Home ()
    public function default () 
    {
        if ($this->call_model->connect_database) {

            $this->data = $this->call_model->products();

            $this->view("User", [
                "Page" => "User/Home",
                "data" => $this->data
            ]);
        }  else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    
    // ==================================> About Us ()
    public function about_us ()
    {
        $this->view("User", [
            'Page' => 'User/AboutUs'
        ]);
    }
 
}

