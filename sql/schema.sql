# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: helpme
# Generation Time: 2011-09-26 13:17:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_auth` (`email`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Администраторы хелпа';

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `email`, `password`, `name`)
VALUES
	(1,'me@me.com','898f0d1f8a6f078134c888176f6aead337344112','HelpMe CMS Admin');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table help
# ------------------------------------------------------------

DROP TABLE IF EXISTS `help`;

CREATE TABLE `help` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `content` text,
  `priority` int(10) unsigned NOT NULL DEFAULT '0',
  `enabled` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_priority` (`priority`),
  KEY `idx_search` (`name`,`keywords`),
  KEY `idx_parent` (`parent`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страницы хелпа';

LOCK TABLES `help` WRITE;
/*!40000 ALTER TABLE `help` DISABLE KEYS */;

INSERT INTO `help` (`id`, `parent`, `name`, `keywords`, `content`, `priority`, `enabled`)
VALUES
	(1,0,'Home','HelpMe CMS','A deal is a money-based project you have up for bid or contract. Deals let you keep track of proposals, bids, RFPs, and project sales right inside Highrise. Highrise has always been great for keeping track of the people you do business with, but now with Deals you can keep track of the business transactions as well.\n\n## Subtopic\n\nNow you’ll know which proposals/bids are pending, which you’ve won, and which you’ve lost. Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.\n\n[note]Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.[/note]\n			\n## Video\n			\n[video]<iframe src=\"http://player.vimeo.com/video/29262251?title=0&amp;byline=0&amp;portrait=0\" width=\"100%\" height=\"460\" frameborder=\"0\" webkitAllowFullScreen allowFullScreen></iframe>[/video]\n			\n## JS code example\n			\nNow you’ll know which proposals/bids are pending, [which you’ve won](http://ya.ru), and which you’ve lost. Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.\n			\n[js]<!--AdFox START-->\n<!--webmechanics-->\n<!--Площадка: MMVA.ru / Главная страница / Float-->\n<!--Категория: <не задана>-->\n<!--Баннер: #344836-->\n<!--Тип баннера: Rich Media-->\n<script type=\"text/javascript\">\n<!--\nif (typeof(pr) == \'undefined\') { var pr = Math.floor(Math.random() * 1000000); }\nif (typeof(document.referrer) != \'undefined\') {\n  if (typeof(afReferrer) == \'undefined\') {\n    afReferrer = escape(document.referrer);\n  }\n} else {\n  afReferrer = \'\';\n}\nvar addate = new Date(); \ndocument.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http://ads.adfox.ru/6956/prepareCode?p1=blif&p2=p&pct=a&pfc=hqqb&pfb=tqcy&pr=\' + pr +\'&pt=b&pd=\' + addate.getDate() + \'&pw=\' + addate.getDay() + \'&pv=\' + addate.getHours() + \'&prr=\' + afReferrer + \'\"><\\/scr\' + \'ipt>\');\n// -->\n</script>\n<!--AdFox END-->[/js]\n\n## PHP code example\n\n[php]class Main extends CI_Controller {\n\n	function __construct() {\n		parent::__construct();\n		\n		$this->load->model(\'pages_model\');\n		$this->load->helper(\'markdown\');\n	}\n\n	function index() {\n		\n		$data[\'topics\'] = $this->pages_model->topics();\n		$data[\'page\'] = $this->pages_model->page(1);\n		\n		$this->load->view(\'page\', $data);\n	}\n}[/php]\n			\n## Unordered list\n\n* [Home](/page/2/)\n* [Setup]()\n* [Customize]()\n* [Settings]()\n* [Expand]()\n\n## Ordered list\n\n1. [Home](/page/2/)\n2. [Setup]()\n3. [Customize]()\n4. [Settings]()\n5. [Expand]()\n\n## Picture\n\n![\"Тут у нас картинка...\"](/uploads/test.jpg)\n\n## Picture with link\n\n[![\"Тут у нас картинка...\"](/uploads/test.jpg)](/uploads/test.jpg \'colorbox\')',1,1),
	(2,0,'Configuration','Configuration','How-to configure your HelpMe CMS installation...',3,1),
	(10,0,'Installation','HelpMe CMS, Installation','How-to install HelpMe CMS...',2,1),
	(15,0,'FAQ','FAQ','Questions about HelpMe CMS\n\n1. [Question one]()\n2. [Question two]()\n\nYou can find your dropbox address by signing into your Highrise account, clicking “Settings” in the top right corner, and selecting “My info”. Look for the “Your personal email dropbox” section for your own dropbox email address.\n\nIn the example below, an email from Sonia Nelson was forwarded to Highrise. Highrise then determined the email was from Sonia Nelson and attached it to Sonia’s page inside the Highrise account.',9,1);

/*!40000 ALTER TABLE `help` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
