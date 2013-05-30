-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2013 at 09:39 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `idntesttask`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

DROP TABLE IF EXISTS `tbl_chat`;
CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `text`, `create_time`, `author_id`) VALUES
(1, 'test message 1', 1369831606, 0),
(2, 'User Demo here &lt;b&gt;Bold&lt;/b&gt;', 1369831670, 0),
(3, 'logout ... but now .... Demo here!!! &lt;div&gt; ', 1369831731, 1),
(4, ' &lt;&gt; &lt; &gt;&lt;&gt; &lt; &gt;&lt; &gt;&lt; &gt;&lt; &gt; &lt;&gt; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ei&gt;&gt;&gt;&gt;&gt; &gt;', 1369831766, 1),
(5, '5th', 1369831920, 0),
(6, '6th', 1369831928, 0),
(7, '7', 1369831931, 0),
(8, '8', 1369831932, 0),
(9, '9', 1369831933, 0),
(10, '10', 1369831935, 0),
(11, '11', 1369831936, 0),
(12, '12', 1369831940, 0),
(13, '13', 1369831941, 0),
(14, '14', 1369831942, 0),
(15, '15', 1369831943, 0),
(16, '16', 1369831943, 0),
(17, 'Only 15 ... ', 1369831967, 0);
