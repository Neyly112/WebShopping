<section class="p-3 p-md-4 p-xl-5">
    <div class="container ">
      <div class="card  shadow-sm">
        <div class="row">
          
          <div class="card-body ">
            <div class="">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h3>DANH SÁCH SẢN PHẨM</h3>
                  </div>
                </div>
              </div>

              <form action="#!">
                <div class="card  shadow-sm">
                  <div class="row gy-3 gy-md-5 overflow-hidden">
                    <div class="col-12">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                            <th>Loại</th>
                            <th>Hình Ảnh</th>
                            <th>Mô tả</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        
                          <?php
                          foreach ($list as $item) {
                            $maLoai = $item["MaLoai"];
                            $sql = "SELECT TenLoai FROM `loai` WHERE MaLoai = $maLoai";
                            $result = pdo_query_one($sql);
                            $tenLoai = $result['TenLoai'];
                          ?>
                            
                            <tr>
                              <td><?= $item["MaSanPham"]; ?></td>
                              <td><?= $item["TenSanPham"]; ?></td>
                              <td><?= $item["GiaBan"]; ?></td>
                              <td><?= $tenLoai; ?></td>
                              <td> <img src="../view/uploads/<?= $item["HinhAnh"]; ?>" width="100px" height="100px"></td>
                              <td><?= $item["MoTa"]; ?></td>
                              <td><a href="<?= "index.php?act=suaSp&MaSanPham= " . $item["MaSanPham"]; ?>"><input class="btn btn-danger btn-sm" type="button" value="Sửa" name="" id=""> </a>
                                <a href="<?= "index.php?act=xoaSp&MaSanPham= " . $item["MaSanPham"]; ?>"><input class="btn btn-danger btn-sm" type="button" value="Xóa" name="" id=""> </a>
                              </td>

                            <?php
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
