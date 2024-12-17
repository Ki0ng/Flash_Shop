<?php
class App
{
    protected $controller = "Home";
    protected $action = "show";
    protected $params = [];

    // request controller
    public function __construct()
    {
        if (isset($_GET["url"])) {
            $arr = $this->UrlProccess();

            //process Controller (C - A - P)
            if (file_exists("./mvc/controllers/" . $arr[0] . "_Controller.php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            } else {
                $this->controller = "Error";
            }
        }

        require_once "./mvc/controllers/" . $this->controller . "_Controller.php";

        //process A === ? && process P?
        if (isset($arr[1])) {
            if (method_exists($this->controller . "_Controller", $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            } else {
                $this->controller = "Error";
                require_once "./mvc/controllers/" . $this->controller . "_Controller.php";
            }
            $this->params = $arr ? $arr : [];
        }

        $this->controller = new ($this->controller . "_Controller");

        print_r("action: " . $this->action);

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    //process URL from .htaccess
    function UrlProccess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
