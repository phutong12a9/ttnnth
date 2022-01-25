-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 25, 2022 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ctuet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienlaihocphi`
--

CREATE TABLE `bienlaihocphi` (
  `ID` int(11) NOT NULL,
  `ID_CanBo` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL,
  `SoTien` int(11) NOT NULL,
  `NgayLap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bienlaihocphi`
--

INSERT INTO `bienlaihocphi` (`ID`, `ID_CanBo`, `ID_HocVienDK`, `SoTien`, `NgayLap`) VALUES
(12, 7, 78, 2000000, '2021-06-23'),
(13, 7, 79, 2000000, '2021-06-24'),
(14, 7, 74, 2000000, '2021-06-24'),
(15, 7, 69, 2000000, '2021-06-24'),
(16, 7, 80, 2000000, '2021-06-24'),
(17, 7, 81, 2000000, '2021-06-24'),
(18, 7, 84, 750000, '2021-06-28'),
(19, 7, 85, 750000, '2021-06-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_CV` int(11) NOT NULL,
  `HoTenCB` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` char(30) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `canbo`
--

INSERT INTO `canbo` (`ID`, `ID_User`, `ID_CV`, `HoTenCB`, `NgaySinh`, `GioiTinh`, `DiaChi`, `SDT`, `Email`) VALUES
(7, 18, 1, 'Tống Thanh Phú', '1999-05-02', 'Nam', 'Tổ 19, ấp 2, xã Tân Hưng, Cái Bè, Tiền Giang', '0367627089', 'phutong12a9@gmail.com'),
(8, 19, 2, 'Nguyễn Xuân Hà Giang', '1989-01-01', 'Nữ', 'Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ', '0567896102', 'nxhgiang@ctuet.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `ID` int(11) NOT NULL,
  `TenCV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`ID`, `TenCV`) VALUES
