# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: test
# Generation Time: 2020-10-06 18:34:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `foodtruck_id` int(11) DEFAULT NULL,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `menu_id` (`menu_id`),
  KEY `foodtruck_id` (`foodtruck_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `food_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`foodtruck_id`) REFERENCES `foodtrucks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table commission_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commission_details`;

CREATE TABLE `commission_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_bill` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_commission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_commission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `foodtruck_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foodtruck_id` (`foodtruck_id`),
  CONSTRAINT `commission_details_ibfk_1` FOREIGN KEY (`foodtruck_id`) REFERENCES `foodtrucks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table cuisines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cuisines`;

CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `created_by` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table currencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`)
VALUES
	(1,'Leke','ALL','Lek',0,1),
	(2,'Dollars','USD','$',1,1),
	(3,'Afghanis','AFN','؋',0,1),
	(4,'Pesos','ARS','$',0,1),
	(5,'Guilders','AWG','ƒ',0,1),
	(6,'Dollars','AUD','$',1,1),
	(7,'New Manats','AZN','ман',0,1),
	(8,'Dollars','BSD','$',0,1),
	(9,'Dollars','BBD','$',0,1),
	(10,'Rubles','BYR','p.',0,0),
	(11,'Euro','EUR','€',1,1),
	(12,'Dollars','BZD','BZ$',0,1),
	(13,'Dollars','BMD','$',0,1),
	(14,'Bolivianos','BOB','$b',0,1),
	(15,'Convertible Marka','BAM','KM',0,1),
	(16,'Pula','BWP','P',0,1),
	(17,'Leva','BGN','лв',0,1),
	(18,'Reais','BRL','R$',1,1),
	(19,'Pounds','GBP','£',1,1),
	(20,'Dollars','BND','$',0,1),
	(21,'Riels','KHR','៛',0,1),
	(22,'Dollars','CAD','$',1,1),
	(23,'Dollars','KYD','$',0,1),
	(24,'Pesos','CLP','$',0,1),
	(25,'Yuan Renminbi','CNY','¥',0,1),
	(26,'Pesos','COP','$',0,1),
	(27,'Colón','CRC','₡',0,1),
	(28,'Kuna','HRK','kn',0,1),
	(29,'Pesos','CUP','₱',0,0),
	(30,'Koruny','CZK','Kč',1,1),
	(31,'Kroner','DKK','kr',1,1),
	(32,'Pesos','DOP ','RD$',0,1),
	(33,'Dollars','XCD','$',0,1),
	(34,'Pounds','EGP','£',0,1),
	(35,'Colones','SVC','$',0,0),
	(36,'Pounds','FKP','£',0,1),
	(37,'Dollars','FJD','$',0,1),
	(38,'Cedis','GHC','¢',0,0),
	(39,'Pounds','GIP','£',0,1),
	(40,'Quetzales','GTQ','Q',0,1),
	(41,'Pounds','GGP','£',0,0),
	(42,'Dollars','GYD','$',0,1),
	(43,'Lempiras','HNL','L',0,1),
	(44,'Dollars','HKD','$',1,1),
	(45,'Forint','HUF','Ft',1,1),
	(46,'Kronur','ISK','kr',0,1),
	(47,'Rupees','INR','Rs',1,1),
	(48,'Rupiahs','IDR','Rp',0,1),
	(49,'Rials','IRR','﷼',0,0),
	(50,'Pounds','IMP','£',0,0),
	(51,'New Shekels','ILS','₪',1,1),
	(52,'Dollars','JMD','J$',0,1),
	(53,'Yen','JPY','¥',1,1),
	(54,'Pounds','JEP','£',0,0),
	(55,'Tenge','KZT','лв',0,1),
	(56,'Won','KPW','₩',0,0),
	(57,'Won','KRW','₩',0,1),
	(58,'Soms','KGS','лв',0,1),
	(59,'Kips','LAK','₭',0,1),
	(60,'Lati','LVL','Ls',0,0),
	(61,'Pounds','LBP','£',0,1),
	(62,'Dollars','LRD','$',0,1),
	(63,'Switzerland Francs','CHF','CHF',1,1),
	(64,'Litai','LTL','Lt',0,0),
	(65,'Denars','MKD','ден',0,1),
	(66,'Ringgits','MYR','RM',1,1),
	(67,'Rupees','MUR','₨',0,1),
	(68,'Pesos','MXN','$',1,1),
	(69,'Tugriks','MNT','₮',0,1),
	(70,'Meticais','MZN','MT',0,1),
	(71,'Dollars','NAD','$',0,1),
	(72,'Rupees','NPR','₨',0,1),
	(73,'Guilders','ANG','ƒ',0,1),
	(74,'Dollars','NZD','$',1,1),
	(75,'Cordobas','NIO','C$',0,1),
	(76,'Nairas','NGN','₦',0,1),
	(77,'Krone','NOK','kr',1,1),
	(78,'Rials','OMR','﷼',0,0),
	(79,'Rupees','PKR','₨',0,1),
	(80,'Balboa','PAB','B/.',0,1),
	(81,'Guarani','PYG','Gs',0,1),
	(82,'Nuevos Soles','PEN','S/.',0,1),
	(83,'Pesos','PHP','Php',1,1),
	(84,'Zlotych','PLN','zł',1,1),
	(85,'Rials','QAR','﷼',0,1),
	(86,'New Lei','RON','lei',0,1),
	(87,'Rubles','RUB','руб',1,1),
	(88,'Pounds','SHP','£',0,1),
	(89,'Riyals','SAR','﷼',0,1),
	(90,'Dinars','RSD','Дин.',0,1),
	(91,'Rupees','SCR','₨',0,1),
	(92,'Dollars','SGD','$',1,1),
	(93,'Dollars','SBD','$',0,1),
	(94,'Shillings','SOS','S',0,1),
	(95,'Rand','ZAR','R',0,1),
	(96,'Rupees','LKR','₨',0,1),
	(97,'Kronor','SEK','kr',1,1),
	(98,'Dollars','SRD','$',0,1),
	(99,'Pounds','SYP','£',0,0),
	(100,'New Dollars','TWD','NT$',1,1),
	(101,'Baht','THB','฿',1,1),
	(102,'Dollars','TTD','TT$',0,1),
	(103,'Lira','TRY','TL',0,1),
	(104,'Liras','TRL','£',0,0),
	(105,'Dollars','TVD','$',0,0),
	(106,'Hryvnia','UAH','₴',0,1),
	(107,'Pesos','UYU','$U',0,1),
	(108,'Sums','UZS','лв',0,1),
	(109,'Bolivares Fuertes','VEF','Bs',0,0),
	(110,'Dong','VND','₫',0,1),
	(111,'Rials','YER','﷼',0,1),
	(112,'Zimbabwe Dollars','ZWD','Z$',0,0);

/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_1` longtext COLLATE utf8_unicode_ci,
  `coordinate_1` longtext COLLATE utf8_unicode_ci,
  `address_2` longtext COLLATE utf8_unicode_ci,
  `coordinate_2` longtext COLLATE utf8_unicode_ci,
  `address_3` longtext COLLATE utf8_unicode_ci,
  `coordinate_3` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table delivery_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_settings`;

CREATE TABLE `delivery_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `delivery_settings` WRITE;
/*!40000 ALTER TABLE `delivery_settings` DISABLE KEYS */;

