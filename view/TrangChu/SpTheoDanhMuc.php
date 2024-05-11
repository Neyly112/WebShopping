<div class="container mt-4">
    <!--slider-->
    <div class="row">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="./view/TrangChu/sliders/Beige and White Elegant Minimalist Fashion Clothing Brand Presentation.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./view/TrangChu/sliders/2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./view/TrangChu/sliders/White Minimalist Latest Fashion Collection Facebook Cover.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- end slider-->
        <div class="row mb-4">
            <div class="col">
                
                <?php
                $maLoai = $_REQUEST['MaLoai'];
                $tenLoai = '';

                if (($conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh')) == true) {
                    $query = "SELECT TenLoai from loai where MaLoai = {$maLoai}";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        $tenLoai = $row['TenLoai'];
                    }
                }
                ?>

                <h2 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: bold; text-transform: uppercase;" class="text-center mb-4 mt-4">TẤT CẢ SẢN PHẨM LOẠI <?php echo $tenLoai ?> </h2>
            </div>
        </div>
        <div class="row">
            <!-- Phần menu bên trái (1/3) -->
            <?php include 'load_to_type.php'; ?>


            <!-- Phần hiển thị sản phẩm (2/3) -->
            <div class="col-lg-9 mb-4">
                <div class="container mt-2">
                    <div class="row" id="sanpham">
                        <?php include('load_to_dmsp.php'); ?>
                    </div>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>