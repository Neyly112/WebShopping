<?php

$imageDirectory = "./view/Uploads/" . $image;

$page_description = htmlspecialchars_decode(htmlspecialchars_decode($moTa));

?>

<div class='row container justify-center'>
    <div class='col-md-6' id='product-img'>
        <img src='<?php echo $imageDirectory; ?>' style='width:80%;' />
    </div>
    <div class='col-md-4'>
        <div class='product-detail'>Giá Bán: </div>
        <h4 style='color: red;' class='m-b-10px price-description'><?php echo $giaBan; ?></h4>
        <div class='product-detail'>Mô tả:</div>
        <div class='m-b-10px'>
            <?php echo $page_description; ?>
        </div>
    </div>
    <div class='col-md-2'>
    <form class='add-to-cart-form' onsubmit="showSuccessMessage()">
        <button style='width:100%; margin-bottom: 10px;' type='submit' class='btn btn-primary add-to-cart'>
            <a href="index.php?act=addcart&MaSanPham=<?php echo $_GET['MaSanPham']; ?>" style="color: white; text-decoration: none;">Thêm vào giỏ hàng</a>
        </button>
        <button style='width:100%;' type='submit' class='btn btn-success'>
            <a href="index.php?act=muachitietsp&MaSanPham=<?php echo $_GET['MaSanPham']; ?>" style="color: white; text-decoration: none;">Mua hàng</a>
        </button>
    </form>
</div>

</div>
<script src="./view/TrangChu/script.js"></script>
