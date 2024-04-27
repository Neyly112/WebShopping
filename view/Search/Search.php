
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
<!--begin navbar-->
<!--end navbar-->
<!--Page content-->

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




<!--end product-->

<!--end Page content-->
<!--footer-->
<!--end footer-->