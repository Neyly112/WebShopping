<?php 
    require_once "../../dbconnect.php";

    if (isset($_REQUEST["maDonHang"])) {
        $maDonHang = $_REQUEST["maDonHang"]; // Lấy mã đơn hàng
        
        if ($conn == true) {
            
            // Xóa trong chi tiết đơn hàng
            $query = "DELETE from ctdh where madonhang = {$maDonHang}";
            if (mysqli_query($conn, $query)) {
                // Xóa trong đơn hàng
                $query = "DELETE from donhang where MaDonHang = {$maDonHang}";
                if (mysqli_query($conn, $query)) {
                    echo json_encode(array("status" => true, "data" => "Hủy đơn hàng thành công"));
                }
            }
            else {
                echo json_encode(array("status" => false, "data" => "Hủy đơn hàng không thành công"));
            }
        }
        else {
            echo json_encode(array("status" => false, "data" => "Không thể thực hiện"));
        }
    }    
?>