    <?php
class AdminController extends Controller
{

    //====================================> construct ()
    public function __construct()
    {
        parent::__construct("Products");
        
        // if (!isset($_SESSION["role"]) || $_SESSION["role"] != 0) {
        //     header("location: /Flash_Shop");
        // }
    }

    //====================================> default ()
    public function default()
    {

        if ($this->call_model->connect_database) {


            $this->data = $this->call_model->products();

            $this->view("Admin", [
                "Page" => "ProductManagement",
                "data" => $this->data
            ]);
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }
    }

    //====================================> add_product () thêm sản phẩm mới (admin)
    public function add_product()
    {


        if (
            isset($_POST["product_name"]) &&
            isset($_POST["new_price"]) &&
            isset($_POST["stock"]) &&
            isset($_POST["category_id"]) &&
            isset($_POST["image_url"])
        ) {

            $this->call_model->product_name = $_POST["product_name"];
            $this->call_model->new_price = $_POST["new_price"];
            $this->call_model->stock = $_POST["stock"];
            $this->call_model->category_id = $_POST["category_id"];
            $this->call_model->image_url = $_POST["image_url"];

            if ($this->call_model->connect_database) {
                $this->call_model->add_product();

                header("location: /Flash_Shop/Admin");
            } else {
                echo "Database connection failed";
            }
        }
    }

    //====================================> delete_product () xóa sản phẩm (admin)
    public function delete_product()
    {
        if (isset($_POST["product_id"])) {

            $this->call_model->product_id = $_POST["product_id"];

            if ($this->call_model->connect_database) {
                $this->call_model->delete_product();
            } else {
                echo "Database connection failed";
            }
        }
    }

    //====================================> update_product () cập nhật sản phẩm (admin)
    public function update_product()
    {
        if (
            isset($_POST["product_id"]) &&
            isset($_POST["product_name"]) &&
            isset($_POST["old_price"]) &&
            isset($_POST["new_price"]) &&
            isset($_POST["stock"]) &&
            isset($_POST["category_id"]) &&
            isset($_POST["description"]) &&
            isset($_POST["image_url"])
        ) {

            $this->call_model->product_id = $_POST["product_id"];
            $this->call_model->product_name = $_POST["product_name"];
            $this->call_model->old_price = $_POST["old_price"];
            $this->call_model->new_price = $_POST["new_price"];
            $this->call_model->stock = $_POST["stock"];
            $this->call_model->category_id = $_POST["category_id"];
            $this->call_model->description = $_POST["description"];
            $this->call_model->image_url = $_POST["image_url"];

            if ($this->call_model->connect_database) {
                $this->call_model->update_product();
            } else {
                echo "Database connection failed";
            }
        }
    }

    //====================================> user_management () quản lý người dùng (admin)
    public function user_management()
    {
        
        parent::__construct("User");

        if ($this->call_model->connect_database) {
            $this->data = $this->call_model->users();
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
            return;
        }

        $this->view("Admin", [
            "Page" => "UserManagement",
            "data" => $this->data
        ]);
    }

    //====================================> product_analysis () phân tích sản phẩm (admin)
    public function product_analysist () {

        if($this->call_model->connect_database) {
            $this->data = $this->call_model->product_analysist();
        } else {
            $this->error("CAN NOT CONNECT TO DATABASE");
        }

        $this->view("Admin", [
            "Page" => "ProductAnalysist",
            "data" => $this->data
        ]); 
    }

}
