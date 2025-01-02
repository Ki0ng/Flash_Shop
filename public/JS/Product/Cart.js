 // Lấy tất cả các dòng sản phẩm và phần hiển thị tổng giá
 const rows = document.querySelectorAll(".cart-table tbody tr");
 const totalPriceElement = document.querySelector(".total-price span");
 // Hàm tính tổng giá
 function calculateTotalPrice() {
   let total = 0;
   rows.forEach(row => {
     const quantity = parseInt(row.querySelector(".quantity").innerText);
     const pricePerItem = parseInt(row.querySelector(".price").innerText);
     total += quantity * pricePerItem;
   });
   totalPriceElement.innerText = total.toLocaleString("vi-VN") + " đ";
 }
 // Lặp qua từng dòng sản phẩm và thêm sự kiện cho các nút
 rows.forEach(row => {
   const minusButton = row.querySelector(".quantity-btn.minus");
   const plusButton = row.querySelector(".quantity-btn.plus");
   const deleteButton = row.querySelector(".delete-btn");
   const quantityElement = row.querySelector(".quantity");
   // Sự kiện nút tăng
   plusButton.addEventListener("click", () => {
     let quantity = parseInt(quantityElement.innerText);
     quantity += 1;
     quantityElement.innerText = quantity;
 
     calculateTotalPrice(); // Cập nhật tổng giá
   });
 
   // Sự kiện nút giảm
   minusButton.addEventListener("click", () => {
     let quantity = parseInt(quantityElement.innerText);
     if (quantity > 1) { // Ngăn giảm số lượng xuống dưới 1
       quantity -= 1;
       quantityElement.innerText = quantity;
 
       calculateTotalPrice(); // Cập nhật tổng giá
     }
   });
 
   // Sự kiện nút xóa
   deleteButton.addEventListener("click", () => {
     // Xóa dòng sản phẩm
     row.remove();
 
     // Cập nhật lại danh sách dòng sản phẩm và tính lại tổng giá
     rows = document.querySelectorAll(".cart-table tbody tr");
     calculateTotalPrice(); // Cập nhật tổng giá sau khi xóa sản phẩm
   });
 });
 
 // Khởi tạo tổng giá lần đầu
 calculateTotalPrice();
 