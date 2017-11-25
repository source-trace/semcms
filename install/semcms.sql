-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2017-11-23 10:54:05
-- 服务器版本： 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2017test`
--

-- --------------------------------------------------------

--
-- 表的结构 `sc_banner`
--

CREATE TABLE `sc_banner` (
  `ID` int(11) NOT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(200) DEFAULT NULL,
  `banner_fenlei` varchar(50) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL,
  `banner_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `banner_paixu` int(11) DEFAULT '10000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_banner`
--

INSERT INTO `sc_banner` (`ID`, `banner_image`, `banner_url`, `banner_fenlei`, `languageID`, `banner_time`, `banner_paixu`) VALUES
(6, '../Images/banner/17042011303242.jpg', '#', 'index', 1, '2017-04-19 23:30:35', 10000);

-- --------------------------------------------------------

--
-- 表的结构 `sc_categories`
--

CREATE TABLE `sc_categories` (
  `ID` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_pid` int(11) DEFAULT NULL,
  `category_path` varchar(200) DEFAULT NULL,
  `category_key` varchar(200) DEFAULT NULL,
  `category_des` varchar(1000) DEFAULT NULL,
  `category_dest` varchar(5000) DEFAULT NULL,
  `category_img` varchar(250) DEFAULT NULL,
  `category_url` varchar(100) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL,
  `category_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_paixu` int(11) DEFAULT '0',
  `category_open` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_categories`
--

INSERT INTO `sc_categories` (`ID`, `category_name`, `category_pid`, `category_path`, `category_key`, `category_des`, `category_dest`, `category_img`, `category_url`, `languageID`, `category_time`, `category_paixu`, `category_open`) VALUES
(1, '产品分类', 0, '0,1,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(2, '信息分类', 0, '0,2,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(3, '权限分类', 0, '0,3,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(4, '其它分类2', 0, '0,4,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(5, '其它分类3', 0, '0,5,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(6, '其它分类4', 0, '0,6,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(7, '其它分类5', 0, '0,7,', NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-16 09:00:06', 0, 1),
(8, '其它分类6', 0, '0,8,', NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-16 09:00:09', 0, 1),
(64, 'iPhone', 1, '0,1,64,', 'iPhone', 'The products of our store are the perfect combination of a real reliability and durability. We assure you that our goods have a great number of advantages and it is very important for the customers.', 'jj', '../Images/categories/16042608541429.jpg', 'iPhone', 1, '2015-12-22 05:05:18', 100001, 1),
(65, 'iPad', 1, '0,1,65,', 'iPad', 'The products of our store are the perfect combination of a real reliability and durability. We assure you that our goods have a great number of advantages and it is.', '', '../Images/categories/16042608544726.jpg', 'iPad', 1, '2015-12-22 05:05:26', 100001, 1),
(66, 'iPad mini', 65, '0,1,65,66,', 'iPad mini', 'iPad mini', '', '', 'iPad-mini', 1, '2015-12-22 05:05:44', 10000, 1),
(67, 'iphone 6S', 64, '0,1,64,67,', 'iphone 6S', 'iphone 6S', '', '', 'iphone 6S', 1, '2015-12-22 05:05:56', 10000, 1),
(70, 'iPhone 5 / 5S', 64, '0,1,64,70,', 'iPhone 5 / 5S', 'iPhone 5 / 5S', 'iPhone 5 / 5S', '', 'iPhone-5-5s', 1, '2015-12-25 07:26:17', 1000, 1),
(71, 'Company news', 2, '0,2,71,', 'Company news', 'Company news', '', '', 'Company-news', 1, '2015-12-29 07:14:03', 10000, 1),
(72, 'Industry news', 2, '0,2,72,', 'Industry news', 'Industry news', '', '', 'Industry-news', 1, '2015-12-29 07:19:30', 10000, 1),
(73, 'About us', 2, '0,2,73,', 'About us', 'About us', '', '', 'About', 1, '2015-12-29 07:21:09', 10000, 1),
(74, '综合管理', 3, '0,3,74,', '综合管理', '综合管理', '', '', '综合管理', 1, '2016-01-07 03:25:01', 10000, 1),
(75, '信息操作', 3, '0,3,75,', '信息操作', '信息操作', '', '', '信息操作', 1, '2016-01-07 03:27:51', 10000, 1),
(76, '参数设置', 74, '0,3,74,76,', '参数设置', '', '', '', 'SEMCMS_Config.php', 1, '2016-01-07 03:28:37', 10000, 1),
(77, '用户管理', 74, '0,3,74,77,', '用户管理', '', '', '', 'SEMCMS_User.php', 1, '2016-01-07 03:30:25', 10000, 1),
(78, '产品分类管理', 75, '0,3,75,78,', '产品分类管理', '产品分类管理', '', '', 'SEMCMS_Categories.php?pid=1&amp;lgid=', 1, '2016-01-07 03:32:02', 1, 1),
(79, '产品管理', 75, '0,3,75,79,', '产品管理', '产品管理', '', '', 'SEMCMS_Products.php?lgid=', 1, '2016-01-07 03:32:48', 2, 1),
(80, '信息管理', 75, '0,3,75,80,', '信息管理', '信息管理', '', '', 'SEMCMS_Info.php?lgid=', 1, '2016-01-07 03:33:11', 10000, 1),
(81, 'Banner管理', 75, '0,3,75,81,', 'Banner管理', 'Banner管理', '', '', 'SEMCMS_Banner.php?lgid=', 1, '2016-01-07 03:33:35', 10000, 1),
(82, '友链管理', 75, '0,3,75,82,', '友链管理', '友链管理', '', '', 'SEMCMS_Link.php?lgid=', 1, '2016-01-07 03:34:04', 10000, 1),
(83, 'SEO与标签', 75, '0,3,75,83,', 'SEO与标签', 'SEO与标签', '', 'SEO与标签', 'SEMCMS_SeoAndTag.php?lgid=', 1, '2016-01-07 03:34:36', 10000, 1),
(84, '导航管理', 75, '0,3,75,84,', '导航管理', '导航管理', '', '', 'SEMCMS_Menu.php?lgid=', 1, '2016-01-07 03:35:05', 10000, 1),
(87, '模版管理', 74, '0,3,74,87,', '模版管理', '模版管理', '', '', 'SEMCMS_Template.php', 1, '2016-04-13 07:14:57', 10000, 1),
(88, '询盘管理', 74, '0,3,74,88,', '询盘管理', '', '', '', 'SEMCMS_Inquiry.php', 1, '2016-04-14 07:53:33', 10000, 1),
(89, '信息分类管理', 75, '0,3,75,89,', '信息分类管理', '信息分类管理', '', '', 'SEMCMS_Infocategories.php?pid=2&amp;lgid=', 1, '2016-04-15 02:39:25', 3, 1),
(98, 'tool', 1, '0,1,98,', 'tool', 'The products of our store are the perfect combination of a real reliability and durability. We assure you that our goods have a great number of advantages and it is.', 'test', '../Images/categories/16042608550370.jpg', 'test', 1, '2016-04-22 04:31:05', 10000, 1),
(99, 'Hand tools', 1, '0,1,99,', 'Hand tools', 'The products of our store are the perfect combination of a real reliability and durability. We assure you that our goods have a great number of advantages and it is very important for the customers. This fact proves that our company takes the leading place among the competing ones.', 'Hand tools', '../Images/categories/16042608551291.jpg', 'Hand-tools', 1, '2016-04-22 13:31:07', 10000, 1),
(100, '下载管理', 75, '0,3,75,100,', '下载管理', '', '下载管理', '', 'SEMCMS_Download.php?lgid=', 1, '2016-09-23 06:22:21', 10000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sc_config`
--

CREATE TABLE `sc_config` (
  `ID` int(11) NOT NULL,
  `web_name` varchar(500) DEFAULT NULL,
  `web_url` varchar(500) DEFAULT NULL,
  `web_logo` varchar(200) DEFAULT NULL,
  `web_ico` varchar(200) DEFAULT NULL,
  `web_copy` text,
  `web_email` varchar(200) DEFAULT NULL,
  `web_skype` varchar(200) DEFAULT NULL,
  `web_wathsapp` varchar(200) DEFAULT NULL,
  `web_tel` varchar(200) DEFAULT NULL,
  `web_plist` int(11) DEFAULT NULL,
  `web_nlist` int(11) DEFAULT NULL,
  `web_inlist` int(11) DEFAULT '0',
  `web_iflist` int(11) DEFAULT '0',
  `web_meate` varchar(300) DEFAULT NULL,
  `web_google` varchar(5000) DEFAULT NULL,
  `web_share` varchar(2000) DEFAULT NULL,
  `web_umail` varchar(100) DEFAULT NULL,
  `web_pmail` varchar(100) DEFAULT NULL,
  `web_dmail` varchar(100) DEFAULT NULL,
  `web_smail` varchar(100) DEFAULT NULL,
  `web_tmail` varchar(100) DEFAULT NULL,
  `web_jmail` varchar(100) DEFAULT NULL,
  `web_mailopen` int(11) NOT NULL DEFAULT '0',
  `web_Template` varchar(50) DEFAULT NULL,
  `web_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_config`
--

INSERT INTO `sc_config` (`ID`, `web_name`, `web_url`, `web_logo`, `web_ico`, `web_copy`, `web_email`, `web_skype`, `web_wathsapp`, `web_tel`, `web_plist`, `web_nlist`, `web_inlist`, `web_iflist`, `web_meate`, `web_google`, `web_share`, `web_umail`, `web_pmail`, `web_dmail`, `web_smail`, `web_tmail`, `web_jmail`, `web_mailopen`, `web_Template`, `web_time`) VALUES
(1, 'semcms12', 'http://127.0.0.1/', '../Images/default/logo.png', '../Images/default/favicon.ico', 'CopyRight 2017 semcms', 'service@sem-cms.com', 'semcms', '138000000', '+86（0571）88880000', 100, 12, 8, 8, '', '', '<li><a href=\"\">Facebook</a></li>\r\n<li><a href=\"\">Twitter</a></li>\r\n<li><a href=\"\">Google +</a></li>\r\n<li><a href=\"\">YouTube </a></li>', 'service@sem-cms.com', '111111122222222222', '465', 'smtp.qq.com', 'service@sem-cms.com', 'test@qq.com', 0, 'default', '2017-11-22 22:42:11');

-- --------------------------------------------------------

--
-- 表的结构 `sc_download`
--

CREATE TABLE `sc_download` (
  `ID` int(11) NOT NULL,
  `down_name` varchar(500) DEFAULT NULL,
  `down_file` varchar(500) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL,
  `down_paixu` varchar(100) DEFAULT NULL,
  `down_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_download`
--

INSERT INTO `sc_download` (`ID`, `down_name`, `down_file`, `languageID`, `down_paixu`, `down_time`) VALUES
(5, 'test', '../Images/default/16092307340758.png', 1, '10000', '2016-09-23 07:34:07');

-- --------------------------------------------------------

--
-- 表的结构 `sc_images`
--

CREATE TABLE `sc_images` (
  `ID` int(11) NOT NULL,
  `images_url` varchar(300) DEFAULT NULL,
  `images_name` varchar(250) DEFAULT NULL,
  `images_category` varchar(200) DEFAULT NULL,
  `images_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_images`
--

INSERT INTO `sc_images` (`ID`, `images_url`, `images_name`, `images_category`, `images_time`) VALUES
(1, '../Images/prdoucts/15122503384190.jpg', '77777', '67', '2015-12-25 03:46:51'),
(2, '../Images/prdoucts/15122503464984.jpg', '77777', '67', '2015-12-25 03:46:51'),
(6, '../Images/prdoucts/15122503552990.jpg', '水电费是的方式', '67', '2015-12-25 03:55:44'),
(7, '../Images/prdoucts/15122503553868.jpg', '水电费是的方式', '67', '2015-12-25 03:55:45'),
(8, '../Images/prdoucts/15122503595259.jpg', '55', '68', '2015-12-25 04:00:00'),
(9, '../Images/prdoucts/15122503595866.jpg', '55', '68', '2015-12-25 04:00:01'),
(10, '../Images/prdoucts/15122504023754.jpg', '55534124', '66', '2015-12-25 04:02:46'),
(11, '../Images/prdoucts/15122504024535.jpg', '55534124', '66', '2015-12-25 04:02:47'),
(12, '../Images/prdoucts/15122505253971.jpg', 'php字符串函数大全 - 创想中国(羲闻) - 博客园', '67', '2015-12-25 05:25:43'),
(13, '../Images/prdoucts/15122506052328.jpg', 'afdf', '69', '2015-12-25 06:05:33'),
(14, '../Images/prdoucts/15122506053052.jpg', 'afdf', '69', '2015-12-25 06:05:34'),
(15, '../Images/prdoucts/15122507081593.jpg', '载', '66', '2015-12-25 07:09:22'),
(16, '../Images/prdoucts/15122507090573.jpg', '载', '66', '2015-12-25 07:09:22'),
(17, '../Images/prdoucts/15122507091380.jpg', '载', '66', '2015-12-25 07:09:23'),
(18, '../Images/prdoucts/15122507092053.jpg', '载', '66', '2015-12-25 07:09:23'),
(19, '../Images/prdoucts/15122507213211.jpg', '1', '64,68', '2015-12-25 07:21:36'),
(20, '../Images/prdoucts/15122507570440.jpg', '1', '67,70', '2015-12-25 07:57:06'),
(21, '../Images/prdoucts/15122507574078.jpg', '要', '67,69', '2015-12-25 07:57:42'),
(22, '../Images/prdoucts/15122507575563.jpg', 'eeeee', '64,68', '2015-12-25 07:57:58'),
(23, '../Images/prdoucts/15122508010689.jpg', 'eeeee', '64,68', '2015-12-25 08:01:28'),
(24, '../Images/prdoucts/15122508011214.jpg', 'eeeee', '64,68', '2015-12-25 08:01:28'),
(25, '../Images/prdoucts/15122508011946.jpg', 'eeeee', '64,68', '2015-12-25 08:01:28'),
(26, '../Images/prdoucts/15122508012569.jpg', 'eeeee', '64,68', '2015-12-25 08:01:28'),
(27, '../Images/prdoucts/15122602121660.jpg', '要', '67,69', '2015-12-26 02:12:18'),
(28, '../Images/prdoucts/15122603134659.jpg', 'as', '70', '2015-12-26 03:13:52'),
(29, '../Images/prdoucts/15122608054871.jpg', 'Stylish embossed eGo battery eGo-Q', '68', '2015-12-26 08:05:53'),
(30, '../Images/prdoucts/15122906530034.jpg', '177776', '69', '2015-12-29 06:53:02'),
(31, '../Images/prdoucts/16022507394065.png', 'Lorem ipsum', '67', '2016-02-25 07:39:47'),
(32, '../Images/prdoucts/16022507441412.png', 'Stylish embossed eGo battery eGo-Q', '68', '2016-02-25 07:44:17'),
(33, '../Images/prdoucts/16022507442987.png', 'For iPhone 6 Plus LCD Display+Touch Screen Digitizer+Frame assembly Free Shipping 5.5 inch black', '66', '2016-02-25 07:44:31'),
(34, '../Images/prdoucts/16022507444982.png', 'Black For samsung Galaxy A5 A500 A5000 LCD Display touch screen with digitizer Assembly', '69', '2016-02-25 07:44:50'),
(35, '../Images/prdoucts/16022507504395.png', 'Donec non posuere', '70', '2016-02-25 07:50:47'),
(36, '../Images/prdoucts/16022507505913.png', 'Donec non posuere', '67', '2016-02-25 07:51:05'),
(37, '../Images/prdoucts/16030904191138.jpg', 'Stylish embossed eGo battery eGo-Q', '68', '2016-03-09 04:19:14'),
(38, '../Images/prdoucts/16030905213850.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:22:03'),
(39, '../Images/prdoucts/16030905214331.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:22:03'),
(40, '../Images/prdoucts/16030905214918.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:22:03'),
(41, '../Images/prdoucts/16030905215380.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:22:03'),
(42, '../Images/prdoucts/16030905240738.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:24:22'),
(43, '../Images/prdoucts/16030905241263.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:24:23'),
(44, '../Images/prdoucts/16030905241688.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:24:23'),
(45, '../Images/prdoucts/16030905242056.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:24:23'),
(46, '../Images/prdoucts/16030905254914.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:25:52'),
(47, '../Images/prdoucts/16030905303990.5 (pink)', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:31:09'),
(48, '../Images/prdoucts/16030905304746.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:31:10'),
(49, '../Images/prdoucts/16030905310833.jpg', 'TNH-150A Programmable Temperature and Humidity Test Chamber (150 Liters)', '70', '2016-03-09 05:31:10'),
(50, '../Images/prdoucts/16030906225251.5 (pink)', 'Donec non posuere2', '70', '2016-03-09 06:23:06'),
(51, '../Images/prdoucts/16030906243068.jpg', 'Donec non posuere2', '70', '2016-03-09 06:24:33'),
(52, '../Images/prdoucts/16030907373165.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:38:59'),
(53, '../Images/prdoucts/16030907373951.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:38:59'),
(54, '../Images/prdoucts/16030907374636.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:00'),
(55, '../Images/prdoucts/16030907375429.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:00'),
(56, '../Images/prdoucts/16030907380691.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:00'),
(57, '../Images/prdoucts/16030907381317.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:00'),
(58, '../Images/prdoucts/16030907382446.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:00'),
(59, '../Images/prdoucts/16030907383394.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:01'),
(60, '../Images/prdoucts/16030907384380.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:01'),
(61, '../Images/prdoucts/16030907384930.jpg', 'Rainbow Bridge for iphone6 S', '67', '2016-03-09 07:39:01'),
(62, '../Images/prdoucts/16041501595631.jpg', '66', '64', '2016-04-15 02:00:13'),
(63, '../Images/prdoucts/16041502000663.png', '66', '64', '2016-04-15 02:00:13'),
(64, '../Images/prdoucts/16041801171362.jpg', 'Starry Sky for iphone6s', '64', '2016-04-18 01:17:56'),
(65, '../Images/prdoucts/16041801171937.jpg', 'Starry Sky for iphone6s', '64', '2016-04-18 01:17:57'),
(66, '../Images/prdoucts/16041801172322.jpg', 'Starry Sky for iphone6s', '64', '2016-04-18 01:17:57'),
(67, '../Images/prdoucts/16041801172813.jpg', 'Starry Sky for iphone6s', '64', '2016-04-18 01:17:57'),
(68, '../Images/prdoucts/16041801212529.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:02'),
(69, '../Images/prdoucts/16041801213052.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:02'),
(70, '../Images/prdoucts/16041801213543.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:02'),
(71, '../Images/prdoucts/16041801213877.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:02'),
(72, '../Images/prdoucts/16041801215064.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:03'),
(73, '../Images/prdoucts/16041801215525.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:03'),
(74, '../Images/prdoucts/16041801212529.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:22:46'),
(75, '../Images/prdoucts/16041801212529.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:24:11'),
(76, '../Images/prdoucts/16041801355998.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:36:13'),
(77, '../Images/prdoucts/16041801360534.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:36:13'),
(78, '../Images/prdoucts/16041801361195.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:36:13'),
(79, '../Images/prdoucts/16041801365234.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:37:23'),
(80, '../Images/prdoucts/16041801365988.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:37:23'),
(81, '../Images/prdoucts/16041801370576.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:37:23'),
(82, '../Images/prdoucts/16041801371496.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:37:23'),
(83, '../Images/prdoucts/16041801372014.jpg', 'Starry Sky for iphone5/5S', '70', '2016-04-18 01:37:23'),
(84, '../Images/prdoucts/16041801402644.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:40:44'),
(85, '../Images/prdoucts/16041801403233.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:40:45'),
(86, '../Images/prdoucts/16041801403851.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:40:45'),
(87, '../Images/prdoucts/16041801404285.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:40:45'),
(88, '../Images/prdoucts/16041801481192.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:48:27'),
(89, '../Images/prdoucts/16041801481757.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:48:27'),
(90, '../Images/prdoucts/16041801482111.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:48:27'),
(91, '../Images/prdoucts/16041801482567.jpg', 'Transparent and colorful case for apple ipad mini', '66', '2016-04-18 01:48:28'),
(92, '../Images/prdoucts/16042506370466.jpeg', '18 Volt Compact Lithium-Ion Drill', '98', '2016-04-25 06:37:11'),
(93, '../Images/prdoucts/16042506385046.jpeg', '18 Volt Compact Lithium-Ion Drill', '98', '2016-04-25 06:38:52'),
(94, '../Images/prdoucts/16042506401123.jpeg', '18 Volt Compact Lithium-Ion Drill', '98', '2016-04-25 06:40:26'),
(95, '../Images/prdoucts/16042506410490.jpg', '18 Volt Compact Lithium-Ion Drill', '98', '2016-04-25 06:41:06'),
(96, '../Images/prdoucts/16042506425984.jpg', '3M Dynamic Mixing Applicator', '98', '2016-04-25 06:43:02'),
(97, '../Images/prdoucts/16042506473517.jpg', '3M No Cleanup Applicator', '98', '2016-04-25 06:47:41'),
(98, '../Images/prdoucts/16042506490547.jpg', '3M Dual Cartridge Respirator', '98', '2016-04-25 06:49:07'),
(99, '../Images/prdoucts/16042506513186.jpg', 'AEG Chipping Hammer MH 5 E', '98', '2016-04-25 06:51:33'),
(100, '../Images/prdoucts/56dds.jpg', 'AEG Chipping Hammer PM 3', '98', '2016-04-25 06:53:15'),
(101, 'adf', '模压ad', ',67,', '2016-09-28 03:35:18');

-- --------------------------------------------------------

--
-- 表的结构 `sc_info`
--

CREATE TABLE `sc_info` (
  `ID` int(11) NOT NULL,
  `info_title` varchar(300) DEFAULT NULL,
  `info_keywords` varchar(500) DEFAULT NULL,
  `info_des` varchar(1000) DEFAULT NULL,
  `info_url` varchar(100) DEFAULT NULL,
  `info_content` text,
  `info_image` varchar(500) DEFAULT NULL,
  `info_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `info_lanmu` int(11) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_info`
--

INSERT INTO `sc_info` (`ID`, `info_title`, `info_keywords`, `info_des`, `info_url`, `info_content`, `info_image`, `info_time`, `info_lanmu`, `languageID`) VALUES
(1, 'About us', 'About us', 'About us', 'about-us', '9 years ago, Movil is a Factory and Wholesale of all mobile phone parts and phone Accessories ,&lt;br /&gt;\r\nWe focus on export touch-screen, Tablet PC, CC, Battery, Charger, Vibrio tempered, Speaker, speakerphone, SmartWatch, keyboards,&lt;br /&gt;\r\nMobile Phone Covers, housings, clips for iPhone, Samsung, LG, Motorola, Nokia, Sony, Beetle, LANIX, Blu, Fly, Airis, B - Mobile, Own, etc.&lt;br /&gt;\r\nDear Customer,&lt;br /&gt;\r\nWe would like to take this opportunity to thanks you for showing interest in our products and services.&lt;br /&gt;\r\nWe have been in the business for over 8 years now and we deal with wide range of mobile phone parts and accessories.&lt;br /&gt;\r\nPlease find the highlights below that will help you to understand our business:&lt;br /&gt;\r\nStock Availability:&lt;br /&gt;\r\nAs a growing business, we strive hard to keep all parts and accessories in stock.&lt;br /&gt;\r\nWe continuously work in close with our customers and their day-to-day needs.&lt;br /&gt;\r\nIf you are desperate for something, part or accessory, please send us the list (SKU CODE) of the parts you need immediately.&lt;br /&gt;\r\nPlease note that due to heavy demand from our&amp;nbsp; customers, we can reserve your parts for up to 2 hrs maximum,&lt;br /&gt;\r\nif we don’t receive any order afterwards, we will remove the hold on parts.&lt;br /&gt;\r\nItems not on our Website:&lt;br /&gt;\r\nIf you are looking for some parts or accessories, that are not listed on our website, please send us the list via email and we will get back to you&lt;br /&gt;\r\nwithin 1 hr.Please note that we consider every request from our customer to make sure they get what they need.&lt;br /&gt;\r\nFor items not listed on website, we can arrange&amp;nbsp; within 4 working days.&lt;br /&gt;\r\nItems not in stock:&lt;br /&gt;\r\nWe, as a wholesale business, sell items online, over the phone, in-store and we even supply to our workshops.&lt;br /&gt;\r\nAs such there will be some cases where our website will show the part in stock when it has actually been sold or used.&lt;br /&gt;\r\nWe usually update stock levels online at the end of the day.&lt;br /&gt;\r\nIn case you have placed an order, and we don’t have the items in stock, we will send you email notification specifying items that are out of stock.&lt;br /&gt;\r\nWe will arrange these items within 3-5 working days and despatch them once received. If you prefer a refund please advise us&lt;br /&gt;\r\nand we will be happy to process.Your patience is highly appreciated.', '', '2017-10-23 23:58:28', 73, 1),
(2, 'Delivery Information', 'Delivery Information', 'Delivery Information', 'Delivery-Information', 'Delivery Information', NULL, '2016-04-15 19:12:27', 73, 1),
(3, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy-Policy', 'Privacy Policy', NULL, '2016-04-15 19:12:22', 73, 1),
(4, 'Terms &amp; Conditions', 'Terms &amp; Conditions', 'Terms &amp; Conditions', 'Terms-Conditions', 'Terms &amp; Conditions', NULL, '2016-04-15 19:12:11', 73, 1),
(5, 'Contact us', 'Contact us', 'Contact us', 'contact', 'Contact us', NULL, '2016-04-16 01:22:01', 73, 1),
(6, '5 the early release of the Tab S2 or via Bluetooth authentication', 'a', 'The whole industry to accelerate the development of India, to further promote the cotton textile,sugar, oil and smoke system and traditional industrial advantage constantly keep in chemical,energy, machinery and electronics industries. In recent years, India automobile and motorcycleindustry, the rapid expansion of the scale, stimulating the domestic automobile and motorcycleparts, machine and', 'a', 'The whole industry to accelerate the development of India, to further \r\npromote the cotton textile,sugar, oil and smoke system and traditional \r\nindustrial advantage constantly keep in chemical,energy, machinery and \r\nelectronics industries. In recent years, India automobile and \r\nmotorcycleindustry, the rapid expansion of the scale, stimulating the \r\ndomestic automobile and motorcycleparts, machine and', '../Images/default/17102411510034.png', '2017-10-23 23:51:01', 71, 1),
(7, 'India is an important industrial and potential business opportunities', 'd', 'The whole industry to accelerate the development of India, to further promote the cotton textile,sugar, oil and smoke system and traditional industrial advantage constantly keep in chemical,energy, machinery and electronics industries. In recent years, India automobile and motorcycleindustry, the rapid expansion of the scale, stimulating the domestic automobile and motorcycleparts, machine and', '', 'The whole industry to accelerate the development of India, to further promote the cotton textile,sugar, oil and smoke system and traditional industrial advantage constantly keep in chemical,energy, machinery and electronics industries. In recent years, India automobile and motorcycleindustry, the rapid expansion of the scale, stimulating the domestic automobile and motorcycleparts, machine and &lt;br /&gt;', '../Images/default/17102411505084.png', '2017-10-23 23:50:51', 72, 1),
(8, 'Several states are trying to outlaw a taboo marriage practice', 'Several states are trying to outlaw a taboo marriage practice', 'In the state of Virginia, a 13-year-old child can legally marry an adult twice her age, and all that&#039;s needed is a clerk&#039;s consent, provided she is pregnant and has parental consent.', '', '&lt;img src=&quot;/semcms/Images/attached/image/20170223/20170223074351_12971.jpg&quot; alt=&quot;&quot; /&gt;&#039;In the state of Virginia, a 13-year-old child can legally marry an adult twice her age, and all that&#039;s needed is a clerk&#039;s consent, provided she is pregnant and has parental consent. &quot;&lt;br /&gt;\r\n&lt;br /&gt;\r\nThat is expected to change this week, however, after Virginia Gov. Terry McAuliffe signs reform legislation. If he signs the bill passed Tuesday, the Virginia law may be the first domino in a chain of legislatures around the nation.&lt;br /&gt;\r\n&lt;br /&gt;\r\nSimilar bills are in the works in New York (A. 8563), Maryland (H.B. 911), and New Jersey (A. 3091) where, as in many other states, marriage age limits set at 16 to 18 years old are easily set aside through exceptions based on parental and/or judicial consent, or pregnancy.&lt;br /&gt;\r\n&quot;&lt;br /&gt;\r\n“Child pregnancy should trigger alarm bells, not wedding bells,” says Marlene Hartz, spokesperson for the legal advocacy group Tahirih Justice Center. The Virginia-based nonprofit, founded to help women who are survivors of a wide range of violence, including forced marriage, recently analyzed marriage data from select states and found “disturbing results.” The group is working in partnership with Hogan Lovells, Unchained at Last, and the National Organization for Women (NOW).', '../Images/default/17102411504113.png', '2017-10-23 23:50:42', 71, 1),
(9, '2', '2', '2', '2', '2', NULL, '2016-04-08 08:48:47', 86, 2);

-- --------------------------------------------------------

--
-- 表的结构 `sc_language`
--

CREATE TABLE `sc_language` (
  `ID` int(11) NOT NULL,
  `language_cname` varchar(255) DEFAULT NULL,
  `language_ename` varchar(255) DEFAULT NULL,
  `language_url` varchar(255) DEFAULT NULL,
  `language_paixu` int(11) DEFAULT '10000',
  `language_mulu` int(11) DEFAULT '0',
  `language_Image` varchar(255) DEFAULT NULL,
  `language_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `language_open` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_language`
--

INSERT INTO `sc_language` (`ID`, `language_cname`, `language_ename`, `language_url`, `language_paixu`, `language_mulu`, `language_Image`, `language_time`, `language_open`) VALUES
(1, '英文', 'English', 'en', 1000, 1, '../Images/default/15121401090640.bmp', '2016-04-15 03:04:20', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sc_link`
--

CREATE TABLE `sc_link` (
  `ID` int(11) NOT NULL,
  `link_name` varchar(200) DEFAULT NULL,
  `link_url` varchar(200) DEFAULT NULL,
  `link_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `link_paixu` int(11) DEFAULT '10000',
  `languageID` int(11) DEFAULT NULL,
  `link_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_link`
--

INSERT INTO `sc_link` (`ID`, `link_name`, `link_url`, `link_time`, `link_paixu`, `languageID`, `link_image`) VALUES
(1, 'semcms', 'http://www.sem-cms.com/', '2017-04-20 02:52:12', 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sc_menu`
--

CREATE TABLE `sc_menu` (
  `ID` int(11) NOT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_link` varchar(100) DEFAULT NULL,
  `menu_xiala` int(11) DEFAULT '0',
  `languageID` int(11) DEFAULT NULL,
  `menu_paixu` int(11) DEFAULT '10000',
  `menu_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_menu`
--

INSERT INTO `sc_menu` (`ID`, `menu_name`, `menu_link`, `menu_xiala`, `languageID`, `menu_paixu`, `menu_time`) VALUES
(1, 'HOME', '/', 0, 1, 1, '2017-02-16 18:25:05'),
(3, 'PRODUCTS', 'product.php', 0, 1, 2, '2017-02-16 18:25:20'),
(4, 'ABOUT US', 'about.php?ID=1', 0, 1, 3, '2017-02-16 18:25:27'),
(6, 'NEWS', 'news.php', 0, 1, 3, '2017-11-22 22:41:25'),
(7, 'CONTACT US', 'contact.php', 0, 1, 6, '2017-11-22 22:41:19'),
(8, 'DOWNLOAD', 'download.php', 0, 1, 4, '2017-11-22 22:41:40');

-- --------------------------------------------------------

--
-- 表的结构 `sc_msg`
--

CREATE TABLE `sc_msg` (
  `ID` int(11) NOT NULL,
  `msg_pid` int(11) DEFAULT NULL,
  `msg_email` varchar(50) DEFAULT NULL,
  `msg_name` char(200) DEFAULT NULL,
  `msg_tel` char(200) DEFAULT NULL,
  `msg_content` varchar(2000) DEFAULT NULL,
  `msg_ip` varchar(50) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL,
  `msg_type` int(11) DEFAULT '0',
  `msg_reply` varchar(500) DEFAULT NULL,
  `msg_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_msg`
--

INSERT INTO `sc_msg` (`ID`, `msg_pid`, `msg_email`, `msg_name`, `msg_tel`, `msg_content`, `msg_ip`, `languageID`, `msg_type`, `msg_reply`, `msg_time`) VALUES
(28, 22, 'mail@126.com', 'liangchen', '13819471654', 'veryy', '127.0.0.1', 1, 0, NULL, '2017-10-24 00:21:44'),
(29, 22, 'mail@126.com', 'aliang', '1367777777', 'very', '127.0.0.1', 1, 0, NULL, '2017-10-24 00:25:26'),
(30, 31, 'sem@126.com', 'aliang', '138999999999', 'very', '127.0.0.1', 1, 0, NULL, '2017-10-24 00:27:04');

-- --------------------------------------------------------

--
-- 表的结构 `sc_products`
--

CREATE TABLE `sc_products` (
  `ID` int(11) NOT NULL,
  `products_category` varchar(100) DEFAULT NULL,
  `products_name` varchar(300) DEFAULT NULL,
  `products_key` varchar(300) DEFAULT NULL,
  `products_des` varchar(1000) DEFAULT NULL,
  `products_model` varchar(100) DEFAULT NULL,
  `products_Images` varchar(1000) DEFAULT NULL,
  `products_content` text,
  `products_priceh` varchar(50) DEFAULT NULL,
  `products_prices` varchar(50) DEFAULT NULL,
  `products_url` varchar(200) DEFAULT NULL,
  `products_aurl` varchar(500) DEFAULT NULL,
  `products_index` int(11) DEFAULT '0',
  `products_new` int(11) DEFAULT '0',
  `products_hot` int(11) DEFAULT '0',
  `products_tejia` int(11) DEFAULT '0',
  `products_suxin` varchar(200) DEFAULT NULL,
  `products_zeke` varchar(200) DEFAULT NULL,
  `products_xiangguan` varchar(100) DEFAULT NULL,
  `products_zt` int(11) DEFAULT '1',
  `products_kucun` varchar(50) DEFAULT NULL,
  `products_zdyone` varchar(200) DEFAULT NULL,
  `products_zdytwo` varchar(200) DEFAULT NULL,
  `products_zdythree` varchar(200) DEFAULT NULL,
  `products_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `products_paixu` int(11) DEFAULT '10000',
  `languageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_products`
--

INSERT INTO `sc_products` (`ID`, `products_category`, `products_name`, `products_key`, `products_des`, `products_model`, `products_Images`, `products_content`, `products_priceh`, `products_prices`, `products_url`, `products_aurl`, `products_index`, `products_new`, `products_hot`, `products_tejia`, `products_suxin`, `products_zeke`, `products_xiangguan`, `products_zt`, `products_kucun`, `products_zdyone`, `products_zdytwo`, `products_zdythree`, `products_time`, `products_paixu`, `languageID`) VALUES
(20, ',67,98,99,', 'Rainbow Bridge for iphone6 S', 'Rainbow Bridge for iphone6 S', 'Rainbow Bridge for iphone6 S', 'JB-Ip6S', '../Images/prdoucts/16030907373165.jpg,../Images/prdoucts/16030907373951.jpg,../Images/prdoucts/16030907374636.jpg,../Images/prdoucts/16030907375429.jpg,../Images/prdoucts/16030907380691.jpg,../Images/prdoucts/16030907381317.jpg,../Images/prdoucts/16030907382446.jpg,../Images/prdoucts/16030907383394.jpg,../Images/prdoucts/16030907384380.jpg,../Images/prdoucts/16030907384930.jpg,', '&amp;nbsp;Introductions:&lt;br /&gt;\r\n(1) The double colour soft TPU cover case works for iphone 6S. &lt;br /&gt;\r\n(2)Made of high quality frosted TPU material, all round side to protect your phone, it’s easy to disassemble and remove.&lt;br /&gt;\r\n(3) Soft touch, gradient colors.&lt;br /&gt;\r\n(4) Colors in stock are nine:red,&amp;nbsp; yellow, gray,&amp;nbsp; blue and green. &lt;br /&gt;', NULL, NULL, 'Rainbow-Bridge-for-iphone6-S', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:34:42', 10000, 1),
(21, ',66,99,', 'Starry Sky for iphone6s', 'Starry Sky for iphone6s', 'Starry Sky for iphone6s', 'CSTi601', '../Images/prdoucts/16041801171362.jpg,../Images/prdoucts/16041801171937.jpg,../Images/prdoucts/16041801172322.jpg,../Images/prdoucts/16041801172813.jpg,', 'Starry Sky for iphone6s', NULL, NULL, '66-kk', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:34:37', 10000, 1),
(22, ',67,70,', 'Starry Sky for iphone5/5S', 'Starry Sky for iphone5/5S', '(1) The aluminum alloy case works for iphone5/5S .&lt;br&gt;\r\n(2) The body of the case made of PC material, it&#039;s easy to assemble and shock-proof.&lt;br&gt;\r\n(3) On the back with matte aluminum alloy and with rhinestones insert into the case, it&#039;s high light and eye catching.', 'CSTi501', '../Images/prdoucts/16041801212529.jpg,../Images/prdoucts/16041801365234.jpg,../Images/prdoucts/16041801365988.jpg,../Images/prdoucts/16041801370576.jpg,../Images/prdoucts/16041801371496.jpg,../Images/prdoucts/16041801372014.jpg,', '&lt;p class=&quot;p0&quot; style=&quot;color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:13px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;&quot;&gt;&lt;strong&gt;Introductions: &lt;/strong&gt;&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p class=&quot;p0&quot; style=&quot;color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:13px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;&quot;&gt;(1)&amp;nbsp;The&amp;nbsp;aluminum&amp;nbsp;alloy&amp;nbsp;case&amp;nbsp;works&amp;nbsp;for iphone5/5S&lt;/span&gt;&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;line-height:1.5;&quot;&gt; .&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p class=&quot;p0&quot; style=&quot;color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:13px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;&quot;&gt;(2)&amp;nbsp;The&amp;nbsp;body&amp;nbsp;of&amp;nbsp;the&amp;nbsp;case&amp;nbsp;made&amp;nbsp;of&amp;nbsp;PC&amp;nbsp;material,&amp;nbsp;it&#039;s&amp;nbsp;easy&amp;nbsp;to&amp;nbsp;assemble&amp;nbsp;and&amp;nbsp;shock-proof.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p class=&quot;p0&quot; style=&quot;color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:13px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;&quot;&gt;(3)&amp;nbsp;On&amp;nbsp;the&amp;nbsp;back&amp;nbsp;with&amp;nbsp;matte&amp;nbsp;aluminum&amp;nbsp;alloy&amp;nbsp;and&amp;nbsp;with&amp;nbsp;rhinestones&amp;nbsp;insert&amp;nbsp;into&amp;nbsp;the&amp;nbsp;case, &lt;/span&gt;&lt;span style=&quot;font-family:&#039;Microsoft YaHei&#039;;line-height:1.5;&quot;&gt;it&#039;s&amp;nbsp;high&amp;nbsp;light&amp;nbsp;and&amp;nbsp;eye&amp;nbsp;catching.&lt;/span&gt; \r\n&lt;/p&gt;', NULL, NULL, 'Starry-Sky-for-iphone5-5S', NULL, 1, 0, 0, 0, NULL, NULL, '31,30,29', 1, NULL, NULL, NULL, NULL, '2016-10-05 03:00:26', 0, 1),
(23, ',66,', 'Transparent and colorful case for apple ipad mini', 'Transparent and colorful case for apple ipad mini', '1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;br&gt;\r\n2. PC factors are resistant to sunlight, rain and snow.&lt;br&gt;\r\n3. It covers temperature resistance, impact resistance and optical properties.&lt;br&gt;\r\n4. PC is uncracking and unbreakable.', 'TCiPM01D', '../Images/prdoucts/16041801355998.jpg,../Images/prdoucts/16041801360534.jpg,../Images/prdoucts/16041801361195.jpg,', '&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Specifications:&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;2. PC factors are resistant to sunlight, rain and snow.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;3. It covers temperature resistance, impact resistance and optical properties.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;4. PC is uncracking and unbreakable&lt;/span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;.&lt;/span&gt;&lt;/span&gt; \r\n&lt;/p&gt;', NULL, NULL, 'Transparent-and-colorful-case-for-apple-ipad-mini', NULL, 1, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:34:21', 0, 1),
(24, ',67,70,', 'Transparent and colorful case for apple ipad mini', 'Transparent and colorful case for apple ipad mini', '1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;br&gt;\r\n2. PC factors are resistant to sunlight, rain and snow.&lt;br&gt;\r\n3. It covers temperature resistance, impact resistance and optical properties.&lt;br&gt;\r\n4. PC is uncracking and unbreakable.', 'TCiPM01C', '../Images/prdoucts/16041801402644.jpg,../Images/prdoucts/16041801403233.jpg,../Images/prdoucts/16041801403851.jpg,../Images/prdoucts/16041801404285.jpg,', '&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Specifications:&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;2. PC factors are resistant to sunlight, rain and snow.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;3. It covers temperature resistance, impact resistance and optical properties.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;4. PC is uncracking and unbreakable&lt;/span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;.&lt;/span&gt;&lt;/span&gt; \r\n&lt;/p&gt;', NULL, NULL, 'Transparent-and-colorful-case-for-apple-ipad-mini-2', NULL, 1, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:34:13', 0, 1),
(25, ',99,', 'Transparent and colorful case for apple ipad mini', 'TCiPM01B', '1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;br&gt;\r\n2. PC factors are resistant to sunlight, rain and snow.&lt;br&gt;\r\n3. It covers temperature resistance, impact resistance and optical properties.&lt;br&gt;\r\n4. PC is uncracking and unbreakable.', 'TCiPM01B', '../Images/prdoucts/16041801481192.jpg,../Images/prdoucts/16041801481757.jpg,../Images/prdoucts/16041801482111.jpg,../Images/prdoucts/16041801482567.jpg,', '&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Specifications:&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;1. Official Deluxe Armband High glossy Durable protective shell cover for apple ipad mini.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;2. PC factors are resistant to sunlight, rain and snow.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;3. It covers temperature resistance, impact resistance and optical properties.&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;vertical-align:baseline;color:#333333;font-family:Arial, Helvetica, sans-senif;&quot;&gt;\r\n	&lt;span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;4. PC is uncracking and unbreakable&lt;/span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;.&lt;/span&gt;&lt;/span&gt; \r\n&lt;/p&gt;', NULL, NULL, 'Transparent-and-colorful-case-for-apple-ipad-mini-3', NULL, 1, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:34:06', 0, 1),
(26, ',66,', '18 Volt Compact Lithium-Ion Drill', '18 Volt Compact Lithium-Ion Drill', 'We assure you that our goods have a great number of advantages and it is very important for the customers. Our products are the real bestsellers because they have numerous devoted clients all over the country and as you know - those positive testimonials are the best advertising. This fact proves that our company takes the leading place among the competing ones.', 'Multi-use', '../Images/prdoucts/16042506410490.jpg,', 'We assure you that our goods have a great number of advantages and it is\r\n very important for the customers. Our products are the real bestsellers\r\n because they have numerous devoted clients all over the country and as \r\nyou know - those positive testimonials are the best advertising. This \r\nfact proves that our company takes the leading place among the competing\r\n ones.', NULL, NULL, '18-Volt-Compact-Lithium-Ion-Drill', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:33:59', 6, 1),
(27, ',65,', '3M Dynamic Mixing Applicator', '3M Dynamic Mixing Applicator', 'You can buy the premium quality goods at a fair price. Our company cares about the clients and never lets them down. We are the constant participants of different social and technological researches. Our goods have a great number of different useful and functional options. The products of our store are well-designed and very user-friendly. Keep saving your money with our store!', 'Multi-use', '../Images/prdoucts/16042506425984.jpg,', 'You can buy the premium quality goods at a fair price. Our company cares\r\n about the clients and never lets them down. We are the constant \r\nparticipants of different social and technological researches. Our goods\r\n have a great number of different useful and functional options. The \r\nproducts of our store are well-designed and very user-friendly. Keep \r\nsaving your money with our store!', NULL, NULL, '3M-Dynamic-Mixing-Applicator', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:33:51', 5, 1),
(28, ',64,', '3M No Cleanup Applicator', '3M No Cleanup Applicator', 'Our company cares about the clients and never lets them down. We are the constant participants of different social and technological researches. Our goods have a great number of different useful and functional options. The products of our store are well-designed and very user-friendly. We are always in touch with the latest fashion and hi-tech tendencies.', 'Accessory', '../Images/prdoucts/16042506473517.jpg,', 'Our company cares about the clients and never lets them down. We are the\r\n constant participants of different social and technological researches.\r\n Our goods have a great number of different useful and functional \r\noptions. The products of our store are well-designed and very \r\nuser-friendly. We are always in touch with the latest fashion and \r\nhi-tech tendencies.', NULL, NULL, '3M-No-Cleanup-Applicator', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:33:45', 4, 1),
(29, ',70,', '3M Dual Cartridge Respirator', '3M Dual Cartridge Respirator', '3M Dual Cartridge Respirator', 'Multi-use', '../Images/prdoucts/16042506490547.jpg,', 'We observe only branded commodities policy. You can buy the premium \r\nquality goods at a fair price. Our company cares about the clients and \r\nnever lets them down. We are the constant participants of different \r\nsocial and technological researches. Our goods have a great number of \r\ndifferent useful and functional options. The products of our store are \r\nwell-designed and very user-friendly.', NULL, NULL, '3M-Dual-Cartridge-Respirator', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-30 01:09:10', 3, 1),
(30, ',98,', 'AEG Chipping Hammer MH 5 E', 'AEG Chipping Hammer MH 5 E', 'But our vendors and manufactures guarantee the highest quality of our products. There is no doubt that we are the leading company in this sphere. We observe only branded commodities policy. You can buy the premium quality goods at a fair price. Our company cares about the clients and never lets them down. We are the constant participants of different social and technological researches.', 'Equipment', '../Images/prdoucts/16042506513186.jpg,', 'But our vendors and manufactures guarantee the highest quality of our \r\nproducts. There is no doubt that we are the leading company in this \r\nsphere. We observe only branded commodities policy. You can buy the \r\npremium quality goods at a fair price. Our company cares about the \r\nclients and never lets them down. We are the constant participants of \r\ndifferent social and technological researches.', NULL, NULL, 'AEG-Chipping-Hammer-MH-5-E', NULL, 1, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:33:31', 2, 1),
(31, ',66,98,', 'AEG Chipping Hammer PM 3', 'AEG Chipping Hammer PM 3', 'If you want to know more information you can address our superb online 24/7 support system. We have a great number of different promos and you can get a pretty good discount. Keep saving your money with our store! The products of our store are the perfect combination of a real reliability and durability. This fact proves that our company takes the leading place among the competing ones.', 'Accessory', '../Images/prdoucts/56dds.jpg,', '&amp;nbsp;If you want to know more information you can address our superb online 24/7 support system. We have a great number of different promos and you can get a pretty good discount. Keep saving your money with our store! The products of our store are the perfect combination of a real reliability and durability. This fact proves that our company takes the leading place among the competing ones.', NULL, NULL, '', NULL, 1, 0, 0, 0, NULL, NULL, '22,21,20', 1, NULL, NULL, NULL, NULL, '2017-08-21 03:19:16', 1, 1),
(33, ',99,', 'Rainbow Bridge for iphone6 S', 'Rainbow Bridge for iphone6 S', 'Rainbow Bridge for iphone6 S', 'JB-Ip6S', '../Images/prdoucts/16030907373165.jpg,../Images/prdoucts/16030907373951.jpg,../Images/prdoucts/16030907374636.jpg,../Images/prdoucts/16030907375429.jpg,../Images/prdoucts/16030907380691.jpg,../Images/prdoucts/16030907381317.jpg,../Images/prdoucts/16030907382446.jpg,../Images/prdoucts/16030907383394.jpg,../Images/prdoucts/16030907384380.jpg,../Images/prdoucts/16030907384930.jpg,', '&amp;nbsp;Introductions:&lt;br /&gt;\r\n(1) The double colour soft TPU cover case works for iphone 6S. &lt;br /&gt;\r\n(2)Made of high quality frosted TPU material, all round side to protect your phone, it’s easy to disassemble and remove.&lt;br /&gt;\r\n(3) Soft touch, gradient colors.&lt;br /&gt;\r\n(4) Colors in stock are nine:red,&amp;nbsp; yellow, gray,&amp;nbsp; blue and green. &lt;br /&gt;', NULL, NULL, 'Rainbow-Bridge-for-iphone6-S', NULL, 0, 0, 0, 0, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '2016-09-28 03:33:18', 10000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sc_tagandseo`
--

CREATE TABLE `sc_tagandseo` (
  `ID` int(11) NOT NULL,
  `tag_indexkey` varchar(300) DEFAULT NULL,
  `tag_indexdes` varchar(500) DEFAULT NULL,
  `tag_prokey` varchar(300) DEFAULT NULL,
  `tag_prodes` varchar(500) DEFAULT NULL,
  `tag_newkey` varchar(300) DEFAULT NULL,
  `tag_newdes` varchar(500) DEFAULT NULL,
  `tag_homeabout` varchar(2000) DEFAULT NULL,
  `tag_contacts` varchar(5000) DEFAULT NULL,
  `tag_home` varchar(50) DEFAULT NULL,
  `tag_about` varchar(50) DEFAULT NULL,
  `tag_product` varchar(50) DEFAULT NULL,
  `tag_productcategory` varchar(50) DEFAULT NULL,
  `tag_news` varchar(50) DEFAULT NULL,
  `tag_contact` varchar(50) DEFAULT NULL,
  `tag_tel` varchar(50) DEFAULT NULL,
  `tag_email` varchar(50) DEFAULT NULL,
  `tag_download` varchar(50) DEFAULT NULL,
  `tag_message` varchar(50) DEFAULT NULL,
  `tag_hot` varchar(50) DEFAULT NULL,
  `tag_tuijian` varchar(50) DEFAULT NULL,
  `tag_search` varchar(50) DEFAULT NULL,
  `tag_title` varchar(50) DEFAULT NULL,
  `tag_content` varchar(50) DEFAULT NULL,
  `tag_proxxms` varchar(50) DEFAULT NULL,
  `tag_proxgcp` varchar(50) DEFAULT NULL,
  `tag_newsxg` varchar(50) DEFAULT NULL,
  `tag_searchms` varchar(200) DEFAULT NULL,
  `tag_messgetj` varchar(200) DEFAULT NULL,
  `tag_messgets` varchar(200) DEFAULT NULL,
  `tag_more` varchar(50) DEFAULT NULL,
  `tag_code` varchar(50) DEFAULT NULL,
  `tag_searchtit` varchar(200) DEFAULT NULL,
  `tag_inquiry` varchar(50) DEFAULT NULL,
  `tag_Item` varchar(50) DEFAULT NULL,
  `tag_follow` varchar(50) DEFAULT NULL,
  `languageID` int(11) DEFAULT NULL,
  `tag_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_tagandseo`
--

INSERT INTO `sc_tagandseo` (`ID`, `tag_indexkey`, `tag_indexdes`, `tag_prokey`, `tag_prodes`, `tag_newkey`, `tag_newdes`, `tag_homeabout`, `tag_contacts`, `tag_home`, `tag_about`, `tag_product`, `tag_productcategory`, `tag_news`, `tag_contact`, `tag_tel`, `tag_email`, `tag_download`, `tag_message`, `tag_hot`, `tag_tuijian`, `tag_search`, `tag_title`, `tag_content`, `tag_proxxms`, `tag_proxgcp`, `tag_newsxg`, `tag_searchms`, `tag_messgetj`, `tag_messgets`, `tag_more`, `tag_code`, `tag_searchtit`, `tag_inquiry`, `tag_Item`, `tag_follow`, `languageID`, `tag_time`) VALUES
(1, 'Mobile Phone Case,Leather case', 'Mobile Phone Case,Leather case,Ipad case series,Bluetooth,Phone accessories', 'iPad mini', 'iPad mini', 'news', 'news', 'Let&#039; us bring your&lt;br /&gt;\r\ndeck back to life!&lt;br /&gt;\r\n&lt;br /&gt;\r\nLorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;br /&gt;\r\nAbout&lt;br /&gt;\r\nour company&lt;br /&gt;\r\n&lt;br /&gt;', '&lt;table style=&quot;width:100%;&quot; class=&quot;ke-zeroborder&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; bordercolor=&quot;#000000&quot; border=&quot;0&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;p&gt;\r\n					&lt;br /&gt;\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					&lt;strong&gt;Add:&lt;/strong&gt; \r\n				&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n				8901 Marmora Road, Glasgow, D04 89GR.&lt;br /&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;p&gt;\r\n					&lt;strong&gt;Freephone:&lt;/strong&gt; \r\n				&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n				+1 800 559 6681&lt;br /&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;p&gt;\r\n					&lt;strong&gt;FAX:&lt;/strong&gt; \r\n				&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n				+1 800 889 9090&lt;br /&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;p&gt;\r\n					&lt;strong&gt;E-mail:&lt;/strong&gt; \r\n				&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n				info@sem-cms.com&lt;br /&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br /&gt;\r\n&lt;img src=&quot;http://api.map.baidu.com/staticimage?center=121.50015%2C31.17702&amp;zoom=11&amp;width=558&amp;height=360&amp;markers=121.50015%2C31.17702&amp;markerStyles=l%2CA&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;', 'Home', 'About us', 'Products', 'Categories', 'News', 'Contact us', 'Tel', 'E-mail', 'Download', 'Send us your question about this product', 'New products', 'Featured', 'Search', 'Title', 'Content', 'Detailed description', 'Related products', 'Related news', 'Sorry, no related products!', 'Thank you!', 'with * no empty!', 'READ MORE', 'code', 'Enter your keywords', 'Inquiry now', 'item No', 'Follow Us', 1, '2017-10-23 23:51:40');

-- --------------------------------------------------------

--
-- 表的结构 `sc_user`
--

CREATE TABLE `sc_user` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_admin` varchar(50) NOT NULL,
  `user_ps` varchar(50) NOT NULL,
  `user_tel` varchar(50) DEFAULT NULL,
  `user_qx` varchar(500) DEFAULT NULL,
  `user_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_email` varchar(100) DEFAULT NULL,
  `user_rzm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sc_user`
--

INSERT INTO `sc_user` (`ID`, `user_name`, `user_admin`, `user_ps`, `user_tel`, `user_qx`, `user_time`, `user_email`, `user_rzm`) VALUES
(3, '总账号', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '333', '74,76,77,87,88,75,78,79,80,81,82,83,84,89,100,en', '2016-09-22 18:23:02', '41864438@qq.com', '2754'),
(4, 'semcms', 'semcms', '4fe0e4375352dc5b7b8dc140b7ce92bb', '333', '74,76,77,87,88,75,78,79,80,81,82,83,84,89,en', '2016-05-31 03:50:26', 'semcms@126.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sc_banner`
--
ALTER TABLE `sc_banner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_categories`
--
ALTER TABLE `sc_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_config`
--
ALTER TABLE `sc_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_download`
--
ALTER TABLE `sc_download`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_images`
--
ALTER TABLE `sc_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_info`
--
ALTER TABLE `sc_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_language`
--
ALTER TABLE `sc_language`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_link`
--
ALTER TABLE `sc_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_menu`
--
ALTER TABLE `sc_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_msg`
--
ALTER TABLE `sc_msg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_products`
--
ALTER TABLE `sc_products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_tagandseo`
--
ALTER TABLE `sc_tagandseo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sc_user`
--
ALTER TABLE `sc_user`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sc_banner`
--
ALTER TABLE `sc_banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `sc_categories`
--
ALTER TABLE `sc_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- 使用表AUTO_INCREMENT `sc_config`
--
ALTER TABLE `sc_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sc_download`
--
ALTER TABLE `sc_download`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `sc_images`
--
ALTER TABLE `sc_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- 使用表AUTO_INCREMENT `sc_info`
--
ALTER TABLE `sc_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `sc_language`
--
ALTER TABLE `sc_language`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sc_link`
--
ALTER TABLE `sc_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sc_menu`
--
ALTER TABLE `sc_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `sc_msg`
--
ALTER TABLE `sc_msg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `sc_products`
--
ALTER TABLE `sc_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 使用表AUTO_INCREMENT `sc_tagandseo`
--
ALTER TABLE `sc_tagandseo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sc_user`
--
ALTER TABLE `sc_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
