-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: consulta_doctor
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `antecedentes`
--

DROP TABLE IF EXISTS `antecedentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antecedentes` (
  `id_ant` int(11) NOT NULL,
  `tipo_ant` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_ant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antecedentes`
--

LOCK TABLES `antecedentes` WRITE;
/*!40000 ALTER TABLE `antecedentes` DISABLE KEYS */;
INSERT INTO `antecedentes` VALUES (1,'alergias cronicas'),(2,'algo'),(3,'jkdjk'),(15,'Epatitis');
/*!40000 ALTER TABLE `antecedentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `sintomas` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `receta` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `rut_medico` int(11) NOT NULL,
  `rut_p` int(11) NOT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `consulta_rut_medico_fk` (`rut_medico`),
  KEY `consulta_rut_p_fk` (`rut_p`),
  CONSTRAINT `consulta_rut_medico_fk` FOREIGN KEY (`rut_medico`) REFERENCES `medico` (`rut_medico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `consulta_rut_p_fk` FOREIGN KEY (`rut_p`) REFERENCES `paciente` (`rut_p`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_examen`
--

DROP TABLE IF EXISTS `consulta_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_examen` (
  `id_consulta` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `fecha_ex` date NOT NULL,
  `rut_p` int(11) NOT NULL,
  PRIMARY KEY (`id_consulta`,`id_examen`),
  KEY `key_id_examen_fk` (`id_examen`),
  KEY `key_rut_p_fk` (`rut_p`),
  CONSTRAINT `key_id_consulta_fk` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `key_id_examen_fk` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `key_rut_p_fk` FOREIGN KEY (`rut_p`) REFERENCES `paciente` (`rut_p`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_examen`
--

LOCK TABLES `consulta_examen` WRITE;
/*!40000 ALTER TABLE `consulta_examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'activo'),(2,'inactivo'),(3,'Eliminado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_reserva`
--

DROP TABLE IF EXISTS `estado_reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_reserva` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_reserva`
--

LOCK TABLES `estado_reserva` WRITE;
/*!40000 ALTER TABLE `estado_reserva` DISABLE KEYS */;
INSERT INTO `estado_reserva` VALUES (1,'Pendiente'),(2,'Atendida'),(3,'Cancelada');
/*!40000 ALTER TABLE `estado_reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenes`
--

DROP TABLE IF EXISTS `examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenes` (
  `id_examen` int(11) NOT NULL,
  `tipo_examen` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes`
--

LOCK TABLES `examenes` WRITE;
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas`
--

DROP TABLE IF EXISTS `horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas` (
  `id_hora` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_hora`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas`
--

LOCK TABLES `horas` WRITE;
/*!40000 ALTER TABLE `horas` DISABLE KEYS */;
INSERT INTO `horas` VALUES (1,'08:00:00'),(2,'09:00:00'),(3,'10:00:00'),(4,'11:00:00');
/*!40000 ALTER TABLE `horas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `rut_medico` int(11) NOT NULL,
  `fecha_ing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombre_m` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_p_m` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_m_m` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `domicilio` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `fono` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `nacionalidad` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`rut_medico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (111,'2017-01-05 20:35:15','dfd','dff','zs','zs','xs','xxx'),(123,'2017-01-05 17:29:16','hola','aa','aa','aa','aa','aa'),(456,'2017-01-05 15:43:24','aaa','aa','aa','aa','aa','aa'),(654,'2017-01-11 00:27:36','','','','','',''),(1212,'2017-01-06 19:14:27','fdf','df','d','d','4343','d'),(5555,'2017-01-07 02:51:03','tg','gg','gg','gg','4656','f'),(212121,'2017-01-07 07:30:08','roberto','con sueÃ±o','nose','por ahi','42121','bratislova'),(18273352,'2017-01-09 21:07:39','Pablo','Perez','Rios','LOS RAULIES','82537240','Chileno'),(54651233,'2017-01-11 00:26:34','','','','','','');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `rut_p` int(11) NOT NULL,
  `fecha_ing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombre_p` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_p_p` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_m_p` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `sexo_p` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_nacto_p` date NOT NULL,
  `domicilio` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `fono` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `nacionalidad` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`rut_p`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (12345678,'2017-01-11 00:32:29','prueba','papellido','papellidom','Hombre','1992-05-01','Villagran','123456','Chilena'),(19616061,'2017-01-10 20:38:20','Carlos','Rivas','Riquelme','Hombre','1993-05-02','Los Peumos','123456','CHILENA');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_antecedentes`
--

DROP TABLE IF EXISTS `paciente_antecedentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_antecedentes` (
  `id_pac_ant` int(11) NOT NULL,
  `rut_p` int(11) NOT NULL,
  `id_ant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_consulta` int(11) NOT NULL,
  PRIMARY KEY (`id_pac_ant`,`rut_p`,`id_ant`),
  KEY `all_id_ant_fk` (`id_ant`),
  KEY `all_key_id_consulta_fk` (`id_consulta`),
  KEY `all_key_rut_p_fk` (`rut_p`),
  CONSTRAINT `all_id_ant_fk` FOREIGN KEY (`id_ant`) REFERENCES `antecedentes` (`id_ant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `all_key_id_consulta_fk` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `all_key_rut_p_fk` FOREIGN KEY (`rut_p`) REFERENCES `paciente` (`rut_p`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_antecedentes`
--

LOCK TABLES `paciente_antecedentes` WRITE;
/*!40000 ALTER TABLE `paciente_antecedentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_antecedentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `rut_medico` int(11) NOT NULL,
  `rut_p` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `rut_medico_fk` (`rut_medico`),
  KEY `rut_p_fk` (`rut_p`),
  KEY `id_estado_fk_idx` (`id_estado`),
  CONSTRAINT `id_estado_fk` FOREIGN KEY (`id_estado`) REFERENCES `estado_reserva` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `rut_medico_fk` FOREIGN KEY (`rut_medico`) REFERENCES `medico` (`rut_medico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rut_p_fk` FOREIGN KEY (`rut_p`) REFERENCES `paciente` (`rut_p`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'2017-01-10',1,3,18273352,19616061),(2,'2017-01-10',3,1,18273352,19616061),(3,'2017-01-10',1,1,18273352,19616061);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `userpass` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'nutrisalud','123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'consulta_doctor'
--

--
-- Dumping routines for database 'consulta_doctor'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-10 22:55:14
