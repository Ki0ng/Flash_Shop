window.addEventListener('DOMContentLoaded', (event) => {

    const minusButtons = document.querySelectorAll('.quantity-btn.minus');
    const plusButtons = document.querySelectorAll('.quantity-btn.plus');
    const totalPriceElement = document.getElementById('total-price');
    const deleteButtons = document.querySelectorAll('.delete-btn'); // Lấy tất cả các nút Delete
  
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
  
    // Xử lý khi nhấn nút Delete
    deleteButtons.forEach((button) => {
      button.addEventListener('click', (event) => {
        const row = event.target.closest('tr'); // Lấy dòng (tr) chứa nút Delete
        row.remove(); // Xóa dòng khỏi bảng
  
        // Cập nhật tổng giá sau khi xóa sản phẩm
        updateTotalPrice();
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
  