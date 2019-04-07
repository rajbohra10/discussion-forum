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
-- Table structure for table `postdetails`
--

CREATE TABLE `postdetails` (
  `postid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` tinytext NOT NULL,
  `postdate` date NOT NULL,
  `description` text NOT NULL,
  `downvotes` int(11) NOT NULL,
  `upvotes` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postdetails`
--

INSERT INTO `postdetails` (`postid`, `type`, `title`, `postdate`, `description`, `downvotes`, `upvotes`, `userid`, `catid`) VALUES
(18, 'blog', 'Turns out, Pixel 3 is Pricier than you think when it comes to storage', '2018-10-18', 'It makes sense at face value. The Pixel 3 starts at $800, Â£739 and AU$1,199, which is well under the iPhone XS and Note 9\'s starting price. And even its Pixel 3 XL counterpart doesn\'t exceed the price of those phones, despite having a bigger display and a longer-lasting battery than the Pixel 3.\r\n\r\nBut among the top caliber of phones, most perform similarly well. They all have excellent cameras and lightning speed processors, and they all operate on either iOS or Android. As unsexy as \"memory and storage\" sound, granular considerations such as that become important -- especially for premium phones all vying for your hard-earned cash.', 0, 2, 5, 16),
(19, 'blog', 'My First Post', '2018-10-19', 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', 0, 1, 3, 9),
(24, 'blog', 'Elon Musk\'s extreme micromanagement has wasted time and money at Tesla, insiders say', '2018-10-20', 'The team outlined four tiers of car parts that could be put together by machines, from the most rigid and easiest parts, to the most difficult items, which were the flexible components including wire harnesses, carpets and trim.\r\n\r\nMusk told them to automate everything through tier 3. The team warned him robots aren\'t good at installing floppy parts like the big foam hoops that are the seals on Model 3 doors, and that Tesla needed more engineers to manage such extensive automation. But Musk insisted.\r\n\r\nThe company built big stalls into the Model 3 production line at its Fremont factory, including expensive robots that could, in a perfect setup, put seals on doors. They never worked correctly, and \"primary seal automation\" was designated for removal in the first quarter of 2018. The equipment remained for months with cars streaming through the stall. The robots were finally taken out this summer.\r\n\r\nMusk eventually acknowledged in an interview with CBS and a tweet in April 2018 that he had been over-reliant on automation. He admitted it was \"my mistake.\"', 1, 4, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postdetails`
--
ALTER TABLE `postdetails`
  ADD PRIMARY KEY (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postdetails`
--
ALTER TABLE `postdetails`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
