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
  `HinhAnh` longblob,
  `MoTa` varchar(255),
  `GiaBan` varchar(255)
);

CREATE TABLE `Loai` (
  `MaLoai` int PRIMARY KEY,
  `TenLoai` varchar(255)
);

CREATE TABLE `GioHang` (
  `MaGioHang` int PRIMARY KEY
);

CREATE TABLE `SanPhamGioHang` (
  `MaGioHang` int,
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

ALTER TABLE Loai MODIFY COLUMN MaLoai INT AUTO_INCREMENT;

ALTER TABLE SanPham MODIFY COLUMN MaSanPham INT AUTO_INCREMENT;

ALTER TABLE `SanPham` ADD FOREIGN KEY (`MaLoai`) REFERENCES `Loai` (`MaLoai`);

ALTER TABLE `GioHang` ADD FOREIGN KEY (`MaGioHang`) REFERENCES `SanPhamGioHang` (`MaGioHang`);

ALTER TABLE `SanPham` ADD FOREIGN KEY (`MaSanPham`) REFERENCES `SanPhamGioHang` (`MaSanPham`);

ALTER TABLE `GioHang` ADD FOREIGN KEY (`MaGioHang`) REFERENCES `DonHang` (`MaDonHang`);

ALTER TABLE `DonHang` ADD FOREIGN KEY (`MaDonHang`) REFERENCES `NguoiDung` (`MaNguoiDung`);
