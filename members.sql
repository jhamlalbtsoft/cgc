-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2025 at 06:40 PM
-- Server version: 8.0.41-cll-lve
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgchamber19_cgchambe_raipur`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MembersId` int UNSIGNED NOT NULL,
  `ekai_id` int DEFAULT NULL,
  `MemberType` text,
  `FirmName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `GroupsId` int UNSIGNED DEFAULT NULL,
  `GroupName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `SubGroupId` int DEFAULT NULL,
  `SubGroupName` text,
  `Email` text,
  `STDCode` text,
  `Landline` text,
  `Mobile` text,
  `Shop` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Complex` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Street` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `SectorMohalla` varchar(255) DEFAULT NULL,
  `AreaId` int UNSIGNED DEFAULT NULL,
  `AreaName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CityId` int UNSIGNED DEFAULT NULL,
  `CityName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `DistrictId` int UNSIGNED DEFAULT NULL,
  `DistrictName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PIN` text,
  `GSTN` varchar(50) DEFAULT NULL,
  `RegistrationNo` text,
  `RegistrationNoOld` text,
  `rnoold` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `Approved` tinyint(1) DEFAULT NULL,
  `CertificatePrint` tinyint(1) DEFAULT NULL,
  `CertModeOfDispatch` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CertDetails` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CertUserId` int UNSIGNED DEFAULT NULL,
  `Representative1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `ImageRep1` text,
  `MobileRep1` text,
  `MobileRep1Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `EmailRep1` text,
  `SalutationRep1` text,
  `GoverningBodyIdRep1` int UNSIGNED DEFAULT NULL,
  `GoverningBodyIdNameRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `GBDesignationIdRep1` int UNSIGNED DEFAULT NULL,
  `GBDesignationIdNameRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CommitteeIDRep1` int UNSIGNED DEFAULT NULL,
  `CommitteeIDNameRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CdesignationIdRep1` int UNSIGNED DEFAULT NULL,
  `CdesignationIdNameRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardPrintRep1` text,
  `CardDispatchModeRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardDetailsRep1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardUserIdRep1` int UNSIGNED DEFAULT NULL,
  `Representative2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `ImageRep2` text,
  `MobileRep2` text,
  `MobileRep2Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `EmailRep2` text,
  `SalutationRep2` text,
  `GoverningBodyIdRep2` int UNSIGNED DEFAULT NULL,
  `GoverningBodyIdNameRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `GBDesignationIdRep2` int UNSIGNED DEFAULT NULL,
  `GBDesignationIdNameRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CommitteeIDRep2` int UNSIGNED DEFAULT NULL,
  `CommitteeIDNameRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CdesignationIdRep2` int UNSIGNED DEFAULT NULL,
  `CdesignationIdNameRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardPrintRep2` text,
  `CardDispatchModeRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardDetailsRep2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `CardUserIdRep2` int UNSIGNED DEFAULT NULL,
  `CreatedBy` int DEFAULT NULL,
  `UpdateBy` int DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `DeletedStatus` tinyint(1) DEFAULT NULL,
  `GBOrderRep1` int UNSIGNED DEFAULT NULL,
  `GBOrderRep2` int UNSIGNED DEFAULT NULL,
  `COrderRep1` int UNSIGNED DEFAULT NULL,
  `COrderRep2` int UNSIGNED DEFAULT NULL,
  `MemDoc` text,
  `DocTitle` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Remark` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `FY` varchar(150) DEFAULT NULL,
  `old_remarks` varchar(255) DEFAULT NULL,
  `source` varchar(10) NOT NULL DEFAULT 'backend',
  `paymentfiles` varchar(50) DEFAULT NULL,
  `gstfiles` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `shopPhoto` varchar(50) DEFAULT NULL,
  `geoLocation` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `referenceMobile` int DEFAULT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MembersId`, `ekai_id`, `MemberType`, `FirmName`, `GroupsId`, `GroupName`, `SubGroupId`, `SubGroupName`, `Email`, `STDCode`, `Landline`, `Mobile`, `Shop`, `Complex`, `Street`, `SectorMohalla`, `AreaId`, `AreaName`, `CityId`, `CityName`, `DistrictId`, `DistrictName`, `PIN`, `GSTN`, `RegistrationNo`, `RegistrationNoOld`, `rnoold`, `Approved`, `CertificatePrint`, `CertModeOfDispatch`, `CertDetails`, `CertUserId`, `Representative1`, `ImageRep1`, `MobileRep1`, `MobileRep1Alternate`, `OrgDesignationRep1`, `EmailRep1`, `SalutationRep1`, `GoverningBodyIdRep1`, `GoverningBodyIdNameRep1`, `GBDesignationIdRep1`, `GBDesignationIdNameRep1`, `CommitteeIDRep1`, `CommitteeIDNameRep1`, `CdesignationIdRep1`, `CdesignationIdNameRep1`, `CardPrintRep1`, `CardDispatchModeRep1`, `CardDetailsRep1`, `CardUserIdRep1`, `Representative2`, `ImageRep2`, `MobileRep2`, `MobileRep2Alternate`, `OrgDesignationRep2`, `EmailRep2`, `SalutationRep2`, `GoverningBodyIdRep2`, `GoverningBodyIdNameRep2`, `GBDesignationIdRep2`, `GBDesignationIdNameRep2`, `CommitteeIDRep2`, `CommitteeIDNameRep2`, `CdesignationIdRep2`, `CdesignationIdNameRep2`, `CardPrintRep2`, `CardDispatchModeRep2`, `CardDetailsRep2`, `CardUserIdRep2`, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`, `DeletedStatus`, `GBOrderRep1`, `GBOrderRep2`, `COrderRep1`, `COrderRep2`, `MemDoc`, `DocTitle`, `Remark`, `FY`, `old_remarks`, `source`, `paymentfiles`, `gstfiles`, `website`, `shopPhoto`, `geoLocation`, `reference`, `referenceMobile`, `status`) VALUES
(1, NULL, 'LT', 'LALIT ENTERPRISES', 101, 'Food Grains Wholesalers (01)', 0, '0', 'lalitdisributions@gmail.com', '', '', '9827140086', ' BEHIND OF MANGLAM BHAWAN', 'BAJRANG NAGAR ', 'NAGAR NIGAM COLONY', '', 259, 'AGRASEN CHOWK (RAIPUR)', 1, 'RAIPUR', 1, 'RAIPUR', '492001', '0', '0', 'CCCI00001', '00001', 0, 0, '0', '0', 2, 'LALIT JAISINGH', 'Image/3.LALIT JAISINGH.jpg', '9827140086', '', '0', '0', 'Mr.', 0, '', 0, '', 0, '', 0, '', '2', '0', '0', 2, 'MONISHA JAISINGH', 'Image/MONISHA_19754.jpg', '', '', '0', '0', 'Mrs.', 0, '', 0, '', 0, '', 0, '', '2', '0', '0', 2, 1, 1, '1970-01-01 05:30:00', '2021-06-04 17:03:52', 0, 10, 0, 0, 0, '0', '0', NULL, NULL, NULL, 'backend', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, NULL, 'LT', 'MAHAVIR TRADING COMPANY', 101, 'Food Grains Wholesalers (01)', 0, '0', 'pmaisheri@ymail.com', '771', '4031614', '9425202203', ' ', 'LAXMI NIWAS', 'NEMCHAND GALI', '', 463, 'GANJ PARA', 1, 'RAIPUR', 1, 'RAIPUR', '0', '0', '0', 'CCCI00002', '00002', 0, 0, '0', '0', 2, 'PRAVIN KUMAR MAISHERI', 'Image/4506_PRAVIN KUMAR.jpg', '9425202203', '8770720153', '0', 'pravinmaisheri@ymail.com', 'Mr.', 0, '', 0, '', 0, '', 0, '', '2', '0', '0', 2, 'PARTH MAISHERI', 'Image/3745_PARTH.jpg', '8770710622', '', '0', 'info.mahavirfood@gmail.com', 'Mr.', 0, '', 0, '', 0, '', 0, '', '2', '0', '0', 2, 1, 1, '1970-01-01 05:30:00', '2022-06-14 13:36:54', 0, 0, 0, 0, 0, '0', '0', NULL, NULL, NULL, 'backend', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MembersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MembersId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28032;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
