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
INSERT INTO `admin` VALUES (1,'九哥','九哥',1,'$2y$10$GsKQodaitpN99f/k4MgCA.E/nLU3e3Ip23T.Pau4jtZR5/QnCStYK','a12345',1469246071,1469256089,1469933409);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员日志表 admin_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_log`
--

LOCK TABLES `admin_log` WRITE;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` VALUES (1,1,1469262166,1469262803),(2,1,1469262813,1469262973),(3,1,1469262977,0),(4,1,1469845173,0),(5,1,1469856359,0),(6,1,1469933409,0);
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
  `money` float(5,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '做单子的价格，单位元',
  `intro` varchar(255) NOT NULL COMMENT '内容要求',
  `demand_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户账号信息，拍单旺旺、收款支付宝等等',
  `remarks` varchar(255) NOT NULL COMMENT '备注信息',
  `supply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供应方主持id，关联farms_supply表',
  `supply_shop` varchar(255) NOT NULL COMMENT '店铺名称',
  `supply_price` float(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '拍单价格,单位元',
  `isturn` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否满淘宝单一轮(300一轮)：0不是，1是',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态：1未下单，2下单，3付款，4发货，5收货，6评价，7追评，8完成',
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '删除字段：0未删除，1已删除',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='自定义单子表 farms';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms`
--

LOCK TABLES `farms` WRITE;
/*!40000 ALTER TABLE `farms` DISABLE KEYS */;
INSERT INTO `farms` VALUES (1,1,1,4.00,'备注：7.15+龙魂·九哥',1,'',3,'完美香氛',220.00,0,2,0,1469939152,0),(2,1,1,4.00,'备注：7.15+龙魂·九哥',1,'',3,'衣尘不变',75.00,0,2,0,1469939413,0),(3,1,1,3.50,'备注：7.16+zwx946493655',1,'',4,'吉祥轮胎批发',430.00,0,1,0,1469954604,0),(4,1,1,6.00,'备注：待收货，好评，到账',1,'',5,'如云宠物用品专营店',79.00,0,2,0,1469955182,0),(5,1,1,3.50,'到账',1,'',6,'西安九鼎门窗店',75.00,0,2,0,1469955556,0),(6,1,1,4.00,'备注：到账',1,'',7,'文章代写工作室',10.00,0,2,0,1469955625,0),(7,1,1,3.50,'备注：到账',1,'',8,'恒寿祥集团官方企业店',2799.00,0,2,0,1469955666,0),(8,1,1,3.50,'备注：到账',1,'',8,'上海海扬气模直销店',240.00,0,2,0,1469955701,0),(9,1,1,4.00,'备注：到账',1,'',9,'文博钢木家具',382.50,0,2,0,1469955761,0),(10,1,1,3.50,'备注：礼物，到账，10字好评',1,'',8,'纸器时代品牌折扣店',69.52,0,2,0,1469955839,0),(11,1,1,4.00,'备注：到账，10字好评',1,'',10,'苏泊尔炊具精品店',168.00,0,2,0,1469957197,0),(12,1,1,3.00,'...',1,'',11,'凯路菲斯',59.00,0,2,0,1469957240,0),(13,1,1,3.00,'...',1,'',11,'生活构造品牌女包',138.00,0,2,0,1469957279,0),(14,1,1,4.00,'备注：到账，20字好评',1,'',2,'中蝶玩具城',45.00,0,2,0,1469957395,0),(15,1,1,4.00,'备注：4天收菜，10字好评',1,'',1,'大苹果轮胎店',250.00,0,2,0,1469957462,0),(16,1,1,4.00,'...',1,'',15,'海尔厨卫电器高端店',212.00,0,2,0,1469958066,0),(17,1,1,4.00,'备注：快递收货，五星带字好评20字以上。一定看物流 ，要及时收货，5星好评 15字好评，收货完给我截图',1,'',12,'思蓓儿旗舰店',98.00,0,2,0,1469958201,0),(18,1,1,3.00,'备注：快递收货，五星带字好评20字以上。一定看物流 ，要及时收货，5星好评 15字好评，收货完给我截图',1,'',12,'农家的老张',29.70,0,2,0,1469958256,0),(19,1,1,4.00,'备注：待收，20字以上好评',1,'',13,'郭志浩06',313.00,0,2,0,1469958353,0),(20,1,1,4.00,'备注：待收，20字以上好评',1,'',13,'zhangguanzhuo2013',280.00,0,2,0,1469958390,0),(21,1,1,4.00,'备注：到账，看物流签收了 5分好评+10字以上评语',1,'',14,'qiulingxi8988',188.00,0,2,0,1469958496,0),(22,1,1,4.00,'备注：到账，看物流签收了 5分好评+10字以上评语',1,'',14,'kelly110789',45.00,0,2,0,1469958554,0);
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
  `tb_level` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '淘宝等级：1=>白号，1星，2星，3星，4星，5星，金钻，2金钻，3金钻，4金钻，5金钻，1蓝色皇冠，2蓝色皇冠，3蓝色皇冠，4蓝色皇冠，5蓝色皇冠，1紫金皇冠，2紫金皇冠，3紫金皇冠，4紫金皇冠，5紫金皇冠',
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
INSERT INTO `farms_demand` VALUES (1,1,'zwx946493655',5,'946493655@qq.com',1469764792,1469938893);
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
  `is_name` varchar(20) NOT NULL COMMENT 'IS昵称',
  `qq` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'qq号码',
  `qq_name` varchar(50) NOT NULL COMMENT 'qq昵称',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='自定义单子主持表 farms_supply';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms_supply`
--

LOCK TABLES `farms_supply` WRITE;
/*!40000 ALTER TABLE `farms_supply` DISABLE KEYS */;
INSERT INTO `farms_supply` VALUES (1,1,1,273787644,0,'ＶＸ丶安达『１１㊣主持』',714632882,'',1469524829,1469537329),(2,1,1,272672029,0,'ＶＸ❤看灰机『１１㊣主持』龍魂',80305969,'',1469760218,0),(3,1,1,272571165,0,'ＶＸ♔小咕噜『５团❤主持』',2209163626,'',1469760303,1469936486),(4,1,1,275426233,0,'ＶＸ丶呱呱『４６㊣主持』',1640209010,'',1469939637,0),(5,1,1,272218817,0,'ＶＸ♔水月『６８㊣主持』',767266483,'',1469939672,0),(6,1,1,271276378,0,'‎‭ＶＸ♔老猫『６６.主持』',29134028,'',1469939700,0),(7,1,1,283156882,0,'‭ＶＸ♔在路上『40团主持』',190534548,'',1469939773,0),(8,1,1,283343408,0,'ＶＸ♔ 紫陌『12S·主持』',29134028,'',1469939804,0),(9,1,1,273489472,0,'ＶＸ♔孙哥『Ａ５㊣主管』',3356314685,'',1469939855,0),(10,1,1,271321529,0,'ＶＸ♔ 红ღ茶『零Ｂ.主管』',212331904,'',1469939930,0),(11,1,1,272314687,0,'ＶＸ❤墨缘『Y区主持』',3248233518,'',1469940332,0),(12,1,1,272207750,0,'ＶＸ♔ 邱总『28.主播』',0,'',1469940533,0),(13,1,1,272253814,0,'ＶＸ♔天靓『５Ｅ主持』',0,'',1469940563,0),(14,1,1,281439060,0,'丿龍魂丶雅雅『２H㊣主持』 ',0,'',1469940610,0),(15,1,1,284761812,0,'ＶＸ❤内心『04㊣主持』广东',2928742972,'',1469958030,0);
/*!40000 ALTER TABLE `farms_supply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farms_vest`
--

DROP TABLE IF EXISTS `farms_vest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farms_vest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '前后缀类型：1前缀，2中间，3后缀',
  `name` varchar(10) NOT NULL COMMENT '前缀1',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='马甲格式 farms_vests';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms_vest`
--

LOCK TABLES `farms_vest` WRITE;
/*!40000 ALTER TABLE `farms_vest` DISABLE KEYS */;
/*!40000 ALTER TABLE `farms_vest` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'九哥','九哥','$2y$10$reh/Cff/tf3W8k5Jr9FfY.sG2BUS1iq/wuS29FXHVNibbSNDCcsOu','a12345','','','',0,0,0,0,0,0,'',1469265270,0,1469954513);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='用户日志表 users_log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_log`
--

LOCK TABLES `users_log` WRITE;
/*!40000 ALTER TABLE `users_log` DISABLE KEYS */;
INSERT INTO `users_log` VALUES (1,1,1469536954,0),(2,1,1469578200,0),(3,1,1469586646,0),(4,1,1469608093,0),(5,1,1469661718,0),(6,1,1469677778,0),(7,1,1469691583,0),(8,1,1469702489,0),(9,1,1469751731,0),(10,1,1469835881,0),(11,1,1469926196,0),(12,1,1469935788,0),(13,1,1469954513,0);
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

-- Dump completed on 2016-07-31 21:03:41
