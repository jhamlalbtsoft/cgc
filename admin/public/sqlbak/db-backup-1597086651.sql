
/*---------------------------------------------------------------
  SQL DB BACKUP 11.08.2020 00:40 
  HOST: localhost
  DATABASE: cgchambe_raipur
  TABLES: members
  ---------------------------------------------------------------*/

/*---------------------------------------------------------------
  TABLE: `members`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `MembersId` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `MemberType` text,
  `FirmName` text CHARACTER SET utf8,
  `GroupsId` int(20) unsigned DEFAULT NULL,
  `GroupName` text CHARACTER SET utf8,
  `SubGroupId` int(7) DEFAULT '0',
  `SubGroupName` text,
  `Email` text,
  `STDCode` text,
  `Landline` text,
  `Mobile` text,
  `Shop` text CHARACTER SET utf8,
  `Complex` text CHARACTER SET utf8,
  `Street` text CHARACTER SET utf8,
  `SectorMohalla` varchar(255) DEFAULT NULL,
  `AreaId` int(20) unsigned DEFAULT NULL,
  `AreaName` text CHARACTER SET utf8,
  `CityId` int(20) unsigned DEFAULT NULL,
  `CityName` text CHARACTER SET utf8,
  `DistrictId` int(20) unsigned DEFAULT NULL,
  `DistrictName` text CHARACTER SET utf8,
  `PIN` text,
  `GSTN` varchar(50) DEFAULT NULL,
  `RegistrationNo` text,
  `RegistrationNoOld` text,
  `Approved` tinyint(1) DEFAULT NULL,
  `CertificatePrint` tinyint(1) DEFAULT NULL,
  `CertModeOfDispatch` text CHARACTER SET utf8,
  `CertDetails` text CHARACTER SET utf8,
  `CertUserId` int(20) unsigned DEFAULT NULL,
  `Representative1` text CHARACTER SET utf8,
  `ImageRep1` text,
  `MobileRep1` text,
  `MobileRep1Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep1` text CHARACTER SET utf8,
  `EmailRep1` text,
  `SalutationRep1` text,
  `GoverningBodyIdRep1` int(20) unsigned DEFAULT NULL,
  `GoverningBodyIdNameRep1` text CHARACTER SET utf8,
  `GBDesignationIdRep1` int(20) unsigned DEFAULT NULL,
  `GBDesignationIdNameRep1` text CHARACTER SET utf8,
  `CommitteeIDRep1` int(20) unsigned DEFAULT NULL,
  `CommitteeIDNameRep1` text CHARACTER SET utf8,
  `CdesignationIdRep1` int(20) unsigned DEFAULT NULL,
  `CdesignationIdNameRep1` text CHARACTER SET utf8,
  `CardPrintRep1` text,
  `CardDispatchModeRep1` text CHARACTER SET utf8,
  `CardDetailsRep1` text CHARACTER SET utf8,
  `CardUserIdRep1` int(20) unsigned DEFAULT NULL,
  `Representative2` text CHARACTER SET utf8,
  `ImageRep2` text,
  `MobileRep2` text,
  `MobileRep2Alternate` varchar(20) DEFAULT NULL,
  `OrgDesignationRep2` text CHARACTER SET utf8,
  `EmailRep2` text,
  `SalutationRep2` text,
  `GoverningBodyIdRep2` int(20) unsigned DEFAULT NULL,
  `GoverningBodyIdNameRep2` text CHARACTER SET utf8,
  `GBDesignationIdRep2` int(20) unsigned DEFAULT NULL,
  `GBDesignationIdNameRep2` text CHARACTER SET utf8,
  `CommitteeIDRep2` int(20) unsigned DEFAULT NULL,
  `CommitteeIDNameRep2` text CHARACTER SET utf8,
  `CdesignationIdRep2` int(20) unsigned DEFAULT NULL,
  `CdesignationIdNameRep2` text CHARACTER SET utf8,
  `CardPrintRep2` text,
  `CardDispatchModeRep2` text CHARACTER SET utf8,
  `CardDetailsRep2` text CHARACTER SET utf8,
  `CardUserIdRep2` int(20) unsigned DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `UpdateBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `DeletedStatus` tinyint(1) DEFAULT NULL,
  `GBOrderRep1` int(20) unsigned DEFAULT NULL,
  `GBOrderRep2` int(20) unsigned DEFAULT NULL,
  `COrderRep1` int(20) unsigned DEFAULT NULL,
  `COrderRep2` int(20) unsigned DEFAULT NULL,
  `MemDoc` text,
  `DocTitle` text CHARACTER SET utf8,
  `Remark` text CHARACTER SET utf8,
  `FY` varchar(150) DEFAULT NULL,
  `old_remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MembersId`)
) ENGINE=InnoDB AUTO_INCREMENT=18166 DEFAULT CHARSET=latin1;
INSERT INTO `members` VALUES   ('1','LT','LALIT ENTERPRISES','1','Food Grains Wholesalers (01)','0',NULL,'lalitdistributions@gmail.com',NULL,NULL,'9827140086','BEHIND OF MANGLAM BHAWAN,',NULL,'NAGAR NIGAM COLONYY',NULL,'1','BAJRANG NAGAR','1','RAIPUR','1','RAIPUR','492001',NULL,'CCCI/LT/01/01/00001','CCCI00001/ 1 / LT','1','1',NULL,'certi print on date 14/10/19','0','LALIT JAISINGH','Image/3.LALIT JAISINGH.jpg','9827140086',NULL,NULL,NULL,'Mr.','13','CORE COMMITTEE','10','Working President ','0','YUVA CHAMBER','0','Working President ','1',NULL,NULL,'0','MONISHA JAISINGH','Image/MONISHA_19754.jpg','9827140086',NULL,NULL,NULL,'Mrs.','0','0','0','0','0','YUVA CHAMBER','0','0','0',NULL,NULL,'0','2','2','0001-01-01 12:00:00','2020-08-11 12:38:43','0','10','0','3','3',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('2','LT','MAHAVEER TRADING COMPANY','1','Food Grains Wholesalers (01)',NULL,'0','pmaisheri@ymail.com','771','4031614','9425202203','NEMICHAND GALI','LAXMI NIWAS','GANJ PARA',NULL,'2','GANJ PARA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00002','CCCI00002/ 1 / LT','1','0',NULL,NULL,'0','PRAVEEN MASAIRI',NULL,'9425202203',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','VINOD BHAI MASAIRI',NULL,'9425207251',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('3','LT','RAJENDRA GALLA BHANDAR','1','Food Grains Wholesalers (01)',NULL,'0','devendraagrawalrgb@gmail.com','771','2292293',NULL,NULL,NULL,'RAMSAGAR PARA',NULL,'3','RAMSAGAR PARA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00003','CCCI00004/ 1 / LT','1','1',NULL,NULL,'0','BISHANLAL AGRAWAL',NULL,'8109492555',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','DEVENDRA AGRAWAL',NULL,'9329100918',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('4','LT','KANHAIYALAL SANTOSH KUMAR','1','Food Grains Wholesalers (01)',NULL,'NEAR DR. SOMNATH SAHU,',NULL,'771','2292723',NULL,NULL,NULL,'RAMSAGAR PARA',NULL,'3','RAMSAGAR PARA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00004','CCCI00005/ 1 / LT','1','0',NULL,NULL,'0',' MOHANLAL KHANDELWAL',NULL,'9826141178',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','SANTOSH KUMAR KHANDELWAL',NULL,'9425206124',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('5','LT','BHAI PURSHOTTAMDAS AND COMPANY','1','Food Grains Wholesalers (01)',NULL,'0',NULL,'771',NULL,NULL,NULL,NULL,'STATION ROAD',NULL,'4','STATION ROAD','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00005','CCCI00009/ 1 / LT','1','0',NULL,NULL,'0',' PURSHOTTAM SARIN',NULL,NULL,NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('6','LT','CHANDIRAM GANGARAM','1','Food Grains Wholesalers (01)',NULL,'0',NULL,'771',NULL,NULL,NULL,'PUNJAB OIL MILL GALI','RAMSAGAR PARA',NULL,'3','RAMSAGAR PARA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00006','CCCI00012/ 1 / LT','1','0',NULL,NULL,'0',' RAJKUMAR UTTMANI',NULL,NULL,NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','LEELARAM UTTMANI',NULL,NULL,NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('7','LT','RASIK BIHARI SANTOSH KUMAR','1','Food Grains Wholesalers (01)',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'GANJ PARA',NULL,'2','GANJ PARA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00007','CCCI00026/ 1 / LT','1','0',NULL,NULL,'0',' SANTOSH KUMAR AGRAWAL',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('8','LT','BAGADIYA BROTHERS','1','Food Grains Wholesalers (01)',NULL,'0','bagadiya@bagadiyabros.com','771','2225932',NULL,'GROUND FLOOR','BAGADIYA MANSION ','JAWAHAR NAGAR',NULL,'5','JAWAHAR NAGAR','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00008','CCCI00027/ 1 / LT','1','0',NULL,NULL,'0',' OMI BAGADIYA',NULL,'9425210004',NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'Mr.','0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('9','LT','CHETUMAL HARIRAM','1','Food Grains Wholesalers (01)',NULL,'0',NULL,NULL,NULL,NULL,NULL,'NEAR RAILWAY CROSSING','AMANAKA',NULL,'6','AMANAKA','1','RAIPUR','1','RAIPUR',NULL,NULL,'CCCI/LT/01/01/00009','CCCI00028/ 1 / LT','1','0',NULL,NULL,'0',' HARIRAM ISRANI',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0','0','0',NULL,'0','0','0',NULL,NULL,'0','0','0','0001-01-01 12:00:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('18163','LT','S.R. TRADERS','6','Steel (Iron) & Cement (06)','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'283','DONGARGARH (RAJNANDGAON)','16','RAJNANDGAON','491445',NULL,NULL,'CCCI35239','0','0',NULL,NULL,NULL,'SARFRAZ NAVAB',NULL,'9826753786',NULL,NULL,NULL,'Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'1',NULL,NULL,NULL,'MOHD. RANA',NULL,'9754677786',NULL,NULL,NULL,'Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'2','2020-07-17 04:47:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,'GSTN COPY',NULL,NULL,NULL);
INSERT INTO `members` VALUES ('18164','LT','YUVRAJ MOTORS','42','Automobiles (Two Wheeler) (44)','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'HIGH SCHOOL ROAD,','SOLA PARA.','0',NULL,'283','DONGARGARH (RAJNANDGAON)','16','RAJNANDGAON','491445','22AAAFY8038Q1ZN',NULL,'CCCI35240','0','0',NULL,NULL,NULL,'RANDEEP SINGH BHATIA',NULL,NULL,NULL,NULL,NULL,'Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'1',NULL,NULL,NULL,'GURMEET SINGH BHATIA',NULL,NULL,NULL,NULL,NULL,'Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'2','2020-07-17 05:05:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `members` VALUES ('18165','LT','INDIA READYMADE','21','Cloths Wholesalers (21)','0',NULL,NULL,NULL,NULL,NULL,NULL,'NEAR AXIS BANK,',NULL,'NEAR OLD BUS STAND','0',NULL,'27','BILASPUR','17','BILASPUR','495001','22AXRPG0053F1ZW',NULL,'CCCI35241','0','0',NULL,NULL,NULL,'SANJEET SINGH GANDHI',NULL,'9425280099',NULL,NULL,'sanjeetgandhi02@gmail.com','Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'1',NULL,NULL,NULL,'HARMINDER SINGH GANDHI',NULL,'9425219999',NULL,NULL,NULL,'Mr.','0',NULL,'0',NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'2','2020-07-17 05:18:00','2020-08-11 12:38:43','0','0','0','0','0',NULL,'GSTN COPY',NULL,NULL,NULL);
