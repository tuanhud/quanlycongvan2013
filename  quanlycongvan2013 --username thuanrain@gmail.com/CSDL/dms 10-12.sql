-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 03:19 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bieumau`
--

DROP TABLE IF EXISTS `bieumau`;
CREATE TABLE IF NOT EXISTS `bieumau` (
  `MaBM` int(11) NOT NULL AUTO_INCREMENT,
  `TenBM` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `MaPB` int(11) NOT NULL,
  `File` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaBM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bieumau`
--

INSERT INTO `bieumau` (`MaBM`, `TenBM`, `NgayBanHanh`, `MaPB`, `File`) VALUES
(1, 'Đơn xin nghỉ phép', '2000-11-14', 1, 'donxinphep.doc'),
(2, 'Giấy chứng nhận', '2000-11-06', 3, 'giaychungnhan.doc');

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhan`
--

DROP TABLE IF EXISTS `chitietnhan`;
CREATE TABLE IF NOT EXISTS `chitietnhan` (
  `MaDK` int(11) NOT NULL,
  `manv` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietnhan`
--

INSERT INTO `chitietnhan` (`MaDK`, `manv`, `TrangThai`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 1, 0),
(4, 1, 0),
(4, 3, 0),
(5, 1, 0),
(6, 1, 0),
(7, 3, 0),
(8, 2, 0),
(9, 3, 0),
(10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphanquyen`
--

DROP TABLE IF EXISTS `chitietphanquyen`;
CREATE TABLE IF NOT EXISTS `chitietphanquyen` (
  `manhanvien` int(11) NOT NULL,
  `maquyen` int(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietphanquyen`
--

INSERT INTO `chitietphanquyen` (`manhanvien`, `maquyen`, `ghichu`) VALUES
(1, 1, ''),
(1, 2, ''),
(1, 3, ''),
(1, 4, ''),
(1, 5, ''),
(1, 6, ''),
(1, 7, ''),
(1, 8, ''),
(1, 9, ''),
(1, 11, ''),
(1, 12, ''),
(1, 13, ''),
(1, 14, ''),
(1, 15, ''),
(1, 16, ''),
(1, 17, ''),
(1, 18, ''),
(1, 19, ''),
(1, 20, ''),
(1, 31, ''),
(1, 32, ''),
(1, 33, ''),
(1, 34, ''),
(1, 35, ''),
(1, 36, ''),
(2, 1, ''),
(2, 2, ''),
(3, 3, ''),
(2, 4, ''),
(2, 5, ''),
(2, 6, ''),
(2, 7, ''),
(2, 8, ''),
(2, 9, ''),
(2, 11, ''),
(2, 12, ''),
(2, 13, ''),
(2, 14, ''),
(2, 15, ''),
(2, 16, ''),
(2, 17, ''),
(2, 18, ''),
(2, 19, ''),
(2, 20, ''),
(2, 31, ''),
(2, 32, ''),
(2, 33, ''),
(2, 34, ''),
(2, 35, ''),
(2, 36, ''),
(3, 1, ''),
(3, 2, ''),
(2, 3, ''),
(3, 4, ''),
(3, 5, ''),
(3, 7, ''),
(3, 6, ''),
(3, 8, ''),
(3, 9, ''),
(3, 11, ''),
(3, 12, ''),
(3, 13, ''),
(3, 14, ''),
(3, 15, ''),
(3, 16, ''),
(3, 17, ''),
(3, 18, ''),
(3, 19, ''),
(3, 20, ''),
(3, 33, ''),
(3, 31, '');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

DROP TABLE IF EXISTS `chucvu`;
CREATE TABLE IF NOT EXISTS `chucvu` (
  `MaCV` int(8) NOT NULL AUTO_INCREMENT,
  `TenChucVu` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaCV`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenChucVu`) VALUES
(1, 'trưởng phòng'),
(2, 'nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `congvan`
--

DROP TABLE IF EXISTS `congvan`;
CREATE TABLE IF NOT EXISTS `congvan` (
  `MaDK` int(11) NOT NULL AUTO_INCREMENT,
  `SoKH` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NgayVB` date NOT NULL,
  `NgayHH` date NOT NULL,
  `NguoiGui` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NguoiXuLy` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `TrichYeu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DoKhan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DoMat` int(11) NOT NULL,
  `TacGia` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaDK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `congvan`
--

INSERT INTO `congvan` (`MaDK`, `SoKH`, `NgayVB`, `NgayHH`, `NguoiGui`, `NguoiXuLy`, `SoTrang`, `TrichYeu`, `DoKhan`, `DoMat`, `TacGia`) VALUES
(1, '224', '2013-10-18', '2013-10-22', '1', 2, 1, 'Đóng tiền học phí', '2', 2, 'CTSV'),
(2, '225', '2013-10-10', '2013-10-17', '3', 2, 1, 'Đào tạo sau đại học ', '1', 1, 'Đào tạo'),
(3, '3434', '2013-10-24', '2013-10-25', '2', 1, 1, 'Báo cáo công tác tháng 01, 02 năm 2013', '1', 2, 'Phòng Hành Chính'),
(4, '4585', '2013-10-25', '2013-10-27', '2', 1, 1, 'Quyết định xuất cảnh học Tiến sĩ ', '1', 2, 'HIệu Trưởng'),
(5, '87935', '2013-10-02', '2013-10-08', '2', 1, 1, 'Phát động phong trào kế hoạch thi đua', '1', 2, 'Công Đoàn'),
(6, '121212', '2013-10-10', '2013-10-18', '2', 1, 1, 'Ban hành chương trình chuẩn mực đạo đức', '1', 3, 'Đoàn TN'),
(7, '23424', '2013-10-28', '2013-10-30', '2', 3, 1, 'Bổ sung thông tin sinh viên', '2', 1, 'Phòng Đào tạo'),
(8, '24234', '2013-10-28', '2013-10-31', '1', 2, 2, 'Ban hành kế hoạch', '3', 1, 'Phòng Công Tác SV'),
(9, '12123', '2013-10-29', '2013-10-30', '2', 3, 1, 'Cảnh cáo học vụ', '1', 3, 'Phòng Hành Chính'),
(10, '123232', '2013-10-29', '2013-10-31', '2', 1, 1, 'Tổ chức chương trình tiếng hát sinh viên', '3', 1, 'Phòng CT SV'),
(11, '223', '2013-11-18', '0000-00-00', '2', 0, 1, 'An ninh học đường', '3', 1, 'Phòng Công Tác SV');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `MaFile` int(11) NOT NULL AUTO_INCREMENT,
  `MaDK` int(11) NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaFile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`MaFile`, `MaDK`, `url`) VALUES
(1, 1, 'a.doc'),
(2, 1, 'b.doc'),
(3, 2, 'c.doc'),
(14, 11, 'DÒNG LUÂN CHUYỂN THÔNG TIN THEO CHỨC NĂNG.doc'),
(12, 8, 'THAY LOI KET_1.doc'),
(11, 8, 'THAY LOI KET.doc'),
(13, 10, '2.docx'),
(15, 3, 'c.doc'),
(16, 4, 'b.doc'),
(17, 5, 'a.doc'),
(18, 6, 'c.doc'),
(19, 7, 'b.doc'),
(20, 9, '2.doc');

-- --------------------------------------------------------

--
-- Table structure for table `hmenu`
--

DROP TABLE IF EXISTS `hmenu`;
CREATE TABLE IF NOT EXISTS `hmenu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nameMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `linkMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `titleMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `newPageMenu` int(11) NOT NULL DEFAULT '0',
  `isParent` int(11) NOT NULL DEFAULT '1',
  `parentId` int(11) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `isPublished` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hmenu`
--


-- --------------------------------------------------------

--
-- Table structure for table `hmenuadmin`
--

DROP TABLE IF EXISTS `hmenuadmin`;
CREATE TABLE IF NOT EXISTS `hmenuadmin` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nameMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `linkMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `titleMenu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `newPageMenu` int(11) NOT NULL DEFAULT '0',
  `isParent` int(11) NOT NULL DEFAULT '1',
  `parentId` int(11) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `isPublished` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hmenuadmin`
--


-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `MaNV` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NgaySinh` date NOT NULL,
  `CMND` varchar(9) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MaPB` int(11) NOT NULL,
  `MaCV` int(11) NOT NULL,
  PRIMARY KEY (`MaNV`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `NgaySinh`, `CMND`, `Email`, `DiaChi`, `MaPB`, `MaCV`) VALUES
(1, 'Chánh văn phòng ', '1982-11-10', '02364587', 'email1@gmail.com', '41 Thân Nhân Trung, P.13, Q.Tân Bình', 1, 4),
(2, 'Trưởng khoa HTTT', '1988-06-04', '03548766', 'email2@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 11, 5),
(3, 'Phó khoa HTTT', '1978-08-07', '04654565', 'email3@gmail.com', '1 Đường 38 - P.Thảo Điền - Q.2', 11, 6),
(4, 'Thư kí khoa HTTT', '1984-05-01', '06565423', 'email4@gmail.com', '242 Lương Định Của - P.An Khánh - Q.2', 11, 7),
(5, 'Trưởng khoa KHMT', '1983-10-09', '02568488', 'email5@gmail.com', '41 Nguyễn Thượng Hiền P5. Q .Bình Thạnh', 12, 5),
(6, 'Phó khoa KHMT', '1989-01-06', '03556454', 'email6@gmail.com', '42 Thân Nhân Trung, P.13, Q.Tân Bình', 12, 6),
(7, 'Thư kí khoa KHMT', '1991-11-09', '05458825', 'email1@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 12, 7),
(8, 'Trưởng khoa KTMT', '1987-04-08', '05648725', 'email2@gmail.com', '2 Đường 38 - P.Thảo Điền - Q.2', 13, 5),
(9, 'Phó khoa KTMT', '1982-11-11', '05564979', 'email3@gmail.com', '243 Lương Định Của - P.An Khánh - Q.2', 13, 6),
(10, 'Thư kí khoa KTMT', '1988-06-05', '09789525', 'email4@gmail.com', '42 Nguyễn Thượng Hiền P5. Q .Bình Thạnh', 13, 7),
(11, 'Trưởng khoa MMT&TT', '1978-08-08', '05855625', 'email5@gmail.com', '43 Thân Nhân Trung, P.13, Q.Tân Bình', 14, 5),
(12, 'Phó khoa MMT&TT', '1984-05-02', '01584255', 'email6@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 14, 6),
(13, 'Thư kí khoa MMT&TT', '1983-10-10', '02364587', 'email1@gmail.com', '3 Đường 38 - P.Thảo Điền - Q.2', 14, 7),
(14, 'Trưởng khoa CNPM', '1989-01-07', '03548766', 'email2@gmail.com', '244 Lương Định Của - P.An Khánh - Q.2', 10, 5),
(15, 'Phó khoa CNPM', '1991-11-10', '04654565', 'email3@gmail.com', '43 Nguyễn Thượng Hiền P5. Q .Bình Thạnh', 10, 6),
(16, 'Thư kí khoa CNPM', '1987-04-09', '06565423', 'email4@gmail.com', '44 Thân Nhân Trung, P.13, Q.Tân Bình', 10, 7),
(17, 'Trưởng phòng TCHC', '1982-11-11', '02568488', 'email5@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 1, 1),
(18, 'Phó phòng TCHC', '1988-06-05', '03556454', 'email6@gmail.com', '4 Đường 38 - P.Thảo Điền - Q.2', 1, 2),
(19, 'Văn thư phòng TCHC', '1978-08-08', '05458825', 'email1@gmail.com', '245 Lương Định Của - P.An Khánh - Q.2', 1, 3),
(20, 'Trưởng phòng KHTC', '1984-05-02', '05648725', 'email2@gmail.com', '44 Nguyễn Thượng Hiền P5. Q .Bình Thạnh', 2, 1),
(21, 'Phó phòng KHTC', '1983-10-10', '05564979', 'email3@gmail.com', '45 Thân Nhân Trung, P.13, Q.Tân Bình', 2, 2),
(22, 'Văn thư phòng KHTC', '1989-01-07', '09789525', 'email1@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 2, 3),
(23, 'Trưởng phòng ĐTĐH', '1991-11-10', '05855625', 'email2@gmail.com', '5 Đường 38 - P.Thảo Điền - Q.2', 3, 1),
(24, 'Phó phòng ĐTĐH', '1987-04-09', '01584255', 'email3@gmail.com', '42 Thân Nhân Trung, P.13, Q.Tân Bình', 3, 2),
(25, 'Văn thư phòng ĐTĐH', '1982-11-12', '02364587', 'email4@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 3, 3),
(26, 'Trưởng phòng CTSV', '1991-11-11', '03548766', 'email5@gmail.com', '2 Đường 38 - P.Thảo Điền - Q.2', 4, 1),
(27, 'Phó phòng  CTSV', '1988-06-07', '04654565', 'email6@gmail.com', '243 Lương Định Của - P.An Khánh - Q.2', 4, 2),
(28, 'Văn thư phòng CTSV', '1978-08-10', '06565423', 'email1@gmail.com', '42 Nguyễn Thượng Hiền P5. Q .Bình Thạnh', 4, 3),
(29, 'Hiệu trưởng', '1984-05-04', '02568488', 'email2@gmail.com', '43 Thân Nhân Trung, P.13, Q.Tân Bình', 25, 13),
(30, 'Phó Hiệu Trưởng 1', '1983-10-12', '03556454', 'email3@gmail.com', '32/5 Ngô Bệ, P.13, Q. Tân Bình', 25, 14),
(31, 'Phó Hiệu Trưởng 2', '1989-01-09', '02364587', 'email4@gmail.com', '3 Đường 38 - P.Thảo Điền - Q.2', 25, 14);

-- --------------------------------------------------------

--
-- Table structure for table `nhomquyen`
--

DROP TABLE IF EXISTS `nhomquyen`;
CREATE TABLE IF NOT EXISTS `nhomquyen` (
  `manhomquyen` int(11) NOT NULL AUTO_INCREMENT,
  `tennhomquyen` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`manhomquyen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nhomquyen`
--

INSERT INTO `nhomquyen` (`manhomquyen`, `tennhomquyen`) VALUES
(1, 'Công văn đến'),
(2, 'Công văn đi'),
(3, 'Bảo mật'),
(4, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

DROP TABLE IF EXISTS `phongban`;
CREATE TABLE IF NOT EXISTS `phongban` (
  `MaPB` int(11) NOT NULL AUTO_INCREMENT,
  `TenPB` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ChucNang` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaPB`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `ChucNang`) VALUES
(1, 'Phòng Tổ chức - Hành Chính', 'Tổ chức - Hành Chính'),
(2, 'Phòng Kế hoạch - Tài chính', 'Kế hoạch - Tài chính'),
(3, 'Phòng Đào tạo Đại học', 'Đào tạo Đại học'),
(4, 'Phòng Đào tạo SĐH - KHCN & QHĐN', 'Đào tạo SĐH - KHCN & QHĐN'),
(5, 'Phòng Quản trị - Thiết bị', 'Quản trị - Thiết bị'),
(6, 'Phòng Công tác sinh viên', 'Công tác sinh viên'),
(7, 'Phòng Thanh tra - Pháp chế - ĐBCL', 'Thanh tra - Pháp chế - ĐBCL'),
(8, 'Ban Quản lý cơ sở', 'Quản lý cơ sở'),
(9, 'Ban Dữ liệu và CNTT', 'Dữ liệu và CNTT'),
(10, 'Khoa Công nghệ phần mềm', 'Công nghệ phần mềm'),
(11, 'Khoa Hệ thống thông tin', 'Hệ thống thông tin'),
(12, 'Khoa Khoa học máy tính', 'Khoa học máy tính'),
(13, 'Khoa Kĩ thuật máy tính', 'Kĩ thuật máy tính'),
(14, 'Khoa Mạng máy tính và truyền thông', 'Mạng máy tính và truyền thông'),
(15, 'Bộ môn Toán - Lý', 'Toán - Lý'),
(16, 'Trung tâm Phát triển CNTT (CITD)', 'Phát triển CNTT (CITD)'),
(17, 'Trung tâm Sáng tạo Microsoft (MIC)', 'Sáng tạo Microsoft (MIC)'),
(18, 'Trung tâm Công nghệ phần mềm', 'Công nghệ phần mềm'),
(19, 'Trung tâm Điện tử và kỹ thuật máy tính', 'Điện tử và kỹ thuật máy tính'),
(20, 'Bộ môn Anh văn', 'Anh văn'),
(21, 'Trung tâm Đào tạo công nghệ trực tuyến', 'Đào tạo công nghệ trực tuyến'),
(22, 'Phòng thí nghiệm Đa phương tiện', 'Thí nghiệm Đa phương tiện'),
(23, 'Phòng thí nghiệm HTTT', 'Thí nghiệm HTTT'),
(24, 'Thư viện', 'Thư viện');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `maquyen` int(11) NOT NULL AUTO_INCREMENT,
  `manhomquyen` int(11) NOT NULL,
  `tenquyen` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`maquyen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`maquyen`, `manhomquyen`, `tenquyen`) VALUES
(1, 1, 'Hiển thị công văn đến'),
(2, 1, 'Đăng kí (Thêm mới ) công văn đến'),
(3, 1, 'Download công văn đến'),
(4, 1, 'Chuyển tiếp công văn đến'),
(5, 1, 'Thay đổi nội dung ý kiến phản hồi'),
(6, 1, 'Đưa ra ý kiến phản hồi'),
(7, 1, 'Tìm kiếm công văn đến '),
(11, 2, 'Hiển thị công văn đi'),
(8, 1, 'Xoá thông tin công văn đến '),
(9, 1, 'Lập báo cáo thống kê công văn đến'),
(12, 2, 'Đăng kí (Thêm mới ) công văn đi'),
(13, 2, 'Upload công văn đi'),
(14, 2, 'Gửi công văn đi'),
(15, 2, 'Đưa ra ý kiến giải quyết'),
(16, 2, 'Thay đổi nội dung ý kiến giải quyết'),
(17, 2, 'Tìm kiếm công văn đi'),
(18, 2, 'Thay đổi thông tin công văn đi'),
(19, 2, 'Xoá thông tin công văn đi'),
(20, 2, 'Lập báo cáo thống kê công văn đi'),
(21, 3, 'Thêm người dùng '),
(22, 3, 'Thay đổi thông tin người dùng'),
(23, 3, 'Xoá thông tin người dùng'),
(24, 3, 'Thêm phòng ban'),
(25, 3, 'Thay đổi thông tin phòng ban'),
(26, 3, 'Xoá thông tin phòng ban'),
(27, 3, 'Quản lý giao diện'),
(28, 3, 'Phân quyền người dùng'),
(31, 4, 'Quyền công văn thông thường cấp phòng ban'),
(32, 4, 'Quyền công văn thông thường cấp trường'),
(33, 4, 'Quyền công văn mật cấp phòng ban'),
(34, 4, 'Quyền công văn mật cấp trường'),
(35, 4, 'Quyền công văn tối mật cấp phòng ban'),
(36, 4, 'Quyền công văn tối mật cấp trường'),
(10, 2, 'Download Công Văn Đi');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaixuly`
--

DROP TABLE IF EXISTS `trangthaixuly`;
CREATE TABLE IF NOT EXISTS `trangthaixuly` (
  `MaDK` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `Ngay` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trangthaixuly`
--

INSERT INTO `trangthaixuly` (`MaDK`, `TrangThai`, `Ngay`) VALUES
(1, 2, '2013-11-06'),
(2, 1, '2013-10-18'),
(3, 2, '2013-11-06'),
(4, 0, '2013-10-18'),
(5, 0, '2013-10-18'),
(6, 0, '2013-10-18'),
(7, 1, '2013-11-11'),
(8, 0, '2013-11-06'),
(9, 0, '2013-10-18'),
(10, 0, '2013-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `privileged` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `privileged`, `MaNV`) VALUES
('chanhvanphong', '123456', 1, 1),
('tk_httt', '123456', 1, 2),
('pk_httt', '123456', 1, 3),
('admin', 'admin', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ykiengiaiquyet`
--

DROP TABLE IF EXISTS `ykiengiaiquyet`;
CREATE TABLE IF NOT EXISTS `ykiengiaiquyet` (
  `mayk` int(11) NOT NULL AUTO_INCREMENT,
  `madk` int(11) NOT NULL,
  `noidung` varchar(250) NOT NULL,
  PRIMARY KEY (`mayk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ykiengiaiquyet`
--


-- --------------------------------------------------------

--
-- Table structure for table `ykienphanhoi`
--

DROP TABLE IF EXISTS `ykienphanhoi`;
CREATE TABLE IF NOT EXISTS `ykienphanhoi` (
  `maph` int(11) NOT NULL AUTO_INCREMENT,
  `madk` int(11) NOT NULL,
  `noidung` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`maph`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ykienphanhoi`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