INSERT INTO `delivery_settings` (`id`, `key`, `value`)
VALUES
	(1,'delivery_charge','10'),
	(2,'maximum_time_to_deliver','00:30'),
	(3,'free_delivery_charge','0'),
	(4,'admin_revenue','31'),
	(5,'foodtruck_revenue','69'),
	(6,'vat','15');

/*!40000 ALTER TABLE `delivery_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table drivers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table favourites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favourites`;

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `food_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table food_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `food_categories`;

CREATE TABLE `food_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table food_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `food_menus`;

CREATE TABLE `food_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `foodtruck_id` int(11) DEFAULT NULL,
  `items` longtext COLLATE utf8_unicode_ci,
  `details` longtext COLLATE utf8_unicode_ci,
  `nutrition_fact` longtext COLLATE utf8_unicode_ci,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `has_discount` longtext COLLATE utf8_unicode_ci,
  `price` longtext COLLATE utf8_unicode_ci,
  `discounted_price` longtext COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foodtruck_id` (`foodtruck_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `food_menus_ibfk_1` FOREIGN KEY (`foodtruck_id`) REFERENCES `foodtrucks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `food_menus_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `food_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;

INSERT INTO `languages` (`id`, `name`, `code`)
VALUES
	(1,'English','en'),
	(2,'Bengali','bn'),
	(3,'French','fr'),
	(4,'Espanol','es');

/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foodtruck_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_code` (`order_code`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `orders` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `order_placed_at` int(11) DEFAULT NULL,
  `order_approved_at` int(11) DEFAULT NULL,
  `order_preparing_at` int(11) DEFAULT NULL,
  `order_prepared_at` int(11) DEFAULT NULL,
  `order_delivered_at` int(11) DEFAULT NULL,
  `order_canceled_at` int(11) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8_unicode_ci,
  `total_menu_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_delivery_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_vat_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `driver_id` (`driver_id`),
  KEY `code` (`code`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table paid_commissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paid_commissions`;

CREATE TABLE `paid_commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foodtruck_id` int(11) DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foodtruck_id` (`foodtruck_id`),
  CONSTRAINT `paid_commissions_ibfk_1` FOREIGN KEY (`foodtruck_id`) REFERENCES `foodtrucks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table foodtrucks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `foodtrucks`;

CREATE TABLE `foodtrucks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuisine` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule` longtext COLLATE utf8_unicode_ci COMMENT 'a json object with time',
  `owner_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `delivery_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maximum_time_to_deliver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gallery` longtext COLLATE utf8_unicode_ci COMMENT 'a json object with 4 images',
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_tags` longtext COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `foodtrucks_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci,
  `foodtruck_id` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foodtruck_id` (`foodtruck_id`),
  KEY `customer_id` (`customer_id`),
  KEY `order_code` (`order_code`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`foodtruck_id`) REFERENCES `foodtrucks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`order_code`) REFERENCES `orders` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `type`)
VALUES
	(1,'admin'),
	(2,'customer'),
	(3,'owner'),
	(4,'driver');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table smtp_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `smtp_settings`;

CREATE TABLE `smtp_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `smtp_settings` WRITE;
/*!40000 ALTER TABLE `smtp_settings` DISABLE KEYS */;

