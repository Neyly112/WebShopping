CREATE DATABASE IF NOT EXISTS `qlbh` ;
USE `qlbh`;

CREATE TABLE `NguoiDung` (
  `MaNguoiDung` int PRIMARY KEY,
  `TenNguoiDung` varchar(255),
  `SoDienThoai` varchar(255),
  `Email` varchar(255),
  `DiaChi` varchar(255),
  `MatKhau` varchar(255),
  `VaiTro` varchar(255) COMMENT 'admin, user'
);

CREATE TABLE `SanPham` (
  `MaSanPham` int PRIMARY KEY,
  `MaLoai` int,
  `TenSanPham` varchar(255),
  `HinhAnh` varchar(255),
  `MoTa` varchar(255),
  `GiaBan` varchar(255)
);

CREATE TABLE `Loai` (
  `MaLoai` int PRIMARY KEY,
  `TenLoai` varchar(255)
);

CREATE TABLE `SanPhamGioHang` (
  `MaGioHang` int PRIMARY KEY,
  `MaSanPham` int,
  `SoLuongMua` int
);

CREATE TABLE `DonHang` (
  `MaDonHang` int PRIMARY KEY,
  `NgayTao` date,
  `PhuongThucThanhToan` varchar(255),
  `MaNguoiDung` int,
  `HoTen` varchar(255),
  `SoDienThoai` varchar(255),
  `DiaChiGiaoHang` varchar(255),
  `TrangThai` varchar(255)
);
CREATE TABLE IF NOT EXISTS `DsYeuThich` (
  `MaSanPham` int PRIMARY KEY
);

INSERT INTO `Loai`(`MaLoai`, `TenLoai`) VALUES ('11','ao');

ALTER TABLE `SanPham` MODIFY COLUMN MaSanPham INT AUTO_INCREMENT;

ALTER TABLE `SanPham` ADD FOREIGN KEY (`MaLoai`) REFERENCES `Loai` (`MaLoai`);

ALTER TABLE `SanPhamGioHang` ADD FOREIGN KEY (`MaSanPham`) REFERENCES `SanPham` (`MaSanPham`);

ALTER TABLE `DonHang` ADD FOREIGN KEY (`MaNguoiDung`) REFERENCES `NguoiDung` (`MaNguoiDung`);

ALTER TABLE `DsYeuThich` ADD FOREIGN KEY (`MaSanPham`) REFERENCES `SanPham` (`MaSanPham`);
