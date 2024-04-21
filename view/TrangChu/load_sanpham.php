<!-- load_sanpham.php -->
<?php
include('./dbconnect.php'); // Đảm bảo đường dẫn đến file dbconnect.php là chính xác

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4; // Số lượng sản phẩm hiển thị trên mỗi trang
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM SanPham LIMIT $start, $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="<?=$row['HinhAnh'];?>" alt="<?=$row['TenSanPham'];?>" class="card-img-top" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['TenSanPham'];?></h5>
                    <p class="card-text"><?=$row['MoTa'];?></p>
                    <p class="card-text" style="color: red;">Giá: <?=$row['GiaBan'];?>đ</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">

                        <!-- trai tim -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" id="heart" data-MaSanPham="<?=$row['MaSanPham'];?>">
    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.090.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
</svg>


                        <!-- gio hang -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-dash rounded-svg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                        </svg>

                        <a href="#" class="btn btn-success">MUA</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
