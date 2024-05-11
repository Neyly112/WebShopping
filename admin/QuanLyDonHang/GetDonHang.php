<?php

if (isset($_GET) && ($_GET)) {

    $searchValue = $_GET['searchValue'];

    try {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'qlbh');

        if (($searchValue != null) and ($searchValue != "")) {
            $query = "SELECT * from donhang where MaDonHang like '%{$searchValue}%' or HoTen like N'%{$searchValue}%'";
        } else {
            $query = "SELECT * from donhang";            
        }

        // echo $query;

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

    } catch (Exception $ex) {
        echo 'Vui lòng quay lại sau';
    }
}
