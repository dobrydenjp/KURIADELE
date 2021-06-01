-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: KURIADELE
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'栗田佳敬','kuriadele@gmail.com','0','2021-02-09 06:57:50');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `NO` varchar(255) NOT NULL,
  `kana_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (45,'りそな銀行','東京支店','当座','1234567','ﾔﾏｸﾞﾁ ｹﾝﾀ','2021-04-01 05:10:53'),(46,'東京三菱UFJ銀行','福岡支店','当座','1234567','ﾌｸｼﾏ ﾉﾘﾀｶ','2021-05-06 07:57:56'),(47,'東京三菱UFJ銀行','福岡支店','普通','1234567','ﾀﾅｶ ｹﾝﾀ','2021-05-06 07:58:23'),(48,'りそな銀行','東京支店','当座','1234567','ﾅｶﾀ ﾋﾛｷ','2021-05-06 08:00:02'),(49,'三井住友銀行','東京支店','普通','1234567','ｸﾘﾀ ﾖｼﾀｶ','2021-05-12 08:42:10'),(50,'りそな銀行','福岡支店','普通','1234567','ｻｻｷ ｹﾝﾀ','2021-05-13 03:32:57'),(51,'りそな銀行','福岡支店','普通','1234567','ｻｻｷ ｹﾝﾀ','2021-05-20 03:08:04'),(52,'りそな銀行','福岡支店','普通','1234567','ｻｻｷ ｹﾝﾀ','2021-05-20 03:15:23'),(53,'りそな銀行','福岡支店','普通','1234567','ｻｻｷ ｹﾝﾀ','2021-05-22 08:18:41'),(54,'りそな銀行','福岡支店','普通','1234567','ｻｻｷ ｹﾝﾀ','2021-05-22 08:18:47');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,159,0,6,'2021-05-25 05:29:03');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companys`
--

DROP TABLE IF EXISTS `companys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `greeting` varchar(1000) NOT NULL,
  `plan` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companys`
--

