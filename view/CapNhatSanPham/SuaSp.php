<?php
if (is_array($dm)) {
    extract($dm);
}
//hien thi tên vừa chọn echo $name;
?>
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
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">

            <div class="card shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 fw-bold">
                                        <h3>CẬP NHẬT SẢN PHẨM</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="index.php?act=capnhatSP" method="post" enctype="multipart/form-data">
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="text" class="form-label fw-bold">Tên sản phẩm
                                            <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" name="ten" id="ten" placeholder="" value="<?php if (isset($TenSanPham) && ($TenSanPham != ""))
                                                                                                                                echo $TenSanPham; ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="text" class="form-label fw-bold">Giá bán
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="gia" id="gia" placeholder="" value="<?php if (isset($GiaBan) && ($GiaBan != ""))
                                                                                                                                echo $GiaBan; ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="text" class="form-label fw-bold">Loại
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="loaiDo" id="gia" placeholder="" value="<?php if (isset($tenLoai) && ($tenLoai != ""))
                                                                                                                                echo $tenLoai; ?>" required>
                                    </div>
                                    <input class="btn btn-primary" type="hidden" value="<?php if (isset($MaSanPham) && ($MaSanPham != ""))
                                                                                            echo $MaSanPham; ?>" name="MaSanPham">
                                    <input class="btn btn-primary" type="hidden" value="<?php if (isset($MaLoai) && ($MaLoai != ""))
                                                                                            echo $MaLoai; ?>" name="MaLoai">
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-bold">Mô tả
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="motaa" id="motaa" placeholder="" value="<?php if (isset($MoTa) && ($MoTa != ""))
                                                                                                                                echo $MoTa; ?>" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label fw-bold">File hình ảnh
                                            <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" id="image1" name="image1" >
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid row">
                                            <input class="btn bsb-btn-ml btn-primary" type="submit" id="capnhat" name="capnhat" value="Cập Nhật">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </section>

    <!--end product-->

    <!--end Page content-->
    <!--footer-->

    <!--end footer-->
