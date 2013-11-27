-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2013 at 03:32 PM
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

CREATE TABLE IF NOT EXISTS `chitietnhan` (
  `MaDK` int(11) NOT NULL,
  `mapb` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietnhan`
--

INSERT INTO `chitietnhan` (`MaDK`, `mapb`, `TrangThai`) VALUES
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

CREATE TABLE IF NOT EXISTS `chitietphanquyen` (
  `manhanvien` int(11) NOT NULL,
  `maquyen` int(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietphanquyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

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

CREATE TABLE IF NOT EXISTS `congvan` (
  `MaDK` int(11) NOT NULL AUTO_INCREMENT,
  `SoKH` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NgayVB` date NOT NULL,
  `NgayHH` date NOT NULL,
  `NguoiGui` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NguoiXuLy` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `TrichYeu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MucDo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TacGia` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaDK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `congvan`
--

INSERT INTO `congvan` (`MaDK`, `SoKH`, `NgayVB`, `NgayHH`, `NguoiGui`, `NguoiXuLy`, `SoTrang`, `TrichYeu`, `MucDo`, `TacGia`) VALUES
(1, '224', '2013-10-18', '2013-10-22', '1', 2, 1, 'Đóng tiền học phí', 'khẩn', 'CTSV'),
(2, '225', '2013-10-10', '2013-10-17', '3', 2, 1, 'Đào tạo sau đại học ', 'khẩn', 'Đào tạo'),
(3, '3434', '2013-10-24', '2013-10-25', '2', 1, 1, 'Báo cáo công tác tháng 01, 02 năm 2013', '1', 'Phòng Hành Chính'),
(4, '4585', '2013-10-25', '2013-10-27', '2', 1, 1, 'Quyết định xuất cảnh học Tiến sĩ ', '1', 'HIệu Trưởng'),
(5, '87935', '2013-10-02', '2013-10-08', '2', 1, 1, 'Phát động phong trào kế hoạch thi đua', '1', 'Công Đoàn'),
(6, '121212', '2013-10-10', '2013-10-18', '2', 1, 1, 'Ban hành chương trình chuẩn mực đạo đức', '0', 'Đoàn TN'),
(7, '23424', '2013-10-28', '2013-10-30', '2', 3, 1, 'Bổ sung thông tin sinh viên', '0', 'Phòng Đào tạo'),
(8, '24234', '2013-10-28', '2013-10-31', '1', 2, 2, 'Ban hành kế hoạch', '0', 'Phòng Công Tác SV'),
(9, '12123', '2013-10-29', '2013-10-30', '2', 3, 1, 'Cảnh cáo học vụ', '1', 'Phòng Hành Chính'),
(10, '123232', '2013-10-29', '2013-10-31', '2', 1, 1, 'Tổ chức chương trình tiếng hát sinh viên', 'Hỏa Tốc', 'Phòng CT SV'),
(11, '223', '2013-11-18', '0000-00-00', '2', 0, 1, 'An ninh học đường', 'Hỏa Tốc', 'Phòng Công Tác SV');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `NgaySinh`, `CMND`, `Email`, `DiaChi`, `MaPB`, `MaCV`) VALUES
(1, 'Trưởng phòng CTSV', '1971-10-13', '023412444', 'geminisongtu@yahoo', '234 au co', 1, 1),
(2, 'Nhân Viên CTSV', '1989-10-25', '023412444', 'geminithienbin@yahoo', '234 auco', 1, 2),
(3, 'Trưởng phòng Tài Chính', '1971-10-26', '023412444', 'geminixunu@yahoo', '234 au co', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhomquyen`
--

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
(36, 4, 'Quyền công văn tối mật cấp trường');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaixuly`
--

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
('admin', 'admin', 1, 0),
('geminisongtu', 'songtu', 2, 1),
('congtacsinhvien', '123456', 2, 2),
('taichinh', '123456', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ykiengiaiquyet`
--

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
