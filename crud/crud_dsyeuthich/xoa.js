$(document).ready(function() {
    $(document).on("click", ".delete", function() {
        var MaSanPham = $(this).attr('data-masanpham');
        $.ajax({
            url: "xoa_ajax.php",
            type: "POST",
            cache: false,
            data: {
                id: MaSanPham
            },
            success: function(dataResult) {
                if (dataResult == "success") {
                    // Xóa hàng trong bảng
                    $(this).closest('tr').remove();
                    alert("Xóa sản phẩm khỏi danh sách yêu thích thành công");
                } else {
                    alert("Xóa sản phẩm khỏi danh sách yêu thích thất bại");
                }
            }
        });
    });
});
