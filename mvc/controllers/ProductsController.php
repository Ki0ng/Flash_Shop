<?php
class ProductsController extends Controller
{
    //====================================> construct ()
    public function __construct() {
        parent::__construct("Products");
    }

    //====================================> default -> Show ()
    public function default()
    {
        if ($this->call_model->connect_database) {

            $this->data["products"] = $this->call_model->products();
            $this->data["categories"] =  $this->call_model->categories();

            $this->view("User", [
                "Page" => "Product/Products",
                "data" => $this->data
            ]);
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    //====================================> detail ()
    public function detail() {

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
                    $this->error( "THE FINDING WAS FELL");
                }
            } else {
                $this->error( "NOT ENOUGHT CONDITION TO 'SEARCH'");
            }
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    //====================================> search ()
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
                $this->error( $data);
            }
        }
    }

}