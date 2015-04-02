-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2015 at 03:55 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SENG301DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminUser`
--

CREATE TABLE `adminUser` (
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNum` int(25) NOT NULL,
  `restName` varchar(25) NOT NULL,
  `restLoc` varchar(25) NOT NULL,
  `restType` varchar(25) NOT NULL,
  `restNum` varchar(25) NOT NULL,
  `reservation` varchar(25) NOT NULL,
  `uniqID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerUser`
--

CREATE TABLE `customerUser` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNum` varchar(15) DEFAULT NULL,
  `favFood` varchar(50) NOT NULL,
  `favRest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `foodName` varchar(30) NOT NULL,
  `foodPrice` int(20) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `itemNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant1`
--

CREATE TABLE `restaurant1` (
  `foodName` varchar(20) NOT NULL,
  `foodDesc` varchar(100) NOT NULL,
  `foodPrice` int(11) NOT NULL,
  `ing1` varchar(20) DEFAULT NULL,
  `ing2` varchar(20) NOT NULL,
  `ing3` varchar(20) NOT NULL,
  `ing4` varchar(20) NOT NULL,
  `ing5` varchar(20) NOT NULL,
  `ing6` varchar(20) NOT NULL,
  `foodCategory` varchar(20) DEFAULT NULL,
  `restID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminUser`
--
ALTER TABLE `adminUser`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `uniqID` (`uniqID`);

--
-- Indexes for table `customerUser`
--
ALTER TABLE `customerUser`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`itemNo`);

--
-- Indexes for table `restaurant1`
--
ALTER TABLE `restaurant1`
 ADD PRIMARY KEY (`foodName`);