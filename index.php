<?php
session_start();
include "./model/pdo.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1.0" name="viewport">
    <title>SOLLIESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Liên kết JS Jquery bằng CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->

    <style>
        /* Xóa viền của các nút */
        .btn.btn-outline-dark.btn-floating {
            border: none;
        }

        /* Tạo khung tròn cho hình ảnh */
        .btn.btn-outline-dark.btn-floating img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
    </style>
    <style>
        #contactButtonFacebook {
            position: fixed;
            bottom: 90px;
            right: 20px;
            z-index: 9999;
            padding: 10px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: blink 1s infinite alternate;
        }

        #contactButtonFacebook::before {
            content: "";
            display: inline-block;
            width: 30px;
            height: 30px;
            background: url('https://img.icons8.com/color/48/000000/facebook-new.png') no-repeat;
            background-size: contain;
        }

        #contactButtonZalo {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            padding: 10px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: blink 1s infinite alternate;
        }

        #contactButtonZalo::before {
            content: "";
            display: inline-block;
            width: 30px;
            height: 30px;
            background: url('https://img.icons8.com/color/48/zalo.png') no-repeat;
            background-size: contain;
        }

        @keyframes blink {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.2);
            }
        }

        #contactForm {
            position: fixed;
            bottom: 70px;
            right: 20px;
            z-index: 9998;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: none;
        }
    </style>
</head>