(1, 'Cán Bộ'),
(2, 'Giảng Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungchi`
--

CREATE TABLE `chungchi` (
  `ID` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `TenChungChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chungchi`
--

INSERT INTO `chungchi` (`ID`, `ID_DanhMuc`, `TenChungChi`) VALUES
(7, 11, 'TOEIC'),
(8, 11, 'IELTS'),
(9, 12, 'Tin học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `ID` int(11) NOT NULL,
  `TenCM` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`ID`, `TenCM`) VALUES
(4, 'Chiêu Sinh'),
(5, 'Lịch Thi'),
(6, 'Thông Báo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDanhMuc`) VALUES
(11, 'Tiếng Anh'),
(12, 'Tin học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachthi`
--

CREATE TABLE `danhsachthi` (
  `ID` varchar(20) NOT NULL,
  `ID_LopThi` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL,
  `TrangThai` varchar(50) NOT NULL DEFAULT 'Chưa Nhập Điểm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhsachthi`
--

INSERT INTO `danhsachthi` (`ID`, `ID_LopThi`, `ID_HocVienDK`, `TrangThai`) VALUES
('IE01001', 6, 78, 'Đã Nhập Điểm'),
('IE01002', 6, 74, 'Đã Nhập Điểm'),
('IE01003', 6, 80, 'Đã Nhập Điểm'),
('TH02001', 7, 84, 'Đã Nhập Điểm'),
('TH02002', 8, 85, 'Đã Nhập Điểm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dotthi`
--

CREATE TABLE `dotthi` (
  `ID` int(11) NOT NULL,
  `TenDotThi` varchar(255) NOT NULL,
  `NgayThi` date NOT NULL,
  `GhiChu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `ID` int(11) NOT NULL,
  `HocVi` varchar(20) NOT NULL,
  `HoTenGV` varchar(255) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` char(30) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`ID`, `HocVi`, `HoTenGV`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SDT`, `Email`) VALUES
(7, 'Thạc Sỹ', 'Đinh Thành Nhân', 'Nam', '1989-01-01', 'Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ', '03456726842', 'dtnhan@ctuet.edu.vn'),
(8, 'Thạc Sỹ', 'Nguyễn Xuân Hà Giang', 'Nữ', '1987-01-01', 'Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ', '0123456789', 'nxhgiang@ctuet.edu.vn'),
(9, 'Thạc Sỹ', 'Nguyễn Bá Duy', 'Nam', '1989-01-01', 'Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ', '03456726842', 'nbduy@ctuet.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `ID` int(11) NOT NULL,
  `HoTenHV` varchar(50) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) NOT NULL,
  `SDT` char(30) DEFAULT NULL,
  `Email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`ID`, `HoTenHV`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `SDT`, `Email`) VALUES
(74, 'Trần Thị Cúc', 'Nữ', '1996-04-03', 'Bến Tre', '0642781364', 'cuctran@gmail.com'),
(75, 'Bùi Trường Nhật', 'Nam', '1999-04-01', 'Sóc Trăng', '0345278912', 'btnhat@gmail.com'),
(76, 'Nguyễn Thị Lan Anh', 'Nữ', '1998-03-24', 'Đồng Tháp', '0346125789', 'nthilananh@gmail.com'),
(77, 'Lương Minh Quân', 'Nam', '1999-04-03', 'Tp.Cần Thơ', '0348126754', 'lminhquan@gmail.com'),
(78, 'Phan Thành Việt', 'Nam', '1999-06-03', 'Tp.Cần Thơ', '0348246729', 'ptviet@gmail.com'),
(79, 'Lê Hồng Phan', 'Nam', '1999-07-03', 'Sóc Trăng', '036781694', 'lhphan@gmail.com'),
(80, 'Hoàng Thanh Thiện', 'Nam', '1999-10-04', 'Sóc Trăng', '0384627899', 'htthien@gmail.com'),
(81, 'Nguyễn Trần Duy Quang', 'Nam', '1999-04-06', 'Vĩnh Long', '0341267894', 'ntdquang@gmail.com'),
(82, 'Lâm Phước Thiện', 'Nam', '1999-10-17', 'Kiên Giang', '0384615724', 'lpthien@gmail.com'),
(83, 'Đinh Công Thịnh Vượng', 'Nam', '1999-11-19', 'Đồng Tháp', '0346157894', 'dctvuong@gmail.com'),
(84, 'Nguyễn Quang Thái Tài', 'Nam', '1999-09-01', 'Vĩnh Long', '0384612764', 'nqttai@gmail.com'),
(85, 'Nguyễn Võ Tính', 'Nam', '1999-01-11', 'Đồng Tháp', '0348612795', 'nvtinh@gmail.com'),
(86, 'Nguyễn Tấn Vĩ', 'Nam', '1998-03-02', 'Sóc Trăng', '0394627846', 'ntvi@gmail.com'),
(87, 'Nguyễn Thị Thắm', 'Nữ', '2000-08-01', 'Đồng Nai', '0354861278', 'nttham@gmail.com'),
(88, 'Nguyễn Thị Lan Hương', 'Nữ', '1999-07-05', 'Cà Mau', '0394627924', 'ntlhuong@gmail.com'),
(89, 'Nguyễn Văn Tuấn', 'Nam', '1999-05-01', 'Đồng Tháp', '0367627089', 'nvtuan@gmail.com'),
(90, 'Nguyễn Văn A', 'Nam', '1999-05-01', 'Tiền Giang', '0367627089', 'phutong12a9@gmail.com'),
(91, 'Tống Thanh Phú', 'Nam', '1999-05-02', 'An Giang', '0367627089', 'phutong12a9@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocviendangky`
--

CREATE TABLE `hocviendangky` (
  `ID` int(11) NOT NULL,
  `ID_HocVien` int(11) NOT NULL,
  `NgayKy` date DEFAULT NULL,
  `SoHieu` varchar(25) DEFAULT NULL,
  `SoVaoSo` varchar(25) DEFAULT NULL,
  `XetDuyet` varchar(50) DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocviendangky`
--

INSERT INTO `hocviendangky` (`ID`, `ID_HocVien`, `NgayKy`, `SoHieu`, `SoVaoSo`, `XetDuyet`, `TrangThai`, `ThoiGian`) VALUES
(69, 74, NULL, NULL, NULL, NULL, 'Đã Sắp Lớp', '2021-06-09'),
(70, 75, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(71, 76, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(72, 77, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(73, 78, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(74, 79, NULL, NULL, NULL, NULL, 'Đã Sắp Lớp Thi', '2021-06-23'),
(75, 80, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(76, 81, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(77, 82, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(78, 83, '2021-11-20', '12344211', '4424241', 'Đã duyệt', 'Đã Sắp Lớp Thi', '2021-06-28'),
(79, 84, NULL, NULL, NULL, NULL, 'Đã Sắp Lớp', '2021-06-23'),
(80, 85, NULL, NULL, NULL, NULL, 'Đã Sắp Lớp Thi', '2021-06-23'),
(81, 86, NULL, NULL, NULL, NULL, 'Đã Đóng Học Phí', '2021-06-23'),
(82, 87, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(83, 88, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2021-06-23'),
(84, 89, '2021-06-27', '12344211', '4424241', 'Đã duyệt', 'Đã Sắp Lớp Thi', '2021-06-28'),
(85, 90, NULL, NULL, NULL, NULL, 'Đã Sắp Lớp Thi', '2021-06-28'),
(86, 91, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí', '2022-01-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquathi`
--

CREATE TABLE `ketquathi` (
  `ID` int(11) NOT NULL,
  `ID_DanhSachThi` varchar(20) NOT NULL,
  `DiemNghe` float DEFAULT NULL,
  `DiemNoi` float DEFAULT NULL,
  `DiemDoc` float DEFAULT NULL,
  `DiemViet` float DEFAULT NULL,
  `DiemLyThuyet` float DEFAULT NULL,
  `DiemThucHanh` float DEFAULT NULL,
  `TongKet` varchar(20) DEFAULT NULL,
  `KetQua` varchar(50) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketquathi`
--

INSERT INTO `ketquathi` (`ID`, `ID_DanhSachThi`, `DiemNghe`, `DiemNoi`, `DiemDoc`, `DiemViet`, `DiemLyThuyet`, `DiemThucHanh`, `TongKet`, `KetQua`, `GhiChu`, `ThoiGian`) VALUES
(86, 'IE01001', 3, 4, 4, 3, NULL, NULL, '3.5', 'Đạt', NULL, '2021-06-24'),
(87, 'IE01002', 4, 4, 4, 4, NULL, NULL, '4', 'Đạt', NULL, '2021-06-24'),
(89, 'TH02001', NULL, NULL, NULL, NULL, 7, 7, '7', 'Đạt', NULL, '2021-06-28'),
(90, 'IE01003', 5, 6, 5, 7, NULL, NULL, '5.75', 'Đạt', NULL, '2021-06-28'),
(91, 'TH02002', NULL, NULL, NULL, NULL, 5, 4, '9', 'Không Đạt', NULL, '2021-06-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ID`, `Ten`, `ThoiGian`) VALUES
(11, 'Khóa 1', '2021-06-09'),
(12, 'Khóa 2', '2021-06-09'),
(13, 'Khóa 3', '2022-01-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `ID` int(11) NOT NULL,
  `ID_ChungChi` int(11) NOT NULL,
  `ID_Khoa` int(11) NOT NULL,
  `TenKhoa` varchar(255) NOT NULL,
  `HocPhi` int(11) NOT NULL,
  `NgayKhaiGiang` date NOT NULL,
  `ThoiGianThi` date NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`ID`, `ID_ChungChi`, `ID_Khoa`, `TenKhoa`, `HocPhi`, `NgayKhaiGiang`, `ThoiGianThi`, `TrangThai`) VALUES
(41, 7, 11, 'TOEIC 350 K1', 750000, '2021-07-01', '2021-11-01', 'Đang Mở'),
(42, 9, 11, 'Tin học cơ bản K1', 750000, '2021-07-01', '2021-11-01', 'Đang Mở'),
(43, 8, 11, 'IELTS 3.5 K1', 750000, '2021-07-01', '2021-11-01', 'Đang Mở'),
(44, 9, 12, 'Tin học cơ bản K2', 750000, '2021-08-01', '2021-12-01', 'Đang Mở'),
(45, 7, 12, 'TOEIC 350 K2', 750000, '2022-01-25', '2020-01-25', 'Đang Mở');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `ID` int(11) NOT NULL,
  `ID_LopHoc` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`ID`, `ID_LopHoc`, `ID_HocVienDK`) VALUES
(56, 35, 69),
(57, 35, 70),
(58, 35, 71),
(59, 35, 72),
(60, 35, 73),
(61, 35, 74),
(62, 35, 75),
(63, 35, 76),
(64, 35, 77),
(65, 35, 78),
(66, 35, 79),
(67, 35, 80),
(68, 35, 81),
(69, 31, 82),
(70, 31, 83),
(71, 36, 84),
(72, 36, 85),
(73, 36, 86);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `ID` int(11) NOT NULL,
  `ID_KhoaHoc` int(11) NOT NULL,
  `TenLop` varchar(255) NOT NULL,
  `NgayHoc` varchar(50) NOT NULL,
  `BuoiHoc` varchar(255) NOT NULL,
  `ThoiGianHoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`ID`, `ID_KhoaHoc`, `TenLop`, `NgayHoc`, `BuoiHoc`, `ThoiGianHoc`) VALUES
(31, 41, 'TOEIC 350 K1 Tối 2,4,6', '2,4,6', 'Tối', '19h - 20h30'),
(32, 41, 'TOEIC 350 K1 Tối 3,5,7', '3,5,7', 'Tối', '19h - 20h30'),
(33, 42, 'Tin học cơ bản K1 Tối 2,4,6', '2,4,6', 'Tối', '19h - 20h30'),
(34, 42, 'Tin học cơ bản K1 Sáng 2,4,6', '2,4,6', 'Sáng', '8h-10h'),
(35, 43, 'IELTS 3.5 K1 Tối 6,7,CN', '6,7,CN', 'Tối', '19h - 20h30'),
(36, 44, 'Tin học cơ bản K2 Sáng 2,4,6', '2,4,6', 'Sáng', '7h-8h30'),
(37, 45, 'TOEIC 350 K2 Sáng 3,CN', '3,CN', 'Sáng', '7h-8h30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocchinhthuc`
--

CREATE TABLE `lophocchinhthuc` (
  `ID` int(11) NOT NULL,
  `ID_LopHP` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophocchinhthuc`
--

INSERT INTO `lophocchinhthuc` (`ID`, `ID_LopHP`, `ID_HocVienDK`) VALUES
(20, 15, 78),
(21, 15, 79),
(22, 15, 74),
(23, 15, 69),
(24, 17, 84),
(25, 15, 80),
(26, 17, 85);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `ID` int(11) NOT NULL,
  `ID_LopHoc` int(11) NOT NULL,
  `ID_GiangVien` int(11) NOT NULL,
  `TenLop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`ID`, `ID_LopHoc`, `ID_GiangVien`, `TenLop`) VALUES
(14, 31, 7, 'TOEIC 350  K1 Tối 2,4,6 L1'),
(15, 35, 8, 'IELTS 3.5 K1 Tối 6,7,CN L1'),
(16, 33, 9, 'Tin học cơ bản K1 Tối 2,4,6 L1'),
(17, 36, 8, 'Tin học cơ bản K2 Sáng 2,4,6 L1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lopthi`
--

CREATE TABLE `lopthi` (
  `ID` int(11) NOT NULL,
  `ID_ChungChi` int(11) NOT NULL,
  `ID_Phong` int(11) NOT NULL,
  `ID_GiangVien` int(11) NOT NULL,
  `TenLopThi` varchar(50) NOT NULL,
  `NguongDat` int(11) NOT NULL,
  `NgayThi` date NOT NULL,
  `BuoiThi` varchar(50) NOT NULL,
  `GioThi` varchar(50) NOT NULL,
  `ThoiGianLam` int(11) NOT NULL,
  `NoiDungThi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lopthi`
--

INSERT INTO `lopthi` (`ID`, `ID_ChungChi`, `ID_Phong`, `ID_GiangVien`, `TenLopThi`, `NguongDat`, `NgayThi`, `BuoiThi`, `GioThi`, `ThoiGianLam`, `NoiDungThi`) VALUES
(5, 7, 7, 8, 'Lớp Thi TOEIC 350 11/21', 350, '2021-10-11', 'Sáng', '07:30', 90, NULL),
(6, 8, 7, 8, 'Lớp Thi IELTS 3.5 11/21', 4, '2021-11-01', 'Chiều', '13:30', 90, NULL),
(7, 9, 9, 9, 'Lớp Thi Tin Học Cơ Bản 09/21', 5, '2021-09-01', 'Sáng', '07:30', 150, NULL),
(8, 9, 8, 8, 'Lớp Thi Tin Học Cơ Bản 10/21', 5, '2021-10-01', 'Sáng', '07:30', 120, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkyhoatdong`
--

CREATE TABLE `nhatkyhoatdong` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ThaoTac` varchar(255) NOT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phonghoc`
--

CREATE TABLE `phonghoc` (
  `ID` int(11) NOT NULL,
  `TenPhong` varchar(50) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Lau` varchar(10) NOT NULL,
  `Phong` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phonghoc`
--

INSERT INTO `phonghoc` (`ID`, `TenPhong`, `Day`, `Lau`, `Phong`) VALUES
(7, 'C.1.1', 'C', '1', '1'),
(8, 'C.1.2', 'C', '1', '2'),
(9, 'C.1.3', 'C', '1', '3'),
(10, 'C.1.4', 'C', '1', '4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sapxeplophp`
--

CREATE TABLE `sapxeplophp` (
  `ID` int(11) NOT NULL,
  `ID_LopHP` int(11) DEFAULT NULL,
  `ID_Phong` int(11) DEFAULT NULL,
  `ID_GiangVien` int(11) DEFAULT NULL,
  `ID_TroGiang` int(11) DEFAULT NULL,
  `Buoi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sapxeplophp`
--

INSERT INTO `sapxeplophp` (`ID`, `ID_LopHP`, `ID_Phong`, `ID_GiangVien`, `ID_TroGiang`, `Buoi`) VALUES
(137, 14, 7, 7, NULL, 1),
(138, 15, NULL, NULL, NULL, 1),
(139, 16, NULL, NULL, NULL, 1),
(140, 17, NULL, NULL, NULL, 1),
(142, 14, NULL, NULL, NULL, 3),
(143, 14, NULL, NULL, NULL, 4),
(144, 14, NULL, NULL, NULL, 5),
(145, 14, NULL, NULL, NULL, 6),
(146, 14, NULL, NULL, NULL, 7),
(147, 14, NULL, NULL, NULL, 8),
(148, 14, NULL, NULL, NULL, 9),
(149, 14, NULL, NULL, NULL, 10),
(150, 14, NULL, NULL, NULL, 11),
(151, 14, NULL, NULL, NULL, 12),
(153, 14, NULL, NULL, NULL, 14),
(154, 14, NULL, NULL, NULL, 15),
(156, 14, NULL, NULL, NULL, 2),
(157, 14, NULL, NULL, NULL, 13),
(158, 14, NULL, NULL, NULL, 16),
(159, 14, NULL, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `ID` int(11) NOT NULL,
  `ID_CM` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `TomTat` varchar(255) NOT NULL,
  `NoiDung` mediumtext NOT NULL,
  `NgayDang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`ID`, `ID_CM`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDang`) VALUES
(13, 4, 'Lệ phí thi chứng chỉ ứng dụng CNTT', 'Trung tâm Điện tử & Tin học thông báo lệ phí thi chứng chỉ ứng dụng CNTT như sau:', '<table cellspacing=\"0\" class=\"Table\" style=\"-webkit-text-stroke-width:0px; background-color:#ffffff; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; color:#222222; font-family:Arial,Helvetica,sans-serif; font-size:12px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; margin-left:10px; max-width:100%; orphans:2; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:982px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:98px; width:982px\">\r\n			<p style=\"text-align:center\"><strong>LỆ PH&Iacute; THI<br />\r\n			CHỨNG CHỈ ỨNG DỤNG C&Ocirc;NG NGHỆ TH&Ocirc;NG TIN</strong><br />\r\n			<strong>(<em>Theo th&ocirc;ng tư li&ecirc;n tịch số 17/2016/TTLT-BGDĐT-BTTTT</em>)</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:medium\"><span style=\"color:#000000\">&nbsp;&nbsp;<span style=\"font-family:Arial,Helvetica,sans-serif\">Lệ ph&iacute;: đối với th&iacute; sinh tự do l&agrave; 600.000đ cho CC UD CNTT cơ bản, 700.000đ cho CC UD CNTT n&acirc;ng cao.&nbsp;</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:medium\"><span style=\"color:#000000\">&nbsp;&nbsp;</span><span style=\"color:#000099\">Nếu học vi&ecirc;n ghi danh học hoặc &ocirc;n tập v&agrave; thi c&aacute;c lớp khai giảng từ ng&agrave;y 08/06/2020 tại Trrung t&acirc;m th&igrave; kh&ocirc;ng cần đ&oacute;ng th&ecirc;m lệ ph&iacute; thi.</span><span style=\"color:#000099\">&nbsp;</span></span></span></span></span></span></p>', '2021-05-20'),
(14, 4, 'Mức học phí các lớp chứng chỉ ứng dụng CNTT', 'Trung tâm Điện tử & Tin học thông báo mức học phí các lớp chứng chỉ ứng dụng CNTT như sau:', '<div class=\"noi_dung\" style=\"-webkit-text-stroke-width:0px; text-align:start; text-indent:0px\">\r\n<div><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-family:arial\"><span style=\"font-size:medium\"><span style=\"color:#000099\">&nbsp;Học ph&iacute; &aacute;p dụng cho c&aacute;c lớp khai giảng từ 08/06/2020 trở về sau (</span><span style=\"color:#cc0000\">sinh vi&ecirc;n kh&ocirc;ng cần đ&oacute;ng th&ecirc;m lệ ph&iacute; thi</span><span style=\"color:#000099\">&nbsp;chứng nhận v&agrave; chứng chỉ)</span></span></span></span></span></span></span>\r\n<p style=\"margin-left:94px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">&nbsp;</span></span></span></span></span></p>\r\n\r\n<table cellspacing=\"0\" class=\"Table\" style=\"background:white; border-collapse:collapse; border-spacing:0px; border:none; box-sizing:border-box; font-size:12px; margin-left:19px; max-width:100%; width:662px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; height:23px; width:349px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Lớp</span></span></strong></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Lệ ph&iacute;</span></span></span></strong></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:red\">Lệ ph&iacute; cho sinh vi&ecirc;n</span></span></span></strong></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Học v&agrave; thi Chứng chỉ Ứng dụng CNTT cơ bản, (k&yacute; hiệu&nbsp;<strong>CB</strong>)</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.440.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.350.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">&Ocirc;n v&agrave; thi chứng chỉ Ứng dụng CNTT cơ bản, (k&yacute; hiệu&nbsp;<strong>&Ocirc;n CB</strong>)</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.140.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.080.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Học v&agrave; thi Chứng chỉ Ứng dụng CNTT n&acirc;ng cao, (k&yacute; hiệu&nbsp;<strong>NC</strong>)</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.830.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#b4c6e7; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.710.000đ</span></span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"margin-left:94px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Miễn giảm:&nbsp;<strong>cho tất cả đối tượng l&agrave; sinh vi&ecirc;n, học sinh c&aacute;c Trường</strong></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Địa điểm học: Khoa C&ocirc;ng nghệ Th&ocirc;ng tin &amp; Truyền th&ocirc;ng, Trường Đại học Cần Thơ</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Mọi chi tiết xin li&ecirc;n hệ:</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><em><span style=\"color:#000099\">Văn ph&ograve;ng Đ&agrave;o tạo Chứng chỉ Tin học - Khoa C&ocirc;ng nghệ Th&ocirc;ng tin &amp; Truyền th&ocirc;ng, Trường Đại học Cần Thơ. Khu 2 đường 3/2, phường Xu&acirc;n Kh&aacute;nh, Quận Kinh Kiều, Tp. Cần Thơ. Điện thoại: 0292 3 735 898&nbsp;</span></em></span></span></span></span></p>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', '2021-05-20'),
(15, 4, 'Thông báo chiêu sinh khóa đào tạo chứng chỉ CCNA 25/01/2021', 'Trung tâm Điện tử và Tin học thông báo chiêu sinh khóa đào tạo chuyên gia hệ thống mạng CISCO đợt 25-01-2021', '<div style=\"-webkit-text-stroke-width:0px; text-align:left; text-indent:0px\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:x-large\"><span style=\"color:#3333ff\">&nbsp;Học buổi tối 2 4 6</span></span></span></span></span></span></div>\r\n\r\n<div style=\"-webkit-text-stroke-width:0px; text-align:left; text-indent:0px\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:x-large\"><span style=\"color:#3333ff\">&nbsp; Từ 18h đến 21h, ph&ograve;ng số 18 - Khoa CNTT&amp;TT - Trường Đại học Cần Thơ</span></span></span></span></span></span></div>', '2021-05-20'),
(16, 6, 'Thông báo mở Khóa học tiếng Nhật miễn phí dành cho sinh viên Khóa 2017', 'Trung tâm Ngoại ngữ – Tin học thông báo đến sinh viên và viên chức, giảng viên Nhà trường như sau: – Nội dung: Giảng dạy 10 bài đầu tiên trong tổng số 25...', '<p>Trung t&acirc;m Ngoại ngữ &ndash; Tin học th&ocirc;ng b&aacute;o đến sinh vi&ecirc;n v&agrave; vi&ecirc;n chức, giảng vi&ecirc;n Nh&agrave; trường như sau:</p>\r\n\r\n<p>&ndash; Nội dung: Giảng dạy 10 b&agrave;i đầu ti&ecirc;n trong tổng số 25 b&agrave;i của gi&aacute;o tr&igrave;nh Minna no nihongo sơ cấp N5 tiếng Nhật.</p>\r\n\r\n<p>&ndash; Đối tượng đăng k&yacute;: Sinh vi&ecirc;n ch&iacute;nh quy năm thứ 4 (Kh&oacute;a 2017) c&aacute;c ng&agrave;nh cơ điện tử, kỹ thuật c&ocirc;ng tr&igrave;nh x&acirc;y dựng, quản l&yacute; x&acirc;y dựng, quản l&yacute; c&ocirc;ng nghiệp v&agrave; vi&ecirc;n chức, giảng vi&ecirc;n của Nh&agrave; trường.</p>\r\n\r\n<p>&ndash; Khai giảng: Ng&agrave;y 15/6/2021.</p>\r\n\r\n<p>&ndash; Giờ học: Từ 18g00 đến 20g00 tối thứ 3, thứ 5 h&agrave;ng tuần.</p>\r\n\r\n<p>&ndash; Thời gian đăng k&yacute;: Từ ng&agrave;y ra th&ocirc;ng b&aacute;o đến hết ng&agrave;y 14/6/2021.</p>\r\n\r\n<p>&ndash; Địa điểm đăng k&yacute;: Tại Văn ph&ograve;ng Trung t&acirc;m Ngoại ngữ &ndash; Tin học.</p>', '2021-05-28'),
(17, 6, 'THÔNG BÁO NHẬN PHIẾU BÁO THI CHỨNG CHỈ CNTT KHÓA 25', 'THÔNG BÁO: đã có giấy báo dự thi Chứng chỉ Ứng dụng CNTT cơ bản khóa 25, học viên vui lòng liên hệ văn phòng Trung tâm NN-TH để nhận (lưu ý: mang theo...', '<p>TH&Ocirc;NG B&Aacute;O: đ&atilde; c&oacute; giấy b&aacute;o dự thi Chứng chỉ Ứng dụng CNTT cơ bản kh&oacute;a 25, học vi&ecirc;n vui l&ograve;ng li&ecirc;n hệ văn ph&ograve;ng Trung t&acirc;m NN-TH để nhận (lưu &yacute;: mang theo h&oacute;a đơn đ&oacute;ng tiền lệ ph&iacute; thi).</p>', '2021-05-28'),
(18, 4, 'KHAI GIẢNG LỚP ÔN KIỂM TRA CHỨNG NHẬN NĂNG LỰC TIẾNG ANH CTUT KHÓA 6', 'Trung tâm Ngoại ngữ – Tin học thông báo khai giảng lớp ôn kiểm tra chứng nhận năng lực tiếng Anh CTUT như sau:', '<p>Trung t&acirc;m Ngoại ngữ &ndash; Tin học th&ocirc;ng b&aacute;o khai giảng lớp &ocirc;n kiểm tra chứng nhận năng lực tiếng Anh CTUT như sau:</p>\r\n\r\n<ol>\r\n	<li>Ng&agrave;y khai giảng: ng&agrave;y 08 th&aacute;ng 03 năm 2021</li>\r\n	<li>Ng&agrave;y học: Thứ 2, thứ 4, thứ 6 h&agrave;ng tuần</li>\r\n	<li>Buổi học: Buổi tối</li>\r\n	<li>Địa điểm học: Trường Đại học Kỹ thuật &ndash; C&ocirc;ng nghệ Cần Thơ.</li>\r\n</ol>', '2021-05-28'),
(19, 6, 'Danh sách thí sinh dự kiểm tra năng lực tiếng Anh CTUT K5 (Ngày thi 16 và 30/05/2021)', 'Trung tâm Ngoại ngữ – Tin học trường Đại học Kỹ thuật – Công nghệ Cần Thơ thông báo đến các thí sinh tham dự kỳ kiểm tra Chứng nhận năng lực tiếng Anh CTUT khóa 5 về danh sách tham dự kỳ kiểm tra như sau:', '<p>Trung t&acirc;m Ngoại ngữ &ndash; Tin học trường Đại học Kỹ thuật &ndash; C&ocirc;ng nghệ Cần Thơ th&ocirc;ng b&aacute;o đến c&aacute;c th&iacute; sinh tham dự kỳ kiểm tra Chứng nhận năng lực tiếng Anh CTUT kh&oacute;a 5 về danh s&aacute;ch tham dự kỳ kiểm tra như sau:</p>\r\n\r\n<p>&ndash; Danh s&aacute;ch chi tiết đợt 1 &ndash; ng&agrave;y 16/05/2021:&nbsp;<a href=\"http://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2021/05/DS-DU-THI-CNNL-TIENG-ANH-CTUT-K5-D1.pdf\">Xem tại đ&acirc;y</a></p>\r\n\r\n<p>&ndash; Danh s&aacute;ch chi tiết đợt 2 &ndash; ng&agrave;y 30/05/2021:&nbsp;<a href=\"http://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2021/05/DS-DU-THI-CNNL-TIENG-ANH-CTUT-K5-D2.pdf\">Xem tại đ&acirc;y</a></p>\r\n\r\n<p>Lưu &yacute;: Mọi thắc mắc, th&iacute; sinh vui l&ograve;ng li&ecirc;n hệ với Trung t&acirc;m qua số điện thoại: 02923.890698 hoặc 0983.877750.</p>', '2021-05-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `TaiKhoan` char(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `PhanQuyen` int(11) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `TaiKhoan`, `password`, `PhanQuyen`, `updated_at`, `created_at`) VALUES
(1, 'admin', '$2y$10$bdwkk0YuU/XFN6wYXUhHbO9xbKZR3UxHN8yu/GA05GxdrfTWOTtk6', 1, '0000-00-00', '0000-00-00'),
(18, 'phutong', '$2y$10$Ew8yRWqL6p2A.V2f8Rve.uAHhXyg9W3ydtx.QyKP5yIkLj/WjjfpK', 2, '2021-06-09', '2021-06-09'),
(19, 'nxhgiang', '$2y$10$aOmOZqlvgIgsLsdkcfr8P.gGS7b6z3F92LD3UFy.PWnMRLGHuI7gm', 3, '2021-06-09', '2021-06-09'),
(20, 'IE01001', '$2y$10$viVccHtGId5pFy3s7WG7xeBZX95ncSyVI0W/csKNYKJtE4vLyjnrW', 0, '2021-06-23', '2021-06-23'),
(21, 'IE01002', '$2y$10$cMdiukGqE2fJkxImUtuVA./EQJckF24rx7eVBIVe3X2RGl7hQ8WbW', 0, '2021-06-24', '2021-06-24'),
(22, 'TH02001', '$2y$10$rda0tGrQTFdBZI0WfyhU6.flBl9Ul134BxjAmrzRAvO7GqQeocufe', 0, '2021-06-28', '2021-06-28'),
(23, 'IE01003', '$2y$10$EpUUzjn4zHQdbUsrVNftg.hYhiK8jUrzfrDuv90HXq4WZR9Ogmq86', 0, '2021-06-28', '2021-06-28'),
(24, 'TH02002', '$2y$10$JKfRXgAYS.jnsScHCsTy8.oE2QxKZLqw9F9m.OJHz6bo0lhIrkEB2', 0, '2021-06-28', '2021-06-28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CanBo` (`ID_CanBo`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_CV` (`ID_CV`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `danhsachthi`
--
ALTER TABLE `danhsachthi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LopThi` (`ID_LopThi`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`);

--
-- Chỉ mục cho bảng `dotthi`
--
ALTER TABLE `dotthi`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVi` (`HocVi`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVien` (`ID_HocVien`);

--
-- Chỉ mục cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_LopHoc` (`ID_DanhSachThi`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TenKhoa` (`TenKhoa`),
  ADD KEY `ID_ChungChi` (`ID_ChungChi`),
  ADD KEY `ID_Khoa` (`ID_Khoa`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`),
  ADD KEY `ID_LopHP` (`ID_LopHoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LopChungChi` (`ID_KhoaHoc`);

--
-- Chỉ mục cho bảng `lophocchinhthuc`
--
ALTER TABLE `lophocchinhthuc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`),
  ADD KEY `ID_LopHP` (`ID_LopHP`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_GiangVien` (`ID_GiangVien`),
  ADD KEY `ID_LopHoc` (`ID_LopHoc`);

--
-- Chỉ mục cho bảng `lopthi`
--
ALTER TABLE `lopthi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ChungChi` (`ID_ChungChi`),
  ADD KEY `ID_Phong` (`ID_Phong`),
  ADD KEY `ID_GiangVien` (`ID_GiangVien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatkyhoatdong`
--
ALTER TABLE `nhatkyhoatdong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Chỉ mục cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sapxeplophp`
--
ALTER TABLE `sapxeplophp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_GiangVien` (`ID_GiangVien`),
  ADD KEY `ID_LopHP` (`ID_LopHP`),
  ADD KEY `ID_Phong` (`ID_Phong`),
  ADD KEY `ID_TroGiang` (`ID_TroGiang`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CM` (`ID_CM`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `canbo`
--
ALTER TABLE `canbo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dotthi`
--
ALTER TABLE `dotthi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `lophocchinhthuc`
--
ALTER TABLE `lophocchinhthuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `lopthi`
--
ALTER TABLE `lopthi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sapxeplophp`
--
ALTER TABLE `sapxeplophp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  ADD CONSTRAINT `bienlaihocphi_ibfk_1` FOREIGN KEY (`ID_CanBo`) REFERENCES `canbo` (`ID`),
  ADD CONSTRAINT `bienlaihocphi_ibfk_2` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`);

--
-- Các ràng buộc cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `canbo_ibfk_1` FOREIGN KEY (`ID_CV`) REFERENCES `chucvu` (`ID`),
  ADD CONSTRAINT `canbo_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD CONSTRAINT `chungchi_ibfk_1` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID`);

--
-- Các ràng buộc cho bảng `danhsachthi`
--
ALTER TABLE `danhsachthi`
  ADD CONSTRAINT `danhsachthi_ibfk_2` FOREIGN KEY (`ID_LopThi`) REFERENCES `lopthi` (`ID`),
  ADD CONSTRAINT `danhsachthi_ibfk_3` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`);

--
-- Các ràng buộc cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  ADD CONSTRAINT `hocviendangky_ibfk_1` FOREIGN KEY (`ID_HocVien`) REFERENCES `hocvien` (`ID`);

--
-- Các ràng buộc cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  ADD CONSTRAINT `ketquathi_ibfk_1` FOREIGN KEY (`ID_DanhSachThi`) REFERENCES `danhsachthi` (`ID`);

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`ID_ChungChi`) REFERENCES `chungchi` (`ID`),
  ADD CONSTRAINT `khoahoc_ibfk_2` FOREIGN KEY (`ID_Khoa`) REFERENCES `khoa` (`ID`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`),
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`ID_LopHoc`) REFERENCES `lophoc` (`ID`);

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`ID_KhoaHoc`) REFERENCES `khoahoc` (`ID`);

--
-- Các ràng buộc cho bảng `lophocchinhthuc`
--
ALTER TABLE `lophocchinhthuc`
  ADD CONSTRAINT `lophocchinhthuc_ibfk_1` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`),
  ADD CONSTRAINT `lophocchinhthuc_ibfk_2` FOREIGN KEY (`ID_LopHP`) REFERENCES `lophocphan` (`ID`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`ID_LopHoc`) REFERENCES `lophoc` (`ID`),
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`ID_GiangVien`) REFERENCES `giangvien` (`ID`);

--
-- Các ràng buộc cho bảng `lopthi`
--
ALTER TABLE `lopthi`
  ADD CONSTRAINT `lopthi_ibfk_2` FOREIGN KEY (`ID_ChungChi`) REFERENCES `chungchi` (`ID`),
  ADD CONSTRAINT `lopthi_ibfk_3` FOREIGN KEY (`ID_Phong`) REFERENCES `phonghoc` (`ID`),
  ADD CONSTRAINT `lopthi_ibfk_4` FOREIGN KEY (`ID_GiangVien`) REFERENCES `giangvien` (`ID`);

--
-- Các ràng buộc cho bảng `nhatkyhoatdong`
--
ALTER TABLE `nhatkyhoatdong`
  ADD CONSTRAINT `nhatkyhoatdong_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `sapxeplophp`
--
ALTER TABLE `sapxeplophp`
  ADD CONSTRAINT `sapxeplophp_ibfk_1` FOREIGN KEY (`ID_GiangVien`) REFERENCES `giangvien` (`ID`),
  ADD CONSTRAINT `sapxeplophp_ibfk_2` FOREIGN KEY (`ID_LopHP`) REFERENCES `lophocphan` (`ID`),
  ADD CONSTRAINT `sapxeplophp_ibfk_3` FOREIGN KEY (`ID_Phong`) REFERENCES `phonghoc` (`ID`),
  ADD CONSTRAINT `sapxeplophp_ibfk_4` FOREIGN KEY (`ID_TroGiang`) REFERENCES `giangvien` (`ID`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`ID_CM`) REFERENCES `chuyenmuc` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
