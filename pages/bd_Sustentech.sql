-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_sustentech
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `tb_empresa`
--

DROP TABLE IF EXISTS `tb_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_empresa` (
  `cd_empresa` int NOT NULL AUTO_INCREMENT,
  `nm_empresa` varchar(255) NOT NULL,
  `cnpj_empresa` varchar(14) DEFAULT NULL,
  `nm_endereco` varchar(45) NOT NULL,
  `nr_endereco` char(4) NOT NULL,
  `nr_cep` char(8) NOT NULL,
  `nr_telefone` char(9) NOT NULL,
  `nm_responsavel` varchar(45) NOT NULL,
  `cargo_responsavel` varchar(45) NOT NULL,
  `email_responsavel` varchar(45) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ds_servico` varchar(255) NOT NULL,
  PRIMARY KEY (`cd_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empresa`
--

LOCK TABLES `tb_empresa` WRITE;
/*!40000 ALTER TABLE `tb_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto` (
  `cd_produto` int NOT NULL AUTO_INCREMENT,
  `nm_produto` varchar(45) NOT NULL,
  `nm_marca` varchar(45) NOT NULL,
  `dt_compra` date NOT NULL,
  `modelo_produto` varchar(45) NOT NULL,
  `condicao_produto` varchar(45) NOT NULL,
  `ds_produto` varchar(45) NOT NULL,
  `vl_produto` varchar(45) DEFAULT NULL,
  `tb_usuarios_cd_cliente` int DEFAULT NULL,
  `tb_empresa_cd_empresa` int DEFAULT NULL,
  PRIMARY KEY (`cd_produto`),
  KEY `fk_tb_produto_tb_vendedores_idx` (`tb_usuarios_cd_cliente`),
  KEY `fk_tb_produto_tb_empresa1_idx` (`tb_empresa_cd_empresa`),
  CONSTRAINT `fk_tb_produto_tb_empresa1` FOREIGN KEY (`tb_empresa_cd_empresa`) REFERENCES `tb_empresa` (`cd_empresa`),
  CONSTRAINT `fk_tb_produto_tb_usuarios` FOREIGN KEY (`tb_usuarios_cd_cliente`) REFERENCES `tb_usuarios` (`cd_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tags`
--

DROP TABLE IF EXISTS `tb_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tags` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `nm_tag` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tags`
--

LOCK TABLES `tb_tags` WRITE;
/*!40000 ALTER TABLE `tb_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `cd_cliente` int NOT NULL AUTO_INCREMENT,
  `nm_cliente` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nm_endereco` varchar(45) NOT NULL,
  `nr_endereco` char(10) NOT NULL,
  `nr_cep` char(8) NOT NULL,
  `sg_estado` varchar(2) NOT NULL,
  `nr_telefone` char(11) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cd_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-31 16:46:58
use bd_sustentech;
create table tb_faleconosco(
cd_faleconosco int auto_increment not null primary key,
nome varchar(45) null, 
telefone varchar(11) null,
usuario varchar(45) null,
email varchar(45) null, 
senha varchar(45) null, 
mensagem longtext null);
