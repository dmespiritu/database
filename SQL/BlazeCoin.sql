-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2018 at 11:39 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BlazeCoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Username` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `logged_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Username`, `Password`, `logged_in`) VALUES
('test', 'password', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Advertising`
--

CREATE TABLE `Advertising` (
  `Advertising_ID` int(11) NOT NULL,
  `Target_Market` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Blazecoin`
--

CREATE TABLE `Blazecoin` (
  `Crypto_ID` int(11) NOT NULL,
  `Updated_Value` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Competitors`
--

CREATE TABLE `Competitors` (
  `Bitcoin` varchar(60) NOT NULL,
  `Ethereum` varchar(60) NOT NULL,
  `Ripple` varchar(60) NOT NULL,
  `LiteCoin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Customer_ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Card_Number` bigint(20) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Expiration_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_ID`, `Username`, `Password`, `Email`, `Card_Number`, `CVV`, `Expiration_Date`) VALUES
(1, 'dereke', 'december1993', 'champion@hothot.com', 123456789, 789, '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `Employee_ID` int(11) NOT NULL,
  `Role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Overall_Sales`
--

CREATE TABLE `Overall_Sales` (
  `Sale_ID` int(11) NOT NULL,
  `Value` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pictures`
--

CREATE TABLE `Pictures` (
  `Picture_ID` int(10) UNSIGNED NOT NULL,
  `Picture` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Regions`
--

CREATE TABLE `Regions` (
  `Region_ID` int(11) NOT NULL,
  `Region` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `Review_ID` int(11) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `Advertising`
--
ALTER TABLE `Advertising`
  ADD PRIMARY KEY (`Advertising_ID`);

--
-- Indexes for table `Blazecoin`
--
ALTER TABLE `Blazecoin`
  ADD PRIMARY KEY (`Crypto_ID`);

--
-- Indexes for table `Competitors`
--
ALTER TABLE `Competitors`
  ADD PRIMARY KEY (`Bitcoin`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Customer_ID`);
ALTER TABLE `Customer` ADD FULLTEXT KEY `Username` (`Username`);
ALTER TABLE `Customer` ADD FULLTEXT KEY `Password` (`Password`);
ALTER TABLE `Customer` ADD FULLTEXT KEY `Email` (`Email`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `Overall_Sales`
--
ALTER TABLE `Overall_Sales`
  ADD PRIMARY KEY (`Sale_ID`);

--
-- Indexes for table `Pictures`
--
ALTER TABLE `Pictures`
  ADD PRIMARY KEY (`Picture_ID`);

--
-- Indexes for table `Regions`
--
ALTER TABLE `Regions`
  ADD PRIMARY KEY (`Region_ID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`Review_ID`);
ALTER TABLE `Reviews` ADD FULLTEXT KEY `Comments` (`Comments`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
