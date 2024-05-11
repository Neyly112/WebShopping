<?php

if (isset($_GET) && $_GET) {
    $act = $_GET['act'];
    $maSanPham = $_GET['maSanPham'];

    try {        
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');

        if ($act == 'addSanPham') {
            $query = "INSERT INTO sanphamgiohang (MaSanPham) VALUES ({$maSanPham})";
            $result = mysqli_query($conn, $query);
            if ($result == true) {
                echo json_encode(array('status' => true, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng'));
            }
            else {
                echo json_encode(array('status' => false, 'message' => 'Sản phẩm chưa được thêm vào giỏ hàng. Vui lòng thử lại sau'));
            }
        } else if ($act == 'deleteSanPham') {
            $query = "DELETE from sanphamgiohang where MaSanPham = {$maSanPham}";
            $result = mysqli_query($conn, $query);
            if ($result == true) {
                echo json_encode(array('status' => true, 'message' => 'Xóa khỏi giỏ hàng thành công'));
            }
            else {
                echo json_encode(array('status' => false, 'message' => 'Xóa khỏi giỏ hàng không thành công'));
            }
        }

    } catch (Exception $ex) {
        die(json_encode(array('status' => false, 'message' => 'Đã xảy ra lỗi. Vui lòng thử lại sau')));
    }
}

?>