INSERT INTO `smtp_settings` (`id`, `key`, `value`)
VALUES
	(1,'sender','php_mailer'),
	(2,'protocol','smtp'),
	(3,'host','smtp.gmail.com'),
	(4,'username','your-gmail'),
	(5,'password','your-gmail-password'),
	(6,'port','587'),
	(7,'security','tls'),
	(8,'from','TheDevs'),
	(9,'debug','false'),
	(10,'show_error','no');

/*!40000 ALTER TABLE `smtp_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_settings`;

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `system_settings` WRITE;
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;

INSERT INTO `system_settings` (`id`, `key`, `value`)
VALUES
	(1,'language','en'),
	(2,'purchase_code','your-purchase-code'),
	(3,'system_name','BookingFoodTrucks'),
	(4,'system_title','BookingFoodTrucks'),
	(5,'system_email',''),
	(6,'address',''),
	(7,'phone',''),
	(8,'system_currency',''),
	(9,'currency_position',''),
	(10,'author',''),
	(11,'website_description',''),
	(12,'website_keywords',''),
	(13,'footer_text',''),
	(14,'footer_link',''),
	(15,'timezone','Asia/Dhaka'),
	(16,'recaptcha_sitekey','recaptcha-sitekey'),
	(17,'recaptcha_secretkey','recaptcha-secretkey'),
	(18,'version','1.1');

/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'placeholder.png',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table website_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `website_settings`;

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `website_settings` WRITE;
/*!40000 ALTER TABLE `website_settings` DISABLE KEYS */;

INSERT INTO `website_settings` (`id`, `key`, `value`)
VALUES
	(1,'title','Discover the greatest places around New York'),
	(2,'sub_title','Want a delicious meal, but no time we will deliver it hot and yummy.'),
	(3,'social_links','{\"facebook\":\"\",\"twitter\":\"\",\"instagram\":\"\"}'),
	(4,'about_us',''),
	(5,'terms_and_conditions',''),
	(6,'privacy_policy',''),
	(7,'banner_image','banner.jpg'),
	(8,'backend_logo','backend-logo.jpg'),
	(9,'website_logo','frontend-logo.jpg'),
	(10,'favicon','favicon.jpg'),
	(11,'theme','default');

/*!40000 ALTER TABLE `website_settings` ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) DEFAULT NULL,
  `amount_to_pay` varchar(255) DEFAULT NULL,
  `amount_paid` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `data` longtext,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Dump of table payment_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_settings`;

CREATE TABLE `payment_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `payment_settings` WRITE;
/*!40000 ALTER TABLE `payment_settings` DISABLE KEYS */;

INSERT INTO `payment_settings` (`id`, `key`, `value`)
VALUES
  (1,'cash_on_delivery','[{\"active\":\"1\"}]'),
  (2,'paypal','[{\"active\":\"1\",\"mode\":\"sandbox\",\"currency\":\"USD\",\"sandbox_client_id\":\"sandbox-client-id\",\"sandbox_secret_key\":\"sandbox-secret-key\",\"production_client_id\":\"production-client-id\",\"production_secret_key\":\"production-secret-key\"}]'),
  (3,'stripe','[{\"active\":\"1\",\"testmode\":\"on\",\"currency\":\"USD\",\"public_key\":\"pk_test_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_key\":\"sk_test_xxxxxxxxxxxxxxxxxxxxxxxx\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]');

/*!40000 ALTER TABLE `payment_settings` ENABLE KEYS */;
UNLOCK TABLES;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
