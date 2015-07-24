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
INSERT INTO `categories` VALUES (1,'Lamps','2015-07-21 10:31:55','2015-07-21 10:31:55'),(2,'Watches','2015-07-21 10:31:55','2015-07-21 10:31:55'),(3,'Tools','2015-07-21 10:31:55','2015-07-21 10:31:55'),(4,'Blankets','2015-07-22 15:32:38',NULL),(8,'Shoes','2015-07-22 15:37:42',NULL),(9,'Phones','2015-07-22 15:37:51',NULL),(10,'Monitors','2015-07-22 15:38:10',NULL),(11,'Coffee','2015-07-22 15:38:16',NULL),(12,'Keyboards','2015-07-22 15:38:25',NULL),(13,'Granola bars','2015-07-22 15:38:33',NULL),(14,'Phones','2015-07-22 15:40:13',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailing_info`
--

LOCK TABLES `mailing_info` WRITE;
/*!40000 ALTER TABLE `mailing_info` DISABLE KEYS */;
INSERT INTO `mailing_info` VALUES (1,'Michael','Choi','123 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02'),(2,'Jimmy','Jun','234 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02'),(3,'Eduardo','Baik','345 Dojo Way','','San Jose','CA','95132','2015-07-21 11:21:02','2015-07-21 11:21:02');
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
INSERT INTO `order_items` VALUES (1,1,1,'2015-07-21 14:57:29','2015-07-21 14:57:29');
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
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`,`shipping_id`,`billing_id`,`user_id`),
  KEY `fk_orders_shippings1_idx` (`shipping_id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  KEY `fk_orders_mailing_info1_idx` (`billing_id`),
  CONSTRAINT `fk_orders_shippings1` FOREIGN KEY (`shipping_id`) REFERENCES `mailing_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_mailing_info1` FOREIGN KEY (`billing_id`) REFERENCES `mailing_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'shipped','0000-00-00 00:00:00','0000-00-00 00:00:00',1,1,1,30.99);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'cherryblossomlamp1.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(2,'cherryblossomlamp2.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(3,'cherryblossomlamp3.jpg','cherry blossom lamp','2015-07-21 10:40:43','2015-07-21 10:40:43',1),(4,'2pk-mini-touch1.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(5,'2pk-mini-touch2.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(6,'2pk-mini-touch3.jpg','2PK-lamp','2015-07-21 16:04:40','2015-07-21 16:04:40',2),(7,'kirkland_coffee1.jpg','kirkland_coffee1.jpg','2015-07-22 16:25:26','2015-07-22 16:25:26',3),(8,'kirkland_coffee2.jpg','kirkland_coffee1.jpg','2015-07-22 16:25:32','2015-07-22 16:25:32',3),(9,'kirkland_coffee3.jpg','kirkland_coffee3.jpg','2015-07-22 16:25:38','2015-07-22 16:25:38',3),(10,'starbucks1.png','starbucks1.jpg','2015-07-22 16:32:11','2015-07-22 16:32:11',4),(11,'starbucks2.jpg','starbucks2.jpg','2015-07-22 16:32:23','2015-07-22 16:32:23',4),(12,'starbucks3.jpg','starbucks3.jpg','2015-07-22 16:32:29','2015-07-22 16:32:29',4),(13,'granola1.jpg','granola1.jpg','2015-07-22 16:38:16','2015-07-22 16:38:16',5),(14,'granola2.jpg','granola2.jpg','2015-07-22 16:38:21','2015-07-22 16:38:21',5),(15,'granola3.jpg','granola3.jpg','2015-07-22 16:38:26','2015-07-22 16:38:26',5),(16,'bw1.jpg','bw1.jpg','2015-07-22 16:48:22','2015-07-22 16:48:22',6),(17,'bw2.jpg','bw2.jpg','2015-07-22 16:48:28','2015-07-22 16:48:28',6),(18,'bw3.jpg','bw3.jpg','2015-07-22 16:48:32','2015-07-22 16:48:32',6),(19,'aw1.jpg','aw1.jpg','2015-07-22 16:51:12','2015-07-22 16:51:12',7),(20,'aw2.jpg','aw2.jpg','2015-07-22 16:51:16','2015-07-22 16:51:16',7),(21,'aw3.jpg','aw3.jpg','2015-07-22 16:51:20','2015-07-22 16:51:20',7),(22,'screw1.jpg','screw1.jpg','2015-07-22 16:55:53','2015-07-22 16:55:53',8),(23,'screw2.jpg','screw2.jpg','2015-07-22 16:55:56','2015-07-22 16:55:56',8),(24,'screw3.jpg','screw3.jpg','2015-07-22 16:56:00','2015-07-22 16:56:00',8),(26,'blanket1.jpg','blanket1.jpg','2015-07-22 16:58:27','2015-07-22 16:58:27',9),(27,'blanket2.jpg','blanket2.jpg','2015-07-22 16:58:34','2015-07-22 16:58:34',9),(28,'blanket3.jpg','blanket3.jpg','2015-07-22 16:58:40','2015-07-22 16:58:40',9);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Cherry Blossom Tree Lamp','blahblahblah',30.99,20,'2015-07-21 16:02:35','2015-07-21 16:02:35',1,1),(2,'Mini Touch Lamps (2 PACK)','blahblahblah',24.99,50,'2015-07-21 16:02:35','2015-07-21 16:02:35',4,1),(3,'Kirkland Coffee','The best coffee to help you code!',9.99,50,'2015-07-22 16:21:47','2015-07-22 16:21:47',7,11),(4,'Starbucks House Blend','Do not drink it. Literally poison',9.98,50,'2015-07-22 16:31:44','2015-07-22 16:31:44',10,11),(5,'Kirkland Chewy Granola Bar','You will get so sick of it, yet will keep eating it',1.98,50,'2015-07-22 16:37:59','2015-07-22 16:37:59',13,13),(6,'Razor Black Widow Mechanical Keyboard','With the awesome power of Blue Cherry MX switches, you will increase your coding rate by 12%!',79.99,50,'2015-07-22 16:48:07','2015-07-22 16:48:07',16,12),(7,'Apple Watch','Basically, if you are a tool, but it!',999.99,50,'2015-07-22 16:50:57','2015-07-22 16:50:57',19,2),(8,'Screw','it\'s a damn screw',0.09,50,'2015-07-22 16:55:40','2015-07-22 16:55:40',22,3),(9,'Blanket','Boring blanket',10.09,50,'2015-07-22 16:58:24','2015-07-22 16:58:24',26,4);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
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
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mchoi@codingdojo.com','xxx','xxx',1,'2015-07-21 11:22:46','2015-07-21 11:22:46'),(2,'1@gmail.com','f4e559c874fd1278f4abbcfef1e8baf7','ac720b3495fb80e2cf2c667ef7bfad157e89532d2456',NULL,'2015-07-22 10:17:16',NULL);
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

-- Dump completed on 2015-07-22 17:07:50
