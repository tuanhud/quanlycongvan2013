-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2013 at 12:09 AM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
