CREATE TABLE `member` (
  `UserID` int(3) unsigned zerofill NOT NULL auto_increment,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL default 'USER',
  PRIMARY KEY  (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM  AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `member`
-- 

INSERT INTO `member` VALUES (001, 'wut', 'wut1234', 'Wutthichai Sukkasem', 'USER');
INSERT INTO `member` VALUES (002, 'phanupon', 'phanupon1234', 'Phanupon Phasuchaisakul', 'ADMIN');