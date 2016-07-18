-- MySQL dump 10.13  Distrib 5.6.27, for Linux (i686)
--
-- Host: localhost    Database: longhun
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `bs_identitys`
--

DROP TABLE IF EXISTS `bs_identitys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_identitys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre` tinyint(3) unsigned NOT NULL COMMENT '身份类型：1会员，2高级会员，3至尊会员，4钻石会员',
  `qq` int(15) unsigned NOT NULL DEFAULT '0' COMMENT 'qq号码',
  `mobile` int(15) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码',
  `taobao` varchar(255) NOT NULL COMMENT '淘宝账号',
  `zfb` varchar(255) NOT NULL COMMENT '支付宝账号',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表 bs_users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_identitys`
--

LOCK TABLES `bs_identitys` WRITE;
/*!40000 ALTER TABLE `bs_identitys` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_identitys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bs_users`
--

DROP TABLE IF EXISTS `bs_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名称',
  `password` varchar(255) NOT NULL COMMENT '登陆密码，hash加密',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表 bs_users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bs_users`
--

LOCK TABLES `bs_users` WRITE;
/*!40000 ALTER TABLE `bs_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `bs_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-18 18:04:35
