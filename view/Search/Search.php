
<style>
  .py-3 {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa;
    /* Customize the background color */
    padding: 20px;
    /* Add padding for spacing */
  }
</style>

<div class="container p-4 text-dark text-center" style="font-weight: 500;">
  Danh Sách Tìm Kiếm
</div>
<div class="row">
    <!-- Phần hiển thị sản phẩm (2/3) -->
    <div class="col-lg-9 mb-4">
        <div class="container mt-2">
            <div class="row" id="sanpham">
                <?php include('load_spSearch.php'); ?>
            </div>
            <div id="pagination"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="app.js" defer></script>
<script type="text/javascript" defer>

    // Thêm vào giỏ hàng
    function ThemVaoGioHang(maSanPham) { // Thẻ <a> của link sản phẩm
        console.log(maSanPham);
        $.get(`GioHangController.php?act=addSanPham&maSanPham=${maSanPham}`, function(data, status) {
            let jsonData = JSON.parse(data);
            if (jsonData['status'] == true) {
                // console.log(jsonData['message']);
                SuccessAction(jsonData['message']);
            } else {
                FailAction(jsonData['message']);
            }
        });
    }
    
</script>