<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
  }

  .cart-container {
    width: 80%;
    margin: 50px auto;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
  }

  .cart-table {
    width: 100%;
    border-collapse: collapse;
  }

  .cart-table th,
  .cart-table td {
    text-align: left;
    padding: 15px;
    border-bottom: 1px solid #ddd;
  }

  .cart-table th {
    background-color: #ccc;
  }

  .cart-table td img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    vertical-align: middle;
  }

  .cart-table td span {
    vertical-align: middle;
  }

  .size-select {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
  }

  .quantity-btn {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 3px;
  }

  .quantity-btn:hover {
    background-color: #c0392b;
  }

  .delete-btn {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 3px;
  }

  .delete-btn:hover {
    background-color: #c0392b;
  }

  .total-price {
    text-align: right;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
  }

</style>
<body>
  <div class="cart-container">
    <table class="cart-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Size</th>
          <th>Quantity</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <img src="hoodie.jpg" alt="Hoodie">
            <span>Hoodie</span>
          </td>
          <td>
            <select class="size-select">
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="SX">SX</option>
            </select>
          </td>
          <td>
            <button class="quantity-btn">-</button>
            <span>2</span>
            <button class="quantity-btn">+</button>
          </td>
          <td>120.000 đ</td>
          <td><button class="delete-btn">Delete</button></td>
        </tr>
      </tbody>
    </table>
    <div class="total-price">
      Total price: <span>1.133.000 đ</span>
    </div>
  </div>
  <script>
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
      row.remove();//xóa sản phẩm 

      // Cập nhật lại danh sách dòng sản phẩm và tính lại tổng giá
      rows = document.querySelectorAll(".cart-table tbody tr");
      calculateTotalPrice(); // Cập nhật tổng giá sau khi xóa sản phẩm
    });
  });

  // Khởi tạo tổng giá lần đầu
  calculateTotalPrice();
</script>
</body>
</html>
