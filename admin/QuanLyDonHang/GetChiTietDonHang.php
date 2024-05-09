<?php

// print_r($_GET);

if ((isset($_GET)) && ($_GET['act'] == 'show-form')) { // Load lên form
    echo 'here';
    $maDonHang = $_GET['maDonHang'];
    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');
        if ($conn == true) {
            $query = "SELECT * from donhang where MaDonHang = {$maDonHang}";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                if ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="row">
                            <div class="col mb-2">
                                <label for="maDonHang" class="form-label">Mã đơn hàng</label>
                                <input type="text" class="form-control" id="maDonHang" name="maDonHang" value="'.$row['MaDonHang'].'" readonly>
                            </div>
                            <div class="col mb-2">
                                <label for="ngayTao" class="form-label">Ngày đặt</label>
                                <input type="text" class="form-control" id="ngayTao" name="ngayTao" value="'.$row['NgayTao'].'" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="hoTen" class="form-label">Người nhận</label>
                                <input type="text" class="form-control" id="hoTen" name="hoTen" value="'.$row['HoTen'].'">
                            </div> 
                            <div class="col mb-2">
                                <label for="soDienThoai" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="'.$row['SoDienThoai'].'">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tongTien" class="form-label">Tổng tiền</label>
                            <input type="text" class="form-control" id="tongTien" name="tongTien" value="'.number_format($row["tongtien"], 0, ',', '.').'">
                        </div>
                        <div class="mb-2">
                            <label for="diaChiGiaoHang" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="diaChiGiaoHang" name="diaChiGiaoHang" value="'.$row['DiaChiGiaoHang'].'">
                        </div>
                        <div class="mb-2">
                            <label for="phuongThucThanhToan" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="phuongThucThanhToan" name="phuongThucThanhToan" value="'.$row['PhuongThucThanhToan'].'">
                        </div>
                    ';
                }
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

if (isset($_GET['act']) && ($_GET['act'] === 'load-row')) { // Load lại row sau khi update
    $maDonHang = $_GET['maDonHang'];
    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');
        if ($conn == true) {
            $query = "SELECT * from donhang where MaDonHang = {$maDonHang}";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                if ($row = mysqli_fetch_assoc($result)) {
                    echo '
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
                    ';
                }
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>