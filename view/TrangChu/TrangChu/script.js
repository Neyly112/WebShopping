// Function to add product to cart using AJAX
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "add_to_cart.php?MaSanPham=" + productId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Show success message
            showSuccessMessage();
        }
    };
    xhr.send();
}

// Function to show the success message and auto-close it after a certain time
function showSuccessMessage() {
    var successMessage = document.createElement("div");
    successMessage.innerHTML = "Sản phẩm đã được thêm vào giỏ hàng thành công!";
    successMessage.className = "success-message";
    document.body.appendChild(successMessage);
    setTimeout(function() {
        successMessage.remove();
    }, 3000); // 3 seconds
}
