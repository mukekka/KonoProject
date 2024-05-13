-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: users
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(16) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `UserName` varchar(32) DEFAULT '注册用户' COMMENT '用户名',
  `MakeTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `Sex` enum('男','女','秀吉','武装直升机','沃尔玛购物袋') DEFAULT NULL COMMENT '性别',
  `Resume` varchar(256) DEFAULT '这人是条懒狗，什么都没有说。' COMMENT '简介',
  `Email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `Birthday` date DEFAULT NULL COMMENT '生日',
  `Head` int(32) DEFAULT NULL COMMENT '头像(文件路径)',
  `Hash` char(64) NOT NULL COMMENT '用户哈希(SHA256),用于验证用户。用户ID+用户名+用户密码,所以保存好你的密码，因为站长也不知道你的密码',
  `TAG` set('成员','会员','站长') NOT NULL DEFAULT '成员',
  `STATE` enum('正常','封禁','注销','') NOT NULL DEFAULT '正常' COMMENT '用户状态',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Koizumi','2024-05-09 10:06:39','男','是站长呢','koizumi.369c@outlook.com','1969-12-31',1,'1bad5920602982327e9d87841a6f1814cebf49781c9d69bd8f000e8cd1bee441','站长','正常'),(2,'璟','2024-05-09 10:06:39','沃尔玛购物袋','这人是条懒狗，什么都没有说。','1413661607@qq.com','1997-01-01',2,'55d7cfd1f2e125ba8f9ac7bfca477eb796a80a063ac5dd1333723938ce699c25','会员','正常');
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

-- Dump completed on 2024-05-13 21:11:39
