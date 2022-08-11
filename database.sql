create database abc_clothing;
use abc_clothing;

CREATE TABLE `Categories` (
  `Category_ID` varchar(255) PRIMARY KEY NOT NULL,
  `Category_Name` varchar(255) NOT NULL
);

CREATE TABLE `Products` (
  `Product_ID` varchar(255) PRIMARY KEY NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Category_ID` varchar(255) NOT NULL,
  `Price` int NOT NULL,
  `Details` text,
  `Images` text NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Available` int NOT NULL
);

CREATE TABLE `Customers` (
  `Customer_ID` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Customer_Username` varchar(255) NOT NULL,
  `Customer_Password` varchar(255) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(255),
  `Date_of_Birth` Date
);

CREATE TABLE `Orders` (
  `Order_ID` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Customer_ID` int NOT NULL,
  `Receive_Phone` varchar(255) NOT NULL,
  `Receive_Address` varchar(255) NOT NULL,
  `Date` Date NOT NULL,
  `Status` varchar(255) NOT NULL
);

CREATE TABLE `Order_Details` (
  `Order_ID` int NOT NULL,
  `Product_ID` varchar(255) NOT NULL,
  `Quantity` int NOT NULL,
  `Size` varchar(255) NOT NULL,
  PRIMARY KEY (`Order_ID`, `Product_ID`)
);

CREATE TABLE `Admins` (
  `Admin_Username` varchar(255) PRIMARY KEY NOT NULL,
  `Admin_Password` varchar(255) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL
);

ALTER TABLE `Products` ADD FOREIGN KEY (`Category_ID`) REFERENCES `Categories` (`Category_ID`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`Customer_ID`) REFERENCES `Customers` (`Customer_ID`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`Order_ID`) REFERENCES `Orders` (`Order_ID`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`Product_ID`) REFERENCES `Products` (`Product_ID`);
