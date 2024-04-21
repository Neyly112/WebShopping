<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CẬP NHẬT SẢN PHẨM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
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

            <div class="card align-items-center shadow-sm">
                <div class="row g-0">
                    <div class="col-6 col-md-12">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 fw-bold">
                                        <h3>CẬP NHẬT LOẠI SẢN PHẨM</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="index.php?act=capnhatLoaiSP" method="post">
                                <div class="row gy-1 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-bold">Mã loại
                                            <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" name="maloailoai" id="ten" placeholder="" value="<?php if (isset($TenSanPham) && ($TenSanPham != ""))
                                                                                                                                        echo $TenSanPham; ?>" required disabled>
                                    </div>
                                    <div class="col-12">

                                        <label for="email" class="form-label fw-bold">Tên loại
                                            <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" name="tenloai" id="ten" placeholder="" value="<?php if (isset($TenSanPham) && ($TenSanPham != ""))
                                                                                                                                    echo $TenSanPham; ?>" required>
                                    </div>
                                    <input class="btn btn-primary" type="hidden" value="<?php if (isset($MaLoai) && ($MaLoai != ""))
                                                                                            echo $MaLoai; ?>" name="MaLoai">

                                    <div class="col-12">
                                        <div class="d-grid row">
                                            <input class="btn bsb-btn-ml btn-primary" type="submit" id="capnhatLoai" name="capnhatLoai" value="Cập Nhật">

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