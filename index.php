<div>
<?php
    include "./model/pdo.php";
    include "./view/header.php";
?>
</div>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>


<div>
    <?php       
       
        $maLoai = 11;
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            
            switch ($act) {
                case 'qlsp':
                    
                    if (isset($_POST['tenSP'])) {
                        $tenSP = $_POST['tenSP'];
                        $giaBan = $_POST['giaBan'];
                        $hinhAnh = $_POST['filename'];
                        $sql = "INSERT INTO `sanpham`(`MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES ('$maLoai','$tenSP', '$hinhAnh', 'ao','$giaBan')";
                        pdo_executer($sql);
                        $thongbao = "Thêm Thành Công";
                    }
                    $sql1 = "SELECT * FROM `sanpham`";
                    $list = pdo_query($sql1);
                    
                    include "./view/CapNhatSanPham/CapNhatSP.php";
                    break;
                case 'xoaSp':
                    if (isset($_POST['tenSP'])) {
                        $tenSP = $_POST['tenSP'];
                        $giaBan = $_POST['giaBan'];
                        $hinhAnh = $_POST['filename'];
                        $sql = "INSERT INTO `sanpham`(`MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES ('$maLoai','$tenSP', '$hinhAnh', 'ao','$giaBan')";
                        pdo_executer($sql);
                        $thongbao = "Thêm Thành Công";
                    }
                    $sql1 = "SELECT * FROM `sanpham`";
                    $list = pdo_query($sql1);
                    
                    
                    if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                        $sql2 = "DELETE FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                        pdo_executer($sql2);
                    }
                        //hien thị lại listphp
                    
                    $list = pdo_query($sql1);
                    include "./view/CapNhatSanPham/CapNhatSP.php";
                    break;
                case 'suaSp':
                    if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                        $sql = "SELECT * FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                        $dm = pdo_query_one($sql);//chỉ lấy 1 truy vấn
                    }
                    include "./view/CapNhatSanPham/SuaSp.php";
                    break;    
                case 'capnhatSP':

                    echo "heee";
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        echo "heee";
                        $TenSP = $_POST['ten'];
                        $giaBan = $_POST['gia'];
                        $MaSanPham = $_POST['MaSanPham'];
                        $hinhAnh = $_POST['file'];
                        $sql = "UPDATE `sanpham` SET `MaLoai`='11', `TenSanPham`='" .$TenSP. "',`HinhAnh`='" .$hinhAnh. "',`MoTa`='ao',`GiaBan`='" .$giaBan. "' WHERE MaSanPham=" .$MaSanPham;
                        pdo_executer($sql);
                        $thongbao = "Cập Nhật Thành Công";
                    }
                    
                        //hien thị lại listphp
                    $sql1 = "SELECT * FROM `sanpham`";
                    $list = pdo_query($sql1);
                    
                    include "./view/CapNhatSanPham/CapNhatSP.php";
                    break;          
                case 'tc':
                    include "./view/TrangChu/TrangChu.php";
            }
        
            
        }
        else {
            include "./view/TrangChu/TrangChu.php";
        }
        
        
    ?>

</div>

<?php
    include "./view/Footer.php";
?>
