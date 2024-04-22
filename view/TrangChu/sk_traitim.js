$(document).ready(function() {
    $('.add-to-favorites').click(function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của trình duyệt
        var MaSanPham = $(this).data('MaSanPham');
        var heartIcon = $(this).find('svg'); // Chọn thẻ SVG trong phần tử đang được nhấp vào
        $.ajax({
            url: 'add_to_favorites.php',
            method: 'POST',
            data: {MaSanPham: MaSanPham},
            success: function(response) {
                console.log(response); // In ra phản hồi từ AJAX trong Console
                alert(response); // Hiển thị thông báo
                heartIcon.css('fill', 'red'); // Thay đổi màu sắc của trái tim thành đỏ
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
