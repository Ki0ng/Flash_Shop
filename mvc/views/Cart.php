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
    <table class="cart-table">
      <h1 style="color: green"> Your Shopping Cart </h1>
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
        
      <?php 
      $data = $data["home_data"];
      if (!empty($data)): ?>
        <?php foreach ($data as $product): ?>
        <tr>
          <td>
          <?php echo "<img src='".$product["Image_URL"]. "' alt='Product Image'" ?>
            <span><?php echo $product["Product_Name"]?></span>
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
            <button class="quantity-btn minus">-</button>
            <span class="quantity">2</span>
            <button class="quantity-btn plus">+</button>
          </td>
          <td><span class="product-price"><?php echo $product["New_Price"] ?></span></td>
          <td><button class="delete-btn">Delete</button></td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
              <td colspan="3" style="text-align: center;">Giỏ hàng của bạn trống.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
    <div class="total-price">
      Total price: <span id="total-price">300000</span>
    </div>
  </div>
  </div>
  <script>
    // Lắng nghe sự kiện khi trang tải xong
    window.addEventListener('DOMContentLoaded', (event) => {
    // Lấy tất cả các nút cộng và trừ
    const minusButtons = document.querySelectorAll('.quantity-btn.minus');
    const plusButtons = document.querySelectorAll('.quantity-btn.plus');
    const totalPriceElement = document.getElementById('total-price');

    // Hàm tính toán và cập nhật tổng giá
    function updateTotalPrice() {
      let totalPrice = 0;

      // Duyệt qua tất cả các sản phẩm trong giỏ hàng
      document.querySelectorAll('tr').forEach((row) => {
        const priceElement = row.querySelector('.product-price');
        const quantityElement = row.querySelector('.quantity');
        
        if (priceElement && quantityElement) {
          const price = parseFloat(priceElement.dataset.price); // Giá gốc của sản phẩm
          const quantity = parseInt(quantityElement.innerText);
          const updatedPrice = price * quantity;
          
          // Cập nhật giá sản phẩm trong bảng
          priceElement.innerText = updatedPrice.toLocaleString('vi-VN');
          
          // Cộng dồn vào tổng giá
          totalPrice += updatedPrice;
        }
      });

      // Cập nhật giá tổng lên giao diện
      totalPriceElement.innerText = totalPrice.toLocaleString('vi-VN');
    }

    // Xử lý khi nhấn dấu cộng
    plusButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const quantityElement = button.previousElementSibling; // Lấy phần tử span chứa số lượng
        let quantity = parseInt(quantityElement.innerText);
        quantity++;
        quantityElement.innerText = quantity;

        // Cập nhật tổng giá
        updateTotalPrice();
      });
    });

    // Xử lý khi nhấn dấu trừ
    minusButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const quantityElement = button.nextElementSibling; // Lấy phần tử span chứa số lượng
        let quantity = parseInt(quantityElement.innerText);

        if (quantity > 1) {
          quantity--;
          quantityElement.innerText = quantity;

          // Cập nhật tổng giá
          updateTotalPrice();
        }
      });
    });

    // Cập nhật giá trị ban đầu của mỗi sản phẩm (thêm thuộc tính data-price)
    document.querySelectorAll('.product-price').forEach((priceElement) => {
      const price = parseFloat(priceElement.innerText); // Giá ban đầu
      priceElement.dataset.price = price; // Lưu giá vào data-price
    });

    // Cập nhật tổng giá khi trang được tải
    updateTotalPrice();

    });

  </script>
</body>
</html>