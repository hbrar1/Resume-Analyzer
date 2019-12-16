/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - resumeanalyzer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`resumeanalyzer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `resumeanalyzer`;

/*Table structure for table `candidate` */

DROP TABLE IF EXISTS `candidate`;

CREATE TABLE `candidate` (
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `fathersname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `postaladdress` varchar(100) NOT NULL,
  `permanentaddress` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `candidate` */

insert  into `candidate`(`email`,`password`,`firstname`,`lastname`,`surname`,`fathersname`,`gender`,`dateofbirth`,`postaladdress`,`permanentaddress`,`religion`,`country`,`q1`,`q2`,`picture`) values ('ali@live.com','123456','Ali Abbas','Soomro','Soomro','Abbas Ali','Male','1-1-1998','Hyderabad','Same','Islam','Pakistan','secrity','secrity','Penguins.jpg'),('asda@live.com','s','Expert Engr','s','s','s','Male','s','s','s','s','Pakistan','','',NULL),('b1@live.com','s','C# Developer','s','s','s','Male','s','s','s','s','Pakistan','','',NULL),('S123@live.com','123','sad','sad','sad','asd','Male','asd','asd','asd','asda','Pakistan','sa','sa','3.jpg'),('sadaquat_ruk@live.com','123','sadaquat','rukk','ruk','Anwar Ali ruk','Male','2014-12-17','sdf','asdf','asdf','Pakistan','sas','sa','y.png'),('sami@live.com','123','Exper ASP.Net','Samiullah','Brohi','Adbul Qadir','Male','1-1-2013','same','same','Islam','Pakistan','s','s',NULL),('test@te.com','123','Samiullah','Brohi','Brohi','Adbul Qadir','Male','2014-12-17','Same','same','Islam','Pakistan','sa','sa','y.png');

/*Table structure for table `candidateachievement` */

DROP TABLE IF EXISTS `candidateachievement`;

CREATE TABLE `candidateachievement` (
  `candidateacievemnetid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidiateAch` varchar(200) NOT NULL,
  `candidateemail` varchar(200) NOT NULL,
  `achievementtitle` varchar(200) DEFAULT NULL,
  `achivemnetdate` varchar(200) DEFAULT NULL,
  `canremarks` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`candidateacievemnetid`),
  KEY `candidateemail` (`candidateemail`),
  CONSTRAINT `candidateachievement_ibfk_1` FOREIGN KEY (`candidateemail`) REFERENCES `candidate` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `candidateachievement` */

insert  into `candidateachievement`(`candidateacievemnetid`,`candidiateAch`,`candidateemail`,`achievementtitle`,`achivemnetdate`,`canremarks`) values (3,'Winner','ali@live.com','Winner','1-1-2014','sadaquat'),(4,'runner up','ali@live.com','Programming Contest Winner','','asdfasdf'),(28,'','sami@live.com','Developer',NULL,NULL),(29,'Awarded','ali@live.com','Conference','1-1-2001','no remarks');

/*Table structure for table `candidatecertification` */

DROP TABLE IF EXISTS `candidatecertification`;

