<?php
include('./dbconnect.php');

$imageDirectory = "../../products"; // Thay đổi đường dẫn tới thư mục chứa hình ảnh của sản phẩm

// Chuẩn bị câu truy vấn $sql
$sql = "SELECT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan,SP.MoTa FROM `sanphamgiohang` DSYT, `SanPham` SP WHERE DSYT.MaSanPham=SP.MaSanPham";

// Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sql);

$data = [];
$rowNum = 1;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'rowNum' => $rowNum,
        'MaSanPham' => $row['MaSanPham'],
        'HinhAnh' => $row['HinhAnh'],
        'TenSanPham' => $row['TenSanPham'],
        'GiaBan' => $row['GiaBan'],
        'MoTa'=>$row['MoTa']

    );
    $rowNum++;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hàng</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <!-- Main content -->
    <div class="container">
    <h1 style="text-align: center;">GIỎ HÀNG</h1>
    <div class="row">
        <!-- Cột hiển thị card thông tin sản phẩm -->
        <div class="col-md-8">
            <?php foreach ($data as $row) : ?>
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" alt="Product Image" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['TenSanPham']; ?></h5>
                                <p class="card-text">Mã sản phẩm <?php echo $row['MaSanPham']; ?>đ</p>
                                <p class="card-text">Mô tả <?php echo $row['MoTa']; ?>đ</p>
                                <p class="card-text">Giá: <?php echo $row['GiaBan']; ?>đ</p>
                            </div>
                            <div class="card-footer">
                                <a href="index.php?act=gtyt&MaSanPham=<?php echo $row['MaSanPham']; ?>" class="btn btn-danger">Xóa</a>
                                <a href="#" class="btn btn-success">Mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>


    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>
