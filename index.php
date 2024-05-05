<div>
    <?php
    include "./model/pdo.php";
    include "./view/header.php";
    ?>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<div>
    <?php

    $maLoai = 17;
    if (isset($_GET['act'])) {
        $act = $_GET['act'];

        switch ($act) {
            case 'qlsp':
                if (isset($_POST['ok'])) {
                    $tenLoai = $_POST['loaiDo'];
                    $sql1 = "SELECT MaLoai FROM `loai` WHERE TenLoai = '$tenLoai'";
                    $result = pdo_query_one($sql1);
                    if ($result > 0) {
                        $maLoai = $result['MaLoai'];
                        $tenSP = $_POST['tenSP'];
                        $giaBan = $_POST['giaBan'];
                        $image = $_FILES['image']['name'];
                        $path = "./view/Uploads/";
                        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                        $filename = time() . "." . $image_ext;
                        $target_file = $path . $filename;
                        $moTa = $_POST['mota'];
                        $sql = "INSERT INTO `sanpham`(`MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES ('$maLoai','$tenSP', '$filename', '$moTa','$giaBan')";
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        pdo_executer($sql);
                        echo '<script language="javascript">';
                        echo 'alert("Thêm thành công")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Loại sản phẩm không tồn tại")';
                        echo '</script>';
                    }
                }
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);

                include "./view/CapNhatSanPham/CapNhatSP.php";
                break;
            case 'xoaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql2 = "DELETE FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    pdo_executer($sql2);
                }
                // echo("<meta http-equiv='refresh' content='1'>");
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include "./view/CapNhatSanPham/DanhSachSp.php";
                break;
            case 'dssp':
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include './view/CapNhatSanPham/DanhSachSp.php';
                break;
            case 'suaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql = "SELECT * FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                }
                include "./view/CapNhatSanPham/SuaSp.php";
                break;
            case 'capnhatSP':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $TenSP = $_POST['ten'];
                    $giaBan = $_POST['gia'];
                    $MaSanPham = $_POST['MaSanPham'];
                    $MaLoai = $_POST['MaLoai'];
                    $image = $_FILES['image1']['name'];
                    $path = "./view/Uploads/";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time() . "." . $image_ext;
                    $target_file = $path . $filename;
                    move_uploaded_file($_FILES['image1']['tmp_name'], $target_file);
                    $sql = "UPDATE `sanpham` SET `MaLoai`='$MaLoai', `TenSanPham`='" . $TenSP . "',`HinhAnh`='" . $filename . "',`MoTa`='ao',`GiaBan`='" . $giaBan . "' WHERE MaSanPham=" . $MaSanPham;
                    pdo_executer($sql);
                    $thongbao = "Cập Nhật Thành Công";
                }
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include "./view/CapNhatSanPham/DanhSachSp.php";
                break;
            case 'dm':
                if (isset($_POST['ok'])) {
                    $tenLoai = $_POST['tenLoai'];
                    $sql = "INSERT INTO `loai`(`TenLoai`) VALUES ('$tenLoai')";
                    pdo_executer($sql);
                    $thongbao = "Thêm Thành Công";
                }
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/ThemLoaiSP.php";
                break;
            case 'xoaLoai':

                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);


                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $sql2 = "DELETE FROM `loai` WHERE MaLoai=" . $_GET['MaLoai'];
                    try {
                        if (!pdo_executer($sql2)) {
                            echo '<script language="javascript">';
                            echo 'alert("Xóa thành công")';
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
                include "./view/LoaiSanPham/DanhSachLoaiSp.php";
                break;
            case "dslsp":
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/DanhSachLoaiSp.php";
                break;
            case 'suaLoai':
                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $sql = "SELECT * FROM `loai` WHERE MaLoai=" . $_GET['MaLoai'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                }
                include "./view/LoaiSanPham/SuaLoaiSP.php";
                break;
            case 'capnhatLoaiSP':
                if (isset($_POST['capnhatLoai']) && ($_POST['capnhatLoai'])) {
                    $TenLoai = $_POST['tenloai'];
                    $MaLoai = $_POST['MaLoai'];
                    $sql = "UPDATE `loai` SET `TenLoai`='" . $TenLoai . "' WHERE MaLoai=" . $MaLoai;
                    pdo_executer($sql);
                    $thongbao = "Cập Nhật Thành Công";
                }
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/ThemLoaiSP.php";
                break;
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
        }
    } else {
        include "./view/TrangChu/TrangChu.php";
    }


    ?>
</div>

<div>
<?php
    include "./view/Footer.php";
?>
</div>
