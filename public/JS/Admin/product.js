function openModal(modalId) {
  document.getElementById(modalId).style.display = "flex";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}

function editProduct(productId) {
  alert("Edit product with ID: " + productId);
}

const deleteButtons = document.querySelectorAll(".delete");

console.log(deleteButtons);

for (let i = 0; i < deleteButtons.length; i++) {
  deleteButtons[i].addEventListener("click", function () {
    if (confirm("Are you sure you want to delete this product?")) {
      window.location.href = `/Flash_Shop/Admin/delete_product?product_id=${deleteButtons[i].id}`;
    }
  });
}
