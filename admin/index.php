<div>
    <?php
    include "../model/pdo.php";
    include "./header_admin.php";
    ?>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<div>
    <?php


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

                include "../view/CapNhatSanPham/CapNhatSP.php";
                break;
            case 'xoaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql2 = "DELETE FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    pdo_executer($sql2);
                }
                // echo("<meta http-equiv='refresh' content='1'>");
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include "../view/CapNhatSanPham/DanhSachSp.php";
                break;
            case 'dssp':
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include '../view/CapNhatSanPham/DanhSachSp.php';
                break;
            case 'suaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql = "SELECT * FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                    $MaLoai = $dm['MaLoai'];
                    $sql1 = "SELECT TenLoai FROM `loai` WHERE MaLoai = $MaLoai";
                    $result = pdo_query_one($sql1);
                    $tenLoai = $result['TenLoai'];
                }
                include "../view/CapNhatSanPham/SuaSp.php";
                break;
            case 'capnhatSP':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenLoai = $_POST['loaiDo'];
                    $sql1 = "SELECT MaLoai FROM `loai` WHERE TenLoai = '$tenLoai'";
                    $result = pdo_query_one($sql1);
                    if ($result > 0) {
                        $MaLoaiN = $result["MaLoai"];
                        $TenSP = $_POST['ten'];
                        $giaBan = $_POST['gia'];
                        $MaSanPham = $_POST['MaSanPham'];
                        $image = $_FILES['image1']['name'];
                        $path = "./view/Uploads/";
                        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                        $filename = time() . "." . $image_ext;
                        $target_file = $path . $filename;
                        move_uploaded_file($_FILES['image1']['tmp_name'], $target_file);
                        $sql = "UPDATE `sanpham` SET `MaLoai`='$MaLoaiN', `TenSanPham`='" . $TenSP . "',`HinhAnh`='" . $filename . "',`MoTa`='ao',`GiaBan`='" . $giaBan . "' WHERE MaSanPham=" . $MaSanPham;
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
                include "../view/CapNhatSanPham/DanhSachSp.php";
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
                include "../view/LoaiSanPham/ThemLoaiSP.php";
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
                        echo '</script>';
                    }
                }

                $list = pdo_query($sql1);
                include "../view/LoaiSanPham/DanhSachLoaiSp.php";
                break;
            case "dslsp":
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "../view/LoaiSanPham/DanhSachLoaiSp.php";
                break;
            case 'suaLoai':
                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $sql = "SELECT * FROM `loai` WHERE MaLoai=" . $_GET['MaLoai'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                }
                include "../view/LoaiSanPham/SuaLoaiSP.php";
                break;
            case 'capnhatLoaiSP':
                if (isset($_POST['capnhatLoai']) && ($_POST['capnhatLoai'])) {
                    $TenLoai = $_POST['tenloai'];
                    $MaLoai = $_POST['MaLoai'];
                    $sql = "UPDATE `loai` SET `TenLoai`='" . $TenLoai . "' WHERE MaLoai=" . $MaLoai;
                    pdo_executer($sql);
                    echo '<script language="javascript">';
                    echo 'alert("Cập nhật thành công")';
                    echo '</script>';
                }
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "../view/LoaiSanPham/ThemLoaiSP.php";
                break;

            case 'tc':
                include "../index.php";
                break;
            case 'listSp':
                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $maLoai = $_GET['MaLoai'];
                    $sql = "SELECT `TenLoai` FROM `loai` WHERE MaLoai =" . $_GET['MaLoai'];
                    $query = pdo_query_one($sql);
                    $tenLoai = $query['TenLoai'];
                }
                include '../view/TrangChu/SpTheoDanhMuc.php';
                break;
            case 'search':
                if ($_POST['nameSearch']) {
                    $search = $_POST['nameSearch'];
                } else {
                    $search = '//';
                }
                include '../view/Search/Search.php';
                break;
            case 'chitietsp':
                $sql = "SELECT * FROM `sanpham` WHERE MaSanPham =" . $_GET['MaSanPham'];
                $result = pdo_query_one($sql);
                $image = $result['HinhAnh'];
                $giaBan = $result['GiaBan'];
                $moTa = $result['MoTa'];
                $maSP = $result['MaSanPham'];
                include '../view/TrangChu/product.php';
                break;
        }
    } else {
        include "index.php";
    }


    ?>
</div>

<div>
    <?php
    include "../view/Footer.php";
    ?>
</div>