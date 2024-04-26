

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `loai` (`MaLoai`, `TenLoai`) VALUES
(1, 'THỜI TRANG NỮ'),
(2, 'THỜI TRANG NAM'),
(3, 'NEW COLLECTION'),
(4, 'OLD COLLECTION'),
(11, 'BEST SELLER');


CREATE TABLE `donhang` (
  `MaDonHang` int(11) PRIMARY KEY AUTO_INCREMENT,
  `NgayTao` date DEFAULT CURRENT_TIMESTAMP,
  `PhuongThucThanhToan` varchar(255) DEFAULT 'Thanh toán khi nhận hàng',
  `HoTen` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `DiaChiGiaoHang` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT 'Vừa tạo đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TenSanPham` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `GiaBan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `sanpham` (`MaSanPham`, `MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES
(15, 11, 'ao', '1714097864.jpg', 'efaf', '50000'),
(17, 11, 'aoo', '1714098206.jpg', 'faas', '10000');



CREATE TABLE `sanphamgiohang` (
  `MaSanPham` int(11) DEFAULT NULL,
  `SoLuongMua` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `sanphamgiohang` (`MaSanPham`, `SoLuongMua`) VALUES
(17, 1);


ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaLoai` (`MaLoai`);


ALTER TABLE `sanphamgiohang`
  ADD KEY `MaSanPham` (`MaSanPham`);

ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);


ALTER TABLE `sanphamgiohang`
  ADD CONSTRAINT `sanphamgiohang_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);
COMMIT;

