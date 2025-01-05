<?php
class ProductController extends Controller
{
    //====================================> Construct
    public function __construct() {
        parent::__construct("Product");
    }

    //====================================> Default -> Show ()
    public function Default()
    {
        if ($this->call_model->connect_database) {

            $this->data = $this->call_model->products();

            $this->view("User", [
                "Page" => "Product/Products",
                "data" => $this->data
            ]);
        } else {
            $data = "CAN NOT CONNECT TO DATABASE";
            $this->error("User", "User/Error", $data);
        }
    }

    //====================================> Detail
    public function Detail() {

        if (isset($this->call_model->connect_database)) {
            if (isset($this->call_get["id"])) {

                $this->call_model->product_id = $this->call_get["id"];

                if (preg_match("/^[0-9]$/", $this->call_model->product_id)) {
        
                    $this->data = $this->call_model->product();
                    
                    $this->view("User", [
                        "Page" => "Product/Detail",
                        "data" => $this->data,
                    ]);
        
                } else {
                    $data = "THE FINDING WAS FELL";
                    $this->error("User", "User/Error", $data);
                }
            } else {
                $data = "NOT ENOUGHT CONDITION TO 'SEARCH' ";
                $this->error("User", "User/Error", $data);
            }
        } else {
            $data = "CAN NOT CONNECT TO DATABASE";
            $this->error("User", "User/Error", $data);
        }
    }

    public function search () {
        if  (isset($this->call_model->conn)) {
            if (isset($this->callGet["search"])) {

                $key = $this->call_get["search"];
                $this->data = $this->call_model->search($key);
                $categories = $this->call_model->getCategory();

                $this->view("User", [
                    "Page" => "Product/Products",
                    "data" => $this->data,
                    "categories" => $categories
                ]);
            } else {
                $data = "THE FINDING WAS FELL";
                $this->error("User", "User/Error", $data);
            }
        }
    }

}