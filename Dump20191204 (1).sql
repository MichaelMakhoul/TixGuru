-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: tixgurus
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `art category`
--

DROP TABLE IF EXISTS `art category`;
/*!50001 DROP VIEW IF EXISTS `art category`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `art category` AS SELECT 
 1 AS `event_id`,
 1 AS `event_title`,
 1 AS `event_description`,
 1 AS `event_location`,
 1 AS `event_picture`,
 1 AS `event_category`,
 1 AS `event_date`,
 1 AS `member_id`,
 1 AS `supplier_id`,
 1 AS `event_added_at`,
 1 AS `supplier_name`,
 1 AS `event_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `seat` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `booking_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'not_paid',
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `seat_UNIQUE` (`seat`),
  KEY `member_id` (`member_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (60,'L1 R12 S1',4,65,'2019-12-04 21:46:12','michael','paid'),(61,'L342 R23 S1',4,65,'2019-12-04 21:46:36','michael','paid'),(62,'L1 R23 S1',4,67,'2019-12-04 21:46:53','michael','paid'),(63,'L234 R23 S1',4,68,'2019-12-04 21:47:10','michael','not_paid');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `business category`
--

DROP TABLE IF EXISTS `business category`;
/*!50001 DROP VIEW IF EXISTS `business category`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `business category` AS SELECT 
 1 AS `event_id`,
 1 AS `event_title`,
 1 AS `event_description`,
 1 AS `event_location`,
 1 AS `event_picture`,
 1 AS `event_category`,
 1 AS `event_date`,
 1 AS `member_id`,
 1 AS `supplier_id`,
 1 AS `event_added_at`,
 1 AS `supplier_name`,
 1 AS `event_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
/*!50001 DROP VIEW IF EXISTS `dashboard`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `dashboard` AS SELECT 
 1 AS `eventID`,
 1 AS `event_title`,
 1 AS `event_description`,
 1 AS `event_location`,
 1 AS `event_picture`,
 1 AS `event_price`,
 1 AS `supplier_name`,
 1 AS `booking_id`,
 1 AS `event_id`,
 1 AS `member_id`,
 1 AS `seat`,
 1 AS `status`,
 1 AS `booking_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(10000) DEFAULT NULL,
  `event_location` varchar(100) NOT NULL,
  `event_picture` varchar(3000) DEFAULT NULL,
  `event_category` varchar(200) NOT NULL,
  `event_capacity` int(11) NOT NULL,
  `event_date` datetime NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `event_added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_name` varchar(255) NOT NULL,
  `event_price` int(255) NOT NULL,
  `seat_map` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (65,'Tomorrowland 2021','TOMORROWLAND is taking place in Australia this year!!\r\nLet&#39;s make a memorable week of one of the world&#39;s largest music festivals.','Marzouk Sport Stadium','people-inside-concert-hall-2263436.jpg','Sport',80000,'2021-12-12 20:00:00',NULL,7,'2019-12-04 19:46:39','Supplier',350,'stad.png'),(66,'Bulldogs vs West Tigers','Bulldogs will play against West Tigers in Sydney next week.','Marzouk Sport Stadium','photo-of-stadium-scenery-3026835.jpg','Sport',80000,'2019-12-13 18:30:00',NULL,7,'2019-12-04 20:06:43','Supplier',150,'stad.png'),(67,'Our Tradition','Book your ticket now to join us in our tour at Alvarez Museum to get a close view and know more about Australian Cultures.','Alvarez Art Museum','group-of-people-on-museum-1056824.jpg','Art',2000,'2019-12-25 01:00:00',NULL,7,'2019-12-04 20:20:04','Supplier One',35,'museum.png'),(68,'Sydney School Play','Sydney School students are performing a theater show at Rao National Theatre.','Rao National Theatre','greyscale-photo-of-masks-on-a-stick-669319.jpg','Art',500,'2019-12-30 17:00:00',NULL,7,'2019-12-04 20:37:07','Supplier One',20,'theater.png'),(70,'Chen Science Event','Don&#39;t miss out on the latest discoveries of Australian scientists.','Chen Science Museum','close-up-of-microscope-256262.jpg','Science',200,'2019-12-18 18:00:00',NULL,7,'2019-12-04 21:09:01','Supplier One',25,'museum.png'),(71,'The Business World','TixGurus is hosting The Business World&#39;s Event this year at our Business Exhibition Centre on the 18th of December.','Business Exhibition Centre','man-standing-in-front-of-people-sitting-on-red-chairs-1708936.jpg','Business',60000,'2019-12-18 16:00:00',NULL,7,'2019-12-04 21:45:08','Supplier',30,'business.png'),(72,'Sydney FC vs Real Madrid','A Friendly Match between Sydney FC and Real Madrid will be hosted in Sydney next month.\r\nBook your tickets to support your favourite team.','Marzouk Sport Stadium','athletes-audience-ball-bleachers-270085.jpg','Sport',80000,'2020-01-14 22:00:00',NULL,7,'2019-12-04 21:58:51','Supplier',500,'stad.png');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) DEFAULT NULL,
  `member_email` varchar(50) DEFAULT NULL,
  `member_phone` varchar(40) DEFAULT NULL,
  `registration_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `member_dob` date NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL DEFAULT 'member',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (4,'michael','michael@gmail.com','0414141414','2019-11-11 13:48:48','1997-07-11','$2y$10$LTOB0bXXcZvx6bTOkMRyM.akWQ6Rhiuaw4fJrvW1VPERy3CR3lx0y','member'),(5,'michael Makhoul','michael2@gmail.com','0414141414','2019-11-11 20:32:25','2019-10-27','$2y$10$2pty.OmPUZhsD6oLUW.PIeA4gYpZp3DsLW5sbozwF2F1q0aTaK7RG','member'),(7,'Employee','employee@gmail.com','0414141414','2019-11-13 09:25:01','2019-11-11','$2y$10$LTOB0bXXcZvx6bTOkMRyM.akWQ6Rhiuaw4fJrvW1VPERy3CR3lx0y','employee'),(8,'Employee One','employeeone@gmail.com','0414141414','2019-11-15 17:04:08','2019-11-11','$2y$10$LTOB0bXXcZvx6bTOkMRyM.akWQ6Rhiuaw4fJrvW1VPERy3CR3lx0y','employee'),(9,'Admin','admin@gmail.com','0414141414','2019-11-16 19:58:28','2019-11-04','$2y$10$LTOB0bXXcZvx6bTOkMRyM.akWQ6Rhiuaw4fJrvW1VPERy3CR3lx0y','admin'),(10,'michael','michael1@gmail.com','0414141414','2019-12-03 21:47:56','2019-01-01','$2y$10$55lQRiQP.X1Xqbd7eeE/9O8cN6nUpInGZLcz1Q/TjutrwakS73AR2','member');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `science category`
--

DROP TABLE IF EXISTS `science category`;
/*!50001 DROP VIEW IF EXISTS `science category`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `science category` AS SELECT 
 1 AS `event_id`,
 1 AS `event_title`,
 1 AS `event_description`,
 1 AS `event_location`,
 1 AS `event_picture`,
 1 AS `event_category`,
 1 AS `event_date`,
 1 AS `member_id`,
 1 AS `supplier_id`,
 1 AS `event_added_at`,
 1 AS `supplier_name`,
 1 AS `event_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `sport category`
--

DROP TABLE IF EXISTS `sport category`;
/*!50001 DROP VIEW IF EXISTS `sport category`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sport category` AS SELECT 
 1 AS `event_id`,
 1 AS `event_title`,
 1 AS `event_description`,
 1 AS `event_location`,
 1 AS `event_picture`,
 1 AS `event_category`,
 1 AS `event_date`,
 1 AS `member_id`,
 1 AS `supplier_id`,
 1 AS `event_added_at`,
 1 AS `supplier_name`,
 1 AS `event_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_phone` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Supplier','supplier@gamil.com','0123 123 123\r\n');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `art category`
--

/*!50001 DROP VIEW IF EXISTS `art category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `art category` AS select `events`.`event_id` AS `event_id`,`events`.`event_title` AS `event_title`,`events`.`event_description` AS `event_description`,`events`.`event_location` AS `event_location`,`events`.`event_picture` AS `event_picture`,`events`.`event_category` AS `event_category`,`events`.`event_date` AS `event_date`,`events`.`member_id` AS `member_id`,`events`.`supplier_id` AS `supplier_id`,`events`.`event_added_at` AS `event_added_at`,`events`.`supplier_name` AS `supplier_name`,`events`.`event_price` AS `event_price` from `events` where (`events`.`event_category` = 'art') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `business category`
--

/*!50001 DROP VIEW IF EXISTS `business category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `business category` AS select `events`.`event_id` AS `event_id`,`events`.`event_title` AS `event_title`,`events`.`event_description` AS `event_description`,`events`.`event_location` AS `event_location`,`events`.`event_picture` AS `event_picture`,`events`.`event_category` AS `event_category`,`events`.`event_date` AS `event_date`,`events`.`member_id` AS `member_id`,`events`.`supplier_id` AS `supplier_id`,`events`.`event_added_at` AS `event_added_at`,`events`.`supplier_name` AS `supplier_name`,`events`.`event_price` AS `event_price` from `events` where (`events`.`event_category` = 'business') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dashboard`
--

/*!50001 DROP VIEW IF EXISTS `dashboard`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dashboard` AS select `events`.`event_id` AS `eventID`,`events`.`event_title` AS `event_title`,`events`.`event_description` AS `event_description`,`events`.`event_location` AS `event_location`,`events`.`event_picture` AS `event_picture`,`events`.`event_price` AS `event_price`,`events`.`supplier_name` AS `supplier_name`,`bookings`.`booking_id` AS `booking_id`,`bookings`.`event_id` AS `event_id`,`bookings`.`member_id` AS `member_id`,`bookings`.`seat` AS `seat`,`bookings`.`status` AS `status`,`bookings`.`booking_date` AS `booking_date` from (`bookings` left join `events` on((`bookings`.`event_id` = `events`.`event_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `science category`
--

/*!50001 DROP VIEW IF EXISTS `science category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `science category` AS select `events`.`event_id` AS `event_id`,`events`.`event_title` AS `event_title`,`events`.`event_description` AS `event_description`,`events`.`event_location` AS `event_location`,`events`.`event_picture` AS `event_picture`,`events`.`event_category` AS `event_category`,`events`.`event_date` AS `event_date`,`events`.`member_id` AS `member_id`,`events`.`supplier_id` AS `supplier_id`,`events`.`event_added_at` AS `event_added_at`,`events`.`supplier_name` AS `supplier_name`,`events`.`event_price` AS `event_price` from `events` where (`events`.`event_category` = 'science') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sport category`
--

/*!50001 DROP VIEW IF EXISTS `sport category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sport category` AS select `events`.`event_id` AS `event_id`,`events`.`event_title` AS `event_title`,`events`.`event_description` AS `event_description`,`events`.`event_location` AS `event_location`,`events`.`event_picture` AS `event_picture`,`events`.`event_category` AS `event_category`,`events`.`event_date` AS `event_date`,`events`.`member_id` AS `member_id`,`events`.`supplier_id` AS `supplier_id`,`events`.`event_added_at` AS `event_added_at`,`events`.`supplier_name` AS `supplier_name`,`events`.`event_price` AS `event_price` from `events` where (`events`.`event_category` = 'sport') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-04 22:06:27
