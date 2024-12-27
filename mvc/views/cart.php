<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Shopping cat </title>
</head>
<style>
  body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .container_shoppingCart{
    margin-top: 40px;
    margin-left: 60px;
    width: 60%;
    border: 1px solid rebeccapurple;
  }
   .body_shopping{
    display: block;
    background-color: red;
   }
</style>
<body>
  <div class="container_shoppingCart">
    <table class="tbl_shopping">
      <thead>
        <tr >
          <th width = "10%"> Images </th>
          <th width= "15%"> Product Name</th>
          <th width= "10%"> Size </th>
          <th width= "15%"> Quantity </th>
          <th width= "15%" > Price </th>
          <th width="15%"> </th>
          <!-- <th width="15%"> Total Price </th> -->
        </tr>
      </thead>
      <tbody >
        <tr >
          <td><img style="width: 5rem;" src="https://img.alicdn.com/imgextra/i3/3708740980/O1CN01PVanvj1J6t1IoNrjy_!!0-item_pic.jpg" alt=""></td>
          <div style="display: block ;background-color:red;" class="body_shopping">
            <td style=" display:block; text-align: center; margin-top: 2rem;"> jacket warmup </td>
            <td>
              <div style="margin-left: 2rem;" class="size_selection">
                <label for="sizeSelect"></label>
                <select id="sizeSelect" class="size_btnDetail">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="SX">SX</option>
                </select>
            </div>
            </td>
            <td>
              <form style="margin-left: 3rem;" action="" method="POST">
                  <button class="qty_btnAdd" id="decreaseBtn">−</button>
                  <span id="quantity">1</span>
                  <button class="qty_btnAdd" id="increaseBtn">+</button>
              </form>
            </td>
            <td style="display: block; width: 30px; margin-left: 55px;" class="price"> 500000</td>
          </div>
          <td ><button style="background-color: red; border: none; color:white; border-radius: 4px;" class="delete">Delete</button></td>
      </tr>
      </tbody>
    </table>
    <table class="total_price" style="width:200px; color: rgb(89, 89, 161);">
      <tr>
        <th>Sub total: </th>
        <th>50000 VND</th>
      </tr>
    </table>
  </div>
  
</body>
</html>