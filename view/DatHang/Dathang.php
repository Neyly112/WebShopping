<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<style>
</style>

<body>
    <!--Page content-->
    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body text-black">

                            <div class="row">
                                <div class="col-lg-6 px-5 py-4">

                                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Sản
                                        phẩm</h3>


                                    <!-- lấy dữ liệu -->
                                    <?php
                                    if (isset($_GET['MaSanPham']) && isset($_GET['TenSanPham']) && isset($_GET['GiaBan']) && isset($_GET['HinhAnh'])) {
                                        $MaSanPham = $_GET['MaSanPham'];
                                        $TenSanPham = $_GET['TenSanPham'];
                                        $GiaBan = $_GET['GiaBan'];
                                        $HinhAnh = $_GET['HinhAnh'];
                                    }

                                    ?>

                                    <!-- end lấy dữ liệu -->

                                    <div class="d-flex align-items-center mb-5">
                                        <?php
                                        $imageDirectory = "./view/Uploads/";
                                        ?>

                                        <div class="flex-shrink-0">
                                            <img src="<?php echo $imageDirectory . $HinhAnh; ?>" class="img-fluid" style="width: 100px;" alt="Generic placeholder image">
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="text-primary"><?php echo  $TenSanPham; ?></h5>

                                            <div class="d-flex align-items-center">
                                                <p class="fw-bold mb-0 me-5 pe-3">Mã<?php echo $MaSanPham; ?></p>
                                                <p class="fw-bold mb-0 me-5 pe-3 " style="color: green;"><?php echo $GiaBan; ?>đ</p>
                                                <?php $soluong = 1 ?>
                                                <div class="def-number-input number-input safari_only">SL:
                                                    <input id="soluong" class="quantity fw-bold text-black" min="0" name="soluong" value="1" type="text" style="width: 50px;">
                                                </div>

                                             
                                            </div>
                                        </div>

                                    </div>


                                    <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">


                                    <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                        <h5 class="fw-bold mb-0">Tổng:</h5>
                                        <h5 class="fw-bold mb-0" id="tongGiaBan"><?php echo $GiaBan; ?></h5>
                                    </div>
                                </div>

                                <div class="col-lg-6 px-5 py-4">

                                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">THÔNG
                                        TIN NGƯỜI NHẬN</h3>

                                    <form class="mb-5">

                                        <div class="form-outline mb-3">
                                            <label class="form-label fw-bold" for="typeText">Họ
                                                Tên</label>
                                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" value minlength="19" maxlength="19" name="name" />

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label fw-bold" for="typeName">Số
                                                điện thoại</label>
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="phone" />

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label fw-bold" for="typeName">Email</label>
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="phone" />

                                        </div>
                                        <div class="form-outline mb-3">
                                            <label class="form-label fw-bold" for="typeName">Địa
                                                Chỉ</label>
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="phone" />

                                        </div>
                                        <div class="form-outline mb-3">
                                            <label class="form-label fw-bold" for="typeName">Phương
                                                Thức Thanh
                                                Toán</label>
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value="Thanh Toán Khi Nhận Hàng" name="phone" disabled />

                                        </div>

                                        <button type="button" class="btn btn-primary btn-block btn-lg">Mua</button>


                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script>
    // Lấy giá trị của số lượng từ input
    var soluongInput = document.getElementById('soluong');
    soluongInput.addEventListener('input', function() {
        // Lấy giá trị số lượng mới
        var soluong = parseInt(soluongInput.value);

        // Lấy giá trị của giá bán từ PHP
        var giaban = <?php echo $GiaBan; ?>;

        // Tính tổng giá bán
        var tongGiaBan = soluong * giaban;

        // Hiển thị tổng giá bán
        var tongGiaBanElement = document.getElementById('tongGiaBan');
        tongGiaBanElement.textContent = tongGiaBan + 'đ';
    });
</script>