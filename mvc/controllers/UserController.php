<?php
class UserController extends Controller
{
    public function Default()
    { /*Profile */

        $database =  $this->model("User");
        $successMessage = "";

        if (isset($_POST["email"]) && isset($_POST["password"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_encode = md5($password);

            if ($database->login($email, $password_encode)) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $successMessage = "Dang nhap thanh cong!";
            } else {
                return $this->view("Authentication", [
                    "Page" => "Login",
                    "Error" => "Khong tim thay tai khoan"
                ]);
            }
        }

        if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
            $email = $_SESSION["email"];
            $password = $_SESSION["password"];
            $password_encode = md5($password);

            $database = $this->model("User");
            $account = $database->Profile($email, $password_encode);
            $this->view("User", [
                "Page" => "User/Profile",
                "account" => $account,
                "successMessage" => $successMessage,
                "Password" => $password
            ]);
        } else {
            $this->view("Authentication", [
                "Page" => "Login",
            ]);
        }
    }

    public function UpdateUser()
    {
        $database = $this->model("User");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name =     $_POST["name"];
            $phone =    $_POST["phone"];
            $email =     $_POST["email"];
            $address =  $_POST["address"];
            $password = $_POST["password"];


            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            $password = md5($password);

            $database->UpdateUser($name, $phone, $email, $password, $address);
            $this->Default();
        }
    }

    public function Login()
    {
        $this->view("Authentication", [
            "Page" => "Login"
        ]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $password = md5($password);
            $database = $this->model("User");
            if ($database->login($email, $password)) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;

                header("Location: /Flash_Shop/Home/Default");
                exit;
            } else {
                $this->view("Authentication", [
                    "Page" => "Login",
                    "Error" => "Sai tài khoản hoặc mật khẩu"
                ]);
            }
        } else {
            $this->view("Authentication", [
                "Page" => "Login"
            ]);
        }
    }

    public function Register()
    {
        $this->view("Authentication", [
            "Page" => "Register"
        ]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
                echo "<script> alert ('Email khong hop le') </script>";
                return;
            }

            if (!preg_match('/^\d{10}$/', $phone)) {
                echo "<script>alert('So dien thoai khong hop le');</script>";
                return;
            }
            if (strlen($password) < 6) {
                echo "<script>alert('Mat khau khong hop  le');</script>";
                return;
            }
            $password = md5($password);

            $database = $this->model("User");
            $data = $database->Register($username, $password, $email, $phone);
            if ($data) {
                echo "<script>alert('Dang ky thanh cong!');</script>";
                header("Location: /Flash_Shop/User/Login");
                exit;
            } else {
                echo "<script>alert('Dang ky that bai, vui long nhap lai.');</script>";
            }
        }
    }

    public function Logout()
    {
        session_destroy();
        header("Location: /Flash_Shop/User/Login");
        exit;
    }
}
