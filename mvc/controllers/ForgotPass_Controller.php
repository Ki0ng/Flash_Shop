<?php
class ForgotPass_Controller extends Controller {
    public function show() {
        $this->view("master2", [
            "Page" => "ForgotPass"
        ]);
    }
}

?>