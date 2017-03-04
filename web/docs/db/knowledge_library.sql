/*
SQLyog Ultimate v8.32 
MySQL - 5.6.33 : Database - knowledge_library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`knowledge_library` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `knowledge_library`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号',
  `article_title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `article_original_url` varchar(256) DEFAULT NULL COMMENT '原URL',
  `html_path` varchar(256) DEFAULT NULL COMMENT 'HTML文件路径',
  `sys_category_id` int(11) DEFAULT NULL COMMENT '所属默认分类',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_ climbing_time` datetime DEFAULT NULL COMMENT '上次重爬时间',
  `high_frequency_words` varchar(256) DEFAULT NULL COMMENT '高频词',
  `collect_number` int(11) DEFAULT NULL COMMENT '收藏量',
  `icon` varchar(256) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`article_id`),
  KEY `FK_article` (`sys_category_id`),
  CONSTRAINT `FK_article` FOREIGN KEY (`sys_category_id`) REFERENCES `sys_category` (`sys_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `article` */

insert  into `article`(`article_id`,`article_title`,`article_original_url`,`html_path`,`sys_category_id`,`create_time`,`last_ climbing_time`,`high_frequency_words`,`collect_number`,`icon`) values (1,'Java从入门到精通',NULL,NULL,2,'2016-07-31 00:00:00',NULL,'java',6,'05'),(2,'JavaScript高级程序设计',NULL,NULL,2,'2016-07-31 00:00:00',NULL,'JavaScript',3,'09'),(3,'thinkPHP',NULL,NULL,2,'2016-07-31 00:00:00',NULL,'php',1,'11'),(4,'Photoshop CS6',NULL,NULL,2,'2016-07-31 00:00:00',NULL,NULL,0,'10'),(5,'php从入门到精通','http://mp.weixin.qq.com/s?__biz=MzAwNjMxMTA5Mw==&mid=2651340218&idx=1&sn=f9f83bd268a46e4147a1fe3503bc1dd7&scene=21#wechat_redirect',NULL,2,'2016-07-31 00:00:00',NULL,'php入门',10,'04'),(6,'苹果手机变砖头以后','http://mp.weixin.qq.com/s?__biz=MzAxOTc0NzExNg==&mid=2665513320&idx=1&sn=081e2a8b57abf682c64680f5370ae84d&scene=4#wechat_redirect',NULL,8,'2016-10-10 00:00:00',NULL,NULL,20,'08'),(7,'搞懂了这几点，你就学会了Web编程','http://mp.weixin.qq.com/s?__biz=MzAxOTc0NzExNg==&mid=2665513276&idx=1&sn=52e8206731e613c60d7ff3b5db9f958b&scene=4#wechat_redirect',NULL,2,'2016-10-10 00:00:00',NULL,NULL,10,'11'),(8,'天宫二号发射成功VS还记得小时候月饼的...','http://mp.weixin.qq.com/s?__biz=MzAwODE2OTAwNg==&mid=2652271575&idx=1&sn=cc39b98b0bd2dae3a65176bb653536d2&chksm=80902096b7e7a98059c025547f168c4d5a78723eb72938755a2d9ec2296b4a4dbcf5c10246b1&scene=4#wechat_redirect',NULL,8,'2016-10-10 00:00:00',NULL,NULL,15,'05'),(9,'不开心的时候看这6本书，看完之后心里暖暖的！','http://mp.weixin.qq.com/s?__biz=MjM5MDMyMzg2MA==&mid=2655473249&idx=3&sn=c1266895f9765505b741587252cde2e0&chksm=bdf56b9a8a82e28cd15bf0c77653dc5afe5677698d3f9f717f4c9a3e585f1eaf343980aa82c6&scene=4#wechat_redirect',NULL,5,'2016-10-10 00:00:00',NULL,NULL,12,'06'),(10,'电商死亡名单公布，烧钱结束，实体崛起','http://mp.weixin.qq.com/s?__biz=MzI0MDA0MDY5Mw==&mid=2651556979&idx=1&sn=5b908c4fba49d81e41570dd9e5d1668a&chksm=f2dfc3e9c5a84affe4ae503272b22ee30a42d4402aa0181f97bb7cfab96f461e5d9398134c5e&scene=4#wechat_redirect',NULL,9,'2016-10-10 00:00:00',NULL,NULL,33,'05'),(11,'解密中国足球队无法踢进世界杯的原因！！','http://mp.weixin.qq.com/s?__biz=MzA5MjczNzI1NQ==&mid=2652914883&idx=1&sn=f08750fb230451865494f509677f36a0&chksm=8bbc7f4bbccbf65dbb86db8a2e4ef2c9d01e416fd9bbea8b27db03dfc413e0ab1f01f7a8f513&scene=4#wechat_redirect',NULL,1,'2016-10-10 00:00:00',NULL,NULL,45,'03'),(12,'国庆还往外跑？紫金的农家乐还没来过吧！','http://mp.weixin.qq.com/s?__biz=MjM5NzEwMjY2NA==&mid=2649978145&idx=1&sn=363de728b2ecfee765e5ca2b116e8c82&chksm=bed8c00689af49107849ddaa060269028d696aef18245a623855bfa98b394344cf2745a42d49&scene=4#wechat_redirect',NULL,5,'2016-10-10 00:00:00',NULL,NULL,18,'07'),(13,'蚂蚁金服或明年年底上市；三星Note7二次召回...','http://mp.weixin.qq.com/s?__biz=MjAzNzMzNTkyMQ==&mid=2653752900&idx=1&sn=534bfe20ed6a7a88461aab131a5d44d6&chksm=4a891e5a7dfe974cb4493d3622e7633b4db3a006b0320d09d906c32f80cb64e8af466451e3fc&scene=4#wechat_redirect',NULL,8,'2016-10-11 00:00:00',NULL,NULL,25,'04'),(14,'百度医疗大脑发布 “智能+医疗”时代来临','http://mp.weixin.qq.com/s?__biz=MjM5NzA1MTcyMA==&mid=2651161978&idx=1&sn=7ea819efab4c490c60883b18dbe02fd5&chksm=bd2ec95d8a59404bb0186c2ef9d0a386aad1ac269ff65bdfdf3f8316f14cc5c8b1b0e107d8fb&scene=0#wechat_redirect',NULL,8,'2016-10-12 00:16:00',NULL,NULL,100,'0'),(15,'支付宝新功能到位送厕纸就是个坑...','http://mp.weixin.qq.com/s?__biz=MzA5NDc1NzQ4MA==&mid=2653280869&idx=1&sn=ba9db2a3bfc084243e10044e3b512759&chksm=8b98cd62bcef4474f00b2c52f6aa9a596735e86a550bc4e8f093733ca9185d0cd8b3d3377c9e&scene=0#wechat_redirect',NULL,9,'2016-10-12 00:00:00',NULL,NULL,90,'02'),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `sys_category` */

