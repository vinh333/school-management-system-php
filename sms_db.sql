-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 02:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_ket_qua=@@CHARACTER_SET_ket_qua */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`) VALUES
(1, 'elias', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'Elias', 'Abdurrahman');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id_lop` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_lop`, `grade`, `section`) VALUES
(1, 7, 2),
(2, 1, 1),
(3, 3, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(31) NOT NULL,
  `grade_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `grade_code`) VALUES
(1, '1', 'G'),
(2, '2', 'G'),
(3, '1', 'KG'),
(4, '2', 'KG'),
(7, '3', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_thong_bao` int(11) NOT NULL,
  `ho_ten_nguoi_gui` varchar(100) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_thong_bao`, `ho_ten_nguoi_gui`, `sender_email`, `message`, `date_time`) VALUES
(1, 'John doe', 'es@gmail.com', 'Hello, world', '2023-02-17 23:39:15'),
(2, 'John doe', 'es@gmail.com', 'Hi', '2023-02-17 23:49:19'),
(3, 'John doe', 'es@gmail.com', 'Hey, ', '2023-02-17 23:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_office`
--

CREATE TABLE `registrar_office` (
  `id_phong_cong_tac_hssv` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(31) NOT NULL,
  `ten` varchar(31) NOT NULL,
  `address` varchar(31) NOT NULL,
  `so_hieu_giao_vien` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `so_dien_thoai` varchar(31) NOT NULL,
  `trinh_do` varchar(31) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `ngay_tham_gia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrar_office`
--

INSERT INTO `registrar_office` (`id_phong_cong_tac_hssv`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`, `address`, `so_hieu_giao_vien`, `ngay_sinh`, `so_dien_thoai`, `trinh_do`, `gioi_tinh`, `email_address`, `ngay_tham_gia`) VALUES
(1, 'james', '$2y$10$t0SCfeXNcyiO9hdzNTKKB.j2xlE2yt8Hm2.0AWJR5kSE469JIkHKG', 'James', 'William', 'West Virginia', 843583, '2022-10-04', '+12328324092', 'diploma', 'Male', 'james@j.com', '2022-10-23 01:03:25'),
(2, 'oliver2', '$2y$10$7XhzOu.3OgHPFv7hKjvfUu3waU.8j6xTASj4yIWMfo...k/p8yvvS', 'Oliver2', 'Noah', 'California,  Los angeles', 6546, '1999-06-11', '09457396789', 'BSc, BA', 'Male', 'ov@ab.com', '2022-11-12 23:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(6, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
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
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nam_hoc`, `hoc_ky`, `ten_truong`, `phat_ngon`, `gioi_thieu`) VALUES
(1, 2023, 'II', 'Y School', 'Lux et Veritas Light and Truth', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `id_hoc_sinh` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `address` varchar(31) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ngay_tham_gia` timestamp NULL DEFAULT current_timestamp(),
  `ho_ten_cha` varchar(127) NOT NULL,
  `ho_ten_me` varchar(127) NOT NULL,
  `so_dien_thoai_phu_huynh` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoc_sinh`
--

INSERT INTO `hoc_sinh` (`id_hoc_sinh`, `ten_dang_nhap`, `mat_khau`, `ho`, `ten`, `grade`, `section`, `address`, `gioi_tinh`, `email_address`, `ngay_sinh`, `ngay_tham_gia`, `ho_ten_cha`, `ho_ten_me`, `so_dien_thoai_phu_huynh`) VALUES
(1, 'john', '$2y$10$xmtROY8efWeORYiuQDE3SO.eZwscao20QNuLky1Qlr88zDzNNq4gm', 'John', 'Doe', 1, 1, 'California,  Los angeles', 'Male', 'abas55@ab.com', '2012-09-12', '2019-12-11 14:16:44', 'Doe', 'Mark', '09393'),
(3, 'abas', '$2y$10$KLFheMWgpLfoiqMuW2LQxOPficlBiSIJ9.wE2qr5yJUbAQ.5VURoO', 'Abas', 'A.', 2, 1, 'Berlin', 'Male', 'abas@ab.com', '2002-12-03', '2021-12-01 14:16:51', 'dsf', 'dfds', '7979'),
(4, 'jo', '$2y$10$pYyVlWg9jxkT0u/4LrCMS.ztMaOvgyol1hgNt.jqcFEqUC7yZLIYe', 'John3', 'Doe', 1, 1, 'California,  Los angeles', 'Female', 'jo@jo.com', '2013-06-13', '2022-09-10 13:48:49', 'Doe', 'Mark', '074932040'),
(5, 'jo2', '$2y$10$lRQ58lbak05rW7.be8ok4OaWJcb9znRp9ra.qXqnQku.iDrA9N8vy', 'Jhon', 'Doe', 1, 1, 'UK', 'Male', 'jo@jo.com', '1990-02-15', '2023-02-12 18:11:26', 'Doe', 'Do', '0943568654');

-- --------------------------------------------------------

--
-- Table structure for table `diem_hoc_sinh`
--

CREATE TABLE `diem_hoc_sinh` (
  `id` int(11) NOT NULL,
  `hoc_ky` varchar(100) NOT NULL,
  `nam_hoc` int(11) NOT NULL,
  `id_hoc_sinh` int(11) NOT NULL,
  `id_giao_vien` int(11) NOT NULL,
  `id_mon_hoc` int(11) NOT NULL,
  `ket_qua` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diem_hoc_sinh`
--

INSERT INTO `diem_hoc_sinh` (`id`, `hoc_ky`, `nam_hoc`, `id_hoc_sinh`, `id_giao_vien`, `id_mon_hoc`, `ket_qua`) VALUES
(1, 'II', 2021, 1, 1, 1, '10 15,15 20,10 10,10 20,30 35'),
(2, 'II', 2023, 1, 1, 4, '15 20,4 5'),
(3, 'I', 2022, 1, 1, 5, '10 20,50 50');

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id_mon_hoc` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` varchar(31) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mon_hoc`
--

INSERT INTO `mon_hoc` (`id_mon_hoc`, `subject`, `subject_code`, `grade`) VALUES
(1, 'English', 'En', 1),
(2, 'Physics', 'Phy', 2),
(3, 'Biology', 'Bio-01', 1),
(4, 'Math', 'Math-01', 1),
(5, 'Chemistry', 'ch-01', 1),
(6, 'Programming', 'pro-01', 1),
(7, 'Java', 'java-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `giao_vien`
--

CREATE TABLE `giao_vien` (
  `id_giao_vien` int(11) NOT NULL,
  `ten_dang_nhap` varchar(127) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `class` varchar(31) NOT NULL,
  `ho` varchar(127) NOT NULL,
  `ten` varchar(127) NOT NULL,
  `mon_hoc` varchar(31) NOT NULL,
  `address` varchar(31) NOT NULL,
  `so_hieu_giao_vien` int(11) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `so_dien_thoai` varchar(31) NOT NULL,
  `trinh_do` varchar(127) NOT NULL,
  `gioi_tinh` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `ngay_tham_gia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giao_vien`
--

INSERT INTO `giao_vien` (`id_giao_vien`, `ten_dang_nhap`, `mat_khau`, `class`, `ho`, `ten`, `mon_hoc`, `address`, `so_hieu_giao_vien`, `ngay_sinh`, `so_dien_thoai`, `trinh_do`, `gioi_tinh`, `email_address`, `ngay_tham_gia`) VALUES
(1, 'oliver', '$2y$10$JruTW/rNZ6CVO4nxYWCrn.GJpiIKMACEPYrK00S7Dk/fkbJIdYau2', '1234', 'Oliver', 'Noah', '1245', 'California,  Los angeles', 6546, '2022-09-12', '0945739', 'BSc', 'Male', 'ol@ab.com', '2022-09-09 05:23:45'),
(5, 'abas', '$2y$10$cMSKcHEJcg3K6wbVcxcXGuksgU39i70aEQVKN7ZHrzqTH9oAc3y5m', '123', 'Abas', 'A.', '12', 'Berlin', 1929, '2003-09-16', '09457396789', 'BSc,', 'Male', 'abas55@ab.com', '2022-09-09 06:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_lop`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_thong_bao`);

--
-- Indexes for table `registrar_office`
--
ALTER TABLE `registrar_office`
  ADD PRIMARY KEY (`id_phong_cong_tac_hssv`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`id_hoc_sinh`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Indexes for table `diem_hoc_sinh`
--
ALTER TABLE `diem_hoc_sinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id_mon_hoc`);

--
-- Indexes for table `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`id_giao_vien`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_thong_bao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrar_office`
--
ALTER TABLE `registrar_office`
  MODIFY `id_phong_cong_tac_hssv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `id_hoc_sinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diem_hoc_sinh`
--
ALTER TABLE `diem_hoc_sinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `id_giao_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_ket_qua=@OLD_CHARACTER_SET_ket_qua */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
