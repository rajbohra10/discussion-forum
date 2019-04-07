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
-- Table structure for table `commentson`
--

CREATE TABLE `commentson` (
  `commentid` int(11) NOT NULL,
  `commentdate` date NOT NULL,
  `cdescription` text NOT NULL,
  `cupvotes` int(11) NOT NULL,
  `cdownvotes` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentson`
--

INSERT INTO `commentson` (`commentid`, `commentdate`, `cdescription`, `cupvotes`, `cdownvotes`, `postid`, `userid`) VALUES
(1, '2018-10-19', 'This is the first comment', 5, 5, 16, 2),
(2, '2018-10-19', 'This is the first comment', 5, 1, 16, 2),
(3, '2018-10-19', 'hello', 0, 0, 18, 2),
(4, '2018-10-19', 'hello', 0, 0, 18, 2),
(5, '2018-10-19', 'hgu', 0, 0, 17, 2),
(6, '2018-10-19', 'hgu', 0, 0, 17, 2),
(7, '2018-10-20', 'Thi si =the ', 6, 6, 16, 2),
(8, '2018-10-20', 'this is a new comment', 1, 0, 16, 2),
(9, '2018-10-20', 'a newwwww comment', 0, 0, 17, 2),
(10, '2018-10-20', 'shsdbysggys', 0, 0, 17, 2),
(11, '2018-10-20', 'sudysd', 0, 0, 18, 2),
(12, '2018-10-20', 'This is a test comment', 0, 0, 18, 2),
(13, '2018-10-20', 'Compared to other phones its expensiveee!!', 1, 0, 18, 5),
(15, '2018-10-20', 'This is totally random', 1, 0, 19, 2),
(16, '2018-10-20', 'Elon Musk is the bestttttttttttttttttt!!!', 2, 0, 24, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentson`
--
ALTER TABLE `commentson`
  ADD PRIMARY KEY (`commentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentson`
--
ALTER TABLE `commentson`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
