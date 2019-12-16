/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.27 : Database - resumeanalyzer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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

insert  into `candidate`(`email`,`password`,`firstname`,`lastname`,`surname`,`fathersname`,`gender`,`dateofbirth`,`postaladdress`,`permanentaddress`,`religion`,`country`,`q1`,`q2`,`picture`) values ('ahsan@live.com','asad','ahsan','memon','Memon','Anwar Ali','Male','2011-12-12','larkana','same','Islam','Pakistan','asad','asad','574588_198903703564637_1631137823_n.jpg'),('ali@gmail.com','345678','Zulfiqar','Ali\'','shaikh','Anwar','Male','15-12-1992','ghous pur Muhala near Shaikh imam bargah larkana','same','islam','Pakistan','bs','bs','20141231_184509.jpg'),('ali@live.com','123456','Ali Abbas','Soomro','Soomro','Abbas Ali','female','1-1-1998','Hyderabad','Same','Islam','Pakistan','secrity','secrity','Penguins.jpg'),('amjad@live.com','123','Ali','sad','asd','asd','Male','asd','asd','asd','asd','Srilanka','','',NULL),('asad@gmail.com','123','','','shaikh','rqwr','Male','2015-01-09','ef','fef','Islam','Pakistan','sa','sa','gal6.jpg'),('d@live.com','123','ruk','ruk','ruk','anwar','Male','2015-01-09','asdf','dsladf','islam','1','s','s','06.jpg'),('fida@gmail.com','ali','Fida','Hussain','Shaikh','Abdul Rehman','Male','2015-01-14','larkana','same','Islam','Pakistan','lion','cricket','574588_198903703564637_1631137823_n.jpg'),('gfdshgf@gfdh','abc','xzD','zcz','dcsZ','Zd','Male','2015-01-16','larkanagsd','dg','df','Pakistan','SD','ra',''),('princezulfiqarshaikh@gmail.com','123','Zulfiqar','Shaikh','shaikh','anwar ali','Male','1-2-2015','dsfsdfsdf','asdcsdfsdfi','islam','Pakistan','sa','sa','DSC01240.JPG'),('sadaquaat_ruk@live.com','123','sadaquat','ruk','ruk','Anwar Ali ruk','Male','2014-12-17','sdf','asdf','asdf','Pakistan','hen','hen',NULL),('sadaquat_ruk@live.com','123','sadaquat','rukk','ruk','Anwar Ali ruk','Male','2014-12-17','sdf','asdf','asdf','Pakistan','sas','sa','y.png'),('saeed@gmail.com','123456','saeed','ahmed','bhellar','ulfat','Male','2015-01-06','khairpur','same','Islam','Pakistan','sa','sa','img1.jpg'),('sami@live.com','123456','Sami','Ullah','Soomro','Adbul Qadir','Male','12/12/204','same','same','Islam','Pakistan','s','s','10661817_887126351307014_2406381529885089210_o.jpg'),('shakeel@hotmail.com','123','Shakeel','Ahmed','rajper','Usman Ali','Male','2015-01-14','khairpur','larkana','Islam','1','se','cricket','Location Map.jpg'),('shakeel@yahoo.com','123','','','rajper','egfgef','Male','2015-01-06','khairpur','larkana','Islam','Pakistan','sa','sa','gal2.jpg'),('sifat@gmail.com','123456','Sifat','Ali','Sathio','Yaad nahi','Male','12/12/204','nawabshah','moro','Islam','Pakistan','no','no','Panorama 1.JPG');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `candidateachievement` */

