<!-- add_to_favorites.php -->
<?php
// Kết nối cơ sở dữ liệu
include('./dbconnect.php');

// Kiểm tra xem có dữ liệu được gửi từ AJAX không
if (isset($_POST['MaSanPham'])) {
    $MaSanPham = $_POST['MaSanPham'];

  
    $sql = "INSERT INTO DsYeuThich (MaSanPham) VALUES ('$MaSanPham')";
    if (mysqli_query($conn, $sql)) {
        echo "Thêm sản phẩm vào danh sách yêu thích thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Không có dữ liệu gửi đi!";
}

// Đóng kết nối
mysqli_close($conn);
?>
