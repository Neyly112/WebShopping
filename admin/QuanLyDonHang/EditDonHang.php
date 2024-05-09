<?php

// print_r($_POST);

if (isset($_POST) && $_POST) {
    $maDonHang = $_POST['maDonHang'];
    $hoTen = $_POST['hoTen'];
    $tongTien = $_POST['tongTien'];
    $diaChiGiaoHang = $_POST['diaChiGiaoHang'];
    $soDienThoai = $_POST['soDienThoai'];
    $phuongThucThanhToan = $_POST['phuongThucThanhToan'];

    $tien = str_replace('.', '', $tongTien);

    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');
        if ($conn == true) {
            $query = "UPDATE donhang set HoTen = N'{$hoTen}', tongtien = {$tien} ,DiaChiGiaoHang = N'{$diaChiGiaoHang}', SoDienThoai = '{$soDienThoai}', 
            PhuongThucThanhToan = N'{$phuongThucThanhToan}' where MaDonHang = {$maDonHang}";
            
            if ($conn->execute_query($query) == true) {
                echo json_encode(array('status' => true, 'message' => 'Sửa thành công'));
            }
            else {
                echo json_encode(array('status' => false, 'message' => 'Sửa không thành công'));
            }
        }
    } catch (Exception $ex) {
        die(json_encode(array('status' => false, 'message' => $ex->getMessage())));
    }
    // print_r($_POST);
}