insert  into `candidateachievement`(`candidateacievemnetid`,`candidiateAch`,`candidateemail`,`achievementtitle`,`achivemnetdate`,`canremarks`) values (31,'Gold Madalist','ahsan@live.com','236','6444-04-04','435'),(32,'Gold Madalist','ahsan@live.com','asaad','3333-03-03','gud'),(33,'Gold Madalist','saeed@gmail.com','Gold Madalist','2015-01-08','no'),(34,'gold medallist in graduation','shakeel@hotmail.com','Gold Madalist','2010-01-01','good'),(35,'gold medallist in graduation','fida@gmail.com','Gold Madalist','2015-01-06','excellent'),(36,'Gold Madalist','sifat@gmail.com','Gold Madalist','12/12/2015','no'),(37,'Gold Madalist','sami@live.com','Gold Madalist','12/12/2015','no');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `candidatecertification` */

insert  into `candidatecertification`(`candidatecertid`,`candidateCertificate`,`candidateemail`,`certificationtitle`,`certificationdate`,`remarks`) values (32,'MCP','sadaquat_ruk@live.com','MCP','1-1-2014','pakistan'),(43,'MCP','ali@live.com','MCP','1-1-2000',' no'),(44,'oracle ','ali@gmail.com','databse','2-3-2014',' sadaq'),(45,'oracle','ahsan@live.com','or','3/3/2014',' gud'),(46,'MCP','saeed@gmail.com','MCP','2015-01-14',' no'),(47,'MCP','shakeel@hotmail.com','MCP','2012-01-01','  excellent'),(48,'MCP','sifat@gmail.com','MCP','12/12/12015',' no'),(49,'MCP','sami@live.com','MCP','12/12/12015',' no');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `candidateeducation` */

insert  into `candidateeducation`(`candidateeducationid`,`candidateemail`,`QID`,`TechID`,`dateofadmission`,`dateofpassing`,`percentate`,`division`,`specialization`,`level`) values (55,'ahsan@live.com',1,2,'2011-01-01','2014-01-01',80,'1st','java',NULL),(56,'ahsan@live.com',2,1,'2111-03-02','2112-02-03',54,'2nd','oracle',NULL),(59,'saeed@gmail.com',1,2,'2015-01-13','2015-01-15',80,'1st','java',NULL),(60,'shakeel@yahoo.com',1,2,'2015-01-06','2015-01-08',70,'1st','java',NULL),(61,'asad@gmail.com',1,2,'2015-01-13','2015-01-14',80,'1st','java',NULL),(62,'shakeel@hotmail.com',1,1,'2015-01-04','2015-01-12',80,'1st','asp.net',NULL),(63,'fida@gmail.com',1,1,'2011-01-01','2014-01-01',90,'1st','java',NULL),(64,'sifat@gmail.com',1,2,'12/12/2007','12/12/2007',33,'A','No',NULL),(65,'sami@live.com',1,2,'12/12/2007','12/12/2007',70,'A','ASP.Net',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `candidateexperience` */

insert  into `candidateexperience`(`candidateexperienceid`,`candidateExprnce`,`candidateemail`,`employer`,`employerlocation`,`datestart`,`dateend`,`designation`) values (29,'4','ahsan@live.com','gfdg','fdh','4444-02-02','0444-04-04','fhh'),(30,'5','saeed@gmail.com','Mehran','hud','2015-01-01','2015-01-23','lecturer'),(31,'5','shakeel@hotmail.com','Mehran University','jamshoro','2010-11-12','2015-12-15','Software Engineer'),(32,'1','sifat@gmail.com','Mehran Uni','Jamshoro','1-1-2013','1-1-2015','Data Entry'),(33,'3','sami@live.com','Mehran Uni','Jamshoro','1-1-2013','1-1-2015','SQA Developer');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `candidateskill` */

insert  into `candidateskill`(`candidateskillid`,`candidateemail`,`skilltitle`,`level`,`experience`,`skillID`) values (30,'ahsan@live.com','2','3333-03-03','3333-03-03',3),(31,'ahsan@live.com','1','3333-02-03','3333-03-03',5),(32,'saeed@gmail.com','2','3','3',1),(33,'saeed@gmail.com','2','2','3',2),(34,'shakeel@hotmail.com','2','4','5',1),(35,'fida@gmail.com','2','3','3',1),(36,'sifat@gmail.com','2','5','1',4),(37,'sami@live.com','2','5','3',1),(38,'sami@live.com','2','3','3',2),(39,'sami@live.com','2','3','3',3),(40,'sami@live.com','2','3','3',4);

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
  `q1` varchar(200) DEFAULT NULL,
  `q2` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`companyid`,`cemail`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`companyid`,`companyname`,`companylogo`,`companydescription`,`cemail`,`cpassword`,`companycontact`,`companyaddress`,`q1`,`q2`) values (36,'engro','574588_198903703564637_1631137823_n.jpg','engro urea','engro@live.com','asad','03333303592','larkana','s','s'),(37,'tameer','10703916_892708627435981_2260974080115550099_n.jpg','tameerati','tameer@live.com','asad','03333303592','larkana',NULL,NULL),(38,'abcd','10904196_867306986645323_1316626820_n.jpg','jh','abc@asdad','123','jhj','jhjh',NULL,NULL),(39,'softsolution','574588_198903703564637_1631137823_n.jpg','IT company','soft@gmail.com','asad','03333303592','karachi','se','se'),(40,'hbl','gal1.jpg','sadf','hbl@live.com','123','sdfs','l',NULL,NULL),(41,'hbl','gal1.jpg','sadf','hbl1@live.com','123','sdfs','l',NULL,NULL),(42,'lion','img1.jpg','wqwewqe','lion@live.com','123','qwe`q','qwe','w','w'),(43,'hbl','gal6.jpg','banking','hbl2@gmail.com','123','03333044914','karachi','akram','daada'),(44,'hbl3','574588_198903703564637_1631137823_n.jpg','banking','hbl3@gmail.com','ali','03333303592','larkana','lion','lion');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `countryid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `countryname` varchar(200) NOT NULL,
  PRIMARY KEY (`countryid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`countryid`,`countryname`) values (1,'Pakistan'),(2,'India'),(3,'Indoneshia'),(4,'Japan'),(5,'USA');

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

