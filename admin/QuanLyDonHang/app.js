// Show chi tiết đơn hàng lền form
function ShowChiTietDonHang(maDonHang) {
    // console.log(maDonHang);
    let url = `QuanLyDonHang/GetChiTietDonHang.php?act=show-form&maDonHang=${maDonHang}`;
    $.get(url, function(data, status) {
        // console.log(data);
        $("#formChiTietDonHang").html(data);
    });
}

// Bấm nút lưu
function SaveThongTinDonHang() {
    let url = 'QuanLyDonHang/EditDonHang.php?act=edit';
    let maDonHang = $('#maDonHang').val();
    $.post(url, {
            maDonHang: $('#maDonHang').val(),
            ngayTao: $('#ngayTao').val(),
            hoTen: $('#hoTen').val(),
            soDienThoai: $('#soDienThoai').val(),
            diaChiGiaoHang: $('#diaChiGiaoHang').val(),
            phuongThucThanhToan: $('#phuongThucThanhToan').val(),
            tongTien: $('#tongTien').val(),
        },
        function(data, status) {
            // console.log(data);
            let jsonData = JSON.parse(data);
            let isSuccess = jsonData['status'];
            if (isSuccess === true) { // nếu sửa thành công
                $.get(`QuanLyDonHang/GetChiTietDonHang.php?act=load-row&maDonHang=${maDonHang}`, function(data, status) {
                    // console.log(data);
                    $('#' + maDonHang).html(data);
                    SuccessAction(jsonData['message']);
                });
            } else {
                FailAction(jsonData['message']);
            }
        });
};

// Bấm nút xác nhận xóa
function DeleteDonHang(maDonHang) {
    // console.log(maDonHang);   
    $.get(`QuanLyDonHang/DeleteDonHang.php?maDonHang=${maDonHang}`, function(data, status) {
        let jsonData = JSON.parse(data);
        let isSuccess = jsonData['status'];
        console.log(isSuccess);
        if (isSuccess === true) { // nếu xóa thành công
            $('#' + maDonHang).remove();
            SuccessAction(jsonData['message']);
        } else {
            FailAction(jsonData['message']);
        }
    });
}

// Bấm nút xóa
function SetMaDonHang(maDonHang) { // Đặt value buttonXacNhanXoa bằng maDonHang cho dễ
    $('#textMaDonHang').text(maDonHang); // Đặt text hiển thị
    $('#buttonXacNhanXoaDonHang').val(maDonHang);
    // console.log($('#buttonXacNhanXoaDonHang').val());
}

// // Kích hoạt tìm kiếm bằng Enter
// $(document).keydown(function(event) {
//     // Kiểm tra xem phím có phải là phím mà bạn muốn kích hoạt button không
//     if (event.key === 'Enter') { // Trong ví dụ này, tôi sử dụng phím Enter làm ví dụ
//         // Kích hoạt button
//         alert(event.key);
//     }
// });

let time = 2000;

function SuccessAction(message) {
    // alert('thanh cong');
    $('#successMessage').removeClass('d-none');
    $("#successMessage").html('<strong>Success!</strong> ' + message).fadeIn(100).fadeOut(time);
    // alert('end');
}

function FailAction(message) {
    $('#failMessage').removeClass('d-none');
    $("#failMessage").html('<strong>Fail!</strong> ' + message).fadeIn(100).fadeOut(time);
}