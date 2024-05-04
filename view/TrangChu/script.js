

// Function to show the success message and auto-close it after a certain time
function showSuccessMessage() {
    var successMessage = document.createElement("div");
    successMessage.innerHTML = "Sản phẩm đã được thêm vào giỏ hàng thành công!";
    successMessage.className = "success-message";
    document.body.appendChild(successMessage);
    setTimeout(function() {
        successMessage.remove();
    }, 10000); // 3 seconds
}
