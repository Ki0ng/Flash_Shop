let form = document.getElementById("product");

function openModal(modalId) {
  document.getElementById(modalId).style.display = "flex";
  form.action = `/Flash_Shop/Admin/add_product`;
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}

function editProduct(id, name, category, price, stock, image) {
  openModal("addProductModal");

  form.innerHTML += `<input type='hidden' name='product_id' type='number' value= ${id} >`;

  form.action = `/Flash_Shop/Admin/update_product`;

  document.getElementById("productName").value = name;
  document.getElementById("category").value = category;
  document.getElementById("price").value = price;
  document.getElementById("stock").value = stock;
  document.getElementById("image_post").value = image;
}

function deleteProduct(id) {
  if (confirm("Are you sure you want to delete this product?")) {
    window.location = `/Flash_Shop/Admin/delete_product?product_id=${id}`;
  }
}
