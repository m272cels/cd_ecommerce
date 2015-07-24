CREATE DATABASE  IF NOT EXISTS `dojo_ecommerce` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dojo_ecommerce`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dojo_ecommerce
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `fk_products_has_carts_products1_idx` (`product_id`),
  KEY `fk_cart_items_users1_idx` (`user_id`),
  CONSTRAINT `fk_products_has_carts_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_items_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Lamps','2015-07-21 10:31:55','2015-07-21 10:31:55'),(2,'Watches','2015-07-21 10:31:55','2015-07-21 10:31:55'),(3,'Tools','2015-07-21 10:31:55','2015-07-21 10:31:55'),(4,'Blankets','2015-07-22 15:32:38',NULL),(8,'Shoes','2015-07-22 15:37:42',NULL),(9,'Phones','2015-07-22 15:37:51',NULL),(10,'Monitors','2015-07-22 15:38:10',NULL),(11,'Coffee','2015-07-22 15:38:16',NULL),(12,'Keyboards','2015-07-22 15:38:25',NULL),(13,'Granola bars','2015-07-22 15:38:33',NULL),(14,'Books','2015-07-22 15:40:13',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendships`
--

DROP TABLE IF EXISTS `friendships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendships` (
  `friend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`friend_id`,`user_id`),
  KEY `fk_users_has_users_users1_idx` (`friend_id`),
  KEY `fk_users_has_users_users_idx` (`user_id`),
  CONSTRAINT `fk_users_has_users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendships`
--

LOCK TABLES `friendships` WRITE;
/*!40000 ALTER TABLE `friendships` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailing_info`
--

DROP TABLE IF EXISTS `mailing_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailing_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zipcode` char(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailing_info`
--

LOCK TABLES `mailing_info` WRITE;
/*!40000 ALTER TABLE `mailing_info` DISABLE KEYS */;
INSERT INTO `mailing_info` VALUES (1,'Michael','Choi','123 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02'),(2,'Jimmy','Jun','234 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02'),(3,'Eduardo','Baik','345 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02'),(4,'Dummy','Dumb','1234 Dumb Ln.','','San Jose','CA','91412','2015-07-22 19:09:40','2015-07-22 19:09:40'),(5,'Dummy','Dumb','1234 Dumb Ln.','','San Jose','CA','91412','2015-07-22 19:09:40','2015-07-22 19:09:40'),(6,'Alison','Brie','69 Hollyhood Dr.','','Hollywood','CA','91234','2015-07-22 19:23:12','2015-07-22 19:23:12'),(7,'Alison','Brie','69 Hollyhood Dr.','','Hollywood','CA','91234','2015-07-22 19:23:12','2015-07-22 19:23:12'),(8,'Emma','Watson','111 Beverly Hills Dr.','','Beverly Hills','CA','91239','2015-07-22 19:53:46','2015-07-22 19:53:46'),(9,'Emma','Watson','111 Beverly Hills Dr.','','Beverly Hills','CA','91239','2015-07-22 19:53:46','2015-07-22 19:53:46'),(10,'Alison','Brie','1237 ppop dr.','','blah','CA','91238','2015-07-23 09:34:17','2015-07-23 09:34:17'),(11,'Alison','Brie','1237 ppop dr.','','blah','CA','91238','2015-07-23 09:34:17','2015-07-23 09:34:17'),(12,'Channing ','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 11:37:55','2015-07-24 11:37:55'),(13,'Channing ','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 11:37:55','2015-07-24 11:37:55'),(14,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91241','2015-07-24 11:59:25','2015-07-24 11:59:25'),(15,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91241','2015-07-24 11:59:25','2015-07-24 11:59:25'),(16,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:09:15','2015-07-24 13:09:15'),(17,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:09:15','2015-07-24 13:09:15'),(18,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:10:05','2015-07-24 13:10:05'),(19,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:10:05','2015-07-24 13:10:05'),(20,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:11:37','2015-07-24 13:11:37'),(21,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:11:37','2015-07-24 13:11:37'),(22,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:12:25','2015-07-24 13:12:25'),(23,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:12:25','2015-07-24 13:12:25'),(24,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:13:43','2015-07-24 13:13:43'),(25,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:13:43','2015-07-24 13:13:43'),(26,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:14:06','2015-07-24 13:14:06'),(27,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:14:06','2015-07-24 13:14:06'),(28,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:14:46','2015-07-24 13:14:46'),(29,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:14:46','2015-07-24 13:14:46'),(30,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:21:03','2015-07-24 13:21:03'),(31,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:21:03','2015-07-24 13:21:03'),(32,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:21:10','2015-07-24 13:21:10'),(33,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:21:10','2015-07-24 13:21:10'),(34,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:22:00','2015-07-24 13:22:00'),(35,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:22:00','2015-07-24 13:22:00'),(36,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:25:07','2015-07-24 13:25:07'),(37,'Channing','Tatum','123 Balls Dr.','','Hollyhood','CA','91231','2015-07-24 13:25:07','2015-07-24 13:25:07'),(38,'Channing ','tat','123 Balls Dr.','','Hollyhood','CA','12314','2015-07-24 13:31:11','2015-07-24 13:31:11'),(39,'Channing ','tat','123 Balls Dr.','','Hollyhood','CA','12314','2015-07-24 13:31:11','2015-07-24 13:31:11'),(40,'Jordan','','','','','','','2015-07-24 13:40:17','2015-07-24 13:40:17'),(41,'Jordan','','','','','','','2015-07-24 13:40:17','2015-07-24 13:40:17'),(42,'','','','','','','','2015-07-24 13:41:07','2015-07-24 13:41:07'),(43,'','','','','','','','2015-07-24 13:41:07','2015-07-24 13:41:07');
/*!40000 ALTER TABLE `mailing_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`,`order_id`),
  KEY `fk_products_has_orders_orders1_idx` (`order_id`),
  KEY `fk_products_has_orders_products1_idx` (`product_id`),
  CONSTRAINT `fk_products_has_orders_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_orders_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,'2015-07-21 14:57:29','2015-07-21 14:57:29'),(1,2,4,'2015-07-22 19:09:40','2015-07-22 19:09:40'),(2,2,1,'2015-07-22 19:09:40','2015-07-22 19:09:40'),(2,4,1,'2015-07-22 19:53:46','2015-07-22 19:53:46'),(2,5,3,'2015-07-23 09:34:17','2015-07-23 09:34:17'),(3,2,3,'2015-07-22 19:09:40','2015-07-22 19:09:40'),(3,3,3,'2015-07-22 19:23:12','2015-07-22 19:23:12'),(3,4,3,'2015-07-22 19:53:46','2015-07-22 19:53:46'),(4,3,3,'2015-07-22 19:23:12','2015-07-22 19:23:12'),(5,2,3,'2015-07-22 19:09:40','2015-07-22 19:09:40'),(5,4,3,'2015-07-22 19:53:46','2015-07-22 19:53:46'),(6,5,2,'2015-07-23 09:34:17','2015-07-23 09:34:17'),(6,7,1,'2015-07-24 13:40:34','2015-07-24 13:40:34'),(7,5,2,'2015-07-23 09:34:17','2015-07-23 09:34:17'),(8,3,10,'2015-07-22 19:23:12','2015-07-22 19:23:12'),(9,3,5,'2015-07-22 19:23:12','2015-07-22 19:23:12'),(10,6,2,'2015-07-24 13:37:43','2015-07-24 13:37:43'),(12,6,2,'2015-07-24 13:37:43','2015-07-24 13:37:43'),(17,8,1,'2015-07-24 13:41:25','2015-07-24 13:41:25');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shipping_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`id`,`shipping_id`,`billing_id`,`user_id`),
  KEY `fk_orders_shippings1_idx` (`shipping_id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  KEY `fk_orders_mailing_info1_idx` (`billing_id`),
  CONSTRAINT `fk_orders_mailing_info1` FOREIGN KEY (`billing_id`) REFERENCES `mailing_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shippings1` FOREIGN KEY (`shipping_id`) REFERENCES `mailing_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'shipped','0000-00-00 00:00:00','0000-00-00 00:00:00',1,1,1,30.99),(2,'Order in process','2015-07-22 19:09:40','2015-07-22 19:09:40',4,5,1,185.86),(3,'Order in process','2015-07-22 19:23:12','2015-07-22 19:23:12',6,7,3,112.26),(4,'shipped','2015-07-22 19:53:46','2015-07-22 19:53:46',8,9,4,61.90),(5,'Need to ship','2015-07-23 09:34:17','2015-07-23 09:34:17',10,11,3,2235.93),(6,'Order in process','2015-07-24 13:37:43','2015-07-24 13:37:43',38,39,8,220.88),(7,'Need to ship','2015-07-24 13:40:34','2015-07-24 13:40:34',40,41,8,80.99),(8,'Need to ship','2015-07-24 13:41:25','2015-07-24 13:41:25',42,43,8,12.97);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`product_id`),
  KEY `fk_photos_products1_idx` (`product_id`),
  CONSTRAINT `fk_photos_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'cherryblossomlamp1.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(2,'cherryblossomlamp2.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(3,'cherryblossomlamp3.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(4,'2pk-mini-touch1.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(5,'2pk-mini-touch2.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(6,'2pk-mini-touch3.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(7,'kirkland_coffee1.jpg','kirkland_coffee1.jpg','2015-07-22 16:25:26','2015-07-22 16:25:26',3),(8,'kirkland_coffee2.jpg','kirkland_coffee1.jpg','2015-07-22 16:25:32','2015-07-22 16:25:32',3),(9,'kirkland_coffee3.jpg','kirkland_coffee3.jpg','2015-07-22 16:25:38','2015-07-22 16:25:38',3),(10,'starbucks1.png','starbucks1.jpg','2015-07-22 16:32:11','2015-07-22 16:32:11',4),(11,'starbucks2.jpg','starbucks2.jpg','2015-07-22 16:32:23','2015-07-22 16:32:23',4),(12,'starbucks3.jpg','starbucks3.jpg','2015-07-22 16:32:29','2015-07-22 16:32:29',4),(13,'granola1.jpg','granola1.jpg','2015-07-22 16:38:16','2015-07-22 16:38:16',5),(14,'granola2.jpg','granola2.jpg','2015-07-22 16:38:21','2015-07-22 16:38:21',5),(15,'granola3.jpg','granola3.jpg','2015-07-22 16:38:26','2015-07-22 16:38:26',5),(16,'bw1.jpg','bw1.jpg','2015-07-22 16:48:22','2015-07-22 16:48:22',6),(17,'bw2.jpg','bw2.jpg','2015-07-22 16:48:28','2015-07-22 16:48:28',6),(18,'bw3.jpg','bw3.jpg','2015-07-22 16:48:32','2015-07-22 16:48:32',6),(19,'aw1.jpg','aw1.jpg','2015-07-22 16:51:12','2015-07-22 16:51:12',7),(20,'aw2.jpg','aw2.jpg','2015-07-22 16:51:16','2015-07-22 16:51:16',7),(21,'aw3.jpg','aw3.jpg','2015-07-22 16:51:20','2015-07-22 16:51:20',7),(22,'screw1.jpg','screw1.jpg','2015-07-22 16:55:53','2015-07-22 16:55:53',8),(23,'screw2.jpg','screw2.jpg','2015-07-22 16:55:56','2015-07-22 16:55:56',8),(24,'screw3.jpg','screw3.jpg','2015-07-22 16:56:00','2015-07-22 16:56:00',8),(26,'blanket1.jpg','blanket1.jpg','2015-07-22 16:58:27','2015-07-22 16:58:27',9),(27,'blanket2.jpg','blanket2.jpg','2015-07-22 16:58:34','2015-07-22 16:58:34',9),(28,'blanket3.jpg','blanket3.jpg','2015-07-22 16:58:40','2015-07-22 16:58:40',9),(29,'blanket21.jpg','blanket21','2015-07-24 10:41:40','2015-07-24 10:41:40',10),(30,'blanket22.jpg','blanket22','2015-07-24 10:41:53','2015-07-24 10:41:53',10),(31,'blanket32.jpg','blanket32','2015-07-24 10:42:02','2015-07-24 10:42:02',10),(32,'blanket24.jpg','blanket24','2015-07-24 10:42:12','2015-07-24 10:42:12',10),(33,'blanketwhite1.jpg','blanketwhite1','2015-07-24 10:45:53','2015-07-24 10:45:53',11),(34,'blanketwhite2.jpg','blanketwhite2','2015-07-24 10:46:11','2015-07-24 10:46:11',11),(35,'pinzonblanket1.jpg','pinzonblanket1','2015-07-24 10:51:51','2015-07-24 10:51:51',12),(36,'pinzonblanket2.jpg','pinzonblanket2','2015-07-24 10:51:59','2015-07-24 10:51:59',12),(37,'pinzonblanket3.jpg','pinzonblanket3','2015-07-24 10:52:37','2015-07-24 10:52:37',12),(38,'pinzonblanket4.jpg','pinzonblanket4','2015-07-24 10:52:40','2015-07-24 10:52:40',12),(39,'camcoblanket1.jpg','camcoblanket1','2015-07-24 10:57:02','2015-07-24 10:57:02',13),(40,'camcoblanket2.jpg','camcoblanket2','2015-07-24 10:57:05','2015-07-24 10:57:05',13),(41,'camcoblanket3.jpg','camcoblanket3','2015-07-24 10:57:12','2015-07-24 10:57:12',13),(42,'camcoblanket4.jpg','camcoblanket4','2015-07-24 10:57:15','2015-07-24 10:57:15',13),(43,'kindbar1.jpg','kindbar1','2015-07-24 11:01:15','2015-07-24 11:01:15',14),(44,'kindbar2.jpg','kindbar2','2015-07-24 11:01:18','2015-07-24 11:01:18',14),(45,'kindbar3.jpg','kindbar3','2015-07-24 11:01:21','2015-07-24 11:01:21',14),(46,'kashigranola1.jpg','kashigranola1','2015-07-24 11:06:16','2015-07-24 11:06:16',15),(47,'kashigranola2.jpg','kashigranola2','2015-07-24 11:06:19','2015-07-24 11:06:19',15),(48,'kashigranola3.jpg','kashigranola3','2015-07-24 11:06:22','2015-07-24 11:06:22',15),(49,'sweetbar1.jpg','sweetbar1','2015-07-24 11:12:38','2015-07-24 11:12:38',16),(50,'sweetbar2.jpg','sweetbar2','2015-07-24 11:12:41','2015-07-24 11:12:41',16),(51,'sweetbar3.jpg','sweetbar3','2015-07-24 11:12:45','2015-07-24 11:12:45',16),(52,'casio1.jpg','casio1','2015-07-24 11:18:18','2015-07-24 11:18:18',17),(53,'casio2.jpg','casio2','2015-07-24 11:18:23','2015-07-24 11:18:23',17),(54,'casio3.jpg','casio3','2015-07-24 11:18:26','2015-07-24 11:18:26',17),(55,'aj1.jpg','aj1.jpg','2015-07-24 15:36:48','2015-07-24 15:36:48',18),(56,'aj2.jpg','aj2.jpg','2015-07-24 15:37:04','2015-07-24 15:37:04',18),(57,'aj3.jpg','aj3.jpg','2015-07-24 15:37:09','2015-07-24 15:37:09',18),(58,'am1.jpg','am1.jpg','2015-07-24 15:40:23','2015-07-24 15:40:23',19),(59,'am2.jpg','am2.jpg','2015-07-24 15:40:29','2015-07-24 15:40:29',19),(60,'am3.jpg','am3.jpg','2015-07-24 15:40:33','2015-07-24 15:40:33',19);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(19,2) DEFAULT NULL,
  `count_in_stock` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `main_photo_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`category_id`),
  KEY `fk_products_categories1_idx` (`category_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Cherry Blossom Tree Lamp2','blahblahblah',30.99,20,'2015-07-21 16:02:35','2015-07-23 20:16:35',1,1),(2,'Mini Touch Lamps (2 PACK)','blahblahblah',24.99,50,'2015-07-21 16:02:35','2015-07-21 16:02:35',4,1),(3,'Kirkland Coffee','The best coffee to help you code!',9.99,0,'2015-07-22 16:21:47','2015-07-22 16:21:47',7,11),(4,'Starbucks House Blend','Do not drink it. Literally poison',9.98,50,'2015-07-22 16:31:44','2015-07-22 16:31:44',10,11),(5,'Kirkland Chewy Granola Bar','You will get so sick of it, yet will keep eating it',1.98,50,'2015-07-22 16:37:59','2015-07-22 16:37:59',13,13),(6,'Razor Black Widow Mechanical Keyboard','With the awesome power of Blue Cherry MX switches, you will increase your coding rate by 12%!',79.99,0,'2015-07-22 16:48:07','2015-07-22 16:48:07',16,12),(7,'Apple Watch','Basically, if you are a tool, but it!',999.99,0,'2015-07-22 16:50:57','2015-07-22 16:50:57',19,2),(8,'Screw','it\'s a damn screw',0.09,0,'2015-07-22 16:55:40','2015-07-22 16:55:40',22,3),(9,'Blanket','Boring blanket',10.09,50,'2015-07-22 16:58:24','2015-07-22 16:58:24',26,4),(10,'JJ Cole All-Purpose Blanket','The Blanket is great for the whole family at any occasion. Lay it out at the park, the beach, and even sporting events. Its durable outer fabric is ideal for any surface, and the inner lining quickly wipes clean. The blanket measures 5 ft x 5 ft when opened and is made with water-resistant material that\'s perfect for any outing. The blanket is stylish and compact when folded and features a detachable strap and sturdy sewn-in insert to make folding easy.',29.95,-1,'2015-07-24 10:40:13','2015-07-24 10:40:13',29,4),(11,'Tache White Ivory Super Soft Blanket','Snuggle up by the fire or in bed with our amazingly warm cruelty free faux fur throw. Perfect for freezing nights to overnight guest and everything in between. This elegant cream throw will add a elegant look to any room',43.98,100,'2015-07-24 10:45:01','2015-07-24 10:45:01',33,4),(12,'Pinzon Brushed Cotton Waffle Blanket, King, Aqua','Made of 100% brushed cotton, the blanket offers exceptional softness and breathability for warmth without all the weight. Even more, the blanket\'s all-over waffle weave enhances visual interest and adds texture that\'s soothing to the touch. A 1-1/2-inch hem on all sides creates a neatly tailored look and promotes quality for years to come.',79.99,-1,'2015-07-24 10:50:20','2015-07-24 10:50:20',35,4),(13,'Camco Picnic Blanket (51\" x 59\", Red/White)','Camco\'s Picnic Blanket is great for outdoor outings such as picnics, tailgating, camping or as an emergency blanket in your RV. It measures 51 x 59 and is red and white. Its durable waterproof backing with foam cushioning adds comfort and insulation. The hoop-and-loop fastener keeps the blanket folded for storage. It folds compactly to 3 x 8.5 x 13.',11.20,100,'2015-07-24 10:56:14','2015-07-24 10:56:14',39,4),(14,'KIND Healthy Grains Granola Bars, Variety Pack, 1.2oz Bars, 15 Count','KIND Healthy Grains Bar Variety Pack includes Maple Pumpkin Seeds with Sea Salt, Double Dark Chocolate Chunk, and Peanut Butter Dark Chocolate assortments.\nKIND worked tirelessly to reach a perfect granola bar texture, delivering a unique combination of chewy and crunchy, so you never have to choose between the two.',9.99,100,'2015-07-24 11:00:14','2015-07-24 11:00:14',43,13),(15,'Kashi Chewy Granola Bars 6 Count','Our chewy granola bars are truly lovable. They bring our unique blend of Seven Whole Grains and Sesame together with whole, roasted nuts, succulent, sun-dried fruit, and a touch of wildflower honey. And with 4g of Fiber* and 6g of Protein, they are as nourishing as they are tasty. (*4g fat per serving)',2.98,100,'2015-07-24 11:05:27','2015-07-24 11:05:27',46,13),(16,'Nature Valley Sweet and Salty Nut Granola Bars, Cashew, 6 Count','Nature Valley Sweet & Salty Cashew Granola Bars offer a perfect balance of savory nuts and sweet granola. Each bar is bursting with nuts and dipped in a creamy cashew-butter coating.',2.50,100,'2015-07-24 11:11:57','2015-07-24 11:11:57',49,13),(17,'Casio Men\'s MQ24-1E Black Resin Watch','Quartz movement, Casual watch, Gold-tone hands and indexes, Black polyurethane bezel and case, Stainless steel crown, selector button and caseback, 30 meters/100 feet water resistant.\nThe basic black-and-gold design of the Casio Men\'s Analog Watch makes it a simple, versatile timepiece great for everyday wear. The watch is constructed with a resin case, a black stationary resin bezel, and a comfortable black rubber bracelet with an adjustable buckle clasp. A durable mineral window protects the black dial face, which cleanly features gold-tone hour indexes, gold-tone minute markers, and complementary watch hands.',11.97,0,'2015-07-24 11:17:16','2015-07-24 11:17:16',52,2),(18,'Air Jordans','These shoes are so damn fly.\nCome on and jam. And welcome to the slam.',299.97,23,'2015-07-24 15:31:42','2015-07-24 15:43:58',55,8),(19,'Asus Monitor','It\'s like, totally vibrant and stuff or something.',199.23,3,'2015-07-24 15:39:01','2015-07-24 15:42:01',58,10);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_has_tags`
--

DROP TABLE IF EXISTS `products_has_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_has_tags` (
  `tag_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `fk_products_has_categories_categories1_idx` (`tag_id`),
  CONSTRAINT `fk_products_has_categories_categories1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_has_tags`
--

LOCK TABLES `products_has_tags` WRITE;
/*!40000 ALTER TABLE `products_has_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_has_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review` text,
  `rating` int(11) DEFAULT NULL,
  `helpful` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`products_id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  KEY `fk_reviews_products1_idx` (`products_id`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (10,'This coffee sucked balls',5,0,'2015-07-23 19:40:34','2015-07-23 19:40:34',3,3),(11,'New review',5,0,'2015-07-23 20:52:45','2015-07-23 20:52:45',3,4),(14,'This coffee is dope',5,0,'2015-07-23 21:24:07','2015-07-23 21:24:07',7,3),(17,'Kirkland brand sucks',0,0,'2015-07-23 22:27:24','2015-07-23 22:27:24',4,3),(18,'best keyboard ever',5,0,'2015-07-24 10:20:46','2015-07-24 10:20:46',7,6),(19,'This is the dope shit',4,0,'2015-07-24 15:51:48','2015-07-24 15:51:48',5,7);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'mchoi@codingdojo.com','xxx','xxx',1,'2015-07-21 11:22:46','2015-07-21 11:22:46'),(2,NULL,'1@gmail.com','f4e559c874fd1278f4abbcfef1e8baf7','ac720b3495fb80e2cf2c667ef7bfad157e89532d2456',NULL,'2015-07-22 10:17:16',NULL),(3,'abrie','abrie@gmail.com','e4443cef26b8f0d00ac473306e60db50','ab5b8c04ac7e202b32ef1bff8a60f5d2c4a4a3a87936',NULL,'2015-07-22 19:13:16',NULL),(4,'ewats','ewats@gmail.com','04b2a50e87c662a24288fb578a2ffc0f','e43d5a70484aa0d292cde7ae46e5ff5f9819cfe12a57',NULL,'2015-07-22 19:51:17',NULL),(5,'jmtom','jmtom86@yahoo.com','06da2613ffb8d2693334c95f81a4f508','32abc463c871ddfedf820791817c10b3bd0b7f25400c',1,'2015-07-22 19:58:09',NULL),(6,NULL,'jesus@gmail.com','a7cf97e76ecdcca529ea73bada7012c2','a027cb9033b74c1a8db44b910f9c1f75bf12698a5fe9',NULL,'2015-07-23 20:08:44',NULL),(7,'youngmoney','yg@gmail.com','9a229355adcaba2d506a8a7771f0c8b8','e1056a84dafc9ac2a35c5b884f667ab2275abe088750',NULL,'2015-07-23 20:15:56',NULL),(8,'bigblack','bbw@gmail.com','148a0d3a234111d040c170f531658f1b','c2f38f660f3061635180b70e3bd6141707054771f05d',NULL,'2015-07-24 10:30:37',NULL),(9,'newuser','nw@gmail.com','477c291108f68ef393eabd674cf45351','216cc6f625870457a752984aa0e4dce4ee200e1f605d',NULL,'2015-07-24 10:32:44',NULL);
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

-- Dump completed on 2015-07-24 15:54:30
