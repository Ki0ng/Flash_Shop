<?php
class ProductsController extends Controller
{
    //====================================> Construct
    public function __construct() {
        parent::__construct("Products");
    }

    //====================================> Default -> Show ()
    public function Default()
    {
        if ($this->call_model->connect_database) {

            $this->data["products"] = $this->call_model->products();
            $this->data["categories"] =  $this->call_model->categories();

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
        
        if  (isset($this->call_model->connect_database)) {
            if (isset($this->call_get["search"])) {

                $this->call_model->product_name = "%".$this->call_get["search"]."%";

                $this->data["products"] = $this->call_model->products();
                $this->data["categories"] =  $this->call_model->categories();

                $this->view("User", [
                    "Page" => "Product/Products",
                    "data" => $this->data,
                ]);
            } else {
                $data = "THE FINDING WAS FELL";
                $this->error("User", "User/Error", $data);
            }
        }
    }

}