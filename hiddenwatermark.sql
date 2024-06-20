-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 11:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiddenwatermark`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `text` varchar(500) NOT NULL,
  `encrypt` varchar(2000) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `image`, `text`, `encrypt`, `date`) VALUES
(11, 'upload/bg1.jpg', 'Test 1', 'base64', '2024-01-20 12:39:11.476653'),
(12, 'upload/bg1.jpg', 'Test 1', 'base64', '2024-01-20 12:49:31.310141'),
(14, 'upload/vlcsnap-2023-10-15-17h19m10s712.png', 'Test 2', 'md5', '2024-01-20 12:51:25.664707'),
(15, 'upload/logo.png', 'Test 3', 'sha256', '2024-01-20 12:51:39.984670'),
(16, 'upload/IMG_1370.JPG', 'demo text', 'base64', '2024-01-21 08:07:58.649027'),
(17, 'upload/IMG_1400.JPG', 'dfghjk', 'md5', '2024-01-21 08:08:37.293854'),
(18, 'upload/IMG_1377.JPG', 'ZGVtbw==', 'base64', '2024-01-21 08:27:14.387762');

-- --------------------------------------------------------

--
-- Table structure for table `watermarks`
--

CREATE TABLE `watermarks` (
  `id` int(11) NOT NULL,
  `simpletext` varchar(999) NOT NULL,
  `image` varchar(255) NOT NULL,
  `watermarkText` varchar(9999) NOT NULL,
  `encryptionTechnique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watermarks`
--

INSERT INTO `watermarks` (`id`, `simpletext`, `image`, `watermarkText`, `encryptionTechnique`) VALUES
(49, 'demo', 'uploads/-1040189287Screenshot (242).png', 'fe01ce2a7fbac8fafaed7c982a04e229', 'md5'),
(50, 'demo', 'uploads/-293047561Screenshot (242).png', 'fe01ce2a7fbac8fafaed7c982a04e229', 'md5'),
(51, 'sushil mohad', 'uploads/-108182260Screenshot (245).png', '897141020e7766249cf60f5abe8d9e144ca5f98f713431e4cd8497c7feeec33b', 'sha256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watermarks`
--
ALTER TABLE `watermarks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `watermarks`
--
ALTER TABLE `watermarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
