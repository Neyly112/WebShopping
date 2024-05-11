<!-- Footer -->
<footer class="text-center text-lg-start text-dark" style="background-color: beige">
    <!-- Grid container -->
    <div class="container-fluid p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold display-4">SOLLIESS</h6>
                    <p>Chúng tôi không chỉ cung cấp quần áo, mà chúng tôi còn mang đến một trải nghiệm mua sắm đầy sáng tạo và thú vị. Với sứ mệnh làm mới phong cách và thúc đẩy sự tự tin, chúng tôi không ngừng tìm kiếm những xu hướng thời trang mới nhất và độc đáo nhất từ khắp nơi trên thế giới.</p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold text-dark">BỘ SƯU TẬP</h6>
                    <div class="list-group list-group-flush" style="background-color: beige;">
                        <?php
                        include('./dbconnect.php');

                        $sql = "SELECT * FROM loai";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <a href="index.php?act=listSp&MaLoai=<?php echo $row['MaLoai']; ?>" class="list-group-item text-dark border-0" style="background-color: beige;"><?php echo $row['TenLoai']; ?></a>
                            <?php
                            }
                        } else {
                            ?>
                            <p>Không có loại sản phẩm nào.</p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Liên hệ</h6>
                    <p><i class="fas fa-home mr-3"></i>Địa chỉ : Tân phong , Quận 7 , TPHCM</p>
                    <p><i class="fas fa-envelope mr-3"></i>Email : solliess@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i>Hotline 1: 01 234 567 88</p>
                    <p><i class="fas fa-print mr-3"></i> Hotline 2 : 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <!-- Section: Social media links -->
        <section class="p-3 pt-0">
            <div class="row d-flex align-items-center">
                <!-- Grid column -->
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <!-- Copyright -->
                    <div class="p-3">
                        © 2020 Copyright:
                        <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                    </div>
                    <!-- Copyright -->
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                    <!-- Facebook -->
                    <a class="btn btn-outline-dark btn-floating m-1" role="button" href="https://m.me/baotran53?hash=AbYwrnd48PUpeKNE"><img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook"></a>

                    <!-- Zalo -->
                    <a class="btn btn-outline-dark btn-floating m-1" role="button" href="https://zalo.me/0836982239"><img src="https://img.icons8.com/color/48/zalo.png" alt="Zalo"></a>

                    <!-- Google -->
                    <a class="btn btn-outline-dark btn-floating m-1" role="button" href="#"><img src="https://img.icons8.com/color/48/google-logo.png" alt="Google"></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-dark btn-floating m-1" role="button" href="https://www.instagram.com/ongnau53"><img src="https://img.icons8.com/fluency/48/instagram-new.png" alt="Instagram"></a>
                </div>
                <!-- Grid column -->
            </div>
        </section>
        <!-- Section: Social media links -->
    </div>
    <!-- Grid container -->
</footer>
<!-- Footer -->

<!-- End of .container -->