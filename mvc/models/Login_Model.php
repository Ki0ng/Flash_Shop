<?php
// Đảm bảo lớp Database được kế thừa để có thể sử dụng kết nối CSDL
class Login_Model extends Database
{
    public function checkLogin($email, $password)
    {
        // Kết nối đến cơ sở dữ liệu
        $conn = $this->getConnection();

        // Truy vấn cơ sở dữ liệu để kiểm tra email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Nếu không tìm thấy người dùng
        if ($result->num_rows == 0) {
            return "Email không tồn tại!";
        }

        // Nếu tìm thấy người dùng, kiểm tra mật khẩu
        $user = $result->fetch_assoc();
        if (!password_verify($password, $user['Password'])) {
            return "Mật khẩu không chính xác!";
        }

        // Nếu đăng nhập thành công, trả về thông tin người dùng
        return $user;
    }
}
?>
