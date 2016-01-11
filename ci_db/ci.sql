-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 05:47 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_info`
--

CREATE TABLE IF NOT EXISTS `blog_info` (
  `configID` int(11) NOT NULL AUTO_INCREMENT,
  `configDesc` varchar(45) NOT NULL,
  `configValue` text NOT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog_info`
--

INSERT INTO `blog_info` (`configID`, `configDesc`, `configValue`) VALUES
(1, 'blog_title', 'Neko! CMS'),
(2, 'blog_meta_desc', 'Neko CMS using codeigniter framework'),
(3, 'blog_owner', 'Neko :)');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  `image_path` text NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `parent_category` varchar(150) NOT NULL,
  `date_posted` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(45) NOT NULL,
  `page_description` varchar(200) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `date_added` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `profile_photo` text NOT NULL,
  `short_motto` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `profile_photo`, `short_motto`, `email`) VALUES
(1, 'noviweb', '5cc23fff3fda8a0e69f22f6e60e19cbd0a4353af', 'Novi Maluenda', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_count`
--

CREATE TABLE IF NOT EXISTS `visitor_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(40) NOT NULL,
  `date_visited` varchar(40) NOT NULL,
  `ip_details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_messages`
--

CREATE TABLE IF NOT EXISTS `visitor_messages` (
  `msgID` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `is_read` varchar(2) NOT NULL,
  `date_recieved` varchar(30) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
