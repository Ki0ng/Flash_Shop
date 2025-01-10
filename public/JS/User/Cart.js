// window.addEventListener('DOMContentLoaded', (event) => {

const minusButtons = document.querySelectorAll('.quantity-btn.minus');
const plusButtons = document.querySelectorAll('.quantity-btn.plus');
const PRODUCT_ID = document.querySelectorAll('.Product_Id');
const QUANTITY = document.querySelectorAll('.quantity');
const totalPriceElement = document.getElementById('total-price');
const deleteButtons = document.querySelectorAll('.delete-btn'); // Lấy tất cả các nút Delete
const LINK_PLUS = document.querySelectorAll('.plus-link'); // Lấy tất cả các nút Delete
const PRICE = document.querySelectorAll(".product-price"); // Lấy tất cả các nút Delete


for (let i = 0; i < minusButtons.length; i++) {
    deleteButtons[i].addEventListener("click", () => {
        let product_id = parseInt(PRODUCT_ID[i].innerHTML);
        window.location = `${window.location.pathname}/remove_cart_item?product_id=${product_id}`;
    })
}

for (let i = 0; i < minusButtons.length; i++) {

    minusButtons[i].addEventListener("click", () => {

        let quantity = parseInt(QUANTITY[i].innerHTML);

        if (quantity > 1) {
            let product_id = parseInt(PRODUCT_ID[i].innerHTML);
            let price = parseInt(PRICE[i].innerHTML);
            window.location = `${window.location.pathname}/update_cart_item?product_id=${product_id}&&value=${-1}&&price=${price}`;
        }

    })

    plusButtons[i].addEventListener("click", () => {
        let quantity = parseInt(QUANTITY[i].innerHTML);
        let product_id = parseInt(PRODUCT_ID[i].innerHTML);
        let price = parseInt(PRICE[i].innerHTML);
        window.location = `${window.location.pathname}/update_cart_item?product_id=${product_id}&&value=${1}&&price=${price}`;

    })

}

// window.location = `${window.location.pathname}/addToCart?Product_Id=${product_id}&&Quantity=${quantity}`;
// =================> http://Localhost/Flash_Shop/Cart/addToCart?Product_Id=$product_id&&Quantity=quantity