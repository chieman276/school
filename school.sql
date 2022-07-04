-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 10:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `name`, `gender`, `birthday`, `position`) VALUES
(1, 'Nguyễn Thị Ánh Tuyết', 'Nữ', '1965-03-01', 'Hiệu trưởng');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `soft_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `birthday`, `position`, `teacherID`, `soft_delete`) VALUES
(10, 'Nguyễn Thị Tú', 'Nam', '2004-05-22', 'Thành Viên', 3, 0),
(19, 'Trân Kim Nguyên', 'Nam', '2004-07-12', 'Thành Viên', 3, 0),
(21, 'Hồ Quỳnh Hương', 'Nam', '2006-05-04', 'Lớp Trưởng', 1, 0),
(22, 'Trần Kim Yến', 'Nam', '2006-07-06', 'Lớp Trưởng', 1, 0),
(53, 'Đặng Thùy Ngân', 'Nữ', '2004-05-22', 'Thành Viên', 3, 0),
(55, 'Hồ Sỹ Huy', 'Nam', '2004-04-24', 'Thành Viên', 3, 0),
(62, 'Dương Quang Huy', 'Nam', '2005-03-12', 'Thành Viên', 2, 0),
(66, 'Trịnh Trần Phương Tuấn', 'Nam', '2004-08-13', 'Tổ Trưởng', 3, 0),
(67, 'Nguyễn Quang Phú', 'Nam', '2002-04-24', 'Tổ Trưởng', 2, 0),
(80, 'Hoàng Thanh Huyền', 'Nữ', '2004-05-30', 'Lớp Trưởng', 3, 0),
(81, 'Trương Thanh Huyền', 'Nữ', '2004-03-30', 'Thành Viên', 3, 0),
(82, 'Hoàng Thị Thảo', 'Nữ', '2005-05-31', 'Lớp Trưởng', 2, 0),
(83, 'Hoàng Thị Thùy', 'Nữ', '2006-03-04', 'Thành Viên', 1, 0),
(84, 'Nguyễn Phương Trâm', 'Nam', '2006-07-23', 'Thành Viên', 1, 0),
(85, 'Lê Đức Trung', 'Nam', '2006-02-06', 'Thành Viên', 1, 0),
(86, 'Trần Kim Oanh', 'Nữ', '2005-06-23', 'Thành Viên', 2, 0),
(87, 'Trần Thị Ngọc Lan', 'Nữ', '2006-04-20', 'Tổ Trưởng', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `principalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `gender`, `birthday`, `position`, `principalID`) VALUES
(1, 'Cô Đỗ Mỹ Linh', 'Nữ', '1982-03-03', 'GVCN: lớp 10', 1),
(2, ' Thầy Ngô Đình Nam', 'Nam', '1982-03-03', 'GVCN: lớp 11', 1),
(3, 'Thầy Lưu Quang Vũ', 'Nam', '1982-03-03', 'GVCN: lớp 12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `principalID` (`principalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`principalID`) REFERENCES `principal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
