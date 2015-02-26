-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 06:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('webmasterAur', 'iliketrains42'),
('webmasterAng', 'ilikethesun23');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `tnumber` varchar(9) DEFAULT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_request` datetime DEFAULT NULL,
  `date_appointment` datetime DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_app` (`tnumber`),
  KEY `fk_service` (`service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `tnumber`, `service`, `date_request`, `date_appointment`, `state`) VALUES
(1, 't00178764', 'Dyslexia Student Services', '2015-02-25 14:16:35', '2015-02-10 14:30:00', 'Accepted');

--
-- Triggers `appointment`
--
DROP TRIGGER IF EXISTS `trigger_app`;
DELIMITER //
CREATE TRIGGER `trigger_app` BEFORE INSERT ON `appointment`
 FOR EACH ROW begin
if new.date_request is null then
	set new.date_request = sysdate();
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `tnumber` varchar(9) DEFAULT NULL,
  `log_in` datetime DEFAULT NULL,
  `log_out` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tnumber` (`tnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `tnumber`, `log_in`, `log_out`) VALUES
(1, 't00178747', '2015-02-25 14:35:03', '2015-02-25 14:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `name` varchar(30) NOT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`name`, `email_address`, `password`) VALUES
('Access Student Services', 'access@ittralee.ie', 'testproj15accs'),
('Counsellor Student Services', 'counsellor@ittralee.ie', 'testproj15coun'),
('Dyslexia Student Services', 'dyslexia@ittralee.ie', 'testproj15dysl');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `tnumber` varchar(9) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `pin` int(5) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `county` varchar(35) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `disability_detail` varchar(15) DEFAULT NULL,
  `contact_number` varchar(14) DEFAULT NULL,
  `specifications` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`tnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`tnumber`, `first_name`, `last_name`, `pin`, `register_date`, `date_of_birth`, `address1`, `address2`, `city`, `county`, `course`, `type`, `disability_detail`, `contact_number`, `specifications`) VALUES
('t00178546', 'ergerg', 'gregreg', 78546, '2015-02-25 14:36:28', '2015-02-11', 'ergregeg', 'ergere', 'erer', 'Leitrim', 'Bachelor of Business in Management\r\n', 'Student with a disability', '{0}', '542146502', 'ergegre		              	'),
('t00178747', 'angele', 'demeurant', 78747, '2015-02-25 14:16:35', '1994-06-10', '134 TTCA', 'Maine Street', 'Tralee', 'Kerry', 'Bachelor of Science in Computing with Multimedia', 'None', '{1,2,3}', '0894542050', 'POUET'),
('t00178764', 'aurelien', 'bigois', 78764, '2015-02-25 14:16:35', '1993-11-03', '134 TTCA', 'Maine Street', 'Tralee', 'Kerry', 'Bachelor of Science in Computing with Multimedia', 'None', '{1,2,3}', '0894542050', 'Le stupeflip CROU ne mourra jamais');

--
-- Triggers `user`
--
DROP TRIGGER IF EXISTS `trigger_user`;
DELIMITER //
CREATE TRIGGER `trigger_user` BEFORE INSERT ON `user`
 FOR EACH ROW begin 
IF new.tnumber not regexp '[tT][0-9]{8}' THEN	
	 SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid Tnumber';
end if;
set new.tnumber=lower(new.tnumber);
if new.register_date is null then
	set new.register_date = sysdate();
end if;
if new.pin is null then 
set new.pin=right(new.tnumber,5);
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_general`
--
CREATE TABLE IF NOT EXISTS `view_general` (
`Number of users` bigint(21)
,`Average time spent` time
,`Average meeting requests` decimal(22,1)
,`Number of meeting` bigint(21)
,`Number of request` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_state`
--
CREATE TABLE IF NOT EXISTS `view_state` (
`number_app` bigint(21)
,`number_waiting` bigint(21)
,`number_accepted` bigint(21)
,`number_cancelled` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
--
CREATE TABLE IF NOT EXISTS `view_user` (
`tnumber` varchar(9)
,`Number of Meetings` bigint(21)
,`Number of requests` bigint(21)
,`Register date` datetime
,`Date of first request` datetime
,`Time diff` varchar(29)
);
-- --------------------------------------------------------

--
-- Structure for view `view_general`
--
DROP TABLE IF EXISTS `view_general`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_general` AS select (select count(0) from `user`) AS `Number of users`,(select sec_to_time(round((sum(time_to_sec(timediff(`connection`.`log_out`,`connection`.`log_in`))) / count(distinct `connection`.`tnumber`)),0)) AS `average time` from `connection`) AS `Average time spent`,(select round((count(`appointment`.`id`) / count(distinct `appointment`.`tnumber`)),1) AS `average request` from `appointment`) AS `Average meeting requests`,(select count(`appointment`.`id`) AS `number accepted` from `appointment` where (`appointment`.`state` = 'Accepted')) AS `Number of meeting`,(select count(0) AS `number of requests` from `appointment`) AS `Number of request`;

-- --------------------------------------------------------

--
-- Structure for view `view_state`
--
DROP TABLE IF EXISTS `view_state`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_state` AS select (select count(0) from `appointment`) AS `number_app`,(select count(0) from `appointment` where (`appointment`.`state` = 'Waiting')) AS `number_waiting`,(select count(0) from `appointment` where (`appointment`.`state` = 'Accepted')) AS `number_accepted`,(select count(0) from `appointment` where (`appointment`.`state` = 'Declined')) AS `number_cancelled`;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select (select 't00178747') AS `tnumber`,(select count(0) from `appointment` where ((`appointment`.`state` = 'Accepted') and (`appointment`.`tnumber` = 't00178747'))) AS `Number of Meetings`,(select count(0) from `appointment` where (`appointment`.`tnumber` = 't00178747')) AS `Number of requests`,(select `user`.`register_date` from `user` where (`user`.`tnumber` = 't00178747')) AS `Register date`,(select min(`appointment`.`date_request`) from `appointment` where (`appointment`.`tnumber` = 't00178747')) AS `Date of first request`,(select concat(floor((hour(timediff(`user`.`register_date`,min(`appointment`.`date_request`))) / 24)),' days ',(hour(timediff(`user`.`register_date`,min(`appointment`.`date_request`))) % 24),' hours ',minute(timediff(`user`.`register_date`,min(`appointment`.`date_request`))),' minutes') from (`appointment` join `user` on((`appointment`.`tnumber` = `user`.`tnumber`))) where (`appointment`.`tnumber` = 't00178747')) AS `Time diff`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`service`) REFERENCES `service` (`name`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_app` FOREIGN KEY (`tnumber`) REFERENCES `user` (`tnumber`) ON DELETE CASCADE;

--
-- Constraints for table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `fk_tnumber` FOREIGN KEY (`tnumber`) REFERENCES `user` (`tnumber`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
