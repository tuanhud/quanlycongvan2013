-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2013 at 01:22 AM
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
-- Table structure for table `chitietnhan`
--

CREATE TABLE IF NOT EXISTS `chitietnhan` (
  `MaDK` int(11) NOT NULL,
  `NguoiNhan` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietnhan`
--

INSERT INTO `chitietnhan` (`MaDK`, `NguoiNhan`, `TrangThai`) VALUES
(1, 2, 0),
(2, 2, 0);

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
  `NguoiGui` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NguoiXuLy` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `TrichYeu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MucDo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TacGia` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaDK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `congvan`
--

INSERT INTO `congvan` (`MaDK`, `SoKH`, `NgayVB`, `NguoiGui`, `NguoiXuLy`, `SoTrang`, `TrichYeu`, `MucDo`, `TacGia`) VALUES
(1, '224', '2013-10-18', '1', 2, 1, 'Đóng tiền học phí', 'khẩn', 'CTSV'),
(2, '225', '2013-10-10', '3', 2, 1, 'đào tạo sau đại học ', 'khẩn', 'Đào tạo'),
(3, '3434', '2013-10-24', '2', 1, 1, '123sdf fs fsd f', '1', 'hiphop'),
(4, '4585', '2013-10-25', '2', 1, 1, 'Trích yếu hip hop', '1', 'Oh my god'),
(5, '87935', '2013-10-02', '2', 1, 1, 'Hsd jas dk ke', '1', 'Thua nfair na dfp'),
(6, '121212', '2013-10-10', '2', 1, 1, '2saf dafe', '0', '123 af'),
(7, '23424', '2013-10-28', '2', 3, 1, 'asd asda sd', '0', '2 è das '),
(8, '24234', '2013-10-28', '1', 2, 2, 'gemini', '0', 'sadfdsad'),
(9, '12123', '2013-10-29', '2', 3, 1, '2saf dafedasd', '1', 'asdsa'),
(10, '123232', '2013-10-29', '2', 1, 1, '1sd sd', 'Hỏa Tốc', 'sadd');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `MaFile` int(11) NOT NULL AUTO_INCREMENT,
  `MaDK` int(11) NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaFile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`MaFile`, `MaDK`, `url`) VALUES
(1, 1, 'a.doc'),
(2, 1, 'b.doc'),
(3, 2, 'c.doc'),
(12, 8, 'THAY LOI KET_1.doc'),
(11, 8, 'THAY LOI KET.doc'),
(13, 10, '2.docx');

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
(2, 'Nhân Viên CTSV', '1989-10-25', '023412444', 'geminithienbin@yahoo', '234 auco', 3, 2),
(3, 'Trưởng phòng Tài Chính', '1971-10-26', '023412444', 'geminixunu@yahoo', '234 au co', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE IF NOT EXISTS `phongban` (
  `MaPB` int(11) NOT NULL AUTO_INCREMENT,
  `TenPB` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ChucNang` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`MaPB`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `ChucNang`) VALUES
(1, 'CÔng tác sinh viên', 'sinh viên'),
(2, 'tài chính', 'ssssss'),
(3, 'đào tạo', 'sdsdsdsd');

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
('congtacsinhvien', '123456', 2, 2);

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_chucvu`()
BEGIN 
  SELECT *  FROM chucvu; 
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_congvan`()
BEGIN 
  SELECT *  FROM congvan; 
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_nhanvien`()
BEGIN 
  SELECT *  FROM nhanvien; 
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_phongban`()
BEGIN 
  SELECT *  FROM phongban; 
  END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
