
<?php
class Database
{
    private $host = "localhost";
    private $db_name = "Flash_Shop";
    private $username = "root";
    private $password = "";
    protected $conn;

    protected $sql;
    protected $stmt;
    protected $get_result;
    protected $data;

    public $connect_database;

    //====================================> construct ()
    public function __construct()
    {
        $this->getConnection();
        $this->connect_database = isset($this->conn) ? true : false;
    }

    //====================================> getConnection ()
    public function getConnection()
    {
        try {

            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            return $this->conn;
        } catch (Exception $e) {

            return false;
        }
    }

    //====================================> query ()
    protected function prepare()
    {
        $this->stmt = $this->conn->prepare($this->sql);
    }

    //====================================> execute ()
    protected function execute()
    {
        if ($this->stmt) {
            $this->stmt->execute();
        }
    }

    //====================================> fetch_assoc ()
    protected function fetch_assoc()
    {
        $this->data = [];
        $this->get_result = $this->stmt->get_result();
        if ($this->get_result->num_rows == 1) {
            $this->data = $this->get_result->fetch_assoc();
        } else {
            while ($row = $this->get_result->fetch_assoc()) {
                $this->data[] = $row;
            }
        }
    }
    
}


?>
