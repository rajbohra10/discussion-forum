-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 08:36 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userid` int(11) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userid`, `userpassword`, `dob`, `username`, `fullname`, `email`) VALUES
(2, 'rajbohra10', '1998-05-10', 'rajbohra', 'Raj Bohra', 'rajbohra10@gmail.com'),
(3, 'harshagicha', '1998-12-07', 'harshagicha', 'Harsh Agicha', 'harshagicha@gmail.com'),
(4, 'rishika', '1998-09-03', 'Bhanushali', 'Rishika', 'rishika@gmail.com'),
(5, 'bhavisha', '1998-09-12', 'bhavisha', 'Bhavisha Bhatia', 'bhavisha@gmail.com'),
(6, 'disha', '1998-05-10', 'disha', 'Disha', 'disha@gmail.com'),
(7, 'kunal', '1998-05-10', 'kunaldesai', 'Kunal Desai', 'kunal@gmail.com'),
(8, 'mahima', '1998-05-10', 'mahima', 'Mahima Chauhan', 'mahima@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
