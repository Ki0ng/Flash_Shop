
<?php
class Database {
    private $host = "localhost";
    private $db_name = "Flash_Shop";
    private $username = "root";
    private $password = "";
    protected $conn;

    protected $sql;
    protected $stmt;
    protected $get_result;    
    protected $data;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection()
    {
        try {

            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            return $this->conn;

        } catch (Exception $e) {
            
            return false;
        }
    }

    // protected function query_sql () {
    //     $this->stmt = $this->conn->query($this->sql);
    //     if(isset($this->stmt)) {
    //         $this->fetch_data();
    //     }
    // }

    protected function prepare () {
        $this->stmt = $this->conn->prepare($this->sql);
    }
    
    protected function execute () {
        if ($this->stmt) {
            $this->stmt->execute();
            $this->get_result = $this->stmt->get_result();
        }
    }

    protected function fetch_assoc () {
        $this->data = [];
        while ($row = $this->get_result->fetch_assoc()) {
            $this->data[] = $row;
        }
    }
}


?>
