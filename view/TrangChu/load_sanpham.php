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
        echo '<img src="' . $row['HinhAnh'] . '" alt="' . $row['TenSanPham'] . '" class="card-img-top" style="width:100%">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['TenSanPham'] . '</h5>';
        echo '<p class="card-text">Mã Sản phẩm: ' . $row['MaSanPham'] . '<br>Mô tả: ' . $row['MoTa'] . '</p>';
        echo '<p class="card-text" style="color: red;">Giá: ' . $row['GiaBan'] . 'đ</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<div class="d-flex justify-content-between">';
        //thêm vào ds yêu thích
        if (isset($row['MaSanPham'])) {
            $MaSanPham = "index.php?act=tc&MaSanPham=" . $row['MaSanPham'];
            echo '<a href="' . $MaSanPham . '">';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-heart" viewBox="0 0 16 16" id="heart">';
            echo '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.090.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>';
            echo '</svg>';
            echo '</a>';
        }
        // thêm vào giỏ hàng
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-dash rounded-svg" viewBox="0 0 16 16">';
        echo '<path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>';
        echo '<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>';
        echo '</svg>';
        //mua hàng
        echo '<a href="#" class="btn btn-success">MUA</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>'; // Kết thúc row

    // Hiển thị nút điều hướng trang
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
