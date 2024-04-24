<?php
    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
        $TenSP = $_POST['ten'];
        $giaBan = $_POST['gia'];
        $MaSanPham = $_POST['MaSanPham'];
        $MaLoai = $_POST['MaLoai'];
        $image = $_FILES['image1']['name'];
        $path = "./view/Uploads/";
        $filename = time() .".". $image_ext;
        $target_file = $path . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $sql = "UPDATE `sanpham` SET `MaLoai`='$MaLoai', `TenSanPham`='" . $TenSP . "',`HinhAnh`='" . $image . "',`MoTa`='ao',`GiaBan`='" . $giaBan . "' WHERE MaSanPham=" . $MaSanPham;
        pdo_executer($sql);
        $thongbao = "Cập Nhật Thành Công";
    }
    $sql1 = "SELECT * FROM `sanpham`";
    $list = pdo_query($sql1);

    include "./view/CapNhatSanPham/CapNhatSP.php";
    
?>