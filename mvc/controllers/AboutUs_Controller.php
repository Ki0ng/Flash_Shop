<?php
class AboutUs_Controller extends Controller {
    // protected $productModel;
    // function __construct() {
    //     $this->productModel = $this->model('ProductModel');
    // }

    public function show () {
        $this->view("master", [
            'Page' => 'AboutUs'
        ]);
    }
    
}