<body>

    <!-- Nút tròn hiệu ứng gồm nút facebook và zalo góc dưới phải -->
    <button id="contactButtonFacebook"></button>
    <button id="contactButtonZalo"></button>
    <script>
        document.getElementById("contactButtonFacebook").addEventListener("click", function() {
            window.open("https://m.me/baotran53?hash=AbYwrnd48PUpeKNE", "_blank");
        });

        document.getElementById("contactButtonZalo").addEventListener("click", function() {
            window.open("https://zalo.me/0836982239", "_blank");
        });
    </script>

    <div class="container-fluid mb-3">
        <?php
        include "./view/header.php";
        ?>
    </div>

    <div class="container mb-3">

        <?php

        if (isset($_GET['act'])) {

            if (isset($_SESSION["DanhSachDonHang"]) == false) { //Khởi tạo biến session danh sách đơn hàng
                $_SESSION['DanhSachDonHang'] = [];
            }

            $act = $_GET['act'];
            switch ($act) {
                case 'gtyt':
                    include('./dbconnect.php');
                    $sql = "SELECT DISTINCT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan,SP.MoTa FROM `sanphamgiohang` DSYT, `SanPham` SP WHERE DSYT.MaSanPham=SP.MaSanPham";
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
                    include "./crud/crud_giohang/index.php";
                    mysqli_close($conn);
                    break;

                case 'tc':
                    include "./view/TrangChu/TrangChu.php";
                    break;

                case 'gttt':
                    include "./view/ThongTin/ThongTin.php";
                    break;

                case 'xoagiohang':

                    $sql1 = "SELECT * FROM `sanphamgiohang`";
                    $list = pdo_query($sql1);


                    if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                        $sql2 = "DELETE FROM `sanphamgiohang` WHERE MaSanPham=" . $_GET['MaSanPham'];
                        try {
                            if (!pdo_executer($sql2)) {
                                echo '<script language="javascript">';
                                //echo 'alert("Xóa thành công")';
                                echo '</script>';
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("Lỗi")';
                                echo '</script>';
                            }
                        } catch (Exception $e) {
                            echo  '<script language="javascript">';
                            echo 'alert("Lỗi. Loại đang được gắn với sản phẩm")';
                            echo '</script>';;
                        }
                    }

                    $list = pdo_query($sql1);
                    include "./crud/crud_giohang/index.php";
                    break;

                case 'addcart':
                    if (isset($_GET['MaSanPham'])) {
                        $MaSanPham = $_GET['MaSanPham'];
                        $sql = "INSERT INTO sanphamgiohang (MaSanPham) VALUES ('$MaSanPham')";
                        pdo_executer($sql);
                        $thongbao = "Thêm Thành Công";
                    }
                    include "./view/TrangChu/TrangChu.php";
                    break;

                case 'buy':
                    include "./view/DatHang/Dathang.php";
                    break;

                case 'buycart':
                    include "./view/DatHang/Dathang_to_cart.php";
                    break;

                case 'listSp':
                    if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                        $maLoai = $_GET['MaLoai'];
                        $sql = "SELECT `TenLoai` FROM `loai` WHERE MaLoai =" . $_GET['MaLoai'];
                        $query = pdo_query_one($sql);
                        $tenLoai = $query['TenLoai'];
                    }
                    include './view/TrangChu/SpTheoDanhMuc.php';
                    break;
                case 'search':
                    if ($_POST['nameSearch']) {
                        $search = $_POST['nameSearch'];
                    } else {
                        $search = '//';
                    }
                    include './view/Search/Search.php';
                    break;

                case 'datdonhang':
                    if (isset($_GET['MaSanPham'])) {
                        $MaDonHang = rand(1000, 9999); // Tạo số ngẫu nhiên từ 1000 đến 9999
                        $MaSanPham = $_GET['MaSanPham'];
                        $tongGiaBan = $_GET['tonggiaban'];
                        $soluong = $_GET['soluong'];
                        $hoten = $_GET['hoten'];
                        $sdt = $_GET['sdt'];
                        $diachi = $_GET['diachi'];

                        $sql = "INSERT INTO donhang (MaDonHang, tongtien, HoTen, SoDienThoai, DiaChiGiaoHang) VALUES ('$MaDonHang', '$tongGiaBan', '$hoten', '$sdt', '$diachi')";
                        pdo_executer($sql);
                        $sql2 = "INSERT INTO ctdh (MaDonHang, MaSanPham, soluong) VALUES ('$MaDonHang', '$MaSanPham', '$soluong')";
                        pdo_executer($sql2);

                        $_SESSION['DanhSachDonHang'][] = $MaDonHang;

                        $thongbao = "Đặt hàng thành công";
                        header("Location: ./view/DatHang/hoantatthanhtoan.php?act=hoantatthanhtoan&MaDonHang=$MaDonHang");
                        exit();
                    } else {
                        $thongbao = "lỗi";
                    }
                    include "./view/TrangChu/TrangChu.php";
                    break;

                case 'datnhieusanpham':
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        // Lấy dữ liệu từ POST

                        $tongGiaBan = $_GET['tonggiaban'];

                        $hoten = $_GET['hoten'];
                        $soDienThoai = $_GET['sdt'];
                        $diachi = $_GET['diachi'];
                        $selectedProductIds = $_GET['product_ids'];
                        $quantities = $_GET['quantities'];

                        $MaDonHang = rand(1000, 9999);
                        $sql = "INSERT INTO donhang (MaDonHang, tongtien, HoTen, SoDienThoai, DiaChiGiaoHang) VALUES ('$MaDonHang', '$tongGiaBan', '$hoten', '$soDienThoai', '$diachi')";
                        pdo_executer($sql);

                        for ($i = 0; $i < count($selectedProductIds); $i++) {
                            $MaSanPham = $selectedProductIds[$i];
                            $soluong = $quantities[$i];

                            $sql2 = "INSERT INTO ctdh (MaDonHang, MaSanPham, soluong) VALUES ('$MaDonHang', '$MaSanPham', '$soluong')";
                            pdo_executer($sql2);
                        }

                        $_SESSION['DanhSachDonHang'][] = $MaDonHang;

                        $thongbao = "Đặt hàng thành công";
                        header("Location: ./view/DatHang/hoantatthanhtoan.php?act=hoantatthanhtoan&MaDonHang=$MaDonHang");
                        exit();
                    } else {
                        // Xử lý trường hợp không thành công
                        $thongbao = "Lỗi khi đặt hàng";
                    }
                    include "./view/TrangChu/TrangChu.php";
                    break;

                case 'dangnhap':
                    include "./view/DangNhap/DangNhap.php";
                    break;

                case 'chitietsp':
                    $sql = "SELECT * FROM `sanpham` WHERE MaSanPham =" . $_GET['MaSanPham'];
                    $result = pdo_query_one($sql);
                    $image = $result['HinhAnh'];
                    $giaBan = $result['GiaBan'];
                    $moTa = $result['MoTa'];
                    $maSP = $result['MaSanPham'];

                    include './view/TrangChu/product.php';
                    break;

                case 'muachitietsp':
                    $sql = "SELECT * FROM `sanpham` WHERE MaSanPham =" . $_GET['MaSanPham'];
                    $result = pdo_query_one($sql);
                    $hinhanh = $result['HinhAnh'];
                    $giaBan = $result['GiaBan'];
                    $ten = $result['TenSanPham'];
                    $moTa = $result['MoTa'];
                    $maSP = $result['MaSanPham'];

                    header("Location: ./index.php?act=buy&MaSanPham=$maSP&TenSanPham=$ten&GiaBan=$giaBan&HinhAnh=$hinhanh&data-product-id=$maSP");
                    break;

                case 'qmk':
                    include './view/DangNhap/quenmk.php';
                    break;

                case 'dhct':
                    include "./view/DonHangCuaToi/DonHangCuaToi.php";
                    break;
            }
        } else {
            include "./view/TrangChu/TrangChu.php";
        }

        ?>

        <!-- Phần thông báo -->
        <div class="position-fixed top-0 end-0 mt-2 me-2">
            <div message-id="successMessage" class="alert alert-success d-none" role="alert">
                <strong>Success!</strong> Thành công
            </div>
        </div>
        <div class="position-fixed top-0 end-0 mt-2 me-2">
            <div message-id="failMessage" class="alert alert-danger d-none" role="alert">
                <strong>Fail!</strong>Thất bại
            </div>
        </div>

    </div>

    <div class="container-fluid ">
        <?php include "./view/Footer.php"; ?>
    </div>

</body>

</html>