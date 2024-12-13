<?php
session_start();
require_once "./mvc/Bridge.php";
$myApp = new App ();
?>
<?php
// Bao gồm Controller
include_once 'controllers/ProductController.php';

// Khởi tạo ProductController
$productController = new ProductController();

// Hiển thị trang chủ
$productController->showHomepage();
?>
