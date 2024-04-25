document.addEventListener('DOMContentLoaded', function() {
    // Sự kiện khi người dùng thay đổi số lượng
// Sự kiện khi người dùng thay đổi số lượng
document.querySelectorAll('.quantity').forEach(function(input) {
    input.addEventListener('change', function() {
        updateQuantities(); // Cập nhật giá trị số lượng
    });
});


function updateQuantities() {
    var quantities = [];
    var checkboxes = document.querySelectorAll('input[name="check"]');
    checkboxes.forEach(function(checkbox, index) {
        if (checkbox.checked) {
            var quantityInput = document.querySelector('#quantityInput' + index);
            quantities.push(parseInt(quantityInput.value)); // Lấy giá trị số lượng từ input và đưa vào mảng
        }
    });
    return quantities;
}

    // Sự kiện khi người dùng nhấn nút "Mua hàng"
    document.getElementById('buyBtn').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[name="check"]');
        var selectedProductIds = [];
        var quantities = updateQuantities(); // Lấy giá trị số lượng mới nhất

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedProductIds.push(checkbox.value);
            }
        });

        if (selectedProductIds.length > 0 && quantities.length > 0) {
            // Sử dụng AJAX để gửi dữ liệu lên máy chủ
            var xhr = new XMLHttpRequest();
            var url = './view/DatHang/Dathang_to_cart.php?act=buycart&selectedProductIds=' + selectedProductIds.join(',') + '&quantities=' + quantities.join(',');
            var url2 = 'index.php?act=buycart&selectedProductIds=' + selectedProductIds.join(',') + '&quantities=' + quantities.join(',');

            xhr.open('GET', url, true);
            window.location.href = url2; // Chuyển hướng đến trang cần thiết
            xhr.send();

        } else {
            alert('Vui lòng chọn ít nhất một sản phẩm để mua và nhập số lượng cho mỗi sản phẩm.');
        }
    });
});
