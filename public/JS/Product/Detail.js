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