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
INSERT INTO `admin` VALUES (1,'九哥','九哥',1,'$2y$10$GsKQodaitpN99f/k4MgCA.E/nLU3e3Ip23T.Pau4jtZR5/QnCStYK','a12345',1469246071,1469256089,1469856359);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员日志表 admin_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_log`
--

LOCK TABLES `admin_log` WRITE;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` VALUES (1,1,1469262166,1469262803),(2,1,1469262813,1469262973),(3,1,1469262977,0),(4,1,1469845173,0),(5,1,1469856359,0);
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
  `demand_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户账号信息，拍单旺旺、收款支付宝等等',
  `remarks` varchar(255) NOT NULL COMMENT '备注信息',
  `supply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供应方主持id，关联farms_supply表',
  `supply_shop` varchar(255) NOT NULL COMMENT '店铺名称',
  `supply_price` float(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '拍单价格,单位元',
  `isturn` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否满淘宝单一轮(300一轮)：0不是，1是',
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
-- Table structure for table `farms_demand`
--

DROP TABLE IF EXISTS `farms_demand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farms_demand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `taobao` varchar(50) NOT NULL COMMENT '淘宝账号，阿里旺旺',
  `zfb` varchar(50) NOT NULL COMMENT '支付宝账号',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='自定义单子用户账号表 farms_demand';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms_demand`
--

LOCK TABLES `farms_demand` WRITE;
/*!40000 ALTER TABLE `farms_demand` DISABLE KEYS */;
INSERT INTO `farms_demand` VALUES (1,1,'zwx946493655','15988129456',1469764792,1469769905);
/*!40000 ALTER TABLE `farms_demand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farms_supply`
--

DROP TABLE IF EXISTS `farms_supply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farms_supply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `genre` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型：1主持，2推荐，3接待，4培训',
  `is_number` int(10) unsigned NOT NULL COMMENT 'IS号码',
  `is_account` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT 'IS账号',
  `is_name` varchar(255) NOT NULL COMMENT 'IS昵称',
  `qq` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'qq号码',
  `qq_name` varchar(50) NOT NULL COMMENT 'qq昵称',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='自定义单子主持表 farms_supply';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms_supply`
--

LOCK TABLES `farms_supply` WRITE;
/*!40000 ALTER TABLE `farms_supply` DISABLE KEYS */;
INSERT INTO `farms_supply` VALUES (1,0,1,0,0,'',0,'',1469524829,1469537329),(2,0,1,4294967295,398386383893838,'九哥',0,'',1469760218,0),(3,1,1,4294967295,398386383893838,'jiuge',0,'',1469760303,1469760774);
/*!40000 ALTER TABLE `farms_supply` ENABLE KEYS */;
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
  `qq` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT 'qq号码',
  `mobile` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码',
  `taobao` varchar(255) NOT NULL COMMENT '淘宝账号',
  `zfb` varchar(255) NOT NULL COMMENT '支付宝账号',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='身份表 identitys';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identitys`
--

LOCK TABLES `identitys` WRITE;
/*!40000 ALTER TABLE `identitys` DISABLE KEYS */;
INSERT INTO `identitys` VALUES (1,1,1,2857156840,15990909090,'zwx946493655','15988129456','嘉兴市洪兴西路2323号海州之星',1469702693,1469709894);
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
  `realname` varchar(50) NOT NULL COMMENT '真实姓名',
  `pwd` varchar(255) NOT NULL COMMENT '登陆密码，hash加密',
  `pwd_ori` varchar(20) NOT NULL COMMENT '未加密密码',
  `intro` varchar(255) NOT NULL COMMENT '简介',
  `idcard` varchar(20) NOT NULL COMMENT '身份证号码',
  `zfb` varchar(20) NOT NULL COMMENT '收款支付宝账号',
  `mobile` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码',
  `recommend_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '您的推荐人，recommend',
  `recept_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '您的接待人，recept',
  `train_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '您的 培训人，train',
  `is` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'is号码',
  `is_account` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT 'IS账号',
  `is_name` varchar(20) NOT NULL COMMENT 'IS昵称',
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
INSERT INTO `users` VALUES (1,'九哥','九哥','$2y$10$reh/Cff/tf3W8k5Jr9FfY.sG2BUS1iq/wuS29FXHVNibbSNDCcsOu','a12345','','','',0,0,0,0,0,0,'',1469265270,0,1469835881);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户日志表 users_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_log`
--

LOCK TABLES `users_log` WRITE;
/*!40000 ALTER TABLE `users_log` DISABLE KEYS */;
INSERT INTO `users_log` VALUES (1,1,1469536954,0),(2,1,1469578200,0),(3,1,1469586646,0),(4,1,1469608093,0),(5,1,1469661718,0),(6,1,1469677778,0),(7,1,1469691583,0),(8,1,1469702489,0),(9,1,1469751731,0),(10,1,1469835881,0);
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

-- Dump completed on 2016-07-30 21:33:45
