document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('buyBtn').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[name="check"]');
        var quantityInput = document.querySelector('.quantity'); 
        var quantityValue = parseInt(quantityInput.value);

        var selectedProductIds = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedProductIds.push(checkbox.value);
            }
        });

        if (selectedProductIds.length > 0) {
            // Sử dụng AJAX để gửi dữ liệu lên máy chủ
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './view/DatHang/Dathang_to_cart.php?act=buycart&selectedProductIds=' + selectedProductIds.join(',') + '&quantity=' + quantityValue, true);
            window.location.href = 'index.php?act=buycart&selectedProductIds=' + selectedProductIds.join(',') + '&quantity=' + quantityValue;

            xhr.send();

        } else {

            alert('Vui lòng chọn ít nhất một sản phẩm để mua.');
        }
    });
});