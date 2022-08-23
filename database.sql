CREATE abc_clothing
use abc_clothing
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 07:19 AM
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
-- Database: `abc_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_Username` varchar(100) NOT NULL,
  `Admin_Password` text NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Admin_Class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_Username`, `Admin_Password`, `Admin_Name`, `Admin_Class`) VALUES
('admin', 'admin', 'admin', 'Full Control'),
('huy', '$2y$10$r2zCb4/NVIbwhy7IrXE/Teq4E/MbqjzKnBpqaOwYC/4DTsLX..VOG', 'Dinh Quang Huy', 'Manager'),
('loc', '$2y$10$jhK6FHK1zLf75td0J3DAKOZ5DKJNcZbuww.htzwNVZBFvspLEqZTS', 'Truong Tan Loc', 'Product Operator'),
('phat', '$2y$10$U6bFPeP9ci3DIjIXVY/B9eW.HBRNs1EcZHYS3Ai4heTdb96rNaGY.', 'Nguyen Le Minh Phat', 'Manager'),
('tam', '$2y$10$H3fWY1U6o0eFFUbEb4UMHe9pSkF0jOfYyQMt4GK1cwvLxg5lwwh.y', 'Phan Minh Tam', 'Manager'),
('triet', '$2y$10$rWD8wICJc8PFjBdEt/2xBu5WekevvrSK2RfhMEl0CfecqknSr8RYG', 'Nguyen Minh Triet', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(5) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`, `Category_Image`) VALUES
(2, 'Shirt', '00000001510423Shirt.jpg'),
(3, 'Pants', '00000028510423Pants.jpg'),
(4, 'Hat', '00000037510423Hat.jpg'),
(5, 'Socks', '00000047510423Socks.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(5) NOT NULL,
  `Customer_Username` varchar(100) NOT NULL,
  `Customer_Password` text NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date_of_Birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(5) NOT NULL,
  `Customer_ID` int(5) NOT NULL,
  `Receive_Phone` varchar(10) NOT NULL,
  `Receive_Address` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_Details_ID` int(5) NOT NULL,
  `Order_ID` int(5) NOT NULL,
  `Product_ID` int(5) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(5) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Category_ID` int(5) NOT NULL,
  `Price` int(4) NOT NULL,
  `Details` text DEFAULT NULL,
  `Images` text NOT NULL,
  `Size` text NOT NULL,
  `Available` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Category_ID`, `Price`, `Details`, `Images`, `Size`, `Available`) VALUES
(1, 'Áo Polo nam Pique Cotton USA thấm hút tối đa', 2, 15, 'Chất liệu: 97% Cotton USA + 3% Spandex\r\nVới chất liệu Cotton USA chất lượng cao, mang lại sự mềm mại và thấm hút mồ hôi tốt\r\nCo giãn 4 chiều mang lại sự thoải mái khi mặc\r\nBo cổ dệt bằng sợi Cotton, viền phối Polyester để đảm bảo độ đàn hồi, chống bai và giữ màu qua các lần giặt\r\nForm áo hơi ôm eo và phù hợp với dáng nam giới Việt\r\nTự hào sản xuất tại Việt Nam', '00000036570423Shirt1-1.jpg@@@00000037570423Shirt1-2.jpg@@@00000037570423Shirt1-3.jpg@@@00000037570423Shirt1-4.jpg', 'S M L XL XXL', 50),
(2, 'Áo Tank top thể thao nam thoáng khí', 2, 5, 'Chất liệu 100% Recycle Polyester, theo xu hương thời trang bền vững\r\nVải được xử lý hoàn thiện theo công nghệ Wicking (thoáng khí) & Quick-Dry (Nhanh khô)\r\nKiểu dáng áo tanktop khoét nách sâu, đem đến sự thoải mái trong quá trình vận động\r\nNhà cung cấp vải hàng đầu thế giới trong lĩnh vực đồ thể thao: Promax\r\nTự hào may và hoàn thiện tại nhà máy Nobland, Bình Dương', '00000042110523Shirt2-1.jpg@@@00000042110523Shirt2-2.jpg@@@00000042110523Shirt2-3.jpg@@@00000042110523Shirt2-4.jpg', 'S M L XL', 50),
(3, 'Áo thun thể thao nam Recycle Active V1', 2, 8, 'Chất liệu 100% Recycle Polyester, theo xu hương thời trang bền vững\r\nVải được xử lý hoàn thiện theo công nghệ Wicking (thoáng khí) & Quick-Dry (Nhanh khô)\r\nKiểu dáng áo thun thể thao vừa vặn với dáng nam giới Việt Nam\r\nNhà cung cấp vải hàng đầu thế giới trong lĩnh vực đồ thể thao: Promax\r\nTự hào may và hoàn thiện tại nhà máy Nobland, Bình Dương', '00000001150523Shirt3-1.jpg@@@00000001150523Shirt3-2.jpg@@@00000001150523Shirt3-3.jpg@@@00000002150523Shirt3-4.jpg', 'M L XL', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_Username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_Details_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_Details_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
