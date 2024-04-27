<?php
include('./dbconnect.php');
$selectedProducts = [];

if (isset($_GET['selectedProductIds'])) {
    $selectedProductIds = explode(',', $_GET['selectedProductIds']);

    $sql = "SELECT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan, SP.MoTa FROM SanPham SP WHERE SP.MaSanPham IN ('" . implode("','", $selectedProductIds) . "')";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $selectedProducts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="./view/DatHang/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<?php $total_def = 0 ?>

<body>
    <div class="container">
        <h1 style="text-align: center;">ĐẶT HÀNG<i class="fas fa-shopping-cart"></i></h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php foreach ($selectedProducts as $row) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <?php $imageDirectory = "./view/Uploads/"; ?>
                                <div class="flex-shrink-0">
                                    <img src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" class="img-fluid" style="width: 100px;" alt="Generic placeholder image">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                                    <h5 class="text-primary"><?php echo $row['TenSanPham']; ?></h5>
                                    <div class="d-flex align-items-center">
                                        <p class="fw-bold mb-0 me-5 pe-3">Mã<?php echo $row['MaSanPham']; ?></p>
                                        <p class="fw-bold mb-0 me-5 pe-3" style="color: green;"><strong><?php echo $row['GiaBan']; ?> đ</strong></p>
                                        <?php $total_def += $row['GiaBan']; ?>
                                        <div>SL:
                                            <input class="quantity fw-bold text-black" min="0" name="soluong" value="1" type="text" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Hiển thị tổng giá bán của tất cả các sản phẩm -->
                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                    <h5 class="fw-bold mb-0">Tổng:</h5>
                    <h5 class="fw-bold mb-0" id="tongGiaBan"><?php echo $total_def; ?>đ</h5>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">THÔNG TIN NGƯỜI NHẬN</h3>
                    </div>

                    <form class="mb-5" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" style="padding: 10px;">
                                    <label class="form-label fw-bold" for="tenSP">Họ tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tenSP" id="tenSP"  required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" style="padding: 10px;">
                                    <label class="form-label fw-bold" for="giaBan">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="giaBan" id="giaBan"  required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" style="padding: 10px;">
                                    <label class="form-label fw-bold" for="mota">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mota" id="mota"  required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-outline mb-3" style="padding: 10px;">
                                    <label class="form-label fw-bold" for="typeName">Phương Thức Thanh Toán</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" id="typeName" class="form-control form-control-lg" size="17" value="Thanh Toán Khi Nhận Hàng" name="phone" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <input class="btn btn-primary btn-block btn-lg mt-3" type="submit" value="Đặt hàng" name="dathang" id="dathang">

                            </div>


                    </form>

                </div>
            </div>
</body>

</html>
<!-- JavaScript -->

<script>
    var tongGiaBan = 0;
    var soluongInputs = document.querySelectorAll('.quantity');
    var giaBans = <?php echo json_encode(array_column($selectedProducts, 'GiaBan')); ?>;

    soluongInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            var soluong = parseInt(input.value);
            tongGiaBan = 0;

            soluongInputs.forEach(function(input, i) {
                var soluong = parseInt(input.value);
                tongGiaBan += soluong * giaBans[i];
            });

            var tongGiaBanElement = document.getElementById('tongGiaBan');
            tongGiaBanElement.textContent = tongGiaBan + 'đ';
        });
    });
</script>