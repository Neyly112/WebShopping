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

<body>
    <!--begin navbar-->

    <!--end navbar-->
    <!--Page content-->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">

            <div class="card  shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 fw-bold">
                                        <h3>CẬP NHẬT LOẠI SẢN PHẨM</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="index.php?act=capnhatLoaiSP" method="post" enctype="multipart/form-data"  >
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-bold">Mã loại
                                            <span class="text-danger">*</span></label>
                                            <input class="btn btn-primary" type="hidden" value="<?php if (isset($MaLoai) && ($MaLoai != ""))
                                                                                            echo $MaLoai; ?>" name="MaLoai">
                                        <input type="name" class="form-control" name="maloailoai" id="ten" placeholder="" value="" required disabled>
                                    </div>
                                    <div class="col-12">

                                        <label for="email" class="form-label fw-bold">Tên loại
                                            <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" name="tenloai" id="ten" placeholder="" value="<?php if (isset($TenLoai) && ($TenLoai != ""))
                                                                                                                                    echo $TenLoai; ?>" required>
                                    </div>
                                    

                                    <div class="col-12">
                                        <div class="d-grid row">
                                            <input class="btn bsb-btn-ml btn-primary" type="submit" id="capnhatLoai" name="capnhatLoai" value="Cập Nhật">

                                        </div>
                                    </div>
                                </div>
                            </form>
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