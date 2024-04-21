
 // script.js
$(document).ready(function() {
    $('#heart').click(function() {
        var MaSanPham = $(this).data('MaSanPham');
        $.ajax({
            url: 'add_to_favorites.php',
            method: 'POST',
            data: {MaSanPham: MaSanPham},
            success: function(response) {
                console.log(response); // In ra phản hồi từ AJAX trong Console
                alert(response); // Hiển thị thông báo
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

    
    $(document).ready(function() {
        function loadProducts(page) {
            $.ajax({
                url: 'load_sanpham.php',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    $('#sanpham').html(response);
                }
            });
        }

        $(document).on('click', '.pagination li a', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            loadProducts(page);
        });
    });
