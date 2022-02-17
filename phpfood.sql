-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 11:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcart`
--
DROP DATABASE IF EXISTS `phpfood`;
CREATE DATABASE IF NOT EXISTS `phpfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpfood`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(12) UNSIGNED NOT NULL,
  `categoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categorySort` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categorySort`) VALUES
(1, '日式', 1),
(2, '韓式', 2),
(3, '中式', 3),
(4, '義式', 4),
(5, '飲料', 5);

-- --------------------------------------------------------
CREATE TABLE `resturant` ( 
  `categoryID` int(12) UNSIGNED NOT NULL,
  `resturantID` int(12) UNSIGNED NOT NULL,
  `resturantPhoto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resturantName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resturantAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resturantPhone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resturantSort` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resturant`
--

INSERT INTO `resturant` ( `categoryID`,`resturantID`, `resturantPhoto`,`resturantName`,`resturantAddress`,`resturantPhone`,`resturantSort`) VALUES
(1, 1,'art.jpeg','美術系','台北市文山區景文街43號','02-2599-5089',1),
(1, 2,'hexin.jpg','和興食堂','台北市文山區木柵路一段73號','02-2236-7314',2),
(2, 3,'do.jpeg','哆食樂韓式料理','台北市文山區木柵路一段209號','02-2236-4588',3),
(3, 4,'lulu.jpg','HOT HEART LULU 早午餐','台北市文山區木柵路一段69號','02-2236-5521',4),
(3, 5,'hamburger.jpg','摩根漢堡','台北市文山區木柵路一段38之1號','02-2236-0658',5),
(3, 6,'five.jpg','五花馬手工麵坊','台北市文山區木柵路一段100號','02-2236-0579',6),
(4, 7,'mint.jpg','MINT PASTA 綠薄荷麵食坊','台北市文山區景興路274之2號','02-2933-0811',7),
(4, 8,'manny.jpeg','蔓尼義大利麵坊','台北市文山區景興路282巷5號','02-2935-8111',8),
(5, 9,'comebuy.jpg','COMEBUY','台北市文山區木柵路一段17巷1號','02-2236-1608',9),
(5, 10,'chingshin.jpeg','清心福全','台北市文山區木柵路一段165號','02-2236-3883',10);

-- --------------------------------------------------------
CREATE TABLE `food` (
  `foodID` int(12) UNSIGNED NOT NULL,
  `resturantID` int(12) UNSIGNED NOT NULL,  
  `foodName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foodPrice` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` ( `resturantID`, `foodID`,`foodName`,`foodPrice`) VALUES
(1, 1,'豆皮壽司',50),
(1, 2,'綜合壽司',70),
(1, 3,'味噌湯',25),
(2, 4,'活力牛丼',129),
(2, 5,'活力豬丼',119),
(2, 6,'元氣炸豬排',129),
(3, 7,'豬肉泡菜燒肉蓋飯',150),
(3, 8,'牛肉泡菜燒肉蓋飯',150),
(3, 9,'海鮮煎餅（小）',120),
(4, 10,'自製手工蒜香吐司',40),
(4, 11,'nutella巧克力吐司',40),
(4, 12,'薯條',50),
(5, 13,'薯餅蛋餅',35),
(5, 14,'鮪魚蛋餅',35),
(5, 15,'豬肉蛋堡',40),
(5, 16,'紅茶（中）',20),
(5, 17,'奶茶（中）',20),
(6, 18,'茄汁牛肉麵',100),
(6, 19,'肉絲炒飯',60),
(6, 20,'酸辣湯',30),
(7, 21,'粉紅醬起司雞肉麵',150),
(7, 22,'香蒜白酒蛤蠣細麵',140),
(7, 23,'法式燻鴨義大利麵',140),
(8, 24,'蕃茄奶油肉醬麵',90),
(8, 25,'青醬奶油培根麵',120),
(8, 26,'咖哩奶油海鮮飯',150),
(9, 27,'金萱茶',40),
(9, 28,'烏龍拿鐵',60),
(9, 29,'招牌奶茶',45),
(10, 30,'鮮奶茶',60),
(10, 31,'錫蘭奶紅',50),
(10, 32,'原鄉四季',30);
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `account` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(15) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `sex` char(2) NOT NULL DEFAULT '',
  `date` date DEFAULT NULL,  
  `phone` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT ''  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `sex`, `date`,`phone`, `address`, `email`) VALUES
(1, 'guest', 'guest', '阿凱', '男', '2000/09/09', '(0968) 568-854', '台北市大安區師大路 20 號', 'kai@ms17.url.com.tw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `resturant`
--
ALTER TABLE `resturant`
  ADD PRIMARY KEY (`resturantID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);
  
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resturant`
--
ALTER TABLE `resturant`
  MODIFY `resturantID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
