-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: servis
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admini`
--

DROP TABLE IF EXISTS `admini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admini`
--

LOCK TABLES `admini` WRITE;
/*!40000 ALTER TABLE `admini` DISABLE KEYS */;
INSERT INTO `admini` VALUES (1,'Admin','Adminovic','0641019726','admin@admin.com','admin','admin'),(5,'admina','adminic','012345678','admina@admina.com','admina','admina');
/*!40000 ALTER TABLE `admini` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kvarovi`
--

DROP TABLE IF EXISTS `kvarovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kvarovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) DEFAULT NULL,
  `opis` varchar(45) DEFAULT NULL,
  `vreme` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `cenapop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kvarovi`
--

LOCK TABLES `kvarovi` WRITE;
/*!40000 ALTER TABLE `kvarovi` DISABLE KEYS */;
INSERT INTO `kvarovi` VALUES (1,'Graficka Radeon R5','Pregrejavanje',5,'Nepopravljeno',2000),(7,'Graficka Radeon R5','Pregrejavanje',5,'Popravljeno',5000),(8,'rgffdgdfg','gdfgdfgf',3,'Popravljeno',500);
/*!40000 ALTER TABLE `kvarovi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviseri`
--

DROP TABLE IF EXISTS `serviseri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviseri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `cenaradnogsata` int(11) NOT NULL,
  PRIMARY KEY (`id`,`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviseri`
--

LOCK TABLES `serviseri` WRITE;
/*!40000 ALTER TABLE `serviseri` DISABLE KEYS */;
INSERT INTO `serviseri` VALUES (1,'Marko','Markovic','064123456','marko@marko.com','marko','marko',1000),(2,'Milos','Milosevic','0641234567','milos@milos.com','milos','milos',900);
/*!40000 ALTER TABLE `serviseri` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-07 16:47:52
