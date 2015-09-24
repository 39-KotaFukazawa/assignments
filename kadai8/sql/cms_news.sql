-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 9 月 24 日 14:34
-- サーバのバージョン： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_news`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `news_contents` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(258) COLLATE utf8_unicode_ci NOT NULL,
  `news_date` datetime NOT NULL,
  `news_category` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_contents`, `news_image`, `news_date`, `news_category`) VALUES
(1, 'd', 'd', '', '2015-09-24 09:50:21', 'sports'),
(2, 'd', 'd', '', '2015-09-24 09:50:35', 'sports'),
(3, 'd', 'd', '', '2015-09-24 09:56:42', 'sports'),
(4, 'd', 'd', '', '2015-09-24 09:56:56', 'sports'),
(5, 'GDP2%増加。', '今年のGDPが昨年比3%アップしました。', '', '2015-09-24 15:22:21', 'economics'),
(6, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/20150924111310tdq0673badcdki969turqst1h5.JPG', '2015-09-24 18:13:10', 'business'),
(7, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/201509241113543a6j5fcifvakr4paqf9e7eg4j6.JPG', '2015-09-24 18:13:54', 'business'),
(8, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/201509241114056ar3tvgvifquh0nmtvvoq16ih1.JPG', '2015-09-24 18:14:05', 'business'),
(9, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/201509241114099fq3625agg0aea5iqm7t5lojb1.JPG', '2015-09-24 18:14:09', 'business'),
(10, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/20150924111413tn7auadtjdj45bcati5apdls41.JPG', '2015-09-24 18:14:13', 'business'),
(11, 'まだ東京で消耗しているの？', '現在地方活性化が一つのバズワードになっています。', 'upload/20150924111415dt442c01ft3lsdmolh00cnvvl6.JPG', '2015-09-24 18:14:15', 'business');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_image` varchar(258) COLLATE utf8_unicode_ci NOT NULL,
  `user_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_image`, `user_description`) VALUES
(2, 'Fukazawa K', 'kouhot6210@gmail.com', 'abc', 'upload/20150923144514.JPG', '大学生です。'),
(3, 'Fukazawa K', 'kouhot6210@gmail.com', 'abc', 'upload/20150923144929.JPG', '大学生です。'),
(4, 'naoki', 'naoki@co.jp', 'a', 'upload/20150923170249.JPG', 'naokiです。'),
(5, 'kota', 'kota@co.jp', 'abc', 'upload/20150923170445.JPG', 'kota'),
(6, 'kota', 'kota@co.jp', '900150983cd24fb0d696', 'upload/20150923172710.JPG', 'kota'),
(7, 'takao', 'tamura@co.jp', '0cc175b9c0f1b6a831c3', 'upload/20150923172831.JPG', 'takao'),
(8, 'takahashi', 'kouhot6210@gmail.com', 'abc', 'upload/20150924133756.png', 'サーカーが好きです。');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
