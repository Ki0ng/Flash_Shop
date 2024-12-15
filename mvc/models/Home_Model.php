<?php
class Home_Model extends Database{
    public function get_home_data()
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

//0 Product_Id
//1 Category_Id 
//2 Product_Name
//3 Old_price
//4 New_Price
//5 stock
//6 Image_URL
//7 Decription
