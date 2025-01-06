// Get elements
const decreaseBtn = document.getElementById('decreaseBtn');
const increaseBtn = document.getElementById('increaseBtn');
const quantitySpan = document.getElementById('quantity');

let quantity = 1; // Initial quantity

// nút giảm số lượng
decreaseBtn.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--; 
        quantitySpan.textContent = quantity; 
    }
});
// nút tăng số lượng
increaseBtn.addEventListener('click', () => {
    quantity++; 
    quantitySpan.textContent = quantity; 
});