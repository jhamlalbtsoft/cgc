-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 09:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgc`
--

-- --------------------------------------------------------

--
-- Table structure for table `members_edit`
--

CREATE TABLE `members_edit` (
  `MembersId` int(10) UNSIGNED NOT NULL,
  `ekai_id` int(11) DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `MemberType` text DEFAULT NULL,
  `FirmName` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GroupsId` int(10) UNSIGNED DEFAULT NULL,
  `GroupName` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SubGroupId` int(11) DEFAULT NULL,
  `SubGroupName` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `STDCode` text DEFAULT NULL,
  `Landline` text DEFAULT NULL,
  `Mobile` text DEFAULT NULL,
  `Shop` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Complex` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Street` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SectorMohalla` varchar(255) DEFAULT NULL,
  `AreaId` int(10) UNSIGNED DEFAULT NULL,
  `AreaName` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CityId` int(10) UNSIGNED DEFAULT NULL,
  `CityName` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DistrictId` int(10) UNSIGNED DEFAULT NULL,
  `DistrictName` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PIN` text DEFAULT NULL,
  `GSTN` varchar(50) DEFAULT NULL,
  `RegistrationNo` text DEFAULT NULL,
  `RegistrationNoOld` text DEFAULT NULL,
  `rnoold` varchar(20) NOT NULL DEFAULT '0',
  `Approved` tinyint(1) DEFAULT NULL,
  `CertificatePrint` tinyint(1) DEFAULT NULL,
  `CertModeOfDispatch` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CertDetails` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CertUserId` int(10) UNSIGNED DEFAULT NULL,
  `Representative1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ImageRep1` text DEFAULT NULL,
  `MobileRep1` text DEFAULT NULL,
  `MobileRep1Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `EmailRep1` text DEFAULT NULL,
  `SalutationRep1` text DEFAULT NULL,
  `GoverningBodyIdRep1` int(10) UNSIGNED DEFAULT NULL,
  `GoverningBodyIdNameRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GBDesignationIdRep1` int(10) UNSIGNED DEFAULT NULL,
  `GBDesignationIdNameRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CommitteeIDRep1` int(10) UNSIGNED DEFAULT NULL,
  `CommitteeIDNameRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CdesignationIdRep1` int(10) UNSIGNED DEFAULT NULL,
  `CdesignationIdNameRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardPrintRep1` text DEFAULT NULL,
  `CardDispatchModeRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardDetailsRep1` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardUserIdRep1` int(10) UNSIGNED DEFAULT NULL,
  `Representative2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ImageRep2` text DEFAULT NULL,
  `MobileRep2` text DEFAULT NULL,
  `MobileRep2Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `EmailRep2` text DEFAULT NULL,
  `SalutationRep2` text DEFAULT NULL,
  `GoverningBodyIdRep2` int(10) UNSIGNED DEFAULT NULL,
  `GoverningBodyIdNameRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GBDesignationIdRep2` int(10) UNSIGNED DEFAULT NULL,
  `GBDesignationIdNameRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CommitteeIDRep2` int(10) UNSIGNED DEFAULT NULL,
  `CommitteeIDNameRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CdesignationIdRep2` int(10) UNSIGNED DEFAULT NULL,
  `CdesignationIdNameRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardPrintRep2` text DEFAULT NULL,
  `CardDispatchModeRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardDetailsRep2` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CardUserIdRep2` int(10) UNSIGNED DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `DeletedStatus` tinyint(1) DEFAULT NULL,
  `GBOrderRep1` int(10) UNSIGNED DEFAULT NULL,
  `GBOrderRep2` int(10) UNSIGNED DEFAULT NULL,
  `COrderRep1` int(10) UNSIGNED DEFAULT NULL,
  `COrderRep2` int(10) UNSIGNED DEFAULT NULL,
  `MemDoc` text DEFAULT NULL,
  `DocTitle` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Remark` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `FY` varchar(150) DEFAULT NULL,
  `old_remarks` varchar(255) DEFAULT NULL,
  `source` varchar(10) NOT NULL DEFAULT 'backend',
  `paymentfiles` varchar(50) DEFAULT NULL,
  `gstfiles` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `shopPhoto` varchar(50) DEFAULT NULL,
  `geoLocation` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `referenceMobile` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members_edit`
--

INSERT INTO `members_edit` (`MembersId`, `ekai_id`, `member_id`, `MemberType`, `FirmName`, `GroupsId`, `GroupName`, `SubGroupId`, `SubGroupName`, `Email`, `STDCode`, `Landline`, `Mobile`, `Shop`, `Complex`, `Street`, `SectorMohalla`, `AreaId`, `AreaName`, `CityId`, `CityName`, `DistrictId`, `DistrictName`, `PIN`, `GSTN`, `RegistrationNo`, `RegistrationNoOld`, `rnoold`, `Approved`, `CertificatePrint`, `CertModeOfDispatch`, `CertDetails`, `CertUserId`, `Representative1`, `ImageRep1`, `MobileRep1`, `MobileRep1Alternate`, `OrgDesignationRep1`, `EmailRep1`, `SalutationRep1`, `GoverningBodyIdRep1`, `GoverningBodyIdNameRep1`, `GBDesignationIdRep1`, `GBDesignationIdNameRep1`, `CommitteeIDRep1`, `CommitteeIDNameRep1`, `CdesignationIdRep1`, `CdesignationIdNameRep1`, `CardPrintRep1`, `CardDispatchModeRep1`, `CardDetailsRep1`, `CardUserIdRep1`, `Representative2`, `ImageRep2`, `MobileRep2`, `MobileRep2Alternate`, `OrgDesignationRep2`, `EmailRep2`, `SalutationRep2`, `GoverningBodyIdRep2`, `GoverningBodyIdNameRep2`, `GBDesignationIdRep2`, `GBDesignationIdNameRep2`, `CommitteeIDRep2`, `CommitteeIDNameRep2`, `CdesignationIdRep2`, `CdesignationIdNameRep2`, `CardPrintRep2`, `CardDispatchModeRep2`, `CardDetailsRep2`, `CardUserIdRep2`, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`, `DeletedStatus`, `GBOrderRep1`, `GBOrderRep2`, `COrderRep1`, `COrderRep2`, `MemDoc`, `DocTitle`, `Remark`, `FY`, `old_remarks`, `source`, `paymentfiles`, `gstfiles`, `website`, `shopPhoto`, `geoLocation`, `reference`, `referenceMobile`, `status`, `otp`) VALUES
(15, 28, 28042, 'LT', 'TESTING45', NULL, 'Electrical Retailer (52)', NULL, NULL, NULL, '12345678', NULL, NULL, '12345678', '12345678', '12345678', NULL, NULL, 'ANDA', NULL, 'BALOD', NULL, 'DURG', '12345678', 'DF1234567890', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '12345678', 'uploads/rep1_68ce499a904f89.11164602.jpg', '7845154578', NULL, NULL, '12345678@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'uploads/rep2_68ce499a906902.20571123.jpg', '12345678', NULL, NULL, '12345678@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend', 'uploads/payment_68ce55982e3cf6.65129566.jpg', 'uploads/gst_68ce499a908a35.40288679.jpg', 'https://mmschool.ac.in/erp/visitor', '', '5654', '12345678', 1234567890, 'pending', '90287');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members_edit`
--
ALTER TABLE `members_edit`
  ADD PRIMARY KEY (`MembersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_edit`
--
ALTER TABLE `members_edit`
  MODIFY `MembersId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
