document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('buyBtn').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[name="check"]');
        var selectedProductIds = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedProductIds.push(checkbox.value);
            }
        });

        if (selectedProductIds.length > 0) {
            // Sử dụng AJAX để gửi dữ liệu lên máy chủ
            var xhr = new XMLHttpRequest();
           
            window.location.href = 'index.php?act=buycart&selectedProductIds=' + selectedProductIds.join(',') 

            xhr.send();

        } else {

            window.alert('Vui lòng chọn ít nhất một sản phẩm để mua.');

        }
    });
});
