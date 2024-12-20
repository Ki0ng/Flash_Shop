<?php
class Login_Controller extends Controller {
    public function show() {
        
        $this -> view("master2", [
            "Page" => "Login"
        ]);
    }

    
}
?>