CREATE TABLE `candidatecertification` (
  `candidatecertid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidateCertificate` varchar(200) NOT NULL,
  `candidateemail` varchar(200) NOT NULL,
  `certificationtitle` varchar(200) DEFAULT NULL,
  `certificationdate` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  KEY `candidatecertification_ibfk_1` (`candidatecertid`),
  KEY `candidateemail` (`candidateemail`),
  CONSTRAINT `candidatecertification_ibfk_1` FOREIGN KEY (`candidateemail`) REFERENCES `candidate` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `candidatecertification` */

insert  into `candidatecertification`(`candidatecertid`,`candidateCertificate`,`candidateemail`,`certificationtitle`,`certificationdate`,`remarks`) values (32,'MCP','sadaquat_ruk@live.com','MCP','1-1-2014','pakistan'),(42,'MCP','sami@live.com','MCP','1/1/2010','Excellent'),(43,'MCP','ali@live.com','MCP','1-1-2000',' no');

/*Table structure for table `candidateeducation` */

DROP TABLE IF EXISTS `candidateeducation`;

CREATE TABLE `candidateeducation` (
  `candidateeducationid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidateemail` varchar(200) NOT NULL,
  `QID` int(10) DEFAULT NULL,
  `TechID` int(10) DEFAULT NULL,
  `dateofadmission` varchar(200) DEFAULT NULL,
  `dateofpassing` varchar(200) DEFAULT NULL,
  `percentate` double DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `specialization` varchar(200) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`candidateeducationid`),
  KEY `candidateemail` (`candidateemail`),
  CONSTRAINT `candidateeducation_ibfk_1` FOREIGN KEY (`candidateemail`) REFERENCES `candidate` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `candidateeducation` */

insert  into `candidateeducation`(`candidateeducationid`,`candidateemail`,`QID`,`TechID`,`dateofadmission`,`dateofpassing`,`percentate`,`division`,`specialization`,`level`) values (34,'sami@live.com',1,2,'12/12/2007','12/12/2007',75,'A Grade','ASP.Net','3'),(38,'ali@live.com',3,3,'1-5-2003','1-5-2007',85,'First','Networking','4'),(41,'ali@live.com',4,4,'1-5-2003','1-5-2003',0,'A','f',NULL),(42,'sadaquat_ruk@live.com',1,2,'2015-12-11','2015-12-11',44,'1','java',NULL);

/*Table structure for table `candidateexperience` */

DROP TABLE IF EXISTS `candidateexperience`;

CREATE TABLE `candidateexperience` (
  `candidateexperienceid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidateExprnce` varchar(200) NOT NULL,
  `candidateemail` varchar(200) NOT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `employerlocation` varchar(100) DEFAULT NULL,
  `datestart` varchar(200) DEFAULT NULL,
  `dateend` varchar(200) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`candidateexperienceid`),
  KEY `candidateemail` (`candidateemail`),
  CONSTRAINT `candidateexperience_ibfk_1` FOREIGN KEY (`candidateemail`) REFERENCES `candidate` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `candidateexperience` */

insert  into `candidateexperience`(`candidateexperienceid`,`candidateExprnce`,`candidateemail`,`employer`,`employerlocation`,`datestart`,`dateend`,`designation`) values (6,'3','sadaquat_ruk@live.com','Mehran','Mehran','2014-12-02','2014-12-10','Designer'),(26,'1','sami@live.com','Mehran University','Jamshoro','1-1-2013','1-1-2015','Software Developer'),(27,'5','ali@live.com','City School','hyd','1-1-2002','1-1-2003','Priciple');

/*Table structure for table `candidateskill` */

DROP TABLE IF EXISTS `candidateskill`;

CREATE TABLE `candidateskill` (
  `candidateskillid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidateemail` varchar(200) DEFAULT NULL,
  `skilltitle` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `skillID` int(20) DEFAULT NULL,
  PRIMARY KEY (`candidateskillid`),
  KEY `candidateemail` (`candidateemail`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `candidateskill` */

insert  into `candidateskill`(`candidateskillid`,`candidateemail`,`skilltitle`,`level`,`experience`,`skillID`) values (8,'sadaquat_ruk@live.com','2','sadaq','4',1),(18,'sadaquat_ruk@live.com','2','sad','3',3),(29,'ali@live.com','3','5','5',8),(31,'sami@live.com','2','2','3',3),(32,'sami@live.com','2','3','2',1),(33,'sami@live.com','2','5','5',2);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `companyid` int(100) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(200) NOT NULL,
  `companylogo` varchar(200) NOT NULL,
  `companydescription` varchar(500) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `companycontact` varchar(100) NOT NULL,
  `companyaddress` varchar(100) NOT NULL,
  PRIMARY KEY (`companyid`,`cemail`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`companyid`,`companyname`,`companylogo`,`companydescription`,`cemail`,`cpassword`,`companycontact`,`companyaddress`) values (12,'SofDigital.com','fdffd','Software Desinging','fdfsf','123','434434343','dsfdsfdsfsd'),(13,'Axact Solutions','005.jpg','this is the description','aijaz@live.com','123','03433585802','FFc Township'),(14,'Exteme Tech.com','cherry.jpg','ZXCV','sami@live.com','zxc','zxcv','ZCV'),(17,'Digital Soft.com','Sunset.jpg','he2','Software@live.com','123','03337586021','sadfasdfasdfadsfasdf');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `countryid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `countryname` varchar(200) NOT NULL,
  PRIMARY KEY (`countryid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`countryid`,`countryname`) values (1,'Pakistan'),(2,'India'),(3,'Japan'),(4,'China'),(5,'Any');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `jobID` int(20) NOT NULL,
  `CandidateEmail` varchar(200) NOT NULL,
  `PositionID` int(20) NOT NULL,
  `compantID` int(200) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jobs` */

insert  into `jobs`(`jobID`,`CandidateEmail`,`PositionID`,`compantID`,`Date`,`status`) values (1,'ali@live.com',27,17,'2014-12-27 20:32:30','Short Listed'),(2,'sami@live.com',27,17,'2014-12-28 00:41:48','Short Listed'),(3,'aijaz@live',27,17,'2014-12-28 02:46:28','Applied'),(4,'ali@live.com',17,17,'2014-12-28 02:47:10','Applied'),(5,'sami@live.com',22,17,'2014-12-28 02:48:44','Applied'),(6,'sadaquat_ruk@live.com',28,17,'2015-01-09 04:06:10','Short Listed'),(7,'ali@live.com',29,17,'2015-01-09 04:08:40','Applied'),(8,'ali@live.com',27,0,'2015-01-09 04:21:45','Applied'),(0,'sadaquat_ruk@live.com',27,0,'2015-01-10 03:45:36','Applied'),(0,'ali@live.com',32,17,'2015-04-23 09:01:46','Applied'),(0,'sadaquat_ruk@live.com',74,13,'2015-12-15 21:30:01','Short Listed'),(0,'test@te.com',74,13,'2015-12-15 21:30:37','Applied');

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `lat` decimal(10,0) DEFAULT NULL,
  `lng` decimal(10,0) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `locations` */

insert  into `locations`(`locationID`,`name`,`lat`,`lng`,`ip`) values (1,'jamshoro',25,68,'::1');

/*Table structure for table `positionannouncement` */

DROP TABLE IF EXISTS `positionannouncement`;

CREATE TABLE `positionannouncement` (
  `positionannouncementid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `positiontitle` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `adverticement` varchar(200) NOT NULL,
  `experiencerequired` varchar(100) DEFAULT NULL,
  `numberofvacancies` varchar(20) DEFAULT NULL,
  `skillsrequired` varchar(100) DEFAULT NULL,
  `certificationrequired` varchar(100) DEFAULT NULL,
  `QID` int(10) DEFAULT NULL,
  `districtdomicile` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `preferences` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dateofposting` varchar(200) DEFAULT NULL,
  `closingdate` varchar(200) NOT NULL,
  `companyid` int(100) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`positionannouncementid`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `positionannouncement` */

insert  into `positionannouncement`(`positionannouncementid`,`positiontitle`,`description`,`adverticement`,`experiencerequired`,`numberofvacancies`,`skillsrequired`,`certificationrequired`,`QID`,`districtdomicile`,`gender`,`preferences`,`nationality`,`dateofposting`,`closingdate`,`companyid`,`active`) values (27,'Asp Developer','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','2','2',';','MCP',1,'any','any','No','Pakistan','1/1/2015','1-30-2015',17,''),(28,'Andriod Developer','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','3','1',';','Oracle',1,'any','any','No','Pakistan','1/1/2015','1-30-2015',17,''),(29,'Software Developer ','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','5','1',';','OCP',1,'any','any','No','Pakistan','1/1/2015','1-30-2015',17,''),(32,'Andriod Developer','Our company looking for a great candidate who can start immediately ','kysn-front.jpg','1','d','d','Fast Track',1,'any','Male','No','Pakistan','1/1/2015','1-30-2015',17,''),(69,'Quality assurance','Our company looking for a great candidate who can start immediately ','top.png','5','4','','CCNA',1,'any','Male','No','Pakistan','1/1/2015','1-30-2015',17,''),(73,'Vb Developer',' s','2.jpg','3','2','','certification',1,'domicile','Male','s','Pakistan','s','dtae',17,''),(74,'asd',' asdf','','2','1','','Java',1,'domicile','Male','Java','Pakistan','2015-12-08','2015-12-31',13,'');

/*Table structure for table `positiondetails` */

DROP TABLE IF EXISTS `positiondetails`;

CREATE TABLE `positiondetails` (
  `DetailID` int(10) NOT NULL AUTO_INCREMENT,
  `PositionID` int(10) DEFAULT NULL,
  `SkillID` int(10) DEFAULT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `positiondetails` */

insert  into `positiondetails`(`DetailID`,`PositionID`,`SkillID`) values (1,28,1),(2,28,2),(3,28,3),(4,27,9),(5,27,3),(6,27,2),(7,73,1),(8,73,2),(9,74,1),(10,74,2),(11,74,3);

/*Table structure for table `qualification` */

DROP TABLE IF EXISTS `qualification`;

CREATE TABLE `qualification` (
  `QID` int(20) NOT NULL AUTO_INCREMENT,
  `QName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`QID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `qualification` */

insert  into `qualification`(`QID`,`QName`) values (1,'Bachelor Of Engineering'),(2,'Bachelor Of Science'),(3,'Masters/M. Phil'),(4,'PHD'),(5,'Diploma'),(6,'Graduate');

/*Table structure for table `skills` */

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `skillID` int(20) NOT NULL AUTO_INCREMENT,
  `TechID` int(20) DEFAULT NULL,
  `skillName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`skillID`),
  KEY `TechID` (`TechID`),
  CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`TechID`) REFERENCES `technology` (`TechID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `skills` */

insert  into `skills`(`skillID`,`TechID`,`skillName`) values (1,2,'Asp.net'),(2,2,'C#.net'),(3,2,'Developer'),(4,2,'Oracle'),(5,1,'Autocad'),(6,1,'Enginering Design'),(7,4,'Minning Algorithems'),(8,3,'CCNA'),(9,3,'MCS'),(10,4,'Structure');

/*Table structure for table `technology` */

DROP TABLE IF EXISTS `technology`;

CREATE TABLE `technology` (
  `TechID` int(20) NOT NULL AUTO_INCREMENT,
  `TechName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TechID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `technology` */

insert  into `technology`(`TechID`,`TechName`) values (1,'Civil Engineer'),(2,'Software Engineer'),(3,'Information Technology'),(4,'Petrolium Engineer');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
