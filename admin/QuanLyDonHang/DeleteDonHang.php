<?php

// print_r($_GET);

if (isset($_GET) && $_GET) {
    $maDonHang = $_GET['maDonHang'];

    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');
        if ($conn == true) {
            $query = "DELETE from donhang where MaDonHang = {$maDonHang}";
            
            if ($conn->execute_query($query) == true) {
                echo json_encode(array('status' => true, 'message' => 'Xóa thành công'));
            }
            else {
                echo json_encode(array('status' => false, 'message' => 'Xóa không thành công'));
            }
        }
    } catch (Exception $ex) {
        die(json_encode(array('status' => false, 'message' => $ex->getMessage())));
    }
}

?>