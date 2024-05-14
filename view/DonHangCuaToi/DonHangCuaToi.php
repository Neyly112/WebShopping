<?php
function ShowCacDonHang()
{ // Show các đơn hàng vừa đặt
    try {
        require_once './dbconnect.php';
        if ($conn == true) { // Nếu kết nối thành công
            $danhSachDonHang = implode(',', $_SESSION['DanhSachDonHang']); // Tạo thành list 2343, 1243, 1245

            $query = "SELECT MaDonHang, NgayTao, HoTen, SoDienThoai, DiaChiGiaoHang, tongtien, PhuongThucThanhToan 
                            from donhang 
                            where MaDonHang in ({$danhSachDonHang}) order by NgayTao desc";
            $result = mysqli_query($conn, $query);
        } else {
            return;
        }
        while ($row = mysqli_fetch_array($result)) {
            echo '
                <div id="' . $row["MaDonHang"] . '" class="card mb-2" onclick="ShowChiTiet(this.id);">
                    <div class="card-header">
                        <p class="card-text">Đơn hàng: ' . $row["MaDonHang"] . '</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-end">Ngày tạo đơn :</div>
                            <div class="col">' . $row["NgayTao"] . '</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Người nhận :</div>
                            <div class="col">' . $row["HoTen"] . '</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Số điện thoại :</div>
                            <div class="col">' . $row["SoDienThoai"] . '</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Địa chỉ :</div>
                            <div class="col">' . $row["DiaChiGiaoHang"] . '</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Tổng tiền :</div>
                            <div class="col">' . number_format($row["tongtien"], 0, ',', '.') . " VNĐ" . '</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Phương thức thanh toán :</div>
                            <div class="col">' . $row["PhuongThucThanhToan"] . '</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#modalHuyDonHang">Hủy đơn hàng</button>
                    </div>
                </div>
            ';
        }
    } catch (Exception $ex) {
        echo '<p class="text-secondary">Bạn chưa đặt đơn hàng nào</p>';
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div id="cacDonHang" class="col-7 overflow-auto" style="height: 500px;">
            <!-- Show các đơn hàng vừa mua -->
            <?php ShowCacDonHang(); ?>
        </div>
        <div class="col-5">
            <p class="display-6">Các sản phẩm đơn hàng</p>
            <div class="overflow-auto" id="chiTietDonHang" style="height: 500px;">
                <p class="text-secondary">Vui lòng chọn đơn hàng</p>
                <!-- Load dữ liệu dựa vào ajax -->
            </div>
        </div>
    </div>

    <div class="modal" id="modalHuyDonHang">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thông báo</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p>Bạn vui lòng liên hệ chủ shop để được hỗ trợ</p>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="view/DonHangCuaToi/app.js" defer></script>