insert  into `jobs`(`jobID`,`CandidateEmail`,`PositionID`,`compantID`,`Date`,`status`) values (0,'ahsan@live.com',79,36,'2015-01-11 04:12:54','Short Listed'),(0,'sadaquat_ruk@live.com',81,39,'2015-01-13 14:09:44','Applied'),(0,'saeed@gmail.com',81,39,'2015-01-13 22:56:10','Short Listed'),(0,'shakeel@yahoo.com',81,39,'2015-01-13 23:02:25','Applied'),(0,'asad@gmail.com',81,39,'2015-01-13 23:16:46','Applied'),(0,'saeed@gmail.com',84,39,'2015-01-14 00:02:28','Short Listed'),(0,'shakeel@hotmail.com',84,39,'2015-01-16 06:00:36','Short Listed'),(0,'shakeel@hotmail.com',83,43,'2015-01-16 06:15:12','Applied'),(0,'shakeel@hotmail.com',81,39,'2015-01-16 06:16:39','Short Listed'),(0,'fida@gmail.com',85,44,'2015-01-17 07:33:33','Applied'),(0,'sifat@gmail.com',81,39,'2015-01-20 11:43:59','Applied'),(0,'sami@live.com',86,39,'2015-01-20 12:57:55','Short Listed'),(0,'saeed@gmail.com',86,39,'2015-01-20 12:59:41','Applied'),(0,'asad@gmail.com',86,39,'2015-01-20 13:00:14','Applied'),(0,'sadaquat_ruk@live.com',86,39,'2015-01-20 13:01:05','Applied');

/*Table structure for table `positionannouncement` */

DROP TABLE IF EXISTS `positionannouncement`;

