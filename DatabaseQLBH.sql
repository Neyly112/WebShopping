-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2024 lúc 12:11 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

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
-- Cấu trúc bảng cho bảng `ctdh`
--

CREATE TABLE `ctdh` (
  `madonhang` int(11) DEFAULT NULL,
  `masanpham` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayTao` date DEFAULT current_timestamp(),
  `PhuongThucThanhToan` varchar(255) DEFAULT 'Thanh toán khi nhận hàng',
  `tongtien` int(11) DEFAULT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `DiaChiGiaoHang` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT 'Vừa tạo đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'THU ĐÔNG'),
(1, 'THỜI TRANG NỮ'),
(2, 'THỜI TRANG NAM'),
(11, 'BEST SELLER');

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
(26, 1, 'JEUNESSE PLEATED MIDI ', '1714903815.webp', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '10000000'),
(27, 1, 'TÚI ĐEO VAI TRICE  BELTED', '1714903453.jpg', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '50000000'),
(28, 1, 'ĐẦM SOLLIESS COTTON-ĐEN', '1714902443.png', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '30000000'),
(29, 1, 'SET ÁO VÁY DEMIN ', '1714903469.png', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '4000000'),
(30, 3, 'SET ÁO VÁY MONSTER ', '1714903570.png', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '70000000'),
(31, 3, 'SÉT ÁO VÁY DEMIN THU', '1714903515.png', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '30000'),
(32, 3, 'SET JADE PLAN T', '1714903600.webp', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '5000000'),
(33, 3, 'QUẦN ÂU ỐNG LOE', '1714903636.png', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '400000'),
(34, 2, 'QUẦN ÂU ỐNG ĐỨNG', '1714903665.webp', 'Chân váy midi vải dạ dáng xòe xếp ly cạp liền bản to khóa thân sau   Thương hiệu: PANTIO  Kiểu dáng: Chân váy midi vải dạ thiết kế dáng xòe xếp ly cạp liền bản to khóa thân sau   Chất liệu: Chân váy công sở nữ có thành phần Dạ - 70% Polyeste 30% Rayon  Mà', '400000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamgiohang`
--

CREATE TABLE `sanphamgiohang` (
  `MaSanPham` int(11) DEFAULT NULL,
  `SoLuongMua` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamgiohang`
--

INSERT INTO `sanphamgiohang` (`MaSanPham`, `SoLuongMua`) VALUES
(27, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `password`) VALUES
('nhung@gmail.com', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD KEY `ctdh_ibfk_1` (`madonhang`),
  ADD KEY `ctdh_ibfk_2` (`masanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

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
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `ctdh_ibfk_1` FOREIGN KEY (`madonhang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE,
  ADD CONSTRAINT `ctdh_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanphamgiohang`
--
ALTER TABLE `sanphamgiohang`
  ADD CONSTRAINT `sanphamgiohang_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;