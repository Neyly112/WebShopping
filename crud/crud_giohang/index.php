<?php
$_SESSION['title'] = 'Giỏ hàng';

include('./dbconnect.php');


$sql = "SELECT DISTINCT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan,SP.MoTa FROM `sanphamgiohang` DSYT, `SanPham` SP WHERE DSYT.MaSanPham=SP.MaSanPham";

// Thực thi câu truy vấn SQL để lấy về dữ liệu
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
?>

<script type="text/javascript" src="./crud/crud_giohang/script.js" defer></script>
<link rel="stylesheet" type="text/css" href="./crud/crud_giohang/style.css" />
<style>
    .card {
        border: none;
        border-radius: 0;
        box-shadow: none;
        margin: 100px;
    }

    h1 {
        margin-top: 50px;
    }

    .form-check-input {
        margin-right: 10px;
        margin-top: 60px;
        border: 1px solid #4285f4;

    }

    #xoa {
        margin-top: 10px;
    }
</style>
<section>

    <div class="container">
        <h1 style="text-align: center;">GIỎ HÀNG <i class="fas fa-shopping-cart"></i></h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php foreach ($data as $row) : ?>
                    <div sanpham-id="<?php echo $row['MaSanPham']; ?>">
                        <input class="form-check-input" type="checkbox" name="check" id="check<?php echo $row['MaSanPham']; ?>" value="<?php echo $row['MaSanPham']; ?>">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <?php $imageDirectory = "./view/Uploads/"; ?>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" class="img-fluid" style="width: 150px;height: 200px" alt="Generic placeholder image">
                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['TenSanPham']; ?></h5>
                                        <p class="card-text">Mã <?php echo $row['MaSanPham']; ?></p>
                                        <p class="card-text" style="color: red;"><strong><?php echo $row['GiaBan']; ?>đ</strong></p>
                                    </div>
                                    <div>
                                        <!-- <a id="xoa" href="index.php?act=xoagiohang&MaSanPham=<?php //echo $row['MaSanPham']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a> -->
                                        <a sanpham-id="<?php echo $row['MaSanPham']; ?>" href="javascript:void(0);" class="btn btn-danger" onclick="XoaSanPham($(this).attr('sanpham-id'));">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-right">
                <button id="buyBtn" class="btn btn-success" style="font-size: 18px;">Mua hàng</button>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" defer>

// Xóa sản phẩm khỏi giỏ hàng
function XoaSanPham(maSanPham) {
    console.log(maSanPham);
    $.get(`GioHangController.php?act=deleteSanPham&maSanPham=${maSanPham}`, function(data, status) {
        // console.log(data);
        let jsonData = JSON.parse(data);
        if (jsonData['status'] == true) {
            // Xóa element
            $(`div[sanpham-id=${maSanPham}]`).remove();
        }
    });
}

</script>