<?php
class Product_Model extends Database
{
    public function get_product_data()
    {
        $conn = new Database(); 

        if ($conn) {
            $database = $conn->getConnection();

            $sql = "select * from products";

            $data_raw = $database->query($sql);

            $data = $data_raw->fetch_all();

            return $data;
        } else {
            return false;
        }
    }

    public function get_proDetail_data()
    {
        $conn = new Database();

        if ($conn) {
            $database = $conn->getConnection();

            $sql = "select * from products";

            $data_raw = $database->query($sql);

            $data = $data_raw->fetch_all();

            return $data;
        } else {
            return false;
        }
    }
}
