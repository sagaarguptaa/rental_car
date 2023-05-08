-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 03:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`) VALUES
(1, 'sagar', 'sagar');


-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `sno` int(11) NOT NULL,
  `vid` bigint(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `fromdate` varchar(255) DEFAULT NULL,
  `todate` varchar(255) DEFAULT NULL,
  `day` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pickupadd` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`sno`, `vid`, `email`, `fromdate`, `todate`, `day`, `price`, `pickupadd`, `status`, `postdate`) VALUES
(5, 2, 'sagar@gmail.com', '2022-02-16', '2022-02-24', 8, 7000, ' ewqrwrewrwere', 1, '2022-02-14 07:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblcancel`
--

CREATE TABLE `tblcancel` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `sno` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`sno`, `fullname`, `email`, `message`, `date`) VALUES
(5, 'sagar', 'sagar@gmail.com', 'my booking is not conirmed yet.Plz help', '2022-08-15 19:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `Status` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `email`, `price`, `Status`, `date`) VALUES
(3, 'sagar@gmail.com', 7000, 'paid', '2022-08-14 13:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `sno` int(11) NOT NULL,
  `subscriberemail` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`sno`, `subscriberemail`, `date`) VALUES
(2, 'sagar@gmail.com', '2022-08-13 12:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` text NOT NULL,
  `aadhar` text NOT NULL,
  `license` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`sno`, `name`, `email`, `phone`, `address`, `aadhar`, `license`, `password`, `datetime`) VALUES
(9, 'Sagar', 'sagar@gmail.com', 9897969594, '102,sadruru dham,padwal ', '123831255327', 'D32157635215675', '$2y$10$gGWMi3/QgS75oqfiMZd7QuDgZVtIAHYrFrgJ/cDhcQHQ9CV3BM/8S', '2022-02-14 12:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `id` int(11) NOT NULL,
  `model` varchar(150) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `overview` varchar(4000) NOT NULL,
  `price/day` int(6) NOT NULL,
  `image1` varchar(120) NOT NULL,
  `status` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `upd_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`id`, `model`, `brand`, `overview`, `price/day`, `image1`, `status`, `reg_date`, `upd_date`) VALUES
(1, 'Volkswagen Tiguan', ' Volkswagen', ' Petrol - 1984 cc, 12.65 Km/L, 5 seater, Automatic', 1000, ' img/volkswagen-tiguan.jpg', 1, '2021-12-31 11:26:39', '2021-12-31 17:14:06'),
(2, 'Hyundai Alcazar', 'Hyundai', 'Petrol - 1999 cc Diesel - 1493 cc, Petrol - 14.5 Km/L Diesel - 20.4 Km/L, 7 Seater, Manual Automatic', 800, 'img/hyundai-alcazar.jpg', 1, '2021-12-31 11:33:25', '2021-12-31 12:28:57'),
(3, 'Kia Carnival', 'Kia', 'Diesel - 2199 cc, Diesel - 13.9 Km/L, 7 Seater, Automatic', 1000, 'img/kia-carnival.jpg', 1, '2021-12-31 12:10:23', '2021-12-31 13:07:05'),
(4, 'Maruti Suzuki Celerio', 'Maruti Suzuki', 'Petrol - 998 cc, Petrol - 26.68 Km/L, 5 Seater, Manual Automatic', 500, 'img/maruti-celerio.jpg', 1, '2021-12-31 11:41:37', '2021-12-31 12:39:46'),
(5, 'Toyota Innova Crysta', 'Toyota', 'Petrol - 2694 cc Diesel - 2393, ccPetrol - Km/L Diesel - Km/L, 7 Seater, Manual Automatic', 1000, 'img/toyota-innova-crysta.jpg', 1, '2021-12-31 12:12:55', '2021-12-31 13:10:41'),
(6, 'MG Astor', 'MG', 'Petrol - 1498 cc, Petrol - 18 Km/L, 5 Seater, Manual Automatic', 700, 'img/mg-astor.jpg', 1, '2021-12-31 11:47:29', '2021-12-31 12:44:46'),
(7, 'Hyundai Creta', 'Hyundai', 'Petrol - 1497 cc Diesel - 1493 cc, Petrol - 16.9 Km/L Diesel - 21.4 Km/L, 5 Seater, Manual Automatic', 800, 'img/hyundai-creta-2020-image.jpg', 1, '2021-12-31 12:14:59', '2021-12-31 13:13:25'),
(8, 'Kia Sonet', 'Kia', 'Petrol - 998 cc Diesel - 1493 cc, Petrol - 18.4 Km/L Diesel - 24.1 Km/L, 5 Seater, Manual Automatic', 700, 'img/kia-sonet.jpg', 1, '2021-12-31 11:53:13', '2021-12-31 12:50:01'),
(9, 'Skoda Rapid', 'Skoda', 'Petrol - 999 cc, Petrol - 999 cc, 5 Seater, Manual Automatic', 700, 'img/skoda-rapid-2020.jpg', 1, '2021-12-31 11:55:31', '2021-12-31 12:53:16'),
(10, 'Tata Altroz', 'Tata', 'Petrol - 1199 cc Diesel - 1497 cc, Petrol - 19.05 Km/L Diesel - 25.11 Km/L, 5 Seater, Manual', 500, 'img/tata-altroz.jpg', 1, '2021-12-31 11:39:03', '2021-12-31 12:36:51'),
(11, 'Skoda Kushaq', 'Skoda', 'Petrol - 999 cc, Petrol - 17.95 Km/L, 5 Seater, Manual Automatic', 600, 'img/skoda-kushaq.jpg', 1, '2021-12-31 11:43:37', '2021-12-31 12:41:39'),
(12, 'Tata Punch', 'Tata', 'Petrol - 1199 cc, Petrol - 18.97 Km/L, 5 Seater, Manual Automatic', 600, 'img/tata-punch.jpg', 1, '2021-12-31 11:49:53', '2021-12-31 12:47:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblbooked`
--
ALTER TABLE `tblbooked`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblcancel`
--
ALTER TABLE `tblcancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tblvehicle` ADD FULLTEXT KEY `title` (`model`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooked`
--
ALTER TABLE `tblbooked`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcancel`
--
ALTER TABLE `tblcancel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
