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
    <div class="container ">
      <div class="card ">
        <div class="row">
          <div class="card-body">
            <div class="">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5 fw-bold ">
                    <h3>THÔNG TIN LOẠI SẢN PHẨM</h3>
                  </div>
                </div>
              </div>
              <form action="#!" method="post">
                <div class="row gy-3 gy-md-4 overflow-hidden  ">
                  <div class="col-8">
                    <label for="email" class="form-label fw-bold">Mã loại
                      <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="maLoai" id="text" placeholder="" required disabled>
                  </div>
                  <div class="col-8">
                    <label for="email" class="form-label fw-bold">Tên loại
                      <span class="text-danger">*</span></label>
                    <input type="name" class="form-control" name="tenLoai" id="name" placeholder="" required>
                  </div>

                  <div class="col-6 justify-content-center align-items-center ">
                    <div class="">
                      <div class="">
                        <a href="index.php?act=dslsp ">
                          <input class="btn btn-primary mx-auto" type="button" value="Danh sách loại sản phẩm">
                        </a>
                        <input class="btn btn-primary mx-auto" type="submit" value="Thêm loại sản phẩm" name="ok" id="ok">
                      </div>
                    </div>
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