-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 08:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tehseen_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `course`) VALUES
(26, 'Abdul Haseeb', 'haseeb@gmail.com', 'haseeB@1', '03456465456', 'G Magnoila town', 'male', 'PHP'),
(28, 'Ahad Ali', 'ahadali@gmail.com', 'AHAD@123ali', '03156465165', 'gujranwala', 'male', 'PHP'),
(33, 'Ali Hasan', 'ali@gmail.com', '789-Ali@H', '03486486465', 'jskahfdjsdkfdshfdsjkfh', 'male', 'PHP'),
(43, 'Hassan', 'hassan@gmail.com', 'hassAN@1', '03789489745', 'faskfjkdlsafjakdfn', 'male', 'java'),
(46, 'New User', 'user@gmail.com', 'useR123@', '03564865168', 'fdsopafjasdklfjaik', 'male', 'java'),
(47, 'User first', 'firstU@gmail.com', 'firstU@1233', '03547984765', 'dkjfsfjaksdfjsafk afjdakls', 'male', 'java'),
(48, 'User second', 'sercondU@gmail.com', 'serCond@12', '03486745641', 'lkadsfjadfjklsfjas', 'male', 'java'),
(49, 'anotherab', 'another@gmail.com', 'ther@g@12A', '03654654564', 'fhdsafkjladsfhdaskl jkldsjf lka', 'male', 'python'),
(50, 'kjsadfhajkl', 'dskasjfkla@reklf.fs', 'a@reklf.12A', '03146465419', 'ldkfndasklfjkalfa', 'male', 'PHP'),
(51, 'Ajex Test', 'ajex@gmail.com', 'ajeX@123', '03465468486', 'dfsjh djfdsfj kdfd fdksf ', NULL, 'PHP'),
(52, 'Ajex Test', 'ajex@gmail.com', 'ajeX@123', '03465468486', 'dfsjh djfdsfj kdfd fdksf ', NULL, 'PHP'),
(57, 'fdasfsdf', 'tegs@fadsf.ssd', 'tegs@fadsf1A', '03546646546', 'jkhafjkasfkjl', 'other', 'python'),
(58, 'adsf', 'afdfaaa@fds.dfa', 'condition_arr1A', '03107151106', 'fadsfjadkslfnmdask', 'other', 'python'),
(59, 'adsf aaaa', 'ads@as.sd', '$id = \'\'1A', '03546647546', 'jkhafjkasfkjl', 'other', 'PHP'),
(60, 'fdasfsdf aaa', 'ads@as.sd', '$id = \'\'1A', '03516514235', 'jkhafjkasfkjl', 'other', 'java'),
(62, 'adsf', 'ads@as.sd', '$id = \'\'1AAAAAAAAA', '03546647546', 'asdfdsdsafdsf', 'other', 'PHP'),
(63, 'adsf', 'ads@as.sd', '$id = \'1AAAAAAAAA', '03546647546', 'asdfdsdsafdsf', 'other', 'PHP'),
(64, 'adsf', 'ads@as.sd', '$id = \'1AAAAAAAAA', '03546647546', 'asdfdsdsafdsf', 'other', 'PHP'),
(68, 'Tegse', 'afdfaaa@fds.df', '$id = \'1AAAAAAAAABBBBBBBB', '03554565154', 'jkhafjkasfkjl', 'female', 'java'),
(69, 'Ajex Insertion Test', 'insert@gmail.com', 'InserT@12', '03467864654', 'Ajex insertion address', 'other', 'PHP'),
(70, 'test again', 'again@gmail.com', 'again@T11', '03165465156', 'again address', 'other', 'PHP'),
(71, 'fdasfsdf', 'ads@as.sd', '$(\'#form\')[0A', '03546647546', 'fdsdsfdsafkdfadfjd', 'other', 'PHP'),
(111, 'sdgdsfg', 'tegs@fadsf.ssd', 'Database {1', '03554565154', 'fdsdsfdsafkjd', 'other', 'python'),
(112, 'dsfdsfdsfQQW', 'QQW@gmail.vg', 'Database {a1', '03546646546', 'fdsdsfdsafkjd', 'other', 'java'),
(113, 'CCDW', 'cc@ss.gh', '->readData1', '03516514235', 'fadsfjadkslfnmdask', 'other', 'java'),
(116, 'sdgdsfg', 'afdfaaa@fds.df', '$(\'#message\').htmlA11', '03107151106', 'jkhafjkasfkjl', 'other', 'PHP'),
(126, 'Tegse', 'afdfaaa@fds.df', '$(\'#messaA11', '03554565154', 'fadsfjadkslfnmdask', 'other', 'java'),
(127, 'sdgdsfg', 'afdfaaa@fds.df', 'udOperations();1', '03789489745', 'jkhafjkasfkjl', 'other', 'java'),
(129, 'fdasfsdf', 'tegs@fadsf.ssd', 'gs@faA11', '03107151106', 'fadsfjadkslfnmdask', 'other', 'python'),
(130, 'Edit Check', 'ads@as.sd', '(isse_POST1', '03554565154', 'jkhafjkasfkjl', 'other', 'PHP'),
(132, 'Test Focuses', 'tegs@fadsf.ssd', 'read_data();1A', '03516514235', 'fadsfjadkslfnmdask', 'other', 'java'),
(135, 'Test Button', 'tegs@fadsf.ssd', 'n-field1A', '03546646546', 'fdsdsfdsafkjd', 'other', 'python'),
(139, 'Test Conditions', 'tehseen@gmail.com', '', '03554565154', 'fdsdsfdsafkjd', 'other', 'java'),
(140, 'Test Sql Query', 'tegs@fadsf.ssd', 'form-input1AA', '03546646546', 'fdsdsfdsafkjd', 'other', 'java'),
(141, 'Final Call', 'tegs@fadsf.ssd', 'echo $_PO1S', '03546646546', 'jkhafjkasfkjl', 'other', 'PHP'),
(142, 'Final', 'tegs@fadsf.ssd', 'abc@#123A', '03546647546', 'jkhafjkasfkjl', 'other', 'PHP'),
(143, 'ahad', 'ali@g', 'Aa@12345', '03237916161', 'test address', 'male', 'PHP'),
(147, 'aaabbbccc', 'ads@as.sd', 'ABCa@123', '03789489745', 'fdsdsfdsafkdfadfjd', 'other', 'java'),
(148, 'dsfdsfdsf', 'ads@as.sd', 'ads@as.sdA1', '03546646546', 'Link Sui Gas Road', 'other', 'java'),
(149, 'CCDW', 'tegs@fadsf.ssd', 'egs@fads1A', '03516514235', 'jkhafjkasfkjl', 'other', 'PHP'),
(150, 'Encryption', 'enc@gmail.com', '$2a$10$6f6d58371cef416b6733cuPnxxAnPeGhjKGMVlC6F3j', '03546647546', 'faskfjkdlsafjakdfn', 'other', 'PHP'),
(153, 'Tehseen', 'tehseen@gmail.com', '$2a$10$a1d51437cd9e5d6c2c424u49PTL4WlU8Zx7MKDwv8HbMcdPhNGB56', '03107151106', 'fdsdsfdsafkjd', 'male', 'PHP'),
(154, 'Ahad Ali', 'ahad@gmail.com', '$2a$10$a70c38924f470ea7d3d9fevsKVMqvpfVSkLUA09fg6Wnpuj2na2y6', '03546646546', 'fadsfjadkslfnmdask', 'male', 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
