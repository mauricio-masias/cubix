-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: cubix_db
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `boxes`
--

DROP TABLE IF EXISTS `boxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boxes` (
  `box_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `box_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boxes`
--

LOCK TABLES `boxes` WRITE;
/*!40000 ALTER TABLE `boxes` DISABLE KEYS */;
INSERT INTO `boxes` VALUES (1,'When','<h3>FRIDAY<br/>29 MARCH 2019</h3>\r\n<h4>FREE ENTRANCE</h4>\r\n<h5>From 21:00 till late</h5>',1,'2018-04-19 21:02:24','2019-02-20 21:39:46'),(2,'Where','<h3>Where</h3>\r\n<div><p><a href=\"http://www.lupita.co.uk/\" target=\"_blank\">Lupita East</a> - [Basement}<br />\r\n60-62 Commercial St.<br />\r\nShoreditch<br />\r\nLondon<br />\r\nE1 6LT<br />\r\n</p></div>\r\n<div><a href=\"https://maps.google.com/maps?q=E16LT\" target=\"_blank\">Open in Google Maps</a></div>',1,'2018-04-19 21:03:13','2019-02-20 21:57:58'),(3,'Line up','<h3>On Decks</h3>\r\n<ul>\r\n<li>Dj Fabrizia</li>\r\n<li>ADECA </li>\r\n<li>Luca Zuccarello</li>\r\n<li>MAYA</li>\r\n</ul>',1,'2018-04-19 21:03:47','2019-02-20 21:58:10'),(4,'Guests','<h3>Special Guests</h3>\r\n<ul>\r\n<li>Marco Waters on Percussion\r\n<li>TOLIK on Saxophone</li>\r\n</ul>',1,'2018-04-19 21:04:18','2019-02-20 21:49:41'),(6,'Description','<div class=\"desc\">\r\n<p>Cubix is a new collective project of Underground Djs and Live Musicians on Sax & Percussions that’s guaranteed to blow your mind.</p>\r\n<p>Join us for a full night of live music backed with the latest in underground sounds. </p>\r\n</div>',1,'2019-02-20 22:01:27','2019-02-20 22:01:27');
/*!40000 ALTER TABLE `boxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Drupal','drupal',100,'2018-04-18 20:24:46','2018-04-18 20:24:46',1),(2,'WP','wp',90,'2018-04-18 20:30:24','2018-04-18 20:30:24',1),(3,'Bespoke','bespoke',80,'2018-04-18 20:30:36','2018-04-18 20:30:36',1),(4,'Business','business',70,'2018-04-18 20:30:48','2018-04-18 20:30:48',1),(5,'Indie','independent',60,'2018-04-18 20:31:03','2018-04-18 20:31:03',1),(6,'Music','music',50,'2018-04-18 20:31:18','2018-04-18 20:31:18',NULL),(7,'Weddings','weddings',40,'2018-04-18 20:31:34','2018-04-18 20:31:34',NULL),(8,'Hotel','hotel',30,'2018-04-18 20:31:49','2018-04-18 20:31:49',NULL),(9,'Games','games',20,'2018-04-18 20:32:05','2018-04-18 20:32:05',NULL),(10,'Seasonal','seasonal',10,'2018-04-18 20:32:28','2018-04-18 20:32:28',NULL),(11,'Survey','survey',5,'2018-04-18 20:32:39','2018-04-18 20:32:39',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Galle Art & Design','http://galle.com','(9/2008 - 5/2010)','A digital design agency focused on luxury, travel & fashion brands.','Senior Web Developer',1,'2018-04-20 20:55:49','2018-04-20 21:00:27',1),(2,'Regus Online Team','http://regus.com','(8/2010 - 12/2010)','An international design and production agency.','Contractor: PHP Developer',2,'2018-04-20 21:01:32','2018-04-20 21:01:32',1),(3,'TAG','http://tagworldwide.com','(1/2011 - 3/2011)','An international design and production agency.','Contractor: PHP Developer',3,'2018-04-20 21:01:59','2018-04-20 21:01:59',1),(4,'The Crocodile','http://thecroc.com','(5/2011 - 1/2017)','An B2B award winning intelligent marketing agency','Lead PHP Developer (Full stack)',4,'2018-04-20 21:02:36','2018-04-20 21:02:36',1),(5,'PHP Fullstack Consultant','none','(2/2017 - 7/2017 )','none','none',5,'2018-04-20 21:10:59','2018-04-20 21:10:59',1),(6,'Jellyfish','http://jellyfish.co.uk','(8/2017 - Now)','The world\'s biggest boutique agency','Senior PHP Developer',6,'2018-04-20 21:11:41','2018-04-20 21:11:41',1);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_outbound` tinyint(4) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'About me','parent','#',0,0,1,1,'2018-04-19 18:13:54','2018-05-14 20:57:17','about'),(2,'Works','parent','#',0,0,2,1,'2018-04-19 18:44:45','2018-05-14 20:57:27','works'),(3,'CV','parent','#',0,0,3,1,'2018-04-19 18:45:02','2018-04-25 14:27:27','cv'),(4,'LinkedIn','parent','https://www.linkedin.com/in/mauriciomasias',0,1,0,1,'2018-04-19 18:45:41','2018-04-25 14:27:35','linkedin');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_02_05_113310_create_products_table',2),(4,'2018_04_16_154718_create_projects_table',3),(5,'2018_04_18_140039_create_categories_table',4),(6,'2018_04_18_155745_add_active_to_categories',5),(7,'2018_04_19_095948_create_menus_table',6),(8,'2018_04_19_155826_create_boxes_table',7),(9,'2018_04_20_095945_create_jobs_table',8),(10,'2018_04_20_140844_add_active_to_jobs',9),(11,'2018_04_24_114627_create_pages_table',10),(12,'2018_04_25_101345_create_add_to_menus_table',10),(13,'2018_04_25_143256_create_add_pages_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_not_available` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_subtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_available` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_og` text COLLATE utf8mb4_unicode_ci,
  `page_card` text COLLATE utf8mb4_unicode_ci,
  `page_active` tinyint(4) NOT NULL,
  `page_footer_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_footer_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_footer_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_ga_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_extra_js` text COLLATE utf8mb4_unicode_ci,
  `page_extra_js_footer` text COLLATE utf8mb4_unicode_ci,
  `page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `page_pdf_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'2018-04-25 20:08:20','2019-02-20 22:11:05','Site has changed since development','Cubix London','Chapter 1','Click to go to website','/home/sites/laravel/masias/storage/app/public/mauricio-masias-cv.pdf','<meta property=\"og:locale\" content=\"en_GB\" />\r\n<meta property=\"og:type\" content=\"website\" />\r\n<meta property=\"og:title\" content=\"Cubix : Chapter 1\" />\r\n<meta property=\"og:description\" content=\"Cubix is a new collective project of Underground Djs and Live Musicians on Sax & Percussions that’s guaranteed to blow your mind. Join us for a full night of live music backed with the latest in underground sounds.\" />\r\n<meta property=\"og:url\" content=\"http://cubix.club\" />\r\n<meta property=\"og:site_name\" content=\"Cubix : Chapter 1\" />\r\n<meta property=\"og:image\" content=\"http://cubix.club/img/cubix_london_share_1024x600.jpg\" />','<meta name=\"twitter:card\" content=\"summary_large_image\">\r\n<meta name=\"twitter:site\" content=\"@djfabrizia\">\r\n<meta name=\"twitter:creator\" content=\"@djfabrizia\">\r\n<meta name=\"twitter:title\" content=\"Cubix : Chapter 1\">\r\n<meta name=\"twitter:description\" content=\"Cubix : Chapter 1\" />\r\n<meta property=\"og:description\" content=\"Cubix is a new collective project of Underground Djs and Live Musicians on Sax & Percussions that’s guaranteed to blow your mind. Join us for a full night of live music backed with the latest in underground sounds.\">\r\n<meta name=\"twitter:image:src\" content=\"http://cubix.club/img/cubix_london_share_1024x600.jpg\">\r\n<meta name=\"twitter:image:width\" content=\"1024\">\r\n<meta name=\"twitter:image:height\" content=\"600\">',1,'2019','07594130000','info@cubix.club','UA-00000000-0',NULL,NULL,'Cubix is a new collective project of Underground Djs and Live Musicians on Sax & Percussions that’s guaranteed to blow your mind.\r\nJoin us for a full night of live music backed with the latest in underground sounds',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'glass','1000','2018-02-09 17:18:18','2018-02-09 17:27:08'),(3,'phone','500','2018-02-09 17:27:36','2018-02-09 17:27:36');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_teaser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_order` int(11) NOT NULL,
  `project_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'DJ Fabrizia','img/portfolio/djfabrizia.jpg','http://djfabrizia.com','Design / build. WP core','Bespoke script to generate a static html home page version to minimize load speed.<br /><br />Minimizes use of plug-ins having bespoke functions running to reduce load lag.<br />CSS, JS HTML minimized.<br /><br />Home page re-generates a static html page each time after saving the page on the CMS, all other pages are normal CMS driven.','a:2:{i:0;s:2:\"wp\";i:1;s:11:\"independent\";}',36,1,'2018-04-16 21:43:28','2018-04-30 17:43:11'),(2,'Artipolis','img/portfolio/artipolis.jpg','http://artipolis.com','Bespoke social network','Artist focused social network to share between people with same interestes. Features messaging, forums, comments and likes from other users.<br /><br />Artipolis and Artipolis PRO have independent databases working together, It offers personal space to publish artist work withing the network and a public minimalist profile with its own domain name. Artipolis is invitation only and free.<br /><br />PHP, JavaScrip and Mysql based.','a:2:{i:0;s:7:\"bespoke\";i:1;s:11:\"independent\";}',35,1,'2018-04-18 13:42:38','2018-05-01 17:51:13'),(3,'Charming wedding','img/portfolio/charming.jpg','http://charmingweddingphotography.com','WP template','Standard install<br />Third party template as front end.','a:2:{i:0;s:2:\"wp\";i:1;s:11:\"independent\";}',34,1,'2018-04-18 13:44:17','2018-05-01 17:51:13'),(4,'Montalvano weddings','img/portfolio/montalvano.jpg','http://montalbanoweddings.com','WP template','Standard install<br />Third party template as front end.','a:2:{i:0;s:2:\"wp\";i:1;s:11:\"independent\";}',33,1,'2018-04-18 13:45:07','2018-04-30 17:43:41'),(5,'Sixstar, venue finder','img/portfolio/sixstar.jpg','http://sixstarworld.com','Bespoke CMS','Venue finder, Bespoke CMS and Framework, PHP / Mysql based search tool. <br /><br />Contains a gated member area for associate agents to show extra data depending of their assign access rights.<br /><br />Optimized algorithm for quick DB search.','a:2:{i:0;s:8:\"business\";i:1;s:11:\"independent\";}',31,1,'2018-04-18 13:46:04','2018-04-30 17:44:02'),(6,'Palazzo Tornabuoni','img/portfolio/palazzo.jpg','http://palazzotornabuoni.com','Brodcasting solution','Bespoke Newsletter broadcasting tool, image gallery <br /><br />HTML, CSS and Flash based.','a:2:{i:0;s:8:\"business\";i:1;s:11:\"independent\";}',27,1,'2018-04-18 13:46:55','2018-04-18 13:46:55'),(7,'La Verriere','img/portfolio/laverriere.jpg','http://www.laverriere.com/main.html','Brodcasting solution','Bespoke Newsletter broadcasting tool <br /><br />HTML5 and ASP based.','a:1:{i:0;s:11:\"independent\";}',26,1,'2018-04-18 13:48:33','2018-04-18 13:48:33'),(8,'Widder Hotel','img/portfolio/widderhotel.jpg','http://galledev.co.uk/widder/v11/site/','Brodcasting solution','Bespoke Newsletter broadcasting tool<br /><br />Image Gallery<br /><br />News section.<br /><br />CMS as hosted in a different location than the front end to keep CMS access restricted from Client. <br /><br />PHP and Mysql based.<br /><br />Site has been replaced since build.','a:1:{i:0;s:11:\"independent\";}',25,1,'2018-04-18 13:50:27','2018-04-30 18:02:20'),(9,'Herschel','img/portfolio/herschel.jpg','http://galledev.co.uk/herschel/site%202008/index.htm','News section','>News section added<br /><br />Flash, Mssql and ASP.<br /><br />Site has been replaced since build, <a href=\"galle.com\" target=\"_blank\">GALLE</a> design.','a:1:{i:0;s:11:\"independent\";}',24,1,'2018-04-18 13:59:18','2018-04-30 18:03:55'),(10,'Lebua','img/portfolio/lebua.jpg','http://galledev.co.uk/lebua/--%20unpaid%20--%20test_090512/','Site and social wall','Codeigniter framework <br /><br />Social wall to display in a single page Facebook, Twitter, Blog and Youtube channel feeds, this where hosted in two different domains.<br /><br />Site has been replaced since build.','a:1:{i:0;s:11:\"independent\";}',23,1,'2018-04-18 14:00:27','2018-04-30 18:02:48'),(11,'MOS','img/portfolio/mos.jpg','http://www.mos.uk.com','Virtual office finder','Collaboration of the Regus developent team. PHP / Mysql based.','a:2:{i:0;s:6:\"drupal\";i:1;s:8:\"business\";}',22,1,'2018-04-18 14:01:07','2018-04-18 14:01:07'),(12,'Arizta Bakeries','img/portfolio/aryzta-bakeries.jpg','http://www.aryzta-bakeries.com','Build. WP core','Multi language site, (English, German, Polish, Spanish)<br /><br />Online catalog, Product search, allows you to select items and addd them to a list then print a PDF document with the Items info and images.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',21,1,'2018-04-18 14:02:11','2018-04-18 14:02:11'),(13,'Arizta EU','img/portfolio/aryzta.jpg','http://www.aryzta.com','Build. WP core','Main enterprise site in Europe.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',20,1,'2018-04-18 14:04:24','2018-04-18 14:04:24'),(14,'Asteral','img/portfolio/asteral.jpg','http://asteral.com','Build. WP core','Template based with bespoke sections and layouts','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',19,1,'2018-04-18 14:05:41','2018-04-18 14:05:41'),(15,'Dell EMC Block ninja','img/portfolio/emc-block-ninja.jpg','http://thecrocdev.com/emc-blocks/v12/index.htm','Javascript game','Jigsaw  game, drag and drop interaction. <br /><br />Canvas and HTML5 based, no Libraries used, plain Object Javascript. 60 levels. Develop at <a href=\"thecroc.com\" target=\"_blank\">The Crocodile</a>','a:1:{i:0;s:7:\"bespoke\";}',18,1,'2018-04-18 14:10:59','2018-04-30 18:09:00'),(16,'EMC Cloud flight check','img/portfolio/emc-cloud-flight-check.jpg','http://thecrocdev.com/emc-cra/','Online survey','PHP based, it captures the survey answers and generates a variable PDF based on the results.<br /><br />it both stores the information on a DB and send it to a remote marketing automation tool to follow up qualified leads.','a:1:{i:0;s:7:\"bespoke\";}',17,1,'2018-04-18 14:11:41','2018-04-30 18:09:07'),(17,'EMC Speed to lead','img/portfolio/emc-speed-to-lead.jpg','https://www.emc.com/speed-to-lead/full.htm?emc=null','Racing game','Interactive game for EMC Formula 1 campaign. The aim of the game is to keep an optimun speed level during the circuit checkpoints.<br />Uses HTML5 Technology and IE 8 compatible','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',16,1,'2018-04-18 14:18:13','2018-04-30 18:09:16'),(18,'The Crocodile Kickoff','img/portfolio/kickoff.jpg','#','Prediction Game','WP Core. The user fills their Football match predictions on different stages or the tournament. Get points depending of of several rules like exact result, goal difference and others.<br /><br />Oriented for intra and extra companies, users can be grouped by companies or country.','a:1:{i:0;s:2:\"wp\";}',13,1,'2018-04-18 14:21:54','2018-04-30 18:07:32'),(19,'The Crocodile Scrumdown','img/portfolio/scrumdown.jpg','#','Prediction Game','WP Core.. The user fills their Rugby match predictions on different stages or the tournament. Get points depending of of several rules like exact result, goal difference and others.<br /><br />Oriented for intra and extra companies, users can be grouped by companies or country.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',12,1,'2018-04-18 14:23:36','2018-04-30 18:07:48'),(20,'KPMG Techgrowth','img/portfolio/kpmg-techgrowth.jpg','http://www.kpmgtechgrowth.co.uk','Build. WP core','Template based, bespoke functionality and  heavily modified.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',11,1,'2018-04-18 14:24:37','2018-04-18 14:36:52'),(21,'Mewburn Ellis','img/portfolio/mewburn-ellis.jpg','http://mewburn.com','Multilanguage','WP Core. Multi language site (Chinease, Koean, Japanese, English)<br /><br />Bespoke solution site.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',10,1,'2018-04-18 14:25:13','2018-04-30 18:14:47'),(22,'Nectar Bizhub','img/portfolio/nectar-bizhub.jpg','https://nectarbizhub.com','Build. WP core','Template based with bespoke layouts and functionality.','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',9,1,'2018-04-18 14:26:22','2018-04-18 14:28:52'),(23,'Nectar 12 days','img/portfolio/nectar-business.jpg','#','Bespoke advent calendar','12 days 12 prices Christmas campaign. <br /><br />PHP and JQuery based.','a:1:{i:0;s:7:\"bespoke\";}',8,1,'2018-04-18 14:28:24','2018-04-18 14:28:24'),(24,'Sage Business nation','img/portfolio/sage-business-nation.jpg','http://thecrocdev.com/sage-business-nation/','Bespoke','HTML and jQuery','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',7,1,'2018-04-18 14:29:49','2018-04-18 14:29:49'),(25,'Rosetta Stone','img/portfolio/rosetta-stone-survey.jpg','#','Online survey','PHP based, slider interactive survey to facilitate user selection, captures answers and generates a variable PDF based on the results.<br /><br />it both stores the information on a DB and send it to a remote marketing automation tool to follow up qualified leads.','a:1:{i:0;s:7:\"bespoke\";}',6,1,'2018-04-18 14:30:31','2018-04-30 18:15:56'),(26,'Syscap','img/portfolio/syscap.jpg','http://syscap.com/','Build. WP core','Template based with bespoke layout and  functionality','a:2:{i:0;s:2:\"wp\";i:1;s:8:\"business\";}',5,1,'2018-04-18 14:31:27','2018-04-18 14:31:27'),(27,'The Crocodile EMC','img/portfolio/thecrocodile-emc-showcase.jpg','#','Bespoke showcase','PHP, Javascript and HTML5 based.','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',4,1,'2018-04-18 14:32:05','2018-04-18 14:32:05'),(28,'The Crocodile KPMG','img/portfolio/thecrocodile-kpmg-showcase.jpg','#','Bespoke showcase','PHP, Javascript and HTML5 based.','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',3,1,'2018-04-18 14:32:45','2018-04-18 14:32:45'),(29,'The Crocodile Snowflake city','img/portfolio/thecrocodile-snowflake-city.jpg','#','Bespoke build','Christmas theme for showing randomly on screen messages sent between users<br /><br />No login required, anybody can send a greeting to the love ones.<br /><br />you\'ll receive an email with the greeting and a link to answers the greeting or create you own greeting.<br /><br />Background moves on mouse scroll and changes when selecting day or night<br /><br />PHP, jQuery and Mysql based.','a:1:{i:0;s:7:\"bespoke\";}',2,1,'2018-04-18 14:34:05','2018-05-01 17:50:54'),(30,'Waypoint capital','img/portfolio/waypoint-capital.jpg','https://www.waypointcapital.net','Drupal 8 based','Partially build, Home page background moves elegantly on mouse over.','a:2:{i:0;s:6:\"drupal\";i:1;s:8:\"business\";}',1,1,'2018-04-18 14:34:47','2018-05-01 17:50:55'),(31,'Alinghi','img/portfolio/alinghi.jpg','http://alinghi.com','Drupal 7 Based','Multi language site (English, French, Italian). <br /><br />Partially build including gallery, navigation and news feed.','a:2:{i:0;s:6:\"drupal\";i:1;s:8:\"business\";}',28,1,'2018-04-18 14:39:42','2018-04-30 17:53:32'),(36,'Jewellery Theatre','img/portfolio/jewellery-theatre.jpg','http://www.jewellerytheatre.com','Expression Engine','Jewellery designers site<br /><br />Bespoke solution based on Expression Engine CMS and Code Igniter Framework<br /><br />HTML5, CSS3, JavaScrit, PHP and Mysql<br /><br /><a href=\"galle.com\" target=\"_blank\">GALLE</a> design.','a:3:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";i:2;s:11:\"independent\";}',32,1,'2018-04-30 17:14:28','2018-04-30 17:44:17'),(37,'Mitsi','img/portfolio/mitsi.jpg','http://galledev.co.uk/mitsi/25june2010/','Product gallery','Product Gallery added to the site for different purse collections<br /><br />Site has been replaced since build, <a href=\"galle.com\" target=\"_blank\">GALLE</a> design.','a:2:{i:0;s:7:\"bespoke\";i:1;s:11:\"independent\";}',30,1,'2018-04-30 17:50:25','2018-04-30 17:50:25'),(38,'Marchesa','img/portfolio/marchesa.jpg','http://galledev.co.uk/marchesa/site','Collections','PHP and Flash<br /><br />Season galley added<br /><br />Site has been replaced since build, <a href=\"galle.com\" target=\"_blank\">GALLE</a> design.','a:2:{i:0;s:7:\"bespoke\";i:1;s:11:\"independent\";}',29,1,'2018-04-30 17:52:29','2018-04-30 17:52:29'),(39,'EMC Data Growth','img/portfolio/emc-data-growth.jpg','https://www.emc.com/microsites/manage-data-growth-ebook/index.htm','eBook','Interactive eBook for the different EMC Data Growth sections campaign under The Crocodile<br /><br />HMTL, CSS and JavaScript','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',15,1,'2018-04-30 18:10:16','2018-04-30 18:10:16'),(40,'EMC Big data','img/portfolio/emc-ebook.jpg','https://www.emc.com/microsites/ebook/index.htm','eBook','Interactive eBook for the different EMC Big Data campaign sections under The Crocodile<br /><br />HMTL, CSS and JavaScript','a:2:{i:0;s:7:\"bespoke\";i:1;s:8:\"business\";}',14,1,'2018-04-30 18:11:10','2018-04-30 18:11:30');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-20 12:48:10
