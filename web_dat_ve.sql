-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_dat_ve`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProducts` ()   BEGIN
   DECLARE gioBatDau TIME DEFAULT '7:30';  -- Giờ bắt đầu chiếu phim
    DECLARE ngayHomNay DATE;
    DECLARE pid INT DEFAULT 12;
    DECLARE pcid INT DEFAULT 4;
    DECLARE thoi_gian VARCHAR(5); -- Biến để lưu thời gian phim

    SET ngayHomNay = CURDATE();

    WHILE pid >=1 DO
        if giobatdau <= '23:00'
        then
        -- Lấy thời lượng phim từ bảng phim
        SELECT CONCAT(FLOOR(ptime / 60), ':', ptime % 60) INTO thoi_gian FROM phim WHERE pid = pid LIMIT 1;


        -- Chèn dữ liệu vào bảng lichchieu
        INSERT INTO lichchieu(giochieu, ngaychieu, pid, pcid)
        VALUES(gioBatDau, ngayHomNay, pid, pcid);

        -- Tăng giờ bắt đầu lên thêm thời lượng của phim và 30 phút
        SET gioBatDau = ADDTIME(gioBatDau,ADDTIME( thoi_gian , '00:30'));
		END if;
        
        SET pid = pid - 1;
        
    END WHILE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemDuLieuBangNgayMai` ()   BEGIN
    -- Khai báo biến cho ngày mai
    DECLARE ngayMai DATE;

    -- Thiết lập ngày mai
    SET ngayMai = DATE_ADD(CURDATE(), INTERVAL 1 DAY);

    -- Thêm dữ liệu vào bảng lichchieu với ngày chiếu là ngày mai
    INSERT INTO lichchieu(giochieu, ngaychieu, pid, pcid)
    SELECT giochieu, ngayMai, pid, pcid FROM lichchieu WHERE ngaychieu='2024-04-23';

    -- Hiển thị dữ liệu sau khi đã thêm
    SELECT * FROM lichchieu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themgio` ()   BEGIN
   DECLARE gioBatDau TIME DEFAULT '08:00';  -- Giờ bắt đầu chiếu phim
    DECLARE ngayHomNay DATE;
    DECLARE pid INT DEFAULT 1;
    DECLARE pcid INT DEFAULT 1;
    DECLARE thoi_gian VARCHAR(5); -- Biến để lưu thời gian phim

    SET ngayHomNay = CURDATE();

    WHILE pid <= 4 DO
        -- Lấy thời lượng phim từ bảng phim
        SELECT CONCAT(FLOOR(ptime / 60), ':', ptime % 60) INTO thoi_gian FROM phim WHERE pid = pid;

        -- Chèn dữ liệu vào bảng lichchieu
        INSERT INTO lichchieu(ptime, pdate, pid, pcid)
        VALUES(gioBatDau, ngayHomNay, pid, pcid);

        -- Tăng giờ bắt đầu lên thêm thời lượng của phim và 30 phút
        SET gioBatDau = ADDTIME(gioBatDau, thoi_gian + '00:30');

        SET pid = pid + 1;
        SET pcid = pcid + 1;
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `comdate` datetime NOT NULL,
  `comcontent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `hdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `ID`, `pname`, `hdate`) VALUES
