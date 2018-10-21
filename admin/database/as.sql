-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 03:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `as`
--

-- --------------------------------------------------------

--
-- Table structure for table `catergoires`
--

CREATE TABLE `catergoires` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` blob NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catergoires`
--

INSERT INTO `catergoires` (`id`, `name`, `img`, `visible`) VALUES
(1, 'معالم سياحيه', 0x353738323031365f34202831292e6a7067, 1),
(2, 'أماكن تاريخيه', 0x6b6f74315f312e6a7067, 1),
(3, 'اماكن دنينه', 0x49726171695f4d6f737175652e6a7067, 1),
(4, 'فنادق', 0x323031382d30382d31332e6a7067, 1),
(5, 'مطاعم', 0x323031372d31322d3035202831292e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `id_catergo` int(11) NOT NULL,
  `detials` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `img` blob NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `id_catergo`, `detials`, `address`, `location`, `img`, `status`) VALUES
(1, 1, 'تعتبر سدة الكوت شعارا لمحافظة واسط.. فهي رمز المدينة وأحد\r\n أهم معالمها', 'سدة الكوت', 'https://www.google.com/maps/place/%D8%B3%D8%AF+%D8%A7%D9%84%D9%83%D9%88%D8%AA%D8%8C+%D9%83%D9%88%D8%AA%E2%80%AD/@32.4988315,45.8200264,17z/data=!3m1!4b1!4m5!3m4!1s0x3fe3b8ba10161ee7:0xeef40967a80f6f2a!8m2!3d32.4988315!4d45.8178377?hl=ar IQ', 0x696d67322e6a7067, 1),
(2, 4, 'احد الفنادق في محافظة واسط \r\n0781 662 1622', 'فندق قطر الندى', 'https://goo.gl/maps/GH3nQaYNhFS2', 0x686f74656c2e6a7067, 1),
(3, 5, 'احد المطاعم في واسط', 'مطعم الرسول', 'https://goo.gl/maps/D59SoZkzg7R2', 0x323031372d31322d30352e6a7067, 0),
(4, 5, 'احد المطاعم في واسط', 'مطعم الارز', 'https://goo.gl/maps/a68njiWjXKu', 0x323031382d30372d32392e6a7067, 1),
(5, 5, 'العنوان شارع الهورة، كوت', 'مطعم مضايف اهلنه', 'https://goo.gl/maps/k8i8MFatdDN2', 0x494d475fd9a2d9a0d9a1d9a8d9a0d9a4d9a2d9a35fd9a2d9a3d9a1d9a1d9a5d9a62e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_or_admin`
--

CREATE TABLE `users_or_admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_or_admin`
--

INSERT INTO `users_or_admin` (`id`, `user_name`, `email`, `password`, `type`) VALUES
(13, 'amaal', 'amaal.hussien09@yahoo.com', '$2y$10$Ld0b0xGwAObuLqX97yQcOe6N2w/roc73mygxy/D.U9jV.uV.gbgJG', 1),
(14, 'ahmed', 'ahmed.ali@yahoo.com', '$2y$10$8t7n3E3aWLcOM5NFkQGdMeZC.dh9WSULw60revyVuxpuRyK5ez79i', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catergoires`
--
ALTER TABLE `catergoires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catergo` (`id_catergo`);

--
-- Indexes for table `users_or_admin`
--
ALTER TABLE `users_or_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catergoires`
--
ALTER TABLE `catergoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_or_admin`
--
ALTER TABLE `users_or_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
