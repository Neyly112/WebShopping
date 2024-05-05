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
      <div class="card align-items-center shadow-sm">
        <div class="row g-0">
          <div class="card-body p-3 p-md-4 ">

            <div class="row">
              <div class="col-12">
                <div class="mb-5 fw-bold ">
                  <h3>ĐỔI MẬT KHẨU</h3>
                </div>
              </div>
            </div>
            <form action="../view/TaiKhoan/checkmk.php" method="POST">
              <div class="row gy-3 gy-md-4 overflow-hidden  ">
              <div class="col-8">
                  <label for="email" class="form-label fw-bold">Email 
                    <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email" id="text" placeholder="" >
                </div>
                <div class="col-8">
                  <label for="password" class="form-label fw-bold">Mật khẩu hiện tại
                    <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="password" id="text" placeholder="" >
                </div>
                <div class="col-8">
                  <label for="mkm" class="form-label fw-bold">Mật khẩu mới
                    <span class="text-danger">*</span></label>
                  <input type="name" class="form-control" name="mkm" id="name" placeholder="" required>
                </div>

                <div class="col-6 justify-content-center align-items-center ">
                  <div class="">
                    <div class="">
                      <a >
                        <input class="btn btn-primary mx-auto" type="submit" value="Xác nhận">
                      </a>
                     
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>

 