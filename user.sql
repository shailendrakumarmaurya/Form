-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 01:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `institutename` varchar(50) NOT NULL,
  `experience` varchar(2) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone`, `resume`, `address`, `qualification`, `institutename`, `experience`, `skills`, `date_time`) VALUES
(26, 'Shailendrakumar', 'Ramjatanbhai', 'Maurya', 'mauryshailendra0@gmail.com', '9099237351', 'Shailendrakumar R. Maurya_PHP_.docx', 'B-123, Triveni Society, Opp. Akhand anand college, Ved Road, Surat-395004', 'B.E.(Mechanical)', 'Government Engineering College, Valsad', '0 ', 'Quick learner, Punctual, Self-motivated, Flexible ', '2021-06-23 16:38:29'),
(27, 'Shailendrakumar', 'Ramjatanbhai', 'Maurya', 'mauryshailendra0@gmail.com', '9099237351', 'Shailendrakumar R. Maurya_PHP_.docx', 'B-123, Triveni Society, Opp. Akhand anand college, Ved Road, Surat-395004', 'B.E.(Mechanical)', 'Government Engineering College, Valsad', '0 ', 'Quick learner, Punctual, Self-motivated, Flexible ', '2021-06-23 16:38:47'),
(28, 'Shailendrakumar', 'Ramjatanbhai', 'Maurya', 'mauryshailendra0@gmail.com', '9099237351', 'Shailendrakumar R. Maurya_PHP_.docx', 'B-123, Triveni Society, Opp. Akhand anand college, Ved Road, Surat-395004', 'B.E.(Mechanical)', 'Government Engineering College, Valsad', '0 ', 'Quick learner, Punctual, Self-motivated, Flexible ', '2021-06-23 16:38:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
