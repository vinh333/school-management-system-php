-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2024 lúc 03:08 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`) VALUES
(1, 'admin', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'admin', 'ctec');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_hoc_sinh`
--

CREATE TABLE `diem_hoc_sinh` (
  `id_diem` int(11) NOT NULL,
  `hoc_ky` varchar(100) NOT NULL,
  `nam_hoc` int(11) NOT NULL,
  `id_hoc_sinh` int(11) NOT NULL,
  `id_giao_vien` int(11) NOT NULL,
  `id_mon_hoc` int(11) NOT NULL,
  `ket_qua` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diem_hoc_sinh`
--

INSERT INTO `diem_hoc_sinh` (`id_diem`, `hoc_ky`, `nam_hoc`, `id_hoc_sinh`, `id_giao_vien`, `id_mon_hoc`, `ket_qua`) VALUES
(8, '1', 2023, 1, 1, 1, '6,1,4,10'),
(10, '1', 2023, 1, 1, 3, '10,9,8,6,7'),
(11, '1', 2023, 1, 1, 7, '6,5,6,7,8.2'),
(12, '1', 2022, 1, 1, 7, '6,5,6,7,8.2'),
(13, '1', 2022, 1, 1, 3, '7,9,7,6,7'),
(14, '1', 2022, 1, 1, 1, '6,8,4,6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_vien`
--

CREATE TABLE `giao_vien` (
  `id_giao_vien` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `danh_sach_lop` varchar(31) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(127) NOT NULL,
  `mon_hoc` varchar(31) NOT NULL,
  `dia_chi` varchar(31) NOT NULL,
  `so_hieu_giao_vien` int(11) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `so_dien_thoai` varchar(31) NOT NULL,
  `trinh_do` varchar(127) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_tham_gia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giao_vien`
--

INSERT INTO `giao_vien` (`id_giao_vien`, `ten_dang_nhap`, `mat_khau`, `danh_sach_lop`, `ho`, `ten`, `mon_hoc`, `dia_chi`, `so_hieu_giao_vien`, `ngay_sinh`, `so_dien_thoai`, `trinh_do`, `gioi_tinh`, `email`, `ngay_tham_gia`) VALUES
(1, 'giaovien1', '$2y$10$nQVfgKyE2PReDnQ6IP.JOuWnQWQcll7hgaQIrWUKOix5nw9/Uc34e', '1235', 'giao', 'vien', '123479', 'Can Tho', 6546, '2022-09-12', '0945739', 'BSc', 'Nam', 'ol@ab.com', '2022-09-09 05:23:45'),
(3, 'nhuvsnhungao', '$2y$10$oFzwFCCGF1KklNuhPj0a9.AKVfeR.AvZw9P9yBzpD6RHxsG4b7zDS', '12', 'nhungao', 'phamngao', '12', 'Kiên Giang', 88, '2002-12-20', '254862254556', 'Tiến Sĩ', 'Nu', 'sekirocanngaova1@gmail.com', '2023-12-05 08:17:17'),
(5, 'anhtu', '$2y$10$cMSKcHEJcg3K6wbVcxcXGuksgU39i70aEQVKN7ZHrzqTH9oAc3y5m', '123', 'Anh', 'Tu', '12', 'Hai Phong', 1929, '2003-09-16', '09457396789', 'BSc', 'Nam', 'abas55@ab.com', '2022-09-09 06:42:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `id_hoc_sinh` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `dia_chi` varchar(31) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ngay_tham_gia` timestamp NULL DEFAULT current_timestamp(),
  `ho_ten_cha` varchar(127) NOT NULL,
  `ho_ten_me` varchar(127) NOT NULL,
  `so_dien_thoai_phu_huynh` varchar(31) NOT NULL,
  `id_lop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_sinh`
--

INSERT INTO `hoc_sinh` (`id_hoc_sinh`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`, `dia_chi`, `gioi_tinh`, `email`, `ngay_sinh`, `ngay_tham_gia`, `ho_ten_cha`, `ho_ten_me`, `so_dien_thoai_phu_huynh`, `id_lop`) VALUES
(1, 'hocsinh2', '$2y$10$xmtROY8efWeORYiuQDE3SO.eZwscao20QNuLky1Qlr88zDzNNq4gm', 'Van Hai', 'Nguyen', 'Khanh Hoa', 'Nam', 'abas55@ab.com', '2012-09-12', '2019-12-11 14:16:44', 'nguyen thanh cong', 'pham hong tham', '09393', 1),
(3, 'abas', '$2y$10$N1bXVAUaQU6SQtDknRdiJeiTv4.fbPGZ5Xdn/8cnxHJERLVyC6Lpq', 'Nguyen', 'A.', 'Berlin', 'Nu', 'abas@ab.com', '2002-12-03', '2021-12-01 14:16:51', 'Nguyen van a', 'Tran thi b', '7979', 1),
(5, 'hocsinh1', '$2y$10$b8yrhdZB8onda1TQ.lAT3uXFKdA66v2SBBXD44IWN.xuCBHHqUAG2', 'Van Mot', 'Tran', 'An Hoa', 'Nam', 'jo@jo.com', '1990-02-15', '2023-02-12 18:11:26', 'Doe', 'Do', '0943568654', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(11) NOT NULL,
  `ten_lop` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_lop`, `ten_lop`) VALUES
(1, 'CNTT21A'),
(2, 'CNTT21B'),
(3, 'TCKT22A'),
(5, 'TCKT21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id_mon_hoc` int(11) NOT NULL,
  `ten_mon_hoc` varchar(31) NOT NULL,
  `ma_mon_hoc` varchar(31) NOT NULL,
  `id_lop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id_mon_hoc`, `ten_mon_hoc`, `ma_mon_hoc`, `id_lop`) VALUES
(1, 'Tiếng Anh1', 'TA1', 1),
(2, 'Vật Lý', 'VL', 2),
(3, 'Sinh Học', 'SH-01', 1),
(4, 'Toán', 'Toán-01', 2),
(7, 'Java', 'Java-01', 1),
(9, 'Tiếng Anh 2', 'TA2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_cong_tac_hssv`
--

CREATE TABLE `phong_cong_tac_hssv` (
  `id_phong_cong_tac_hssv` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(31) NOT NULL,
  `ten` varchar(31) NOT NULL,
  `dia_chi` varchar(31) NOT NULL,
  `so_nhan_vien` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `so_dien_thoai` varchar(31) NOT NULL,
  `trinh_do` varchar(31) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_tham_gia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_cong_tac_hssv`
--

INSERT INTO `phong_cong_tac_hssv` (`id_phong_cong_tac_hssv`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`, `dia_chi`, `so_nhan_vien`, `ngay_sinh`, `so_dien_thoai`, `trinh_do`, `gioi_tinh`, `email`, `ngay_tham_gia`) VALUES
(1, 'hoanganh', '$2y$10$t0SCfeXNcyiO9hdzNTKKB.j2xlE2yt8Hm2.0AWJR5kSE469JIkHKG', 'Hoang', 'Anh', 'Ha Noi', 843583, '2022-10-04', '+12328324092', 'diploma', 'Nu', 'hoanganh@j.com', '2022-10-23 01:03:25'),
(2, 'huykhanh', '$2y$10$7XhzOu.3OgHPFv7hKjvfUu3waU.8j6xTASj4yIWMfo...k/p8yvvS', 'Huy', 'Khanh', 'California, Los Angeles', 6546, '1999-06-11', '09457396789', 'BSc, BA', 'Nam', 'hk@ab.com', '2022-11-12 23:06:18'),
(4, 'maneger1', '$2y$10$rH6Xr4EdftJ59xaqLIHOvu./rLVu48FbeIC7p8iI9dN4Q.H4hi5JC', 'Quan Ly', 'Quang', 'Kiên Giang', 1166, '2000-12-06', '569658899', 'Đại Học', 'Nu', 'Zxvn241414@gmail.com', '2023-12-06 07:54:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nam_hoc` int(11) NOT NULL,
  `hoc_ky` varchar(11) NOT NULL,
  `ten_truong` varchar(100) NOT NULL,
  `phat_ngon` varchar(300) NOT NULL,
  `gioi_thieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `nam_hoc`, `hoc_ky`, `ten_truong`, `phat_ngon`, `gioi_thieu`) VALUES
(1, 2023, '1', 'Trường Cao đẳng Kinh tế - Kỹ thuật Cần Thơ', 'Chính trực – Tận tâm – Sáng tạo', 'Trường ABC là một trong những...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id_thong_bao` int(11) NOT NULL,
  `ho_ten_nguoi_gui` varchar(100) NOT NULL,
  `email_nguoi_gui` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `thoi_gian_gui` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id_thong_bao`, `ho_ten_nguoi_gui`, `email_nguoi_gui`, `noi_dung`, `thoi_gian_gui`) VALUES
(1, 'Hocsinh1', 'es@gmail.com', 'Hello, world', '2023-02-17 23:39:15'),
(2, 'Hocsinh2', 'es@gmail.com', 'Hi', '2023-02-17 23:49:19'),
(3, 'Hocsinh1', 'es@gmail.com', 'Hey, ', '2023-02-17 23:49:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `diem_hoc_sinh`
--
ALTER TABLE `diem_hoc_sinh`
  ADD PRIMARY KEY (`id_diem`);

--
-- Chỉ mục cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`id_giao_vien`);

--
-- Chỉ mục cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`id_hoc_sinh`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id_mon_hoc`);

--
-- Chỉ mục cho bảng `phong_cong_tac_hssv`
--
ALTER TABLE `phong_cong_tac_hssv`
  ADD PRIMARY KEY (`id_phong_cong_tac_hssv`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id_thong_bao`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `diem_hoc_sinh`
--
ALTER TABLE `diem_hoc_sinh`
  MODIFY `id_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `id_giao_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `id_hoc_sinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phong_cong_tac_hssv`
--
ALTER TABLE `phong_cong_tac_hssv`
  MODIFY `id_phong_cong_tac_hssv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
