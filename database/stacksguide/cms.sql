-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2014 at 11:31 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stacksguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `description` mediumtext NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `location`, `type`, `block_name`, `status`, `description`, `title`) VALUES
(1, 'abc', 'page', 'nice', 'Inactive', '<p><img alt="" src="http://localhost/stacksguide/uploads/editor/images/Desert.jpg" style="float:right; height:100px; width:133px" />feufgbf3fb3</p>\r\n', 'pqr1'),
(2, 'mayank', 'page', 'amu', 'Active', '<p style="text-align: center;"><img alt="" src="http://localhost/stacksguide/uploads/editor/images/Hydrangeas.jpg" style="float:right; height:150px; width:150px" /><span style="color:#FF0000"><span style="font-size:36px">this is mauank amu.</span></span></p>\r\n', 'hiiiii');