(1, 2, 'Bộ Phim 1', '2024-04-03 10:00:00'),
(2, 3, 'Bộ Phim 2', '2024-04-03 14:30:00'),
(3, 2, 'Bộ Phim 3', '2024-04-04 12:00:00'),
(4, 4, 'Bộ Phim 4', '2024-04-04 16:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `lichchieu`
--

CREATE TABLE `lichchieu` (
  `lcid` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `ngaychieu` date NOT NULL,
  `giochieu` time NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichchieu`
--

INSERT INTO `lichchieu` (`lcid`, `pcid`, `ngaychieu`, `giochieu`, `pid`) VALUES
(1, 1, '2024-04-21', '08:00:00', 1),
(2, 1, '2024-04-21', '10:30:00', 2),
(3, 1, '2024-04-21', '13:00:00', 3),
(4, 1, '2024-04-21', '15:30:00', 4),
(5, 1, '2024-04-21', '18:00:00', 5),
(6, 1, '2024-04-21', '20:30:00', 6),
(7, 1, '2024-04-21', '23:00:00', 7),
(8, 2, '2024-04-21', '08:00:00', 7),
(9, 2, '2024-04-21', '10:30:00', 8),
(10, 2, '2024-04-21', '13:00:00', 9),
(11, 2, '2024-04-21', '15:30:00', 10),
(12, 2, '2024-04-21', '18:00:00', 11),
(13, 2, '2024-04-21', '20:30:00', 12),
(14, 2, '2024-04-21', '21:00:00', 1),
(15, 3, '2024-04-21', '07:30:00', 2),
(16, 3, '2024-04-21', '10:00:00', 3),
(17, 3, '2024-04-21', '12:30:00', 4),
(18, 3, '2024-04-21', '15:00:00', 5),
(19, 3, '2024-04-21', '17:30:00', 6),
(20, 3, '2024-04-21', '20:00:00', 7),
(21, 3, '2024-04-21', '22:30:00', 8),
(22, 4, '2024-04-21', '07:30:00', 8),
(23, 4, '2024-04-21', '10:00:00', 9),
(24, 4, '2024-04-21', '12:30:00', 10),
(25, 4, '2024-04-21', '15:00:00', 11),
(26, 4, '2024-04-21', '17:30:00', 12),
(28, 4, '2024-04-21', '07:30:00', 3),
(29, 4, '2024-04-21', '10:00:00', 4),
(30, 4, '2024-04-21', '12:30:00', 5),
(31, 4, '2024-04-21', '15:00:00', 6),
(32, 4, '2024-04-21', '17:30:00', 7),
(33, 4, '2024-04-21', '20:00:00', 8),
(34, 4, '2024-04-21', '22:30:00', 9),
(35, 5, '2024-04-21', '07:30:00', 12),
(36, 5, '2024-04-21', '10:00:00', 11),
(37, 5, '2024-04-21', '12:30:00', 10),
(38, 5, '2024-04-21', '15:00:00', 9),
(39, 5, '2024-04-21', '17:30:00', 8),
(40, 5, '2024-04-21', '20:00:00', 7),
(41, 5, '2024-04-21', '22:30:00', 6),
(42, 1, '2024-04-22', '08:00:00', 1),
(43, 1, '2024-04-22', '10:30:00', 2),
(44, 1, '2024-04-22', '13:00:00', 3),
(45, 1, '2024-04-22', '15:30:00', 4),
(46, 1, '2024-04-22', '18:00:00', 5),
(47, 1, '2024-04-22', '20:30:00', 6),
(48, 1, '2024-04-22', '23:00:00', 7),
(49, 2, '2024-04-22', '08:00:00', 7),
(50, 2, '2024-04-22', '10:30:00', 8),
(51, 2, '2024-04-22', '13:00:00', 9),
(52, 2, '2024-04-22', '15:30:00', 10),
(53, 2, '2024-04-22', '18:00:00', 11),
(54, 2, '2024-04-22', '20:30:00', 12),
(55, 2, '2024-04-22', '21:00:00', 1),
(56, 3, '2024-04-22', '07:30:00', 2),
(57, 3, '2024-04-22', '10:00:00', 3),
(58, 3, '2024-04-22', '12:30:00', 4),
(59, 3, '2024-04-22', '15:00:00', 5),
(60, 3, '2024-04-22', '17:30:00', 6),
(61, 3, '2024-04-22', '20:00:00', 7),
(62, 3, '2024-04-22', '22:30:00', 8),
(63, 4, '2024-04-22', '07:30:00', 8),
(64, 4, '2024-04-22', '10:00:00', 9),
(65, 4, '2024-04-22', '12:30:00', 10),
(66, 4, '2024-04-22', '15:00:00', 11),
(67, 4, '2024-04-22', '17:30:00', 12),
(68, 4, '2024-04-22', '07:30:00', 3),
(69, 4, '2024-04-22', '10:00:00', 4),
(70, 4, '2024-04-22', '12:30:00', 5),
(71, 4, '2024-04-22', '15:00:00', 6),
(72, 4, '2024-04-22', '17:30:00', 7),
(73, 4, '2024-04-22', '20:00:00', 8),
(74, 4, '2024-04-22', '22:30:00', 9),
(75, 5, '2024-04-22', '07:30:00', 12),
(76, 5, '2024-04-22', '10:00:00', 11),
(77, 5, '2024-04-22', '12:30:00', 10),
(78, 5, '2024-04-22', '15:00:00', 9),
(79, 5, '2024-04-22', '17:30:00', 8),
(80, 5, '2024-04-22', '20:00:00', 7),
(81, 5, '2024-04-22', '22:30:00', 6),
(2850, 1, '2024-04-23', '08:00:00', 1),
(2851, 1, '2024-04-23', '10:30:00', 2),
(2852, 1, '2024-04-23', '13:00:00', 3),
(2853, 1, '2024-04-23', '15:30:00', 4),
(2854, 1, '2024-04-23', '18:00:00', 5),
(2855, 1, '2024-04-23', '20:30:00', 6),
(2856, 1, '2024-04-23', '23:00:00', 7),
(2857, 2, '2024-04-23', '08:00:00', 7),
(2858, 2, '2024-04-23', '10:30:00', 8),
(2859, 2, '2024-04-23', '13:00:00', 9),
(2860, 2, '2024-04-23', '15:30:00', 10),
(2861, 2, '2024-04-23', '18:00:00', 11),
(2862, 2, '2024-04-23', '20:30:00', 12),
(2863, 2, '2024-04-23', '21:00:00', 1),
(2864, 3, '2024-04-23', '07:30:00', 2),
(2865, 3, '2024-04-23', '10:00:00', 3),
(2866, 3, '2024-04-23', '12:30:00', 4),
(2867, 3, '2024-04-23', '15:00:00', 5),
(2868, 3, '2024-04-23', '17:30:00', 6),
(2869, 3, '2024-04-23', '20:00:00', 7),
(2870, 3, '2024-04-23', '22:30:00', 8),
(2871, 4, '2024-04-23', '07:30:00', 8),
(2872, 4, '2024-04-23', '10:00:00', 9),
(2873, 4, '2024-04-23', '12:30:00', 10),
(2874, 4, '2024-04-23', '15:00:00', 11),
(2875, 4, '2024-04-23', '17:30:00', 12),
(2876, 4, '2024-04-23', '07:30:00', 3),
(2877, 4, '2024-04-23', '10:00:00', 4),
(2878, 4, '2024-04-23', '12:30:00', 5),
(2879, 4, '2024-04-23', '15:00:00', 6),
(2880, 4, '2024-04-23', '17:30:00', 7),
(2881, 4, '2024-04-23', '20:00:00', 8),
(2882, 4, '2024-04-23', '22:30:00', 9),
(2883, 5, '2024-04-23', '07:30:00', 12),
(2884, 5, '2024-04-23', '10:00:00', 11),
(2885, 5, '2024-04-23', '12:30:00', 10),
(2886, 5, '2024-04-23', '15:00:00', 9),
(2887, 5, '2024-04-23', '17:30:00', 8),
(2888, 5, '2024-04-23', '20:00:00', 7),
(2890, 5, '2024-04-24', '07:30:00', 12),
(2891, 5, '2024-04-24', '10:00:00', 11),
(2892, 5, '2024-04-24', '12:30:00', 10),
(2893, 5, '2024-04-24', '15:00:00', 9),
(2894, 5, '2024-04-24', '17:30:00', 8),
(2895, 5, '2024-04-24', '20:00:00', 7),
(2896, 5, '2024-04-24', '22:30:00', 6),
(2897, 1, '2024-04-24', '07:30:00', 1),
(2898, 1, '2024-04-24', '10:00:00', 2),
(2899, 1, '2024-04-24', '12:30:00', 3),
(2900, 1, '2024-04-24', '15:00:00', 4),
(2901, 1, '2024-04-24', '17:30:00', 5),
(2902, 1, '2024-04-24', '20:00:00', 6),
(2903, 1, '2024-04-24', '22:30:00', 7),
(2904, 2, '2024-04-24', '07:30:00', 3),
(2905, 2, '2024-04-24', '10:00:00', 4),
(2906, 2, '2024-04-24', '12:30:00', 5),
(2907, 2, '2024-04-24', '15:00:00', 6),
(2908, 2, '2024-04-24', '17:30:00', 7),
(2909, 2, '2024-04-24', '20:00:00', 8),
(2910, 2, '2024-04-24', '22:30:00', 9),
(2911, 3, '2024-04-24', '07:30:00', 5),
(2912, 3, '2024-04-24', '10:00:00', 6),
(2913, 3, '2024-04-24', '12:30:00', 7),
(2914, 3, '2024-04-24', '15:00:00', 8),
(2915, 3, '2024-04-24', '17:30:00', 9),
(2916, 3, '2024-04-24', '20:00:00', 10),
(2917, 3, '2024-04-24', '22:30:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `pid` int(11) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `pimg` varchar(255) NOT NULL,
  `ptime` int(11) NOT NULL,
  `pstatus` int(11) NOT NULL,
  `pvideo` text NOT NULL,
  `pngay_bat_dau` date DEFAULT NULL,
  `pngay_ket_thuc` date DEFAULT NULL,
  `ptuoi` int(5) DEFAULT NULL,
  `pdaodien` varchar(50) DEFAULT NULL,
  `pdienvien` text DEFAULT NULL,
  `pnoidung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phim`
--

INSERT INTO `phim` (`pid`, `pname`, `pprice`, `ptype`, `pimg`, `ptime`, `pstatus`, `pvideo`, `pngay_bat_dau`, `pngay_ket_thuc`, `ptuoi`, `pdaodien`, `pdienvien`, `pnoidung`) VALUES
(1, 'Quỷ Thuật', 50000, 'Kinh Dị', 'img/quy-thuat.jpg', 120, 1, 'https://www.youtube.com/embed/hY9rrw18BxY?si=lpxzTmXDDoqu93E_', '2024-03-06', '2024-05-24', 18, 'Visal Sem', 'Kirty Marie Day, Brendan Gallagher, Robert Uwe Mueller, Khemma Maria Metayer, Dylan Neou Janowski, Sveng Socheata,...', 'Quỷ thuật (The Ritual: Black Nun) là một bộ phim chiếu rạp kinh dị, giật gân Campuchia. Phim này, mang đến cho người xem câu chuyện về hàng loạt sự kiện bí ẩn buộc một gia đình phải đối mặt với sự mê tín của chính họ và khám phá niềm tin tâm linh của các tôn giáo'),
(2, 'Quỷ Cái(T18)', 60000, 'Kinh Dị', 'img/quy-cai.jpg', 90, 1, 'https://www.youtube.com/embed/IUpYjuwetjY?si=eToxcApxKZqrMB5S', '2024-04-01', '2024-05-17', 18, 'Visal Sem', 'Kirty Marie Day, Brendan Gallagher, Robert Uwe Mueller, Khemma Maria Metayer, Dylan Neou Janowski, Sveng Socheata,...', 'Quỷ thuật (The Ritual: Black Nun) là một bộ phim chiếu rạp kinh dị, giật gân Campuchia. Phim này, mang đến cho người xem câu chuyện về hàng loạt sự kiện bí ẩn buộc một gia đình phải đối mặt với sự mê tín của chính họ và khám phá niềm tin tâm linh của các tôn giáo'),
(3, 'thanh xuân 18x2: lữ trình hướng về em (t13)', 70000, 'Tình cảm ', 'img/thanh-xuan-18x2-poster-2.jpg', 110, 1, 'https://www.youtube.com/embed/8Pq08VsVUFk?si=VoTrekH38fv1TqUr', '2024-04-02', '2024-04-30', 18, 'Michihito Fujii', 'Hứa Quang Hán thủ vai Jimmy, Kiyohara Kaya thủ vai Ami, Trương Hiếu Toàn thủ vai Ryu, Shunsuke Michieda thủ vai Koji, Haru Kuroki thủ vai Yukiko, Yutaka Matsushige thủ vai Nakazato, Kuroki Hitomi thủ vai Yuko', 'Cậu học sinh trung học Jimmy (Hứa Quang Hán thủ vai) gặp Ami (Kyoya Kiyohara thủ vai), một du khách đến từ Nhật Bản, hơn anh 4 tuổi tại nơi anh làm việc. Cả hai cùng làm việc trong cùng một cửa hàng vào mùa hè năm đó và thế là Jimmy dần dần nảy sinh tình cảm với Ami.'),
(4, 'quật mộ trùng ma (t16)', 80000, 'Kinh Dị', 'img/quat-mo-trung-ma.jpg', 150, 1, 'https://www.youtube.com/embed/7LH-TIcPqks?si=QJT02cz2pl63CO3x', '2024-03-04', '2024-06-19', 18, 'Michihito Fujii', 'Hứa Quang Hán thủ vai Jimmy, Kiyohara Kaya thủ vai Ami, Trương Hiếu Toàn thủ vai Ryu, Shunsuke Michieda thủ vai Koji, Haru Kuroki thủ vai Yukiko, Yutaka Matsushige thủ vai Nakazato, Kuroki Hitomi thủ vai Yuko', 'Cậu học sinh trung học Jimmy (Hứa Quang Hán thủ vai) gặp Ami (Kyoya Kiyohara thủ vai), một du khách đến từ Nhật Bản, hơn anh 4 tuổi tại nơi anh làm việc. Cả hai cùng làm việc trong cùng một cửa hàng vào mùa hè năm đó và thế là Jimmy dần dần nảy sinh tình cảm với Ami.'),
(5, 'muôn vị nhân gian (t16)', 90000, 'Phiêu Lưu', 'img/muon-vi-nhan-gian.jpg', 135, 1, 'https://www.youtube.com/embed/5APPENpUdu0?si=2pU7WV5080sP3Xu6', '2024-03-20', '2024-05-08', 18, 'Trần Anh Hùng', ' Juliette Binoche vai Eugénie, Benoît Magimel vai Dodin Bouffant, Bonnie Chagneau-Ravoire vai Pauline, Jean-Marc Roulot vai Augustin ', ' Năm 1885, Eugénie đã làm đầu bếp cho chủ nhà hàng nổi tiếng Dodin trong 20 năm. Cô được coi là xuất sắc trong lĩnh vực của mình. Trong những năm qua, bởi Eugénie cùng Dodin dành rất nhiều thời gian vào bếp cùng nhau nên giữa họ đã nảy sinh tình cảm. '),
(6, 'GODZILLA X KONG: ĐẾ CHẾ MỚI 2D (K)', 100000, 'hành Động', 'img/godzilla-x-kong.jpg', 105, 1, 'https://www.youtube.com/embed/RXc2bs_aBuA?si=o_4XXPLbHaCQeNdj', '2024-04-03', '2024-05-06', 18, 'Trần Anh Hùng', ' Juliette Binoche vai Eugénie, Benoît Magimel vai Dodin Bouffant, Bonnie Chagneau-Ravoire vai Pauline, Jean-Marc Roulot vai Augustin ', ' Năm 1885, Eugénie đã làm đầu bếp cho chủ nhà hàng nổi tiếng Dodin trong 20 năm. Cô được coi là xuất sắc trong lĩnh vực của mình. Trong những năm qua, bởi Eugénie cùng Dodin dành rất nhiều thời gian vào bếp cùng nhau nên giữa họ đã nảy sinh tình cảm. '),
(7, 'đền mạng (t16)', 110000, 'Khoa Học Viễn Tưởng', 'img/den-mang.jpg', 125, 1, 'https://www.youtube.com/embed/Ys0SYxiI68Y?si=LlO8_4Z_AwTdmAzK', '2024-03-29', '2024-05-31', 19, 'Ekachai Sriwichai', 'Ekachai Sriwichai, Siwat Chotichaicharin, Ratchanok Suwannaket', 'Người cha quá cố đã phản bội lời thề khiến cho hồn ma Nang Rum nổi giận, quyết trả báo ứng lên người August bắt cầu đền mạng để chuộc tội . August sẽ tìm ra được lời thề để hóa giải lỗi lầm hay phải trả giá bằng tính mạng của bản thân'),
(8, 'sáng đèn', 120000, 'Thần Thoại', 'img/sang-den-poster.jpg', 140, 1, 'https://www.youtube.com/embed/B-ND66CrkRQ?si=JxTDjMXS6Red3wMf', '2024-03-21', '2024-05-16', 19, 'Ekachai Sriwichai', 'Ekachai Sriwichai, Siwat Chotichaicharin, Ratchanok Suwannaket', 'Người cha quá cố đã phản bội lời thề khiến cho hồn ma Nang Rum nổi giận, quyết trả báo ứng lên người August bắt cầu đền mạng để chuộc tội . August sẽ tìm ra được lời thề để hóa giải lỗi lầm hay phải trả giá bằng tính mạng của bản thân'),
(9, 'kung fu panda 4 2D lt (p)', 130000, 'Hoạt Hình', 'img/kungfu-panda-4-poster.jpg', 115, 1, 'https://www.youtube.com/embed/WLEhociPWzA?si=Rb_XCf_3XwBBWMir', '2024-03-13', '2024-04-26', 16, 'Mike Mitchell', ' Jack Black, Dustin Hoffman, James Hong, Awkwafina, ', 'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.'),
(10, 'mai (t18)', 140000, 'Tâm Lý', 'img/poster-mai.jpg', 100, 1, 'https://www.youtube.com/embed/EX6clvId19s?si=DPSTp49-mCKn21Of', '2024-04-02', '2024-05-31', 16, 'Mike Mitchell', ' Jack Black, Dustin Hoffman, James Hong, Awkwafina, ', 'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.'),
(11, 'người chết trờ về (t18)', 50000, 'Hành Động', 'img/deadman.jpg', 120, 1, 'https://www.youtube.com/embed/OcWPUd11mr0?si=i7dxvlDPhUx-ItW9', '2024-04-18', '2024-05-23', 16, ' Ha Jun Won', ' Jo Jin Woong, Kim Hee Ae, Lee Soo Kyung, Choi Soo Young', 'Phim xoay quanh gã giám đốc “hờ” Lee Man-Jae, kiếm sống bằng cách cho các doanh nghiệp mượn tên tuổi và giấy tờ của mình để làm người bù nhìn, đứng tên trên nhiều hoạt động kinh doanh'),
(12, 'hành tinh cát phần 2 (t16)', 60000, 'Hài Hước', 'img/hanh-tinh-cat-2.jpg', 90, 1, 'https://www.youtube.com/embed/Svt6DK9T130?si=Bb64c01kEK0R-kSv', '2024-04-04', '2024-04-27', 16, ' Ha Jun Won', ' Jo Jin Woong, Kim Hee Ae, Lee Soo Kyung, Choi Soo Young', 'Phim xoay quanh gã giám đốc “hờ” Lee Man-Jae, kiếm sống bằng cách cho các doanh nghiệp mượn tên tuổi và giấy tờ của mình để làm người bù nhìn, đứng tên trên nhiều hoạt động kinh doanh'),
(13, 'monkey man báo thù (t18)', 60000, 'Hành Động ', 'img/monkey-man.jpg', 120, 0, 'https://www.youtube.com/embed/zEOXpArv940?si=QxwpaphdUUfAHbO6', '2024-05-22', '2024-06-20', 16, 'Dev Patel', 'Dev Patel, Sharlto Copley, Pitobash, Sobhita Dhulipala, Sikandar Kher, Vipin Sharma, Ashwini Kalsekar, Adithi Kalkunte, Makarand Deshpande...', 'Một chàng trẻ vô danh, đã bắt đầu cuộc hành trình trả thù chống lại những kẻ lãnh đạo tham nhũng đã sát hại mẹ anh và đàn áp những người nghèo khổ và yếu thế hơn.'),
(14, 'trò chơi chết chóc (t16)', 70000, 'Kinh Dị', 'img/tro-choi-chet-choc-poster.jpg', 90, 0, 'https://www.youtube.com/embed/cp314fRuR6g?si=8tCjxMmaIEeK3fD2', '2024-05-08', '2024-05-25', 16, 'Dev Patel', 'Dev Patel, Sharlto Copley, Pitobash, Sobhita Dhulipala, Sikandar Kher, Vipin Sharma, Ashwini Kalsekar, Adithi Kalkunte, Makarand Deshpande...', 'Một chàng trẻ vô danh, đã bắt đầu cuộc hành trình trả thù chống lại những kẻ lãnh đạo tham nhũng đã sát hại mẹ anh và đàn áp những người nghèo khổ và yếu thế hơn.'),
(15, 'điềm báo của quỷ (T18)', 60000, 'kinh dị', 'img/diem-bao-cua-quy.jpg', 120, 0, 'https://www.youtube.com/embed/AVAnQaJ49l8?si=M0lJl4sB4cD7DeO-', '2024-05-17', '2024-05-24', 16, 'Arkasha Stevenson', 'Nell Tiger Free, Tawfeek Barhom, Sonia Braga, Ralph Ineson, and Bill Nighy', 'Khi một cô gái người Mỹ được đưa đến Rome để bắt đầu phụng sự Giáo Hội, cô đã phát hiện ra thế lực hắc ám khiến cô hoài nghi về đức tin của chính mình, đồng thời hé lộ một âm mưu kinh hoàng nhằm tái sinh linh hồn ác quỷ đầu thai đến nhân thế. '),
(16, 'hào quang đẫm máu', 300000, 'kinh dị ', 'img/hao-quang-dam-mau-poster.jpg', 90, 0, 'https://www.youtube.com/embed/DkPEFmYvDT4?si=R1fwGG0POY6TfqkM', '2024-05-25', '2024-06-29', 16, 'Arkasha Stevenson', 'Nell Tiger Free, Tawfeek Barhom, Sonia Braga, Ralph Ineson, and Bill Nighy', 'Khi một cô gái người Mỹ được đưa đến Rome để bắt đầu phụng sự Giáo Hội, cô đã phát hiện ra thế lực hắc ám khiến cô hoài nghi về đức tin của chính mình, đồng thời hé lộ một âm mưu kinh hoàng nhằm tái sinh linh hồn ác quỷ đầu thai đến nhân thế. '),
(17, 'ngày tàn của đế quốc', 567545, 'hành động', 'img/ngay-tan-cua-de-quoc_1.jpg', 89, 0, 'https://www.youtube.com/embed/QGlgPf9jGMA?si=tDOTEq9N9hjDy6jT', '2024-05-25', '2024-06-29', 18, 'Alex Garland', 'Kirsten Dunst, Wagner Moura, Cailee Spaeny,…', 'Trong một tương lai gần, một nhóm các phóng viên chiến trường quả cảm phải đấu tranh với thời gian và bom đạn nguy hiểm để đến kịp Nhà Trắng giữa bối cảnh nội chiến Hoa Kỳ đang tiến đến cao trào. '),
(18, 'b4s - trước giời \"yêu\"', 569830, 'tình cảm', 'img/b4s-truoc-gio-yeu.jpg', 96, 0, 'https://www.youtube.com/embed/JJ_SyVWN9g0?si=jdSQcebA5st_-QQ5', '2024-06-14', '2024-07-19', 18, 'Alex Garland', 'Kirsten Dunst, Wagner Moura, Cailee Spaeny,…', 'Trong một tương lai gần, một nhóm các phóng viên chiến trường quả cảm phải đấu tranh với thời gian và bom đạn nguy hiểm để đến kịp Nhà Trắng giữa bối cảnh nội chiến Hoa Kỳ đang tiến đến cao trào. '),
(19, 'biệt đội săn ma: kỷ nguyên băng giá', 99999, 'chiến thuật', 'img/biet-doi-san-ma.jpg', 80, 0, 'https://www.youtube.com/embed/XDXgU6u3WXk?si=bcBzAem8nt0iBmU0', '2024-06-22', '2024-07-26', 18, 'Alex Garland', 'William Atherton, Emily Alyn Lind, James Acaster, Annie Potts, Ernie Hudson', 'Sau các sự kiện của Ghostbusters: Afterlife, gia đình Spengler đang tìm kiếm cuộc sống mới ở Thành phố New York. Nhóm săn ma bao gồm Ray, Winston và Podcast sử dụng công nghệ mới để chống lại các mối đe dọa chết người cổ xưa đang ẩn náu trong các vật dụng hàng ngày. Thế nhưng, họ sẽ phải đối đầu với một thế lực đen tối hùng mạnh mới. '),
(20, 'Đóa hoa mong manh', 857677, 'tình cảm', 'img/doa-hoa-mong-manh.jpg', 90, 0, 'https://www.youtube.com/embed/11atDusAyWo?si=v26kr_jfO_V3LVal', '2024-05-18', '2024-06-22', 18, 'Gil Kenan', 'William Atherton, Emily Alyn Lind, James Acaster, Annie Potts, Ernie Hudson', 'Sau các sự kiện của Ghostbusters: Afterlife, gia đình Spengler đang tìm kiếm cuộc sống mới ở Thành phố New York. Nhóm săn ma bao gồm Ray, Winston và Podcast sử dụng công nghệ mới để chống lại các mối đe dọa chết người cổ xưa đang ẩn náu trong các vật dụng hàng ngày. Thế nhưng, họ sẽ phải đối đầu với một thế lực đen tối hùng mạnh mới. '),
(21, 'abigail', 47473, 'kinh dị', 'img/abigail.jpg', 90, 0, 'https://www.youtube.com/embed/xtAL2x58hns?si=UR8w54kK47l2LcZn', '2024-05-25', '2024-06-22', 16, 'Gil Kenan', 'Melissa Barrera, Dan Stevens, Alisha Weir, Kathryn Newton, William Catlett, Kevin Durand, Angus Cloud, Giancarlo Esposito', 'Abigail sống ở cửa hàng cùng gia đình. Đôi khi cô bất đồng với mẹ, người luôn lo lắng về lối sống khác thường của Abigail. Mẹ cô từng nói: \"Giá mà Abby chịu ăn mặc thích hợp hơn và đừng nhuộm tóc thành màu xanh nữa. Nó có màu tóc tự nhiên đẹp tuyệt vời, y như bà ngoại của nó vậy.'),
(22, 'tu viện máu', 88544, 'kinh dị', 'img/tu-vien-mau.jpg', 99, 0, 'https://www.youtube.com/embed/5ff3iUauZko?si=0UerwT_aJrQQB8-C', '2024-05-16', '2024-06-29', 18, 'Matt Bettinelli-Olpin, Tyler Gillett', 'Melissa Barrera, Dan Stevens, Alisha Weir, Kathryn Newton, William Catlett, Kevin Durand, Angus Cloud, Giancarlo Esposito', 'Abigail sống ở cửa hàng cùng gia đình. Đôi khi cô bất đồng với mẹ, người luôn lo lắng về lối sống khác thường của Abigail. Mẹ cô từng nói: \"Giá mà Abby chịu ăn mặc thích hợp hơn và đừng nhuộm tóc thành màu xanh nữa. Nó có màu tóc tự nhiên đẹp tuyệt vời, y như bà ngoại của nó vậy.'),
(23, 'yêu cuồng loạn', 87788, 'tình cảm', 'img/yeu-cuong-loan-poster.jpg', 88, 0, 'https://www.youtube.com/embed/Td37l9iYL2k?si=UZO_g4cAZB2dfyEw', '2024-06-22', '2024-05-25', 18, 'Matt Bettinelli-Olpin, Tyler Gillett', 'Kristen Stewart, Katy O\'Brian, Ed Harris', 'Cuộc tình mới chớm nở giữa nữ quản lý phòng tập Lou (Kristen Stewart) và vận động viên thể hình đầy tham vọng Jackie (Katy O’Brian) khiến cả hai bị lún sâu vào chuỗi những rắc rối đẫm máu liên quan đến gia đình tội phạm khét tiếng của Lou. '),
(24, 'luca 2d lt: mùa hè của luca (p)', 98999, 'phieu lưu', 'img/mua-he-cua-luca.jpg', 90, 0, 'https://www.youtube.com/embed/FzV3gRevq4Q?si=tHVHvk2PxIR7FtV5', '2024-05-25', '2024-06-14', 16, 'Rose Glass', 'Kristen Stewart, Katy O\'Brian, Ed Harris', 'Cuộc tình mới chớm nở giữa nữ quản lý phòng tập Lou (Kristen Stewart) và vận động viên thể hình đầy tham vọng Jackie (Katy O’Brian) khiến cả hai bị lún sâu vào chuỗi những rắc rối đẫm máu liên quan đến gia đình tội phạm khét tiếng của Lou. ');

-- --------------------------------------------------------

--
-- Table structure for table `phongchieu`
--

CREATE TABLE `phongchieu` (
  `pcid` int(11) NOT NULL,
  `pcname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongchieu`
--

INSERT INTO `phongchieu` (`pcid`, `pcname`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`, `fullname`, `address`, `phone`) VALUES
(2, 'long', 'binhnhi210203@gmail.com', '123', 'Trần Văn Long', 'Nam Định', '0934567893');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `lichchieu`
--
ALTER TABLE `lichchieu`
  ADD PRIMARY KEY (`lcid`);

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `phongchieu`
--
ALTER TABLE `phongchieu`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lichchieu`
--
ALTER TABLE `lichchieu`
  MODIFY `lcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2925;

--
-- AUTO_INCREMENT for table `phim`
--
ALTER TABLE `phim`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phongchieu`
--
ALTER TABLE `phongchieu`
  MODIFY `pcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
