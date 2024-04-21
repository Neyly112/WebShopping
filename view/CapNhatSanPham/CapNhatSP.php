<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CẬP NHẬT SẢN PHẨM</title>
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
  </head>
  <style>
    .py-3 {
        position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; /* Customize the background color */
            padding: 20px; /* Add padding for spacing */
    }
</style>
  <body>
    <!--begin navbar-->
    
    <!--end navbar-->
    <!--Page content-->
    <section class="p-3 p-md-4 p-xl-5">
      <div class="container ">
        <div class="card align-items-center shadow-sm">
          <div class="row g-0">
            <div class="col-12 col-md-6">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5 fw-bold">
                      <h3>THÔNG TIN SẢN PHẨM</h3>
                    </div>
                  </div>
                </div>
                <form action="#!" method="post">
                  <div
                    class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                      <label for="email"
                        class="form-label fw-bold">Tên sản phẩm
                        <span
                          class="text-danger">*</span></label>
                      <input type="name"
                        class="form-control"
                        name="tenSP" id="name"
                        placeholder="áo"
                        required>
                    </div>
                    <div class="col-12">
                      <label for="email"
                        class="form-label fw-bold">Giá bán
                        <span
                          class="text-danger">*</span></label>
                      <input type="text"
                        class="form-control"
                        name="giaBan" id="text"
                        placeholder="500.000"
                        required>
                    </div>
                    <div class="col-12">
                      <label for="password"
                        class="form-label fw-bold">Số lượng
                        <span
                          class="text-danger">*</span></label>
                      <input type="text"
                        class="form-control"
                        name="number"
                        id="number" placeholder="10"
                        required>
                    </div>
                    <div class="col-12">
                      <label for="password"
                        class="form-label fw-bold">File hình ảnh
                        <span
                          class="text-danger">*</span></label>
                      <input class="form-control" type="file" id="myFile"
                        name="filename">
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button
                          class="btn bsb-btn-xl btn-primary"
                          type="submit">Xác Nhận</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5">
                      <h3>DANH SÁCH SẢN PHẨM</h3>
                    </div>
                  </div>
                </div>
                <form action="#!">
                  <div class="card align-items-center shadow-sm">
                  <div
                    class="row gy-3 gy-md-3 overflow-hidden">
                    <div class="col-12">
                      <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($list as $item) {
                              extract($item);
                              $sua = "index.php?act=suaSp&MaSanPham= " .$MaSanPham;
                              $xoa = "index.php?act=xoaSp&MaSanPham= " .$MaSanPham;
                              echo '<tr> 
                              <td>'. $MaSanPham .'</td>
                              <td>'. $TenSanPham .'</td>
                              <td>'. $GiaBan .'<td>
                              <td><a href="' . $sua . '" ><input class="btn btn-danger btn-sm" type="button" value="Sửa" name="" id=""> </a> <a href="' . $xoa . '"><input class="btn btn-danger btn-sm" type="button" value="Xóa" name="" id=""> </a></td>
                              ';
                            }

                          ?>
                        
                        </tbody>
                    </table>
                    
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--end product-->

    <!--end Page content-->
    <!--footer-->
    
    <!--end footer-->


