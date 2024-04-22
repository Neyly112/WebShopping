-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2024 lúc 05:31 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayTao` date DEFAULT NULL,
  `PhuongThucThanhToan` varchar(255) DEFAULT NULL,
  `MaNguoiDung` int(11) DEFAULT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `DiaChiGiaoHang` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsyeuthich`
--

CREATE TABLE `dsyeuthich` (
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dsyeuthich`
--

INSERT INTO `dsyeuthich` (`MaSanPham`) VALUES
(1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`) VALUES
(1, 'THỜI TRANG NỮ'),
(2, 'THỜI TRANG NAM'),
(3, 'NEW COLLECTION'),
(4, 'OLD COLLECTION'),
(11, 'BEST SELLER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `TenNguoiDung` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `MatKhau` varchar(255) DEFAULT NULL,
  `VaiTro` varchar(255) DEFAULT NULL COMMENT 'admin, user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TenSanPham` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `GiaBan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES
(1, 11, 'ÁO', '__-12_7532a4063c714c05bc5108246f8d0e98_1024x1024.webp', 'ao', '10000'),
(2, 11, 'QUẦN', '__-12_ee33ed7597524ab19fbe40c0d21493f8_1024x1024.jpg', 'ao', '10000'),
(3, 11, 'taaa', 'main-02_34f02cc8f263402bab305aa9e1a35ce1_1024x1024.webp', 'ao', '1000'),
(4, 11, 'áo', '__-12_ee33ed7597524ab19fbe40c0d21493f8_1024x1024.jpg', 'ao', '1000'),
(5, 11, '11', 'main-02_34f02cc8f263402bab305aa9e1a35ce1_1024x1024.webp', 'ao', '12323'),
(6, 11, '1', 'IMG_6526_result.webp', 'ao', '2'),
(7, 11, '2232', 'NAAU8636.jpg', 'ao', '123'),
(8, 11, 'tr', 'Apparel and Accessories TikTok In-Feed Ad in White Grey Minimalist Monotone Style Mobile Video.jpg', 'ao', 'asd'),
(9, 11, 'asd', 'Apparel and Accessories TikTok In-Feed Ad in White Grey Minimalist Monotone Style Mobile Video.jpg', 'ao', 'sda'),
(10, 11, 'qweew', 'Ecru White Modern Elegant Minimal Women_s Fashion Clothing Collection Instagram Story.png', 'ao', 'we2'),
(11, 11, '10', '__-12_ee33ed7597524ab19fbe40c0d21493f8_1024x1024.jpg', 'ao', '2eq'),
(12, 11, 'sas', 'Ecru White Modern Elegant Minimal Women_s Fashion Clothing Collection Instagram Story.png', 'ao', 's2'),
(13, 11, '223', 'Apparel and Accessories TikTok In-Feed Ad in White Grey Minimalist Monotone Style Mobile Video.jpg', 'ao', '123'),
(14, 11, 'dad', 'Apparel and Accessories TikTok In-Feed Ad in White Grey Minimalist Monotone Style Mobile Video (1).jpg', 'ao', '2312');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamgiohang`
--

CREATE TABLE `sanphamgiohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaSanPham` int(11) DEFAULT NULL,
  `SoLuongMua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaNguoiDung` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `dsyeuthich`
--
ALTER TABLE `dsyeuthich`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `sanphamgiohang`
--
ALTER TABLE `sanphamgiohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`);

--
-- Các ràng buộc cho bảng `dsyeuthich`
--
ALTER TABLE `dsyeuthich`
  ADD CONSTRAINT `dsyeuthich_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);

--
-- Các ràng buộc cho bảng `sanphamgiohang`
--
ALTER TABLE `sanphamgiohang`
  ADD CONSTRAINT `sanphamgiohang_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
