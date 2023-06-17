-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 08:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openresume`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sub_domain` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `sub_domain`, `about`, `title`, `profile_image`) VALUES
(1, 'abc', 'abc3@gmail.com', 'adminpassword', 'abc', 'You can do this by first getting the domain name (e.g. sub.example.com => example.co.uk) and then use strstr to get the subdomains.', 'dsfdd', 'images/profile_image/cd293efbbfeb7bad6102b9c3e8f6d49a.jpg'),
(5, '', '', '', '', NULL, '', NULL),
(8, 'abc1', 'abc1@gmail.com', 'a', 'asdf', NULL, 'sdf', NULL),
(18, 'abc2', 'abc2@gmail.com', 'adminpassword', 'abc2', NULL, 'abc2', NULL),
(19, 'asikh', 'ashikh@gmail.com', 'adminpassword', 'ashikh', NULL, 'Electronic Developer', NULL),
(25, 'test1', 'test1@gmail.com', 'adminpassword', 'test1', NULL, 'test1', 'images/profile_image/2315fc1fe2a532233cdb3cc2d49e9183.jpg'),
(27, 'test3', 'test3@gmail.com', 'adminpassword', 'test', 'dsfsdfsdf', 'test3', 'images/profile_image/cd293efbbfeb7bad6102b9c3e8f6d49a.jpg'),
(28, 'Jahid', 'jahid@gmail.com', 'adminpassword', 'jahid', 'afsdfsdfsdfsdfsdfd', 'Electronic Developer', 'images/profile_image/5f048e9b3cd534c9d5c7d9ea5f15b8ae.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `account_id`, `title`, `value`) VALUES
(1, 1, 'Mobile Number', '01765118042'),
(2, 1, 'Email', 'mdmarjanhossain0@gmail.com'),
(3, 1, 'Github', 'https://github.com/mdmarjanhossain0'),
(4, 1, 'Mobile Number', '01765118042');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `institution` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `account_id`, `duration`, `institution`, `description`, `course`) VALUES
(2, 1, '2015-2017', 'ABRMS', 'Dec 26, 2014 — A typical syntax error message reads: Parse error: syntax error, unexpected T_STRING, expecting \' ; \' in file.php on line 217.\r\n20 answers\r\n \r\n·\r\n \r\nTop answer: \r\nWhat are the syntax errors? PHP belongs to the C-style and imperative ', 'SSC'),
(7, 1, 'dsf', 'dsf', 'fdsf', 'sdf'),
(8, 1, 'fds', 'wer', 'sfds', 'dsf'),
(9, 1, 'fgdfg', 'ABRMS', 'dfsd', 'JSC'),
(10, 1, '2014', 'ABRMS', 'sdfsdf', 'JSC'),
(19, 19, '2020-2024', 'KUET', 'daklfjasdklfjasdlfkjasdklfjasdklfasd\r\n', 'BSC'),
(20, 28, '2015-2017', 'ABC Collage', 'werwerweqrwerwerwerwerwerwerwer', 'HSC'),
(22, 1, 'uiouio', 'giosdfuio', 'iouio', 'iohij'),
(23, 1, 'kjkljkl', 'kjhk', 'kjkljlkj', 'jkljkl');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `extra_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `account_id`, `duration`, `institution`, `description`, `extra_info`) VALUES
(1, 1, 'dsf', 'ikfjsdlkfjsd', 'Conveying meaning to assistive technologies\r\nUsing color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen ', 'sdf'),
(2, 1, 'fdsf', 'sdfdserwer', 'fsdf', ''),
(3, 1, 'fdsf', 'sdfds', 'fsdf', ''),
(4, 1, 'dsf', 'dsffgsdfsdfsd', 'dsf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `extra_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `account_id`, `name`, `description`, `extra_info`) VALUES
(1, 1, 'sdfsdsfsdfsdfsdasddasd', 'dsfsd', 'fsdfsd'),
(2, 1, 'dfsd', 'dfsf', 'sdf'),
(3, 1, 'abc', 'asdf', 'abc'),
(4, 1, 'sdfsddsfsdfsdf', 'dsfsd', 'fsdfsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `sub_domain` (`sub_domain`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
