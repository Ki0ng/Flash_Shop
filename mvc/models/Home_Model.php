<?php
class Home_Model extends Database
{
    public function get_home_data()
    {
        $conn = new Database();
        $db = $conn->getConnection();

        $sql = "select * from products";

        $return = $db->query($sql);

        $return = $return->fetch_all();
        return $return;
    }
}