DROP TABLE IF EXISTS `sys_category`;

CREATE TABLE `sys_category` (
  `sys_category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类编号',
  `category_name` varchar(30) DEFAULT NULL COMMENT '分类名称',
  `category_use_count` int(11) DEFAULT NULL COMMENT '分类使用量',
  `category_article_number` int(11) DEFAULT NULL COMMENT '分类下文章数量',
  PRIMARY KEY (`sys_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `sys_category` */

insert  into `sys_category`(`sys_category_id`,`category_name`,`category_use_count`,`category_article_number`) values (1,'体育',6,1),(2,'教育',3,1),(3,'财经',2,1),(4,'社会',1,1),(5,'娱乐',1,NULL),(6,'军事',NULL,NULL),(7,'国内',NULL,NULL),(8,'科技',NULL,NULL),(9,'互联网',NULL,NULL),(10,'房产',NULL,NULL),(11,'国际',NULL,NULL),(12,'女人',NULL,NULL),(13,'汽车',NULL,NULL),(14,'游戏',NULL,NULL);

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `sys_user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `wechat_user_flag` varchar(50) DEFAULT NULL COMMENT '微信用户标识符',
  `fist_login_time` datetime DEFAULT NULL COMMENT '第一次登陆时间',
  PRIMARY KEY (`sys_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sys_user` */

insert  into `sys_user`(`sys_user_id`,`wechat_user_flag`,`fist_login_time`) values (1,'测试用户1','2016-07-31 00:00:00'),(2,'测试用户2','2016-07-31 00:00:00'),(3,'测试用户3','2016-07-31 00:00:00');

/*Table structure for table `user_and_article` */

DROP TABLE IF EXISTS `user_and_article`;

CREATE TABLE `user_and_article` (
  `user_and_article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户文章关联ID',
  `sys_user_id` int(11) DEFAULT NULL COMMENT '用户编号',
  `article_id` int(11) DEFAULT NULL COMMENT '文章编号',
  `sys_category_id` int(11) DEFAULT NULL COMMENT '系统分类编号',
  `user_category_id` int(11) DEFAULT NULL COMMENT '用户分类编号',
  PRIMARY KEY (`user_and_article_id`),
  KEY `FK_user_and_article` (`sys_user_id`),
  KEY `FK_user_and_article2` (`article_id`),
  KEY `FK_user_and_article_category_sys` (`sys_category_id`),
  KEY `FK_user_and_article_category_user` (`user_category_id`),
  CONSTRAINT `FK_user_and_article` FOREIGN KEY (`sys_user_id`) REFERENCES `sys_user` (`sys_user_id`),
  CONSTRAINT `FK_user_and_article2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  CONSTRAINT `FK_user_and_article_category_sys` FOREIGN KEY (`sys_category_id`) REFERENCES `sys_category` (`sys_category_id`),
  CONSTRAINT `FK_user_and_article_category_user` FOREIGN KEY (`user_category_id`) REFERENCES `user_category` (`user_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `user_and_article` */

insert  into `user_and_article`(`user_and_article_id`,`sys_user_id`,`article_id`,`sys_category_id`,`user_category_id`) values (1,1,5,2,NULL),(2,3,12,5,NULL),(3,2,5,NULL,3),(4,2,7,2,NULL),(11,1,4,NULL,2),(12,1,7,2,NULL),(13,1,6,8,NULL),(14,3,7,2,NULL),(15,1,8,8,NULL),(16,1,9,5,NULL),(17,1,10,9,NULL),(18,1,11,1,NULL),(19,1,14,8,NULL),(20,1,15,9,NULL);

/*Table structure for table `user_and_category` */

DROP TABLE IF EXISTS `user_and_category`;

CREATE TABLE `user_and_category` (
  `user_and_category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户分类关联ID',
  `sys_user_id` int(11) DEFAULT NULL COMMENT '用户编号',
  `sys_category_id` int(11) DEFAULT NULL COMMENT '系统分类编号',
  `user_category_id` int(11) DEFAULT NULL COMMENT '用户分类编号',
  PRIMARY KEY (`user_and_category_id`),
  KEY `FK_user_and_category` (`sys_user_id`),
  KEY `FK_user_and_category_sys` (`sys_category_id`),
  KEY `FK_user_and_category_user` (`user_category_id`),
  CONSTRAINT `FK_user_and_category` FOREIGN KEY (`sys_user_id`) REFERENCES `sys_user` (`sys_user_id`),
  CONSTRAINT `FK_user_and_category_sys` FOREIGN KEY (`sys_category_id`) REFERENCES `sys_category` (`sys_category_id`),
  CONSTRAINT `FK_user_and_category_user` FOREIGN KEY (`user_category_id`) REFERENCES `user_category` (`user_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `user_and_category` */

insert  into `user_and_category`(`user_and_category_id`,`sys_user_id`,`sys_category_id`,`user_category_id`) values (1,1,2,NULL),(2,2,1,NULL),(3,2,NULL,3),(4,3,2,NULL),(5,1,1,NULL),(6,1,8,NULL),(7,1,5,NULL),(8,1,NULL,2);

/*Table structure for table `user_category` */

DROP TABLE IF EXISTS `user_category`;

CREATE TABLE `user_category` (
  `user_category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类编号',
  `category_name` varchar(30) DEFAULT NULL COMMENT '分类名称',
  `category_use_count` int(11) DEFAULT NULL COMMENT '分类使用量',
  `category_article_number` int(11) DEFAULT NULL COMMENT '分类下文章数量',
  PRIMARY KEY (`user_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `user_category` */

insert  into `user_category`(`user_category_id`,`category_name`,`category_use_count`,`category_article_number`) values (1,'java入门',6,1),(2,'JavaScript高级',3,1),(3,'php初级',2,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
