<?php
function ShowCacDonHang()
{ // Show các đơn hàng vừa đặt
    try {
        require_once './dbconnect.php';
        if ($conn == true) { // Nếu kết nối thành công
            $danhSachDonHang = implode(',', $_SESSION['DanhSachDonHang']);
            $query = "SELECT MaDonHang, NgayTao, HoTen, SoDienThoai, DiaChiGiaoHang, tongtien, PhuongThucThanhToan 
                            from donhang 
                            where MaDonHang in ({$danhSachDonHang})";
            $result = mysqli_query($conn, $query);
        }
        else {
            return;
        }
        while ($row = mysqli_fetch_array($result)) {
            echo '
                <div id="'.$row["MaDonHang"].'" class="card mb-2" onclick="ShowChiTiet(this.id);">
                    <div class="card-header">
                        <p class="card-text">Đơn hàng: '.$row["MaDonHang"].'</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-end">Ngày tạo đơn :</div>
                            <div class="col">'.$row["NgayTao"].'</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Người nhận :</div>
                            <div class="col">'.$row["HoTen"].'</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Số điện thoại :</div>
                            <div class="col">'.$row["SoDienThoai"].'</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Địa chỉ :</div>
                            <div class="col">'.$row["DiaChiGiaoHang"].'</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Tổng tiền :</div>
                            <div class="col">'.number_format($row["tongtien"], 0, ',', '.') . " VNĐ".'</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-end">Phương thức thanh toán :</div>
                            <div class="col">'.$row["PhuongThucThanhToan"].'</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#modalHuyDonHang">Hủy đơn hàng</button>
                    </div>
                </div>
            ';
        }
    }
    catch (Exception $ex) {
        echo '<p class="text-secondary">Bạn chưa đặt đơn hàng nào</p>';
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div id="cacDonHang" class="col-7 overflow-auto" style="height: 500px;">
            <?php ShowCacDonHang(); ?>
        </div>
        <div class="col-5">
            <p class="display-6">Chi tiết đơn hàng</p>
            <div class="overflow-auto" id="chiTietDonHang" style="height: 500px;">
                <p class="text-secondary">Vui lòng chọn đơn hàng</p>
                <!-- <div class="border border-1 border-black d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <img src="./view/Uploads/1714902443.png" class="img-fluid" style="height: 100px; width: 100px;" alt="Generic placeholder image">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="text-primary">ĐẦM SOLLIESS COTTON-ĐEN</h4>
                        <div class="d-flex align-items-center">
                            <p class="fw-bold me-5" style="color: green;"><strong>30000000 đ</strong></p>
                            <p>Số lượng: <?php echo "1"; ?></p>
                        </div>
                    </div>
                </div>

                <div class="border border-1 border-black d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <img src="./view/Uploads/1714902443.png" class="img-fluid" style="height: 100px; width: 100px;" alt="Generic placeholder image">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="text-primary">ĐẦM SOLLIESS COTTON-ĐEN</h4>
                        <div class="d-flex align-items-center">
                            <p class="fw-bold me-5" style="color: green;"><strong>30000000 đ</strong></p>
                            <p>Số lượng: <?php echo "1"; ?></p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal" id="modalHuyDonHang">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cho biết lý do</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check1" name="lyDo" value="Địa chỉ không đúng">
                        <label class="form-check-label">Địa chỉ không đúng</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check1" name="lyDo" value="Mua muốn mua thêm">
                        <label class="form-check-label">Mua muốn mua thêm</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check1" name="lyDo" value="Muốn thay đổi sản phẩm">
                        <label class="form-check-label">Muốn thay đổi sản phẩm</label>
                    </div>
                    <label for="lyDoKhac">Khác</label>
                    <textarea class="form-control" rows="3" id="lyDoKhac" name="lyDo"></textarea>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="buttonXacNhan" type="button" class="btn btn-success" data-bs-dismiss="modal" value="" onclick="HuyDonHang(this.value);">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

    <div id="thanhCong" class="alert alert-success alert-dismissable">
        <strong>Success!</strong> Hủy đơn hàng thành công.
    </div>
    <br>
    <div id="thatBai" class="alert alert-danger alert-dismissable">
        <strong>Failed!</strong> Hủy đơn hàng không thành công.
    </div>

</div>
<script defer>
    // Ẩn các alert message
    $("#thatBai").hide();
    $("#thanhCong").hide();

    function ShowChiTiet(maDonHang) {
        // console.log(maDonHang);
        $.ajax({
            url: `view/DonHangCuaToi/ajax-getChiTietDonHang.php?idDonHang=${maDonHang}`,
            method: "GET",
            success: function(response) {
                // console.log(response);
                $("#chiTietDonHang").html(response);
            }
        });

        // Đặt value cho nút xác nhạn cho dễ lấy mã
        $("#buttonXacNhan").val(maDonHang);
    }

    // Hủy đơn hàng
    function HuyDonHang(maDonHang) {
        // console.log(maDonHang);
        let url = `view/DonHangCuaToi/HuyDonHang.php?maDonHang=${maDonHang}`;
        $.get(url, function(data, status) {
            let data2 = JSON.parse(data);
            let isSuccess = data2["status"];
            if (isSuccess == true) {
                console.log("#" + maDonHang);
                $("#thanhCong").fadeIn(2000).fadeOut(2000);
                $("#" + maDonHang).remove();
            } else {
                $("#thatBai").fadeIn(2000).fadeOut(2000);
            }
        });
    }
</script>
<!-- <script src="app.js" defer></script> -->