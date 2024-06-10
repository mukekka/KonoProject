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
-- Table structure for table `commit`
--

DROP TABLE IF EXISTS `commit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commit` (
  `Num` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论排序',
  `UserID` int(32) unsigned NOT NULL COMMENT '用户ID',
  `Commit` varchar(105) NOT NULL COMMENT '评论内容',
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  PRIMARY KEY (`Num`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commit`
--

LOCK TABLES `commit` WRITE;
/*!40000 ALTER TABLE `commit` DISABLE KEYS */;
INSERT INTO `commit` VALUES (1,1,'HelloWorld','2024-06-06 08:52:27'),(2,1,'HelloWorld2','2024-06-06 08:52:44'),(3,2,'还行','2024-06-06 13:49:55'),(4,3,'これはいくらですか？','2024-06-06 14:07:53'),(5,1,'<img src=\"localhost/../../memes/b_0001.png\" class=\"Commit-Meme\">好好好','2024-06-10 23:06:07');
/*!40000 ALTER TABLE `commit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(16) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `UserName` varchar(32) NOT NULL DEFAULT '注册用户' COMMENT '用户名',
  `MakeTime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `Sex` enum('男','女','秀吉','武装直升机','沃尔玛购物袋','无') NOT NULL COMMENT '性别',
  `Resume` varchar(256) DEFAULT '这人是条懒狗，什么都没有说。' COMMENT '简介',
  `Email` varchar(64) DEFAULT ' ' COMMENT '邮箱',
  `Birthday` date DEFAULT '1970-01-01' COMMENT '生日',
  `Head` char(64) NOT NULL DEFAULT '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9' COMMENT '头像(文件路径)',
  `Hash` char(64) DEFAULT NULL COMMENT '用户哈希(SHA256),用于验证用户。用户ID+用户名+用户密码,所以保存好你的密码，因为站长也不知道你的密码',
  `TAG` set('成员','会员','站长') DEFAULT '成员' COMMENT '"地位"',
  `STATE` enum('正常','封禁','注销','') DEFAULT '正常' COMMENT '用户状态',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Koizumi','2024-05-09 10:06:39','男','是站长呢.','koizumi.369c@outlook.com','1969-12-31','6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b','bc53fa07a53cedcb198f162bc6865dbc1daeb07f2dfbcc98c5dd707aec52535a','站长','正常'),(2,'璟','2024-05-09 10:06:39','沃尔玛购物袋','这人是条懒狗，什么都没有说。','1413661607@qq.com','1997-01-01','5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9','cc2e192918dab70af92bbd1946a5a93c6859db90acf0a70e7db713f0b20adb34','会员','正常'),(3,'博麗霊夢','2024-05-15 20:47:24','女','博麗神社のみこ','',NULL,'4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce','1ac825982f47706e0964028b0d8a608394ec9c8af1c1dec13deb1d7af5b7c084','成员','正常'),(4,'123456','2024-06-04 22:12:13','男','这人是条懒狗，什么都没有说。','11111@123','1999-01-01','5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9','01af77be85b3cb5f3a40ae3a08e71243a50480ae4aaeca01a6592b5805021c08','成员','正常'),(5,'チルノ','2024-06-10 01:03:03','女','⑨','',NULL,'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d','9f142ea70b187ac2dccab117c5913d29a1da21fee2c29f4acc3f3712b2f20b35','成员','正常'),(6,'霧雨魔理沙','2024-06-10 01:05:22','女','Sorceress','',NULL,'e7f6c011776e8db7cd330b54174fd76f7d0216b612387a5ffcfb81e6f0919683','5b705a8d99139b287227c4cd866a9b0267e70a4b429f249184e8f021b23e02ff','成员','正常'),(7,'鈴仙優曇華院イナバ','2024-06-10 01:09:52','女','月战老兵','',NULL,'7902699be42c8a8e46fbbb4501726517e86b22c56a189f7625a6da49081b2451','bd0b41aaf08dd4c9586a865c95e109f13ae865469509065240da256e143cb275','成员','正常'),(8,'西行寺幽々子','2024-06-10 01:15:39','女','幽冥楼閣の亡霊少女','',NULL,'2c624232cdd221771294dfbb310aca000a0df6ac8b66b696d90ef06fdefb64a3','454bd006adc6fcc516e7bd1ef6cc5ab1ff8362fe65b8861493873f8422ed38e4','成员','正常'),(9,'小鳥遊ホシノ','2024-06-10 01:31:53','女','お昼寝にちょうどいい場所はどこかな～','','2007-01-02','19581e27de7ced00ff1ce50b2047e7a567c76b1cbaebabe5ef03f7c3017bb5b7','0f7b783d1b6efcdaab02e37ab86b759f3dac7c3c43d29f92e644a781e4980d84','成员','正常'),(10,'Akashi','2024-06-10 01:36:44','女','指揮官どうしたにゃ…まさか壊れちゃった？修理するかにゃ？','','1938-06-29','4a44dc15364204a80fe80e9039455cc1608281820fe2b24f1e5233ade6af1dd5','715f9e67b8a6aa71ac640dc5662eda10c19cf62583c109906e50bf4a460810be','成员','正常'),(11,'世界の山田','2024-06-10 01:56:00','女','お金お金お金お金お金お金','','2005-09-18','4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8','1ca584bd79fa7e93692542a03945928e4b8c4e8927366309bd8c7c2d510d6b2c','成员','正常');
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

-- Dump completed on 2024-06-10 23:10:33
