<?php
class ProductsController extends Controller
{
    //====================================> construct ()
    public function __construct()
    {
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
    public function detail()
    {

        if (isset($this->call_model->connect_database)) {
            if (isset($this->call_get["id"])) {

                $this->call_model->product_id = $this->call_get["id"];


                $this->data = $this->call_model->product();

                $this->view("User", [
                    "Page" => "Product/Detail",
                    "data" => $this->data,
                ]);
            } else {
                $this->error("THE FINDING WAS FELL");
            }
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    //====================================> search ()
    public function search()
    {

        if (isset($this->call_model->connect_database)) {
            if (isset($this->call_get["search"])) {

                $this->call_model->product_name = "%" . $this->call_get["search"] . "%";

                $this->data["products"] = $this->call_model->products();
                $this->data["categories"] =  $this->call_model->categories();

                $this->view("User", [
                    "Page" => "Product/Products",
                    "data" => $this->data,
                ]);
            } else {
                $data = "THE FINDING WAS FELL";
                $this->error($data);
            }
        }
    }

    //====================================> add_product () thêm sản phẩm mới (admin)    
    public function add_product()
    {
        echo "add_product";

        if (
            isset($_POST["product_name"]) &&
            isset($_POST["new_price"]) &&
            isset($_POST["stock"]) &&
            isset($_POST["category_id"]) &&
            isset($_POST["image_url"])
        ) {

            $this->call_model->product_name = $_POST["product_name"];
            $this->call_model->old_price = $_POST["old_price"];
            $this->call_model->new_price = $_POST["new_price"];
            $this->call_model->stock = $_POST["stock"];
            $this->call_model->category_id = $_POST["category_id"];
            $this->call_model->image_url = $_POST["image_url"];

            if ($this->call_model->connect_database) {
                $this->call_model->add_product();
            } else {
                echo "Database connection failed";
            }
        }
    }
}
