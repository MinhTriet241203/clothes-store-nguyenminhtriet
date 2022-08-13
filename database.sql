create database abc_clothing;
use abc_clothing;

CREATE TABLE `Categories` (
  `Category_ID` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(50) NOT NULL
);

CREATE TABLE `Products` (
  `Product_ID` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(50) NOT NULL,
  `Category_ID` int(5) NOT NULL,
  `Price` int(4) NOT NULL,
  `Details` text,
  `Images` text NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Available` int(4) NOT NULL
);

CREATE TABLE `Customers` (
  `Customer_ID` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Customer_Username` varchar(100) NOT NULL,
  `Customer_Password` text NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Email` varchar(100),
  `Phone` varchar(10),
  `Address` varchar(100),
  `Gender` varchar(6),
  `Date_of_Birth` Date
);

CREATE TABLE `Orders` (
  `Order_ID` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(5) NOT NULL,
  `Receive_Phone` varchar(10) NOT NULL,
  `Receive_Address` varchar(100) NOT NULL,
  `Date` Date NOT NULL,
  `Status` varchar(10) NOT NULL
);

CREATE TABLE `Order_Details` (
  `Order_ID` int(5) NOT NULL,
  `Product_ID` int(5) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Size` varchar(10) NOT NULL,
  PRIMARY KEY (`Order_ID`, `Product_ID`)
);

CREATE TABLE `Admins` (
  `Admin_Username` varchar(100) PRIMARY KEY NOT NULL,
  `Admin_Password` text NOT NULL,
  `Admin_Name` varchar(50) NOT NULL
);

ALTER TABLE `Products` ADD FOREIGN KEY (`Category_ID`) REFERENCES `Categories` (`Category_ID`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`Customer_ID`) REFERENCES `Customers` (`Customer_ID`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`Order_ID`) REFERENCES `Orders` (`Order_ID`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`Product_ID`) REFERENCES `Products` (`Product_ID`);

INSERT INTO `admins` (`Admin_Username`, `Admin_Password`, `Admin_Name`) VALUES ('admin', 'admin', 'admin');