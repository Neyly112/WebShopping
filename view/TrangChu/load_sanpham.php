<script src="./view/TrangChu/script.js" defer></script>

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
?>
    <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="index.php?act=chitietsp&MaSanPham=<?php echo $row['MaSanPham']; ?>&TenSanPham=<?php echo $row['TenSanPham']; ?>&GiaBan=<?php echo $row['GiaBan']; ?>&HinhAnh=<?php echo $row['HinhAnh']; ?>&data-product-id=" <?php echo $row['MaSanPham']; ?>" class="link-dark link-offset-2 link-underline-opacity-0">
                        <?php
                        $imageDirectory = "./view/Uploads/";
                        ?>
                        <img class="img-fluid" style="width: 500px; height: 250px;" alt="Generic placeholder image" src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" alt="<?php echo $row['TenSanPham']; ?>" class="card-img-top" style="width: 100%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['TenSanPham']; ?></h5>
                            <p class="card-text">Mã <?php echo $row['MaSanPham']; ?></p>
                            <p class="card-text" style="color: red;"><?php echo $row['GiaBan']; ?>đ</p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:void(0);" data-product-id="<?php echo $row['MaSanPham']; ?>" onclick="ThemVaoGioHang($(this).attr(`data-product-id`));">
                                <!-- <a href="index.php?act=addcart&MaSanPham=<?php //echo $row['MaSanPham']; ?>" onclick="showSuccessMessage()"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-dash rounded-svg" viewBox="0 0 16 16" data-product-id="<?php echo $row['MaSanPham']; ?>">
                                    <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg>
                            </a>
                            <a href="index.php?act=buy&MaSanPham=<?php echo $row['MaSanPham']; ?>&TenSanPham=<?php echo $row['TenSanPham']; ?>&GiaBan=<?php echo $row['GiaBan']; ?>&HinhAnh=<?php echo $row['HinhAnh']; ?>" class="btn btn-success addToCart" data-product-id="<?php echo $row['MaSanPham']; ?>">Mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
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

</html>