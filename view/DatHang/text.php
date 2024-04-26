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
                                    <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                        <h5 class="fw-bold mb-0">Tổng:</h5>
                                        <h5 class="fw-bold mb-0" id="tongGiaBan"><?php echo $GiaBan; ?></h5>
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
                                                        <input type="text" class="form-control" name="tenSP" id="tenSP" placeholder="Tên sản phẩm" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group" style="padding: 10px;">
                                                        <label class="form-label fw-bold" for="giaBan">Số điện thoại <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="giaBan" id="giaBan" placeholder="Giá bán" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group" style="padding: 10px;">
                                                        <label class="form-label fw-bold" for="mota">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="mota" id="mota" placeholder="Mô tả" required>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>