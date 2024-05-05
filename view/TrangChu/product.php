<!DOCTYPE html>
<title>Chi tiết sản phẩm</title>
<?php

$imageDirectory = "./view/Uploads/" . $image;

$page_description = htmlspecialchars_decode(htmlspecialchars_decode($moTa));

?>

<div class='row container justify-center'>
    <div class='col-md-6' id='product-img'>
        <img src='<?php echo $imageDirectory; ?>' style='width:80%;' />
    </div>
  
    <div class='col-md-4'>
    <form method="get">
    <div class='product-detail'> <h3><?php echo $_GET['TenSanPham']; ?></h3></div>
    <div class='product-detail'><strong>Mã <?php echo $_GET['MaSanPham']; ?></strong></div>
        <div class='product-detail'><strong>Giá Bán</strong>  </div>
        <h4 style='color: red;' class='m-b-10px price-description'><?php echo $giaBan; ?></h4>
        <div class='product-detail'><strong>Mô tả</strong> </div>
        <div class='m-b-10px'>
            <?php echo $page_description; ?>
        </div>
    </div>
    <div class='col-md-2'>
   
        <button style='width:100%; margin-bottom: 10px;' type='submit' class='btn btn-primary add-to-cart'>
            <a href="index.php?act=addcart&MaSanPham=<?php echo $_GET['MaSanPham']; ?>" style="color: white; text-decoration: none;">Thêm vào giỏ hàng</a>
        </button>
        <button style='width:100%;' type='submit' class='btn btn-success'>
            <a href="index.php?act=buy&MaSanPham=<?php echo $_GET['MaSanPham']; ?>&TenSanPham=<?php echo $_GET['TenSanPham']; ?>&GiaBan=<?php echo $_GET['GiaBan']; ?>&HinhAnh=<?php echo $_GET['HinhAnh']; ?>"style="color: white; text-decoration: none;  data-product-id="<?php echo $_GET['MaSanPham']; ?>"">Mua hàng</a>
        </button>
    
    </form>
</div>

</div>
<script src="./view/TrangChu/script.js"></script>
