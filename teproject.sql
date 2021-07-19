-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 07:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `stud_id` int(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`stud_id`, `class`, `sem`) VALUES
(1, 'TE', 'Fifth'),
(2, 'SE', 'Fourth');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `stud_id` int(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `s1` int(255) NOT NULL,
  `s2` int(255) NOT NULL,
  `s3` int(255) NOT NULL,
  `s4` int(255) NOT NULL,
  `s5` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`stud_id`, `roll`, `sem`, `s1`, `s2`, `s3`, `s4`, `s5`) VALUES
(1, 'TI12', 'Fifth', 70, 48, 56, 70, 58),
(2, 'SI12', 'Fourth', 77, 67, 77, 88, 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `name`, `roll`, `class`, `sem`) VALUES
(1, 'Akash', 'TI12', 'TE', 'Fifth'),
(2, 'Ajay', 'SI12', 'SE', 'Fourth');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `stud_id` int(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `S1` text NOT NULL,
  `S2` text NOT NULL,
  `S3` text NOT NULL,
  `S4` text NOT NULL,
  `S5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`stud_id`, `sem`, `S1`, `S2`, `S3`, `S4`, `S5`) VALUES
(1, 'Fifth', 'C', 'C++', 'Java', 'JS', 'Python'),
(2, 'Fourth', 'A', 'C', 'D', 'F', 'G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
