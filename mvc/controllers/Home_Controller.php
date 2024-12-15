<?php
class Home_Controller extends Controller
{
    public function show()
    {
        $home_model = $this->model("Home");
        $home_data = $home_model->get_home_data();

        $this->view("master", [
            'Page' => 'Home',
            "home_data" => $home_data
        ]);
    }
    function card()
    {
        $card_model = $this->model("Home");
        $card_data = ["card_data" => $card_model->get_card_data()];
        $card_view = $this->view("Home", $card_data);
    }
}
