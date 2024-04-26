
<?php
include('./dbconnect.php');


$sql = "SELECT DISTINCT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan,SP.MoTa FROM `sanphamgiohang` DSYT, `SanPham` SP WHERE DSYT.MaSanPham=SP.MaSanPham";

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
        'MoTa' => $row['MoTa'],

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

    <link rel="stylesheet" type="text/css" href="./crud/crud_giohang/style.css" />
    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
    .card {
        border: none;
        border-radius: 0;
        box-shadow: none;
        margin: 100px;
    }

    h1 {
        margin-top: 50px;
    }

    .form-check-input {
margin-right: 10px;
margin-top: 60px;
border: 1px solid #4285f4;

}

    #xoa {
        margin-top: 10px;
    }
</style>

<body>
    <div class="container">
        <h1 style="text-align: center;">
            GIỎ HÀNG
            <i class="fas fa-shopping-cart"></i>
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php foreach ($data as $row) : ?>
                    <div>
                        <input class="form-check-input" type="checkbox" name="check" id="check<?php echo $row['MaSanPham']; ?>" value="<?php echo $row['MaSanPham']; ?>">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <?php $imageDirectory = "./view/Uploads/"; ?>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" class="img-fluid" style="width: 150px;height: 200px" alt="Generic placeholder image">
                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['TenSanPham']; ?></h5>
                                        <p class="card-text">Mã sản phẩm <?php echo $row['MaSanPham']; ?></p>
                                        <p class="card-text">Mô tả <?php echo $row['MoTa']; ?></p>
                                        <p class="card-text"style="color: red;">Giá: <?php echo $row['GiaBan']; ?>đ</p>
                                      
                                    </div>


                                    <div>
                                        <a id="xoa" href="index.php?act=gtyt&MaSanPham=<?php echo $row['MaSanPham']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
        <div class="float-right">
            <button id="buyBtn" class="btn btn-success" style="font-size: 18px;">Mua hàng</button>
        </div>
    </div>



    <script src="./crud/crud_giohang/script.js"></script>


</body>

</html>