<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="../../../public/css/productDetail.css">
</head>
<style> 
.container_proDetail {
    width: 100%;
    display: flex;
    align-items: center;
    background-color:D9D9D9; 
    padding: 50px;
    justify-content: center;
    gap:30px
}


.product_details, .product_image img {
    background-color: #fff; 
    border-radius: 10px;
}


.product_image {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.product_image img{
    width: 100%;
    max-width: 300px;
    display: block;
    border-radius: 10px;
}
.product_details {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
    max-width: 250px;
}


.product_details h2 {
    font-size: 22px;
    font-weight: bold;
    margin: 0;
}


.product_details p {
    color: #555;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}


.proDetail_price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.new_price {
    color: red;
    font-size: 18px;
    font-weight: bold;
}

.old_price {
    text-decoration: line-through;
    color: #888;
    font-size: 16px;
}


.size_btnDetail {
    background-color: #000;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    font-size: 12px;
}


.proDetail_quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty_btnDetail {
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 50%;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
}

.proDetail_quantity span {
    font-size: 14px;
    font-weight: bold;
}

.add_productDetail {
    background-color: #000;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 12px;
    cursor: pointer;
    text-transform: uppercase;
    width: fit-content;
    margin-top: 10px;
}

.add_productDetail:hover {
    background-color: #444;
}
</style>
<body>
    <div class="container_proDetail">
        <div class="product_image">
            <img src="https://contents.mediadecathlon.com/p2606947/k$1c9e0ffdefc3e67bdeabc82be7893e93/dry-men-s-running-breathable-t-shirt-red-decathlon-8771124.jpg" alt="">
        </div>
        <div class="product_details">
            <h2>Shirts Fashion</h2>
            <p>
                Is a product of Lacoste S.A.<br>
                company originating in<br>
                France, using anti-static<br>
                fabric. With long-sleeved<br>
                design...
            </p>
            <div class="proDetail_price">
                <span class="new_price">$230</span>
                <span class="old_price">$330</span>
                <div class="size_selection">
                    <label for="sizeSelect"></label>
                    <select id="sizeSelect" class="size_btnDetail">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="SX">SX</option>
                    </select>
                </div>
            </div>
            <div class="proDetail_quantity">
                <button class="qty_btnDetail" id="decreaseBtn">−</button>
                <span id="quantity">1</span>
                <button class="qty_btnDetail" id="increaseBtn">+</button>
            </div>
            <button class="add_productDetail">Add Product</button>
        </div>
    </div>

    <script>
        // Get elements
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const quantitySpan = document.getElementById('quantity');

        let quantity = 1; // Initial quantity

        // Decrease button event
        decreaseBtn.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--; 
                quantitySpan.textContent = quantity; 
            }
        });
        // nút giảm số lượng
        increaseBtn.addEventListener('click', () => {
            quantity++; 
            quantitySpan.textContent = quantity; 
        });
    </script>
</body>
</html>
