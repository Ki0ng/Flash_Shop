<?php
class App
{
    protected $controller = "Home";
    protected $action = "default";
    protected $params = ["null"];
    // request controller
    public function __construct() {

        if (isset($_GET["url"])) {
            
            $arr = $this->UrlProccess();
            //Process Controller
            if (file_exists("./mvc/controllers/$arr[0]Controller.php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            } else {
                $this->error("UNDERFINE THE CONTROLLER :   $arr[0]");
            }
        }

        require_once "./mvc/controllers/" . $this->controller . "Controller.php";

        //Process Action
        if (isset($arr[1])) {
            if (method_exists($this->controller . "Controller", $arr[1])) {
                
                $this->action = $arr[1];
                unset($arr[1]);

                $this->params = $arr ? $arr : ["null"];
            } else {

                $this->error("UNDERFINE THE ACTION :   $arr[1]");
                require_once "./mvc/controllers/" . $this->controller . "Controller.php";
            }
            
        }

        $this->controller = new ($this->controller . "Controller");
        
        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    //process URL from .htaccess
    function UrlProccess(){
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } else {
            return false;
        }
    }

    function error ($data) {
        $this->controller = "Home";
        $this->action = "error";
        $this->params = [$data];
    }


}

