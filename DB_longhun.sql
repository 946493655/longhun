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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '管理名称',
  `realname` varchar(255) NOT NULL COMMENT '真实名称',
  `genre` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '管理员身份级别：超管，主管，培训，接待，...',
  `pwd` varchar(255) NOT NULL COMMENT '密码',
  `pwd_ori` varchar(255) NOT NULL COMMENT '未加密密码',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `lastLogin` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最近登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表 admin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'九哥','九哥',1,'$2y$10$GsKQodaitpN99f/k4MgCA.E/nLU3e3Ip23T.Pau4jtZR5/QnCStYK','a12345',1469246071,1469256089,1469262977);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `loginTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `logoutTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登出时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员日志表 admin_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_log`
--

LOCK TABLES `admin_log` WRITE;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` VALUES (1,1,1469262166,1469262803),(2,1,1469262813,1469262973),(3,1,1469262977,0);
/*!40000 ALTER TABLE `admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farms`
--

DROP TABLE IF EXISTS `farms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '单子类型：淘宝单，天猫单，一号店，京东单，蘑菇街，美丽说，浏览单，关注单，扫码单，注册单',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '(星号等)等级',
  `money` float(5,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '做单子的价格，单位元',
  `intro` varchar(255) NOT NULL COMMENT '内容要求',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态：未下单，下单，付款，发货，收货，评价，追评，完成',
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '删除字段：0未删除，1已删除',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='自定义单子表 farms';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms`
--

LOCK TABLES `farms` WRITE;
/*!40000 ALTER TABLE `farms` DISABLE KEYS */;
/*!40000 ALTER TABLE `farms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identitys`
--

DROP TABLE IF EXISTS `identitys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identitys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `genre` tinyint(3) unsigned NOT NULL COMMENT '身份类型：1会员，2高级会员，3至尊会员，4钻石会员',
  `qq` int(15) unsigned NOT NULL DEFAULT '0' COMMENT 'qq号码',
  `mobile` int(15) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码',
  `taobao` varchar(255) NOT NULL COMMENT '淘宝账号',
  `zfb` varchar(255) NOT NULL COMMENT '支付宝账号',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `created_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '创建时间',
  `updated_at` date NOT NULL DEFAULT '0000-00-00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='身份表 identitys';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identitys`
--

LOCK TABLES `identitys` WRITE;
/*!40000 ALTER TABLE `identitys` DISABLE KEYS */;
INSERT INTO `identitys` VALUES (1,1,3,0,0,'','','','2016-07-20','0000-00-00'),(2,2,2,0,0,'','','','2016-07-23','0000-00-00'),(3,1,2,0,0,'','','','2016-07-23','0000-00-00'),(4,1,2,0,0,'','','','2016-07-23','0000-00-00');
/*!40000 ALTER TABLE `identitys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名称',
  `realname` varchar(255) NOT NULL COMMENT '真实姓名',
  `pwd` varchar(255) NOT NULL COMMENT '登陆密码，hash加密',
  `pwd_ori` varchar(255) NOT NULL COMMENT '未加密密码',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `lastLogin` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最近登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表 users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'九哥','九哥','$2y$10$reh/Cff/tf3W8k5Jr9FfY.sG2BUS1iq/wuS29FXHVNibbSNDCcsOu','a12345',1469265270,0,1469348029);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_log`
--

DROP TABLE IF EXISTS `users_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `loginTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `logoutTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登出时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户日志表 users_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_log`
--

LOCK TABLES `users_log` WRITE;
/*!40000 ALTER TABLE `users_log` DISABLE KEYS */;
INSERT INTO `users_log` VALUES (1,1,1469265478,0),(2,1,1469265517,0),(3,1,1469267127,0),(4,1,1469267914,0),(5,1,1469320042,1469333661),(6,1,1469333670,0),(7,1,1469348029,0);
/*!40000 ALTER TABLE `users_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-24 18:52:20
