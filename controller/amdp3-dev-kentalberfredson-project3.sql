-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 04:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amdp3-dev-kentalberfredson-project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `adminEmail` varchar(155) NOT NULL,
  `adminUsername` varchar(20) NOT NULL,
  `adminPhoneNumber` varchar(20) NOT NULL,
  `adminPassword` varchar(20) NOT NULL,
  `adminPhoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminEmail`, `adminUsername`, `adminPhoneNumber`, `adminPassword`, `adminPhoto`) VALUES
(1, 'admin_kent@gmail.com', 'Admin', '089511112222', 'Admin123', 'assets/userprofile.png'),
(2, 'admindummy@gmail.com', 'Admin2', '099999999999', 'Admin222', 'assets/userprofile.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(10) NOT NULL,
  `customerEmail` varchar(155) NOT NULL,
  `customerUsername` varchar(20) NOT NULL,
  `customerPhoneNumber` varchar(20) NOT NULL,
  `customerPassword` varchar(20) NOT NULL,
  `customerPhoto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerEmail`, `customerUsername`, `customerPhoneNumber`, `customerPassword`, `customerPhoto`) VALUES
(1, 'mamamia@gmail.com', 'Mamamia', '089512345678', 'Mamamia111', 'assets/userprofile.png'),
(2, 'sipalingcantik@gmail.com', 'Prettier', '0811111111111', 'Pretty123', 'assets/userprofile.png'),
(3, 'dummy01@gmail.com', 'Dummy', '098798768765', 'Hello123', 'assets/userprofile.png'),
(4, 'dummy02@gmail.com', 'Dummy2', '098712345678', 'Hello111', 'assets/userprofile.png'),
(5, 'dummy03@gmail.com', 'Dummy3', '098765433456', 'Hello333', 'assets/userprofile.png'),
(6, 'dummy04@gmail.com', 'Dummy4', '085256567474', 'Hello222', 'assets/userprofile.png'),
(7, 'dummy05@gmail.com', 'Dummy5', '085234566543', 'Hello555', 'assets/userprofile.png'),
(8, 'dummy06@gmail.com', 'Dummy6', '083256784736', 'Hello567', 'assets/userprofile.png'),
(9, 'dummy07@gmail.com', 'Dummy7', '085367875647', 'Hello777', 'assets/userprofile.png'),
(10, 'dummy08@gmail.com', 'Dummy8', '081337463728', 'Hello888', 'assets/userprofile.png'),
(11, 'dummy09@gmail.com', 'Dummy9', '081347385654', 'Hello989', 'assets/userprofile.png'),
(12, 'dummy10@gmail.com', 'Dummy10', '081387652345', 'Hello101', 'assets/userprofile.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderQty` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `customerID`, `productID`, `orderQty`, `rating`, `review`) VALUES
(1, 2, 1, 1, 5, 'Worth try'),
(2, 2, 2, 1, 4, 'Worth try'),
(3, 1, 11, 1, 3, 'B aja'),
(4, 2, 11, 1, 4, 'Worth try'),
(5, 1, 20, 5, 5, 'Enak banget'),
(6, 5, 17, 10, 4, 'Worth try'),
(7, 3, 26, 3, 5, 'Enak bangitzz'),
(8, 10, 25, 1, 2, 'Tidak worth it'),
(9, 7, 32, 2, 3, 'Kurang banyak'),
(10, 8, 35, 2, 5, 'Enak banget'),
(11, 8, 34, 2, 4, 'Ok la');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productQty` int(11) NOT NULL,
  `productPhoto` varchar(100) NOT NULL,
  `productDescription` varchar(100) NOT NULL,
  `productPrice` int(10) NOT NULL,
  `tenantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productCategory`, `productQty`, `productPhoto`, `productDescription`, `productPrice`, `tenantID`) VALUES
(1, 'Bakmi spesial khas Juara', 'Foods', 50, 'assets/bakmi.jpg', 'Bakmi dengan citra rasa yang siap bikin kamu jadi juara', 25000, 1),
(2, 'Nasi goreng khas TiaTiaMu', 'Foods', 50, 'assets/nasigoreng.jpg', 'Nasi goreng dengan aroma khas yang bisa bikin kamu ketagihan', 18000, 3),
(8, 'Jus Jeruk', 'Foods', 30, 'logos/16112022114214jusjeruk.jpg', 'Jus ini dapat bikin harimu menjadi senantiasa segarrrrr', 12000, 1),
(10, 'Bakmi Polos', 'Foods', 30, 'logos/16112022122414bakmipolos.jpg', 'Cocok untuk mahasiswa akhir bulan', 17000, 1),
(11, 'Bihun Kuah', 'Foods', 50, 'logos/16112022122821bihunkuah.jpg', 'Bosan dengan mi? Cobain gih varian bihunnya!', 25000, 1),
(12, 'Kwetiau Kuah', 'Foods', 50, 'logos/16112022122944kwetiaukuah.jpg', 'Kwetiaunya juga tak kalah enaknya lhooo, yakin ga coba?', 25000, 1),
(13, 'Air Putih', 'Foods', 200, 'logos/16112022123034airputih.jpg', 'Gratis?! Jangan harap!', 3000, 1),
(14, 'Teh', 'Foods', 100, 'logos/16112022123148teh.jpg', 'Jangan ketipu gambar! 5000 itu hanya 1 aja kak', 5000, 1),
(15, 'Bihun Goreng', 'Foods', 50, 'logos/16112022123419bihungoreng.jpg', 'Aroma bihun yang bisa bikin kamu sering datang', 18000, 3),
(16, 'Kwetiau Goreng', 'Foods', 50, 'logos/16112022123503kwetiaugoreng.jpg', 'Yakin ga mau coba? Enak bingitzzz', 18000, 3),
(17, 'Bakwan', 'Foods', 70, 'logos/16112022123554bakwan.jpg', 'Gorengan khas TiaTiaMu yang tak pernah mengecewakan', 5000, 3),
(18, 'Air Putih', 'Foods', 200, 'logos/16112022123704airputih.jpg', 'Air.......ya......air aja siii', 2000, 3),
(19, 'Jus Jeruk', 'Foods', 50, 'logos/16112022123746jusjeruk.jpg', 'Jus khas TiaTiaMu yang sering dibeli', 12000, 3),
(20, 'Nasi Goreng khas NasiGoyeng', 'Foods', 50, 'logos/16112022124443nasigoreng.jpg', 'Harga mantap kualitas mantap!', 30000, 4),
(21, 'Pisang Goreng', 'Foods', 50, 'logos/16112022124541pisanggoreng.jpg', 'Side dish kesukaan para tamu NasiGoyeng', 5000, 4),
(22, 'Bakwan', 'Foods', 50, 'logos/16112022124650bakwan.jpg', 'Bakwannya juga enak, gih cobain!', 5000, 4),
(23, 'Teh', 'Foods', 100, 'logos/16112022124728teh.jpg', 'Aromanya harum', 5000, 4),
(24, 'Bir Bintang', 'Drinks', 20, 'logos/16112022125136birbintang.jpg', '*Khusus 21+', 50000, 6),
(25, 'Soju', 'Drinks', 30, 'logos/16112022125223soju.jpg', '*Khusus 21+', 120000, 6),
(26, 'Nasi Campur', 'Foods', 100, 'logos/16112022130000nasicampur.jpg', 'Nasi campur khas Pork-a-chiu yang bikin ketagihan', 30000, 9),
(27, 'Nasi Daging Merah', 'Foods', 50, 'logos/16112022130106nasidagingmerah.jpg', 'Menarik, bukan? Pesan aja!', 28000, 9),
(28, 'Nasi Samcan', 'Foods', 70, 'logos/16112022130217nasisamcan.jpg', 'Nasi dengan samcan khas Pork-a-chiu', 35000, 9),
(29, 'Air Mineral', 'Foods', 200, 'logos/16112022130241airputih.jpg', 'Minum itu harus!', 3000, 9),
(30, 'Teh', 'Foods', 100, 'logos/16112022130312teh.jpg', 'Tehnya bisa direquest mau manis atau tawar', 8000, 9),
(31, 'Jus Jeruk', 'Foods', 50, 'logos/16112022130343jusjeruk.jpg', 'Jus segar dengan kemanisan yang bisa diatur', 20000, 9),
(32, 'Steak', 'Foods', 50, 'logos/16112022130722steak.jpg', 'Premium medium-rare steak', 70000, 5),
(34, 'Regular Steak', 'Foods', 100, 'logos/16112022130835steakbiasa.jpg', 'Regular...thats it!', 50000, 5),
(35, 'Orange Juice', 'Foods', 50, 'logos/16112022130916jusjeruk.jpg', 'Premium and fresh juice', 30000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(10) NOT NULL,
  `tenantEmail` varchar(155) NOT NULL,
  `tenantUsername` varchar(20) NOT NULL,
  `tenantCategory` varchar(50) NOT NULL,
  `tenantRating` int(2) NOT NULL,
  `tenantPhoneNumber` varchar(20) NOT NULL,
  `tenantPassword` varchar(20) NOT NULL,
  `tenantLogo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantID`, `tenantEmail`, `tenantUsername`, `tenantCategory`, `tenantRating`, `tenantPhoneNumber`, `tenantPassword`, `tenantLogo`) VALUES
(1, 'bakmijuara@gmail.com', 'Bakmi Juara', 'Foods', 5, '085211235567', 'Bakmijuara1', 'logos/16112022075341bakmijuara.jpg'),
(3, 'tiatiamu@gmail.com', 'TiaTiaMu', 'Foods', 5, '098765436782', 'Tiatiamu111', 'logos/1611202203332715112022134907tiatiamu.jpg'),
(4, 'nasigoyeng@gmail.com', 'Nasi Goyeng', 'Foods', 5, '089510102323', 'Nasigoyeng123', 'logos/16112022061102nasigoyeng.jpg'),
(5, 'warungsteak@gmail.com', 'Warung Steak', 'Foods', 0, '089576765454', 'Tiuyh453', 'logos/16112022120433warungsteak.png'),
(6, 'alchochol@gmail.com', 'Alchochol', 'Drinks', 0, '089578789898', 'Itude340', 'logos/16112022121524alchochol.png'),
(9, 'porkachiu@gmail.com', 'Pork-a-chiu', 'Foods', 0, '085377772222', 'Lnhry650', 'logos/16112022125548porkachiu.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `tenantID` (`tenantID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
