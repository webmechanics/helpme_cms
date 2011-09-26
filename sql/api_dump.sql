# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.44)
# Database: api
# Generation Time: 2010-12-14 16:21:13 +0300
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table action_objects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `action_objects`;

CREATE TABLE `action_objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_actions` (`action`),
  CONSTRAINT `fk_actions` FOREIGN KEY (`action`) REFERENCES `actions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `action_objects` WRITE;
/*!40000 ALTER TABLE `action_objects` DISABLE KEYS */;
INSERT INTO `action_objects` (`id`,`action`,`name`,`description`)
VALUES
	(1,2,'banner',NULL),
	(2,2,'campaign','__name*__ — Имя\n\n__advertiserID*__ — ID рекламодателя\n\n__assistantID__ — ID ассистента\n\n__type__ — Тип кампании (1 — Стандартная, 0 — Упрощенная)\n\n__status__ — Статус (0 — активная, 1  — приостановленная, 2 — завершенная)\n\n__level__ — Уровень (число от 1 до 10)\n\n__sequence__ — Группа\n\n__priority__ — Приоритет\n\n__targetingProfileID__ — Профиль таргетирования\n\n__bundleID__ — Профиль размещения (актуален только при добавлении)\n\n__tracingTypeID__ — Учет действий (0 — нет, 1 — postView, 2 — postClick, 3 — postView & postClick)\n\n__isSession__ — Сессионные показы (0 — нет, 1 — да)\n\n__outerMarkID__ — Включить метку (модуль) (1 – Openstat.ru, 2 – Google Analytics, 0 – нет)\n\n__isSimplifiedBanners__ — Упрощенные баннеры (модуль) (0 — нет, 1 — да)\n\n__bannerSequence__ — Последовательность показов баннеров (0 – весовая ротация 1 – по сценарию)\n\n__scenarioPeriodID__ — Период сценария (актуален, если bannerSequence = 1) (0 – не ограничено, 1 – 1 час, 2 – 4 часа, 3 – 6 часов, 4 – 12 часов, 5 – 1 день, 6 – 1 неделя, 7 – 1 месяц)\n\n__isTrafficSmooth__ — Равномерное распределение суточного объема (0 — нет, 1 — да)\n\n__pricingModel__ — Расчет (только для рекламных сетей) (0 — за 1000 показов, 1 — за переход, 2 — за событие (если подключено))\n\n__pricingType__ — Стоимость и выплаты (только для рекламных сетей) (0 — по всей сети (RON), 1 — по категориям (channel), 2 — по конкретным сайтам (site), 3 — по рубрикатору АиП (если подключено))');

/*!40000 ALTER TABLE `action_objects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actions`;

CREATE TABLE `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_objects` (`object`),
  CONSTRAINT `fk_objects` FOREIGN KEY (`object`) REFERENCES `objects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` (`id`,`object`,`name`,`description`)
VALUES
	(2,2,'add',NULL),
	(3,2,'list',NULL),
	(4,2,'delete',NULL),
	(5,2,'report',NULL),
	(6,2,'changePassword',NULL),
	(7,3,'upload',NULL),
	(8,3,'modify',NULL),
	(9,3,'list',NULL),
	(10,3,'info',NULL),
	(11,3,'placing',NULL),
	(12,4,'modify',NULL),
	(13,4,'info',NULL),
	(14,5,'modify',NULL),
	(15,6,'modify',NULL),
	(16,6,'info',NULL),
	(17,7,'modify',NULL),
	(18,8,'modify',NULL),
	(19,7,'info',NULL),
	(20,8,'info',NULL),
	(21,9,'modify',NULL),
	(22,10,'modify',NULL),
	(23,11,'modify',NULL),
	(24,11,'updateDefaultBanner',NULL),
	(25,11,'info',NULL),
	(26,11,'listActiveBanners',NULL),
	(27,12,'modify',NULL),
	(28,13,'modify',NULL),
	(29,13,'list',NULL),
	(30,13,'updateDefaultBanner',NULL),
	(31,14,'info',NULL);

/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Администраторы хелпа';

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`,`email`,`password`,`name`)
VALUES
	(1,'maxx@adfox.ru','898f0d1f8a6f078134c888176f6aead337344112','Максим Зенин'),
	(2,'nikita@adfox.ru','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','Никита Пасынков'),
	(3,'maria@adfox.ru','8cb2237d0679ca88db6464eac60da96345513964','Мария Рязанцева');

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
  `enabled` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_select` (`parent`,`enabled`),
  KEY `idx_priority` (`priority`),
  KEY `idx_search` (`name`,`keywords`,`content`(255))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Хелп по AdFox API';

LOCK TABLES `help` WRITE;
/*!40000 ALTER TABLE `help` DISABLE KEYS */;
INSERT INTO `help` (`id`,`parent`,`name`,`keywords`,`content`,`priority`,`enabled`)
VALUES
	(1,0,'Кампании','кампании, цели кампании, новая кампания','Текст о рекламных кампаниях...',2,1),
	(9,0,'Баннеры',NULL,'Текст про баннеры...',4,1),
	(10,0,'Сайты, разделы, площадки',NULL,NULL,3,1),
	(11,0,'Отчеты',NULL,NULL,6,1),
	(12,0,'Настройки',NULL,'Тут будет текст про настройки...',8,1),
	(13,0,'Начало','AdFox, Общие сведения, Частые вопросы','A deal is a money-based project you have up for bid or contract. Deals let you keep track of proposals, bids, RFPs, and project sales right inside Highrise. Highrise has always been great for keeping track of the people you do business with, but now with Deals you can keep track of the business transactions as well.\n\n## Подзаголовок\n\nNow you’ll know which proposals/bids are pending, which you’ve won, and which you’ve lost. Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.\n\n[note]Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.[/note]\n			\n## Видео\n			\n[video]<object classid=\'clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\' codebase=\'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0\' width=\'560\' height=\'345\'><param name=\'movie\' value=\'http://screenr.com/Content/assets/screenr_1116090935.swf\' ></param><param name=\'flashvars\' value=\'i=107740\' ></param><param name=\'allowFullScreen\' value=\'true\' ></param><embed src=\'http://screenr.com/Content/assets/screenr_1116090935.swf\' flashvars=\'i=107740\' allowFullScreen=\'true\' width=\'560\' height=\'345\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' ></embed></object>[/video]\n			\n## Пример кода на JS\n			\nNow you’ll know which proposals/bids are pending, [which you’ve won](http://ya.ru), and which you’ve lost. Enter notes about the deals, attach proposals or contracts to the deals, and keep a log of any changes. Now you’ll know how much money a particular customer has paid you over time or how much you’ve left on the table from deals you didn’t win.\n			\n[js]<!--AdFox START-->\n<!--webmechanics-->\n<!--Площадка: MMVA.ru / Главная страница / Float-->\n<!--Категория: <не задана>-->\n<!--Баннер: #344836-->\n<!--Тип баннера: Rich Media-->\n<script type=\"text/javascript\">\n<!--\nif (typeof(pr) == \'undefined\') { var pr = Math.floor(Math.random() * 1000000); }\nif (typeof(document.referrer) != \'undefined\') {\n  if (typeof(afReferrer) == \'undefined\') {\n    afReferrer = escape(document.referrer);\n  }\n} else {\n  afReferrer = \'\';\n}\nvar addate = new Date(); \ndocument.write(\'<scr\' + \'ipt type=\"text/javascript\" src=\"http://ads.adfox.ru/6956/prepareCode?p1=blif&amp;p2=p&amp;pct=a&amp;pfc=hqqb&amp;pfb=tqcy&amp;pr=\' + pr +\'&amp;pt=b&amp;pd=\' + addate.getDate() + \'&amp;pw=\' + addate.getDay() + \'&amp;pv=\' + addate.getHours() + \'&amp;prr=\' + afReferrer + \'\"><\\/scr\' + \'ipt>\');\n// -->\n</script>\n<!--AdFox END-->[/js]\n\n## Пример кода на PHP\n\n[php]class Main extends CI_Controller {\n\n	function __construct() {\n		parent::__construct();\n		\n		$this->load->model(\'pages_model\');\n		$this->load->helper(\'markdown\');\n	}\n\n	function index() {\n		\n		$data[\'topics\'] = $this->pages_model->topics();\n		$data[\'page\'] = $this->pages_model->page(1);\n		\n		$this->load->view(\'page\', $data);\n	}\n}[/php]\n			\n## См. также\n\n* [Кампании]()\n* [Баннеры]()\n* [Сайты, разделы, площадки]()\n* [Отчеты]()\n* [Настройки]()\n\n## Просто картинка\n\n![\"Тут у нас картинка...\"](/uploads/test_thumb.jpg)\n\n## Картинка со ссылкой\n\n[![\"Тут у нас картинка...\"](/uploads/test_thumb.jpg)](/uploads/test.jpg \'colorbox\')',1,0),
	(14,0,'Типы баннеров, шаблоны',NULL,'Тут будет текст про типы баннеров...',7,1),
	(15,0,'FAQ',NULL,'Частые вопросы...',9,1),
	(16,0,'Учет действий',NULL,'Текст про точки учета действий, Postclick и PostView анализ...',5,1);

/*!40000 ALTER TABLE `help` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table objects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `objects`;

CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` (`id`,`name`,`description`)
VALUES
	(2,'account',NULL),
	(3,'campaign',NULL),
	(4,'banner',NULL),
	(5,'website',NULL),
	(6,'adNetworkWebsite',NULL),
	(7,'advertiser',NULL),
	(8,'webmaster',NULL),
	(9,'assistant',NULL),
	(10,'zone',NULL),
	(11,'place',NULL),
	(12,'position',NULL),
	(13,'bannerType',NULL),
	(14,'placement',NULL),
	(15,'adNetwork',NULL),
	(16,'code',NULL),
	(17,'tracingPoint',NULL),
	(18,'message',NULL);

/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