CREATE TABLE `positionannouncement` (
  `positionannouncementid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `positiontitle` varchar(100) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

/*Data for the table `positionannouncement` */

insert  into `positionannouncement`(`positionannouncementid`,`positiontitle`,`description`,`adverticement`,`experiencerequired`,`numberofvacancies`,`skillsrequired`,`certificationrequired`,`QID`,`districtdomicile`,`gender`,`preferences`,`nationality`,`dateofposting`,`closingdate`,`companyid`,`active`) values (0,'Asp Developer','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','2','2',';','MCP',1,'k;','k;','k;l','k;l',';l',';',17,''),(28,'Andriod Developer','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','3','1',';','Oracle',1,'k;','k;','k;l','k;l',';l',';',17,''),(29,'Software Developer ','Our company looking for a great candidate who can start immediately ','1480505_684574591640619_1040221805398749277_n.jpg','5','1',';','IT',1,'k;','k;','k;l','k;l',';l',';',17,''),(32,'Andriod Developer','Our company looking for a great candidate who can start immediately ','kysn-front.jpg','1','d','d','CA',1,'d','d','d','d','d','d',17,''),(69,'Quality assurance','Our company looking for a great candidate who can start immediately ','top.png','5','4','','CCNA',1,'domicile','Male','No','Pakistan','12/12/2009','12/12/2009',17,''),(72,'Query Analyzer','Our company looking for a great candidate who can start immediately ','sami.jpg','4','4','','CCNA',1,'domicile','Male','No','Pakistan','12/12/2009','12/12/2009',17,''),(74,'PhP Developer',' fresh candidates can apply','','2','4','','php',1,'domicile','female','php certification','Pakistan','1/9/2014','1/10/2014',34,''),(78,'php developer',' he has work alot on php','_MG_0013.jpg','fresh','30','','php',1,'domicile','Male','php developing','Pakistan','01/2/2011','01/3/2011',35,''),(79,'php developer',' he knows java vey well','06.jpg','1','300','','java',1,'domicile','male','java','Pakistan','2/3/2011','2/4/2011',36,''),(80,'autocad engineer',' smart boy','10704931_10203425381089981_48527159_n.jpg','01','200','','auto',1,'domicile','female','autocad','Pakistan','01/02/2014','01/03/2014',37,''),(81,'junior java developer',' person which knows java and oracle','07.jpg','0','20','','oracle',1,'domicile','Male/female','oracle ','Pakistan','01/02/2014','01/03/2014',39,''),(83,'sdgds',' dfgdffd','gal6.jpg','7','20','','fgf',1,'domicile','Male/female','dfddfdg','Pakistan','2015-01-08','2015-01-14',43,''),(84,'ASP.Net Developer','we need a candidate having 3 years of solid experience ','Location Map.jpg','2','5','','MCP',1,'domicile','any','Oracle','Pakistan','2015-01-14','2015-01-20',39,''),(85,'asp developer',' well known asp developer','07.jpg','2','30','','asp',1,'domicile','Male/female','asp','Pakistan','2015-01-12','2015-01-13',44,''),(86,'Web Engineer','we need a candidates which have same qualification what ever we announced in job ','homepage.png','2','5','','MCP',1,'domicile','Male','No','Pakistan','12/12/2009','12/24/2009',39,'');

/*Table structure for table `positiondetails` */

DROP TABLE IF EXISTS `positiondetails`;

CREATE TABLE `positiondetails` (
  `DetailID` int(10) NOT NULL AUTO_INCREMENT,
  `PositionID` int(10) DEFAULT NULL,
  `SkillID` int(10) DEFAULT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `positiondetails` */

insert  into `positiondetails`(`DetailID`,`PositionID`,`SkillID`) values (1,28,1),(2,28,2),(3,28,3),(4,27,9),(5,27,3),(6,27,2),(7,73,3),(8,74,3),(9,75,3),(10,75,4),(11,76,3),(12,76,4),(13,77,1),(14,79,1),(15,79,2),(16,79,3),(17,79,4),(18,80,5),(19,80,6),(20,81,4),(21,82,1),(22,82,2),(23,83,5),(24,83,6),(25,84,1),(26,84,2),(27,85,1),(28,86,1),(29,86,2),(30,86,3),(31,86,4);

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
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
