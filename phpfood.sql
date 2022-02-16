-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-18 08:56:54
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `phpfood`
--
CREATE DATABASE IF NOT EXISTS `phpfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpfood`;

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryID` int(12) UNSIGNED NOT NULL,
  `categoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categorySort` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categorySort`) VALUES
(1, '日式', 1),
(2, '韓式', 2),
(3, '中式', 3),
(4, '義式', 4),
(5, '飲料', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `foodID` int(12) UNSIGNED NOT NULL,
  `resturantID` int(12) UNSIGNED NOT NULL,
  `foodName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foodPrice` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `food`
--

INSERT INTO `food` (`foodID`, `resturantID`, `foodName`, `foodPrice`) VALUES
(1, 1, '豆皮壽司', 50),
(2, 1, '綜合壽司', 70),
(4, 2, '味噌湯', 35),
(5, 2, '活力豬丼', 119),
(6, 2, '元氣炸豬排', 129),
(7, 3, '豬肉泡菜燒肉蓋飯', 150),
(8, 3, '牛肉泡菜燒肉蓋飯', 150),
(9, 3, '海鮮煎餅(小)', 120),
(10, 4, '自製手工蒜香吐司', 40),
(11, 4, 'nutella巧克力吐司', 40),
(12, 4, '薯條', 50),
(13, 5, '薯餅蛋餅', 35),
(14, 5, '鮪魚蛋餅', 35),
(15, 5, '豬肉蛋堡', 40),
(16, 5, '紅茶（中）', 20),
(17, 5, '奶茶（中）', 20),
(18, 6, '茄汁牛肉麵', 100),
(19, 6, '肉絲炒飯', 60),
(20, 6, '酸辣湯', 30),
(21, 7, '粉紅醬起司雞肉麵', 150),
(22, 7, '香蒜白酒蛤蠣細麵', 140),
(23, 7, '法式燻鴨義大利麵', 140),
(24, 8, '蕃茄奶油肉醬麵', 90),
(25, 8, '青醬奶油培根麵', 120),
(26, 8, '咖哩奶油海鮮飯', 150),
(27, 9, '金萱茶', 40),
(28, 9, '烏龍拿鐵', 60),
(29, 9, '招牌奶茶', 45),
(30, 10, '鮮奶茶', 60),
(31, 10, '錫蘭奶紅', 50),
(32, 10, '原鄉四季', 30);

-- --------------------------------------------------------

--
-- 資料表結構 `resturant`
--

DROP TABLE IF EXISTS `resturant`;
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
-- 傾印資料表的資料 `resturant`
--

INSERT INTO `resturant` (`categoryID`, `resturantID`, `resturantPhoto`, `resturantName`, `resturantAddress`, `resturantPhone`, `resturantSort`) VALUES
(1, 1, 'art.jpeg', '美術系', '台北市文山區景文街43號', '02-2599-5089', 1),
(1, 2, 'hexin.jpg', '和興食堂', '台北市文山區木柵路一段73號', '02-2236-7314', 2),
(2, 3, 'do.jpeg', '哆食樂韓式料理', '台北市文山區木柵路一段209號', '02-2236-4588', 3),
(3, 4, 'lulu.jpg', 'HOT HEART LULU 早午餐', '台北市文山區木柵路一段69號', '02-2236-5521', 4),
(3, 5, 'hamburger.jpg', '摩根漢堡', '台北市文山區木柵路一段38之1號', '02-2236-0658', 5),
(3, 6, 'five.jpg', '五花馬手工麵坊', '台北市文山區木柵路一段100號', '02-2236-0579', 6),
(4, 7, 'mint.jpg', 'MINT PASTA 綠薄荷麵食坊', '台北市文山區景興路274之2號', '02-2933-0811', 7),
(4, 8, 'manny.jpeg', '蔓尼義大利麵坊', '台北市文山區景興路282巷5號', '02-2935-8111', 8),
(5, 9, 'comebuy.jpg', 'COMEBUY', '台北市文山區木柵路一段17巷1號', '02-2236-1608', 9),
(5, 10, 'chingshin.jpeg', '清心福全', '台北市文山區木柵路一段165號', '02-2236-3883', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `account` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(15) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `sex` char(2) NOT NULL DEFAULT '',
  `date` date DEFAULT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `level` varchar(1) DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `sex`, `date`, `phone`, `address`, `email`, `level`) VALUES
(1, 'guest', 'guest', '阿凱', '男', '2000-09-09', '(0968) 568-854', '台北市大安區師大路 20 號', 'kai@ms17.url.com.tw', '2'),
(2, '28', '28', 'zirong', '女', '1999-12-05', '0988245274', '三光北二街42號', 'a107222028@live.shu.edu.tw', '1'),
(3, 'a107222018', 'a107222018', 'Etin', '女', '2000-08-14', '0975041817', '世新大學', 'a107222018@mail.shu.edu.tw', '2');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- 資料表索引 `resturant`
--
ALTER TABLE `resturant`
  ADD PRIMARY KEY (`resturantID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resturant`
--
ALTER TABLE `resturant`
  MODIFY `resturantID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
