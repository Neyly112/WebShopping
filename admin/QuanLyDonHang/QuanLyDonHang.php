<?php

// Load các đơn hàng
function ShowCacDonHang()
{
    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');
        if ($conn == true) {
            $query = 'SELECT * from donhang';
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                <tr id="' . $row['MaDonHang'] . '">
                    <td>' . $row['MaDonHang'] . '</td>
                    <td>' . $row['NgayTao'] . '</td>
                    <td>' . $row['HoTen'] . '</td>
                    <td>' . number_format($row["tongtien"], 0, ',', '.') . '</td>
                    <td>' . $row['DiaChiGiaoHang'] . '</td>
                    <td>' . $row['SoDienThoai'] . '</td>
                    <td>' . $row['PhuongThucThanhToan'] . '</td>
                    <td>                        
                    <button type="button" class="btn btn-danger float-end ms-2" data-bs-toggle="modal" data-bs-target="#modalXacNhanXoa" onclick="SetMaDonHang(this.parentNode.parentNode.id);">Xóa</button>
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalChiTietDonHang" onclick="ShowChiTietDonHang(this.parentNode.parentNode.id);">Sửa</button>
                    </td>
                </tr>                
            ';
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>
<div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Người nhận</th>
                <th>Tổng tiền</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Phương thức thanh toán</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php ShowCacDonHang(); ?>
        </tbody>
    </table>

    <!-- Modal chi tiết đơn hàng -->
    <div class="modal" id="modalChiTietDonHang">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="formChiTietDonHang" action="QuanLyDonHang/EditDonHang.php" method="post">
                        <!-- GetChiTietDonHang lên from -->
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="buttonXacNhan" type="button" class="btn btn-success" data-bs-dismiss="modal" value="" onclick="SaveThongTinDonHang();">Lưu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Model xác nhận xóa -->
    <div class="modal" id="modalXacNhanXoa">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Bạn muốn xóa đơn hàng <strong id="textMaDonHang">3000</strong>?
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="buttonXacNhanXoaDonHang" type="button" class="btn btn-success" data-bs-dismiss="modal" value="" onclick="DeleteDonHang(this.value);">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 mt-2 me-2">
        <div id="successMessage" class="alert alert-success d-none" role="alert">
            <strong>Success!</strong> Thành công
        </div>
    </div>
    <div class="position-fixed top-0 end-0 ">
        <div id="failMessage" class="alert alert-danger d-none" role="alert">
            <strong>Fail!</strong>Thất bại
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="QuanLyDonHang/app.js" defer></script>