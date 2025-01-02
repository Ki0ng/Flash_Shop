<?php
class HomeController extends Controller {
    public function Default () { //Home
        $database = $this->model("Product");
        if ($database) {
            $data = $database->products();
            if ($data) {
                $this->view("User", [
                    'Page' => 'User/Home',
                    "home_data" => $data
                ]);     
            } else {
                $data = "ERROR QUERY";
                $this->Error($data);
            }
        } else {
            $data = "FILE NOT EXIST";
            $this->Error($data);
        }
    }

    public function AboutUs () {
        $this->view("User", [
            'Page' => 'User/AboutUs'
        ]);
    }

    public function Error ($data) {
        $this->view("User", [
            'Page' => 'User/Error',
            "data" => $data
        ]);
    }
}

