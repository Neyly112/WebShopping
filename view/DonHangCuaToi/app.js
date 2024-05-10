// Show các sản phẩm trong đơn hàng
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
}