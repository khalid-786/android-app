-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 07:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joboficer`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyforjobs`
--

CREATE TABLE IF NOT EXISTS `applyforjobs` (
`id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applier_id` int(11) NOT NULL,
  `apply_date` datetime NOT NULL,
  `applier_message` text NOT NULL,
  `is_accept` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applyforjobs`
--

INSERT INTO `applyforjobs` (`id`, `job_id`, `applier_id`, `apply_date`, `applier_message`, `is_accept`) VALUES
(1, 2, 1, '0000-00-00 00:00:00', 'cggghhh', 1),
(3, 1, 3, '0000-00-00 00:00:00', 'السلام عليكم ورحمة الله وبركاته سعيد جدا لانضمام لكم أنا طالب خريجي السنة الخامسة جامعة الجزيرة كلية العلوم الرياضية والحاسوب متخصص ويب', 0),
(5, 1, 4, '0000-00-00 00:00:00', 'ggh', 0),
(7, 1, 1, '2018-10-25 00:00:00', 'welcome', 0),
(9, 2, 5, '2018-10-26 00:00:00', 'السلام عليكم أنا رمضان مطور تطبيقاتأندرويد', 0),
(12, 2, 6, '2018-10-28 00:00:00', 'السلام عليكم ورحمة الله وبركاته   اما بعد فإن الله خلق الجن والإنس لعبادته وحده قال تعالى : { وما خلقت الجن و الإنس إلا ليعبدون } قال ابن عباس إلا ليعبدون إلا ليوحدون', 0),
(13, 13, 1, '2018-10-29 00:00:00', 'السلام عليكم ورحمة الله وبركاته ان محمود', 0),
(14, 14, 1, '2018-10-29 00:00:00', 'السلام عليكم ورحمة الله وبركاته  انا نطور تطبيقات ويب باستخدام ASP.NET  MVC5', 0),
(15, 14, 7, '2018-10-29 00:00:00', '', 0),
(16, 14, 8, '2018-10-31 00:00:00', 'اريد دورة في البرمجة', 0),
(17, 13, 8, '2018-10-31 00:00:00', 'ربنا يوفقكم', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_info` text NOT NULL,
  `job_img` varchar(300) NOT NULL,
  `job_publisher` int(11) NOT NULL,
  `job_chance_number` int(11) NOT NULL,
  `job_chance_number_validate` int(11) NOT NULL,
  `job_publish_date` datetime NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_info`, `job_img`, `job_publisher`, `job_chance_number`, `job_chance_number_validate`, `job_publish_date`, `category_id`) VALUES
(1, 'web', 'sddddd', 'img_18091102565181.jpg', 3, 3, 3, '2018-10-09 00:00:00', 1),
(2, 'android', 'xxxxxxxxxxxxxx', 'img_18091408172288.jpg', 2, 6, 4, '2018-10-27 00:00:00', 2),
(12, 'الدفاع عن السعودية\n', 'الدفاع عنها لأنها أرض الحرمين', 'img_18102812543571.jpg', 6, 2147483647, 0, '2018-10-28 00:00:00', 3),
(13, 'الدفاع عن السعودية\n', 'الدفاع عنها لأنها أرض الحرمين', 'img_18102812543576.jpg', 6, 2147483647, 2, '2018-10-28 00:00:00', 3),
(14, 'مطور ويب  php larvale', 'php developers that have skills to development  web application ', 'img_1810291040546.jpg', 1, 5, 3, '2018-10-29 00:00:00', 1),
(15, 'طلبة', 'وظيفة بتاعت شقاوة \nبتشتغل من 7-12 ظهرا', 'img_18103106421656.jpg', 8, 2, 0, '2018-10-31 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
`category_id` int(11) NOT NULL,
  `category_title` varchar(300) NOT NULL,
  `category_info` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`category_id`, `category_title`, `category_info`) VALUES
(1, 'web development', 'dfgggg\nfgggg'),
(2, 'android  development', 'dfgggg\nfgggg'),
(3, 'القطاع العام', 'كل يختص'),
(4, 'الطبية', 'كل يختص بالطب'),
(5, 'الزراعي', 'كل عاموالجميعرمضانرمضانرمضانرمضان');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(180) NOT NULL,
  `account_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `account_type`) VALUES
(1, 'ali', '786', '0', 'باحث'),
(2, 'khalid', '768', 'Khalid@gmail.com', 'ناشر'),
(3, 'cliprz', '786', 'cliprz@gmail.com', 'ناشر'),
(4, 'omer', '786', 'omer@gmail.com', 'باحث'),
(5, 'Ramadan', '786', 'Ramadan@gmail.com', 'ناشر'),
(6, 'ياسر مصطفى', '34567', 'yassir @ Gmail.com', 'ناشر'),
(7, '', '', '', ''),
(8, 'عبد الرحمن', 'rslanrslan', 'abdobarkali482@gmail.com', 'باحث');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyforjobs`
--
ALTER TABLE `applyforjobs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyforjobs`
--
ALTER TABLE `applyforjobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
