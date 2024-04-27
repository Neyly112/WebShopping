  <style>
    .py-3 {
        position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; /* Customize the background color */
            padding: 20px; /* Add padding for spacing */
    }
</style>

    <!--begin navbar-->
    
    <!--end navbar-->
    <!--Page content-->
    <section class="p-3 p-md-4 p-xl-5">
      <div class="container ">
        <div class="card ">
          <div class="row g-0">
            
            <div class="">
              <div class="">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5">
                      <h3>DANH SÁCH LOẠI SẢN PHẨM</h3>
                    </div>
                  </div>
                </div>
                <form action="#!">
                  <div class="card shadow-sm">
                  <div
                    class="row gy-3 gy-md-3 overflow-hidden">
                    <div class="col-12">
                      <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã Loại Sản Phẩm</th>
                            <th>Tên Loại Sản Phẩm</th>
                            <th>Action</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($list as $item) {
                              extract($item);
                              $sua = "index.php?act=suaLoai&MaLoai= " .$MaLoai;
                              $xoa = "index.php?act=xoaLoai&MaLoai= " .$MaLoai;
                              echo '<tr> 
                              <td>'. $MaLoai .'</td>
                              <td>'. $TenLoai .'</td>
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


