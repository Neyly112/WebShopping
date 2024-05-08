<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..') . $ds;
include "{$base_dir}/dbconnect.php";

if (isset($_REQUEST["idDonHang"])) {
    $id = $_REQUEST["idDonHang"];
    if ($conn == true) {
        // $query = "SELECT masanpham, soluong from ctdh where madonhang = {$id}";
        $query = "SELECT TenSanPham, HinhAnh, GiaBan, soluong, madonhang 
            from ctdh as ct inner join sanpham as sp on ct.masanpham = sp.MaSanPham 
            where ct.madonhang = {$id}";
        $result = mysqli_query($conn, $query);
?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <div class="border border-1 border-black d-flex align-items-center mb-3">
                <div class="flex-shrink-0">
                    <img src="./view/Uploads/<?php echo $row["HinhAnh"]; ?>" class="img-fluid" style="height: 100px; width: 100px;" alt="Generic placeholder image">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h4 class="text-primary"><?php echo $row["TenSanPham"]; ?></h4>
                    <div class="d-flex align-items-center">
                        <p class="fw-bold me-5" style="color: green;"><strong><?php echo number_format($row["GiaBan"], 0, ',', '.') . " VNĐ"; ?></strong></p>
                        <p>Số lượng: <?php echo $row["soluong"]; ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
<?php
    }
}
?>