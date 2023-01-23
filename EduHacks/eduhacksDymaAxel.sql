-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: eduhacks
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ctfs`
--

DROP TABLE IF EXISTS `ctfs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctfs` (
  `idctf` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `categoryName` varchar(255) NOT NULL,
  `score` int(50) NOT NULL,
  `iduser` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`idctf`),
  KEY `fk_ctfs_users` (`iduser`),
  CONSTRAINT `fk_ctfs_users` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctfs`
--

LOCK TABLES `ctfs` WRITE;
/*!40000 ALTER TABLE `ctfs` DISABLE KEYS */;
INSERT INTO `ctfs` VALUES (10,'DECRYPT1','Els textos següents estan xifrats mitjançant un criptosistema determinat. Si els desxifres tens la flag.\r\n\r\n46 4c 41 47 7b 42 41 44 42 55 4e 4e 59 42 45 49 42 45 7d','BADBUNNYBEIBE','','../uploads/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','Criptografia',10,3,'2022-05-12 08:39:21'),(11,'DECRYPT2','Els textos següents estan xifrats mitjançant un criptosistema determinat. Si els desxifres tens la flag.\r\n\r\n\r\n\r\n106 114 101 107 173 105 114 116 105 107 122 111 124 117 117 112 117 123 103 114 101 122 117 123 175','ELNEGRITOOJOSCLAROS','','../uploads/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','Criptografia',10,3,'2022-05-12 08:40:36'),(12,'DECRYPT3','Els textos següents estan xifrats mitjançant un criptosistema determinat. Si els desxifres tens la flag.\r\n\r\nRkxBR3tUUlVNUFlCRVpPU1NPTk5PVklPU30=','TRUMPYBEZOSSONNOVIOS','','../uploads/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','Criptografia',10,3,'2022-05-12 08:42:12'),(13,'DECRYPT4','Els textos següents estan xifrats mitjançant un criptosistema determinat. Si els desxifres tens la flag.\r\n\r\n⠋⠇⠁⠛{⠛⠕⠝⠏⠕⠝⠕⠎⠥⠝⠂⠴}','GONPONOSUN10','','../uploads/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','Criptografia',15,3,'2022-05-12 08:43:41'),(14,'DECRYPT5','Els textos següents estan xifrats mitjançant un criptosistema determinat. Si els desxifres tens la flag.\r\n\r\n\r\n70 76 65 71 123 78 79 81 85 69 82 69 77 79 83 82 69 80 69 84 73 82 125','NOQUEREMOSREPETIR','','../uploads/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','Criptografia',15,3,'2022-05-12 08:44:46'),(15,'PUTIN GUILTY','En aquesta proba hauràs de trobar evidencies de la culpabilitat de el president de russia Vladimir Putin, inspecciona a fons el següent arxiu proporcionat.','AxelAr1z@#1','facts.jpg','../uploads/856b26e647422d081f8bdda52e077e0c161445d3f4614b94ee098368ea79f4c8','Esteganografia',20,3,'2022-05-12 08:46:14'),(16,'LEO ANDRES MESSI CUCHITINI (EXCLUSIVA)','En el següent arxiu de video és troba amagada informació rellevant sobre el futur de Leo Messi. És el que ens ha dit el periodista que ha aconseguit aquest video. El periodista ens ha dit que el secret esta en el primer que arribi a la \"meta\".','TRAEMELACOPAMESS1','MESSI.mp4','../uploads/ae6e18dff426127f0602d55b09c280e5334b47bf487ec6852ab7821adfa38b17','Esteganografia',25,3,'2022-05-12 08:48:52'),(17,'CAMALEÓ-WORD','Hem trobat un word que aparentment té informació privilegiada que podria canviar la manera de veure el món actual, la persona que ens l\'ha facilitat diu que per conèixer la informació haurem d\'actuar com un camaleó, a primera vista no veiem res.','ELQUELOLEAESGALLEGO','DONTLOOKTHIS.docx','../uploads/8e6cb117b336bd3c80350392ae0e7fa7f484066ff48068484ecad38ffbd70658','Criptografia',15,3,'2022-05-12 08:50:18'),(18,'ELISA LAM (CAS OBERT)','El seu cos va ser recuperat del tanc d\'aigua de l\'Hotel Cecil encara no se sap que va passar exactament, però hem trobat una memòria USB amb un programa que podria resoldre el cas. Potser et servirà d\'alguna cosa el seu Instagram (@elisalam1940).','AxelAr1z@#2','PEN.prova2.zip','../uploads/1d9592aee19f724f612a83a544de3e1e2c97929fe0c397039a8ee045c8894728','OSINT',20,3,'2022-05-12 08:52:53'),(19,'MUHAMMAD ALI','Troba la flag oculta que està en la següent imatge.','THEG04T','BOXING.jpg','../uploads/5655f4dacfaef11bfe74604c7169dd8a63e5ef8e34e700e3d83e2c001fc39bdf','Esteganografia',10,3,'2022-05-12 08:55:55'),(20,'SPIDERMAN','Troba la flag oculta que està en la següent imatge.','TOMHOLLANDFIRMAMEELPECHO','SPIDY.jpg','../uploads/dc15fe782cd50b5093aa239e787f3209699b3a00fdc774a4711f59f9f79c55ff','Esteganografia',10,3,'2022-05-12 08:57:23'),(21,'DRAGONBALL','Troba la flag oculta que està en la següent imatge.','GOKU>VEGETA777','DBALLGT.jpg','../uploads/4c2263977d88afa7699ddeb8aa22120b55e76642b8f57d106424cd80a5053ca2','Esteganografia',10,3,'2022-05-12 08:58:47'),(22,'SCOTT EL TRAVIESO','Troba la flag oculta que està en la següent imatge.','W3LLDONE','ESCOTTELTRAVIESO.jpg','../uploads/261ffb54f21d68f15d887d50cc5e6776127b54c01e2d21706ca4f191526297af','Esteganografia',10,3,'2022-05-12 08:59:49'),(23,'WEB SOSPECHOSA','Troba la flag oculta que està en la següent pàgina web.','WEBM4STER','web.rar','../uploads/0c4633b61c4126744118b377437212e735f437df7aa2a5ba69115cb1d69c7270','WEB',10,3,'2022-05-12 09:01:09'),(24,'TELEFONO TERRORISTA','Tenim a les nostres mans un arxiu d\'àudio que conté el número de telèfon d\'una persona molt pleigrosa, si aconsegueixes desxifrar-lo tindràs la flag.','936262851','Nueva_grabacion.mp3','../uploads/a51bad416c8ca6a70514baede5c74dbd69ae41dc648b3151ae532c535035c87f','Radio',20,3,'2022-05-12 09:47:33');
/*!40000 ALTER TABLE `ctfs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retoscompletados`
--

DROP TABLE IF EXISTS `retoscompletados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retoscompletados` (
  `idretos` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  KEY `retoscompletados_ibfk_1` (`idretos`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `retoscompletados_ibfk_1` FOREIGN KEY (`idretos`) REFERENCES `ctfs` (`idctf`),
  CONSTRAINT `retoscompletados_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retoscompletados`
--

LOCK TABLES `retoscompletados` WRITE;
/*!40000 ALTER TABLE `retoscompletados` DISABLE KEYS */;
INSERT INTO `retoscompletados` VALUES (21,4),(23,4);
/*!40000 ALTER TABLE `retoscompletados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(40) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `passHash` varchar(60) DEFAULT NULL,
  `userFirstName` varchar(60) DEFAULT NULL,
  `userLastName` varchar(120) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `removeDate` datetime DEFAULT NULL,
  `lastSignIn` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `activationDate` datetime DEFAULT NULL,
  `activationCode` char(64) DEFAULT NULL,
  `resetPassExpiry` datetime DEFAULT NULL,
  `resetPassCode` char(64) DEFAULT NULL,
  `userScore` int(11) NOT NULL DEFAULT 0,
  `imgName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'lareishon69@gmail.com','admin','$2y$10$ObhJ161NzI1SnD2OUap69u7E3OQPZtihqDjXzA2AGOYttJtfgHKL6','administrador','boss','2022-05-12 08:57:33',NULL,NULL,1,NULL,'ed3a7fd12cf8cfcd0721c43ceee1162cf2a7491156d2d480b1dd8bf6177080dc',NULL,NULL,0,'791121ff3f8df8ef4a9cceb19cd97ab709e87fc9b6e7acd53fec7b00cd290451Captura de pantalla 2021-09-20 094329.png'),(4,'123axelarizasoria@gmail.com','tester','$2y$10$Z5xSWwHkspcK.q3IR6gVVedJQrkxH.6B.Zv5sCFT7byZi5anGHtgm','testerName','testerLastName','2022-05-12 08:59:02',NULL,NULL,1,NULL,'e26720840a58193f5f7820e3fc94a0cf74dedbfd88a6f682bff787527612f1a3',NULL,NULL,20,'261ffb54f21d68f15d887d50cc5e6776127b54c01e2d21706ca4f191526297afESCOTTELTRAVIESO.jpg'),(5,'dmytrobromirskyi@gmail.com','dbromirskyi','$2y$10$rCRlHZwx8j.P.DrpqAz/a.CH.jP04WzNRSPX3emEta1Zniu1l0h5u','Dyma','Bromirskyi','2022-05-13 05:41:18',NULL,NULL,1,NULL,'d82a994d33720c8e43027398ab963e5dfe1e0088269bbbbc9837be96c684dffa',NULL,NULL,0,NULL),(7,'dmytro.bromirskyi@educem.net','aariza','$2y$10$dUap47VUkaO3cUPmZ0zjB.wO9KqJpebDL2FD0rfAst1x/goaWAt56','Axel','Ariza','2022-05-13 06:30:42',NULL,NULL,1,NULL,'a4afeedb70604eca2e46ecafde63b5385cbaac9384ce7acc2457dde16883fe45',NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-13  7:07:53
