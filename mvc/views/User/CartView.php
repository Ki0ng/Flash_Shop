  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="./public/CSS/User/Cart.css">
  </head>

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
        $data = $data["data"];
        if (($data)): ?>
          <?php foreach ($data as $product): ?>
          <tr>
            <td>
 ``           <?php echo "<img src='".$product["image_url"]. "' alt='Product Image'" ?>
              <span><?php echo $product["product_name"]?></span>
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
              <span class="quantity"><?php echo $product['quantity'] ?></span>
              <span class="Product_Id " style="display: none;"><?php echo $product['product_id'] ?></span>
              <button class="quantity-btn plus">+</button>
            </td>
            <td><span class="product-price"><?php echo $product["price"] ?></span></td>
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
        Total price: <span id="total-price"><?php echo $product["total_price"]?></span>
      </div>
    </div>
    </div>
    <script src="public/JS/User/Cart.js"></script>
          
    <script>
    </script>
  </body>
  </html>