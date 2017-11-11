-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2016 at 11:26 PM
-- Server version: 5.6.31
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `delhivai_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

CREATE TABLE IF NOT EXISTS `addstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `coaching_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `test_amt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `stu_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `addstudent`
--

INSERT INTO `addstudent` (`id`, `student_id`, `coaching_id`, `student_name`, `email`, `phone`, `test_amt`, `password`, `stu_pic`) VALUES
(2, '1472589706-sid', '1472587419-cid', 'vikas', 'vikas@gmail.com', '9856254875', '2', 'vikas@123', 'aa.jpg'),
(3, '1472649960-sid', '1472649877-cid', 'kapil', 'kapil@gmail.com', '9856541565', '3', 'kapil@123', 'picture030.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_question`
--

CREATE TABLE IF NOT EXISTS `mst_question` (
  `que_id` int(10) NOT NULL AUTO_INCREMENT,
  `test_id` int(10) NOT NULL,
  `que_name` varchar(200) NOT NULL,
  `ans1` varchar(75) NOT NULL,
  `ans2` varchar(75) NOT NULL,
  `ans3` varchar(75) NOT NULL,
  `ans4` varchar(75) NOT NULL,
  `trueans` int(10) NOT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE IF NOT EXISTS `mst_subject` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(30) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mst_subject`
--

INSERT INTO `mst_subject` (`sub_id`, `sub_name`) VALUES
(1, 'bank'),
(2, 'PMT'),
(3, 'ssc cgl'),
(4, 'bank po'),
(5, 'rrb');

-- --------------------------------------------------------

--
-- Table structure for table `mst_test`
--

CREATE TABLE IF NOT EXISTS `mst_test` (
  `test_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_id` int(10) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `total_que` varchar(20) NOT NULL DEFAULT '20',
  `duration` int(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `sub_id`, `test_name`, `total_que`, `duration`) VALUES
(1, 1, 'ssc', '3', 0),
(2, 1, 'ssc', '50', 0),
(3, 2, 'fist', '30', 0),
(4, 3, 'st01', '200', 0),
(5, 4, 'st04', '200', 0),
(6, 5, 'qes', '150', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_login` varchar(20) NOT NULL DEFAULT 'csi',
  `member_password` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_pic` varchar(500) NOT NULL DEFAULT 'avtor.png',
  `user_mobile` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_address` varchar(1000) NOT NULL,
  `member_attampts` int(5) NOT NULL DEFAULT '3',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`member_id`, `member_login`, `member_password`, `user_name`, `user_pic`, `user_mobile`, `user_email`, `user_city`, `user_address`, `member_attampts`) VALUES
(4, '1472587419-cid', 'ashu@123', 'bareilly coaching center', 'avtor.png', '9856854758', 'ashu@gmail.com', '', '', 3),
(5, '1472589876-cid', 'vikas@123', 'vikas coaching center', 'avtor.png', '8956854758', 'vikas@gmail.com', '', '', 3),
(6, '1472649877-cid', 'aman@123', 'aman coaching center', 'avtor.png', '9658745854', 'aman@gmail.com', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mst_useranswer`
--

CREATE TABLE IF NOT EXISTS `mst_useranswer` (
  `useranswer_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `question_id` int(20) NOT NULL,
  `answer` int(20) NOT NULL,
  `attemp_id` varchar(255) NOT NULL DEFAULT '0',
  `testp_id` varchar(50) NOT NULL DEFAULT 'csi',
  `sub_id` int(255) NOT NULL,
  PRIMARY KEY (`useranswer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`useranswer_id`, `user_id`, `question_id`, `answer`, `attemp_id`, `testp_id`, `sub_id`) VALUES
(1, 2, 1, 1, '0', 'csi', 0),
(2, 2, 2, 1, '0', 'csi', 0),
(3, 2, 3, 4, '0', 'csi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_profile`
--

CREATE TABLE IF NOT EXISTS `mst_user_profile` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pic` varchar(100) NOT NULL DEFAULT 'cyberexam.jpg',
  `user_mobile` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `member_id` int(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