LOCK TABLES `companys` WRITE;
/*!40000 ALTER TABLE `companys` DISABLE KEYS */;
INSERT INTO `companys` VALUES (5,'カメラが趣味で始めた会社です\r\n好きすぎて通販事業を始めました。よろしくお願い致します。                                          ','こんにちは ','カメラ以外の事業拡','2021-03-11 05:08:04'),(6,'','','','2021-03-12 06:56:25'),(7,'1','1','1','2021-03-12 06:56:32'),(8,'こんにちは','こんにちは','こんにちは','2021-03-12 07:08:26'),(9,'あいうえお','アイウエオ','123456','2021-03-12 07:09:38'),(10,'アイウエオ','あいうえお','123456','2021-03-12 07:10:57'),(11,'123','こんにちは','こんにちは','2021-03-12 07:12:30'),(12,'123','こんにちは','123456','2021-03-12 07:13:21'),(13,'123','こんにちは','こんにちは','2021-03-12 07:14:34'),(14,'123','こんにちは','こんにちは','2021-03-12 07:15:43'),(15,'123','こんにちは','こんにちは','2021-03-12 07:16:59'),(16,'','','','2021-03-12 07:31:57'),(17,'','','','2021-03-12 07:32:02'),(18,'','','','2021-03-12 07:38:20'),(19,'','','','2021-03-12 07:38:30'),(20,'123','','','2021-03-12 07:50:18'),(21,'123','','','2021-03-12 07:51:03'),(22,'あいうえお','あいうえお','123456','2021-03-12 07:55:57'),(23,'こんにちは','こんにちは','こんにちは','2021-03-12 07:59:56'),(24,'こんにちは','こんばんは。','はい','2021-03-13 06:04:29'),(25,'会社です','こんにちは','こんにちは','2021-04-01 05:48:09'),(26,'カメラを取扱う企業です','こんにちは','こんにちは','2021-04-27 07:24:02'),(27,'頑張ります','こんにちは','こんにちは','2021-05-06 07:52:25'),(28,'HELLO','こんにちは','こんにちは','2021-05-06 07:54:56'),(29,'頑張ります','こんにちは','こんにちは','2021-05-07 04:26:31'),(30,'事業拡大予定です','こんにちは','拡大','2021-05-12 08:40:27'),(31,'HP公開しました','こんにちは','拡大予定','2021-05-13 03:31:04'),(32,'カメラの通信販売','こんにちは','拡大予定','2021-05-20 03:11:28'),(33,'カメラの通信販売','こんにちは','拡大予定','2021-05-20 03:12:00'),(34,'a','こんにちは','拡大予定','2021-05-20 03:13:14');
/*!40000 ALTER TABLE `companys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'','','','','2021-03-13 05:49:52'),(2,'馬場　葉月','カメラ','内容','m.51-yamaa-ob-.-@i.softbank.jp','2021-03-13 05:51:43'),(3,'清水　翔太','カメラ','質問','123@docomo.co.jp','2021-03-15 13:55:42'),(4,'清水　翔太','カメラ','質問','123@docomo.co.jp','2021-03-15 13:59:31'),(5,'岡本　太郎','カメラ','内容','987654-123@i.softbank.jp','2021-03-15 13:59:47'),(6,'馬場　葉月','カメラ','質問です\r\n','m.51-yamaa-ob-.-@i.softbank.jp','2021-03-19 05:01:13'),(7,'ヤマダ　タロウ','あいうえお','こんにちは','m.51-yamaa-ob-.-@i.softbank.jp','2021-04-01 05:53:16'),(8,'馬場　葉月','カメラ','問い合わせ\r\n','m.51-yamaa-ob-.-@i.softbank.jp','2021-04-08 14:45:32'),(9,'佐々木　美香','カメラ','商品はいつ頃届きますか？','8-1@i.softbank.jp','2021-04-26 10:08:42'),(10,'馬場　葉月','カメラ','質問です','m.51-yamaa-ob-.-@i.softbank.jp','2021-05-06 02:02:32'),(11,'馬場　葉月','カメラ','質問です','m.51-yamaa-ob-.-@i.softbank.jp','2021-05-06 06:08:18'),(12,'馬場　葉月','カメラ','situmon','m.51-yamaa-ob-.-@i.softbank.jp','2021-05-06 06:10:26'),(13,'中山　博','カメラ','あいうえお','112233@i.softbank.jp','2021-05-06 06:10:59'),(14,'馬場　葉月','カメラ','あ','m.51-yamaa-ob-.-@i.softbank.jp','2021-05-20 03:19:30'),(15,'馬場　葉月','カメラ','123','m.51-yamaa-ob-.-@i.softbank.jp','2021-05-20 03:20:28');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `kana_name` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'馬場　葉月','ババ　ハヅキ','454-0123','さいたま市見沼区蓮沼134-1　五反田ガーデン305','080-3303-1234','m.51-yamaa-ob-.-@i.softbank.jp','12345','2021-05-20 02:53:57'),(8,'中山　博','ナカヤマ　ヒロシ','123-5678','さいたま市見沼区蓮沼134-1　五反田ガーデン305','さいたま市見沼区蓮沼134-1　五反田ガーデン305','112233@i.softbank.jp','12345','2021-05-06 05:39:54'),(23,'中村　博','ナカムラ　ヒロシ','337-0015','さいたま市見沼区蓮沼134-1　五反田ガーデン305','048-000-0000','1234@i.softbank.jp','12345','2021-05-12 07:22:51'),(24,'山口　健太','ヤマグチ　ケンタ','337-0015','さいたま市見沼区蓮沼134-1　五反田ガーデン305','048-000-0000','123456@i.softbank.jp','12345','2021-05-12 07:32:20'),(25,'山本　太郎','ヤマモト','337-0000','さいたま市見沼区蓮沼134-1　五反田ガーデン305','048-000-0000','abc@i.softbank.jp','12345','2021-05-13 03:20:33'),(26,'田中　葉月','タナカ　ハヅキ','337-0015','さいたま市見沼区蓮沼134-1　五反田ガーデン305','048-989-0000','12345@i.softbank.jp','12345','2021-05-27 01:09:33');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (144,'カメラ','1886697726608bc1d86e6313.98956596.jpg',15000,10,'良い商品です','2021-05-25 05:38:01',0),(145,'カメラ','1822697805608bc1b4ce7b04.94083940.jpg',300000,50,'良い商品です','2021-05-21 09:46:21',1),(146,'カメラ','1886697726608bc1d86e6313.98956596.jpg',80000,1,'良い商品です','2021-05-27 02:27:28',1),(158,'ストラップ','2038698007608d78ca41ba16.16038278.jpg',1000,10,'良い商品です','2021-05-27 02:26:30',1),(159,'カメラ','22622880260939bf0e4d799.84301345.jpg',100000,1,'良い商品です','2021-05-27 02:36:13',1),(160,'カメラ','164886271060939c2e0bee58.21721466.jpg',80000,1,'良い商品です','2021-05-19 10:09:08',0),(161,'カメラ','61893081260939c580dcaa6.12863178.jpg',1000,3,'良い商品です','2021-05-21 11:05:53',1),(162,'カメラ','2058703955609b7c940c68c2.25750282.jpg',62000,1,'good','2021-05-19 08:38:59',0),(163,'カメラ','120971479609b8cbeb7dff1.65830211.jpg',15000,20,'良い商品です','2021-05-21 11:02:01',1),(164,'カメラ','261030162609c9be7bb6c62.31512509.jpg',100000,10,'良い商品です','2021-05-13 03:25:19',1),(165,'ストラップ','30904751460a341a5aacd29.49780093.jpg',1000,9,'良い商品です','2021-05-27 01:33:04',1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` date NOT NULL,
  `news` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'2021-03-31','HPアップロード','2021-04-01 05:16:02'),(2,'2021-03-31','HPアップロード','2021-04-14 03:19:26'),(3,'2021-03-31','HPアップロード','2021-04-30 08:45:17'),(4,'2021-03-31','HPアップロード','2021-05-06 07:43:42'),(5,'2021-03-31','HPアップロード','2021-05-06 07:43:44'),(6,'2021-03-31','HPアップロード','2021-05-06 07:43:46'),(7,'2021-03-31','HPアップロード','2021-05-06 07:44:07'),(8,'2021-03-31','HPアップロード','2021-05-06 07:44:36'),(9,'2021-03-31','HPアップロード','2021-05-06 07:54:32'),(10,'2021-03-31','HPアップロード','2021-05-11 07:46:29'),(11,'2021-03-31','HPアップロード','2021-05-12 08:38:38'),(12,'2021-05-12','HP 公開','2021-05-13 03:28:51'),(13,'2021-05-12','HP 公開','2021-05-20 03:07:33'),(14,'2021-05-12','HP 公開','2021-05-24 07:44:41'),(15,'2021-05-12','商品追加','2021-05-24 07:45:01'),(16,'2021-05-12','商品追加','2021-05-27 05:14:52');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,1,144,1,'2021-05-01 07:51:34'),(2,1,144,1,'2021-05-01 14:22:56'),(3,1,145,3,'2021-05-06 09:44:14'),(4,1,161,1,'2021-05-06 15:40:43'),(5,1,158,1,'2021-05-07 03:37:46'),(6,24,146,1,'2021-05-12 08:05:51'),(7,25,146,1,'2021-05-13 03:22:48'),(8,1,146,1,'2021-05-17 05:04:30'),(9,1,146,1,'2021-05-17 06:21:43'),(10,1,146,10,'2021-05-20 03:25:47'),(11,1,144,1,'2021-05-24 08:04:41'),(12,26,165,1,'2021-05-27 01:33:04'),(13,26,159,1,'2021-05-27 01:33:04');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-01  3:17:05
