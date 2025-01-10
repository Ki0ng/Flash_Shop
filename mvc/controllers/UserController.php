<?php

use function PHPSTORM_META\type;

class UserController extends Controller
{
    private $type_error;

    //====================================> construct ()
    public function __construct()
    {
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

    //====================================> update profile ()
    public function update()
    {
        if ($this->call_model->connect_database) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $this->call_model->user_id = $_SESSION["user_id"];
                $this->call_model->user_name = $_POST["name"];
                $this->call_model->password = $_POST["password"];
                $this->call_model->email = $_POST["email"];
                $this->call_model->phone = $_POST["phone"];
                $this->call_model->address =  $_POST["address"];

                $this->condition();

                if ($this->type_error) {
                    $this->default();
                } else {
                    $_SESSION["password"] = $_POST["password"];
                    $this->call_model->password = md5($this->call_model->password);
                    $this->call_model->update();
                    header("location: /Flash_Shop/User");
                }
            }
        }
    }

    //====================================> login ()
    public function login()
    {
        if ($this->call_model->connect_database) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $this->call_model->email = $_POST["email"];
                $this->call_model->password = md5($_POST["password"]);

                $this->data = $this->call_model->account();

                if ($this->data !== []) {
                    if ($this->call_model->password === $this->data["password"]) {

                        if ($this->data["role"] === 0) {
                            header("Location: /Flash_Shop/Admin");
                        } else {

                            $_SESSION["user_id"] = $this->data["user_id"];
                            $_SESSION["password"] = $_POST["password"];

                            header("Location: /Flash_Shop/Home");
                        }
                    } else {
                        $this->view("Authentication", [
                            "Page" => "Login",
                            "error" => "Your password is incorrect"
                        ]);
                    }
                } else {
                    $this->view("Authentication", [
                        "Page" => "Login",
                        "error" => "underfine account"
                    ]);
                }
            } else {
                $this->view("Authentication", [
                    "Page" => "Login",
                    "error" => null
                ]);
            }
        } else {

            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    //====================================> register ()
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->call_model->user_name = $_POST["name"];
            $this->call_model->password = $_POST["password"];
            $this->call_model->email = $_POST["email"];
            $this->call_model->phone = $_POST["phone"];

            $this->condition();
            if (!$this->type_error) {

                $this->call_model->password = md5($this->call_model->password);

                $this->data = $this->call_model->account();

                if ($this->data === []) {

                    $this->call_model->register();
                    header("Location: /Flash_Shop/User/Login");
                } else {

                    $this->view("Authentication", [
                        "Page" => "Register",
                        "error" => "the account is already exist"
                    ]);
                }
            } else {

                $this->view("Authentication", [
                    "Page" => "Register",
                    "error" => $this->type_error
                ]);
            }
        } else {
            $this->view("Authentication", [
                "Page" => "Register",
                "error" => null
            ]);
        }
    }

    //====================================> logout ()
    public function Logout()
    {
        session_destroy();
        header("Location: /Flash_Shop");
    }

    //====================================> delete ()
    private function condition()
    {
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $this->call_model->email)) {
            $this->type_error = "the email is not valid";
        } else if (!preg_match('/^\d{10}$/', $this->call_model->phone)) {
            $this->type_error = "the phone number is not valid";
        } else if (strlen($this->call_model->password) < 6) {
            $this->type_error = "the password too short must longer than 6 characters";
        } else {
            $this->type_error = null;
        }
    }
}
