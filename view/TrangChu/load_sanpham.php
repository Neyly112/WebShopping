<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hàng</title>
    
    <link rel="stylesheet" type="text/css" href="./view/TrangChu/style.css" />
</head>
<body>
    <script src="./view/TrangChu/script.js"></script>

<?php
include('./dbconnect.php'); 

$limit = 12; // Số lượng sản phẩm hiển thị trên mỗi trang

// Tính tổng số sản phẩm
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM SanPham"));

// Tính tổng số trang cần phải hiển thị
$totalPages = ceil($totalRows / $limit);

$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Giới hạn trang hiện tại để đảm bảo nó không vượt quá số trang tổng cộng
$page = max(min($page, $totalPages), 1);

$start = ($page - 1) * $limit;

$sql = "SELECT * FROM SanPham LIMIT $start, $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        
        echo '<div class="col-md-3 mb-3">';
        echo '<div class="card">';
        echo '<a href="index.php?act=chitietsp&MaSanPham='.$row['MaSanPham'].'" class="link-dark link-offset-2 link-underline-opacity-0">';
        $imageDirectory = "./view/Uploads/";
        echo '<img class="img-fluid" style="width: 500px; height: 250px;" alt="Generic placeholder image" src="' . $imageDirectory . $row['HinhAnh'] . '" alt="' . $row['TenSanPham'] . '" class="card-img-top" style="width: 100%">';

        
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['TenSanPham'] . '</h5>';
        echo '<p class="card-text">Mã Sản phẩm: ' . $row['MaSanPham'] . '<br>Mô tả: ' . $row['MoTa'] . '</p>';
        echo '<p class="card-text" style="color: red;">Giá: ' . $row['GiaBan'] . 'đ</p>';
        echo '</div>';
        echo '</a>';
        echo '<div class="card-footer">';
        echo '<div class="d-flex justify-content-between">';
        
        // Thêm vào giỏ hàng
        echo '<a href="index.php?act=addcart&MaSanPham=' . $row['MaSanPham'] . '"onclick="showSuccessMessage()">';
        echo ' <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-dash rounded-svg" viewBox="0 0 16 16" data-product-id="' . $row['MaSanPham'] . '">';
        echo '<path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>';
        echo '<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>';
        echo '</svg> </a>';
        
        // Mua hàng
        echo '<a href="index.php?act=buy&MaSanPham=' . $row['MaSanPham'] . '&TenSanPham=' . $row['TenSanPham'] . '&GiaBan=' . $row['GiaBan'] . '&HinhAnh=' . $row['HinhAnh'] . '" class="btn btn-success addToCart" data-product-id="' . $row['MaSanPham'] . '">Mua hàng</a>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>'; 

  
    echo '<ul class="pagination justify-content-center">';
    $prevPage = $page - 1;
    $nextPage = $page + 1;
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $prevPage . '">Trang trước</a></li>';
    }
    if ($page < $totalPages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $nextPage . '">Trang sau</a></li>';
    }
    echo '</ul>';
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
</body>