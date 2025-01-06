<?php
class UserController extends Controller
{

    //====================================> construct ()
    public function __construct() {
        parent::__construct("User");
    }

    //====================================> default profile ()
    public function default()
    {
        if ($this->call_model->connect_database) {
            if (isset($_SESSION["user_id"])) {

                $this->call_model->user_id = $_SESSION["user_id"];
                $this->data = $this->call_model->account();

                $this->view("User", [
                    "Page" => "User/Profile",
                    "data" => $this->data
                ]); 
            } else {
                $this->view("Authentication", [
                    "Page" => "Login",
                    "error" => "login"
                ]);
            }
        }
    }

    // public function UpdateUser()
    // {
    //     $database = $this->model("User");

    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $name =     $_POST["name"];
    //         $phone =    $_POST["phone"];
    //         $email =     $_POST["email"];
    //         $address =  $_POST["address"];
    //         $password = $_POST["password"];


    //         $_SESSION["email"] = $email;
    //         $_SESSION["password"] = $password;

    //         $password = md5($password);

    //         $database->UpdateUser($name, $phone, $email, $password, $address);
    //         $this->Default();
    //     }
    // }

    public function login()
    {
        if ($this->call_model->connect_database) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $this->call_model->email = $_POST["email"];
                $this->call_model->password = ($_POST["password"]);
    
                $this->data = $this->call_model->account();

                if ($this->data !== []) {
                    if ($this->call_model->password === $this->data["password"]) {
    
                        $_SESSION["user_id"] = $this->data["user_id"];
                        $_SESSION["password"] = $_POST["password"];
    
                        header("Location: /Flash_Shop/Home");
                    } else {
                        $this->view("Authentication", [
                            "Page" => "Login",
                            "error" => "incorrect"
                        ]);
                    }
                } else {
                    $this->view("Authentication", [
                        "Page" => "Login",
                        "error" => "underfine"
                    ]);
                } 
            }  else {
                $this->view("Authentication", [
                    "Page" => "Login",
                    "error" => null
                ]);
            }
        }  else {

            $this->error("CAN NOT CONNECT TO DATABASE");
        }

    }

    // public function Register()
    // {
    //     $this->view("Authentication", [
    //         "Page" => "Register"
    //     ]);

    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $username = $_POST["name"];
    //         $password = $_POST["password"];
    //         $email = $_POST["email"];
    //         $phone = $_POST["phone"];

    //         if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
    //             echo "<script> alert ('Email khong hop le') </script>";
    //             return;
    //         }

    //         if (!preg_match('/^\d{10}$/', $phone)) {
    //             echo "<script>alert('So dien thoai khong hop le');</script>";
    //             return;
    //         }
    //         if (strlen($password) < 6) {
    //             echo "<script>alert('Mat khau khong hop  le');</script>";
    //             return;
    //         }
    //         $password = md5($password);

    //         $database = $this->model("User");
    //         $data = $database->Register($username, $password, $email, $phone);
    //         if ($data) {
    //             echo "<script>alert('Dang ky thanh cong!');</script>";
    //             header("Location: /Flash_Shop/User/Login");
    //             exit;
    //         } else {
    //             echo "<script>alert('Dang ky that bai, vui long nhap lai.');</script>";
    //         }
    //     }
    // }

    public function Logout()
    {
        session_destroy();
        header("Location: /Flash_Shop");
    }
}
