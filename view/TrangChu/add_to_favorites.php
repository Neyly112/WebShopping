<!-- add_to_favorites.php -->
<?php
include('./dbconnect.php');

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

mysqli_close($conn);
?>
