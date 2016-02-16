/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-02-17 00:49:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL COMMENT 'Имя автора',
  `lastname` varchar(255) DEFAULT NULL COMMENT 'Фамилия автора',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', 'Стивен', 'Кинг');
INSERT INTO `authors` VALUES ('2', 'Александ', 'Пушкин');
INSERT INTO `authors` VALUES ('3', 'Джон ', 'Толкин');

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название книги',
  `date_create` int(11) DEFAULT NULL COMMENT 'Дата создания записи',
  `date_update` int(11) DEFAULT NULL COMMENT 'Дата обновления записи',
  `preview` varchar(255) DEFAULT NULL COMMENT 'Изображение',
  `date` date DEFAULT NULL COMMENT 'Дата выхода',
  `author_id` int(11) DEFAULT NULL COMMENT 'Автор',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'Братство Кольца', '1455569550', '1455569550', 'https://upload.wikimedia.org/wikipedia/ru/thumb/0/08/The_Lord_of_the_Rings._The_Fellowship_of_the_Ring_%E2%80%94_movie.jpg/250px-The_Lord_of_the_Rings._The_Fellowship_of_the_Ring_%E2%80%94_movie.jpg', '2016-02-01', '3');
INSERT INTO `books` VALUES ('2', 'Возвращение короля', '1455569550', '1455569550', 'https://upload.wikimedia.org/wikipedia/ru/thumb/5/53/The_Lord_of_the_Rings._The_Return_of_the_King_%E2%80%94_movie.jpg/250px-The_Lord_of_the_Rings._The_Return_of_the_King_%E2%80%94_movie.jpg', '2016-02-13', '3');
INSERT INTO `books` VALUES ('3', 'Две крепости', '1455569550', '1455569550', 'https://upload.wikimedia.org/wikipedia/ru/thumb/f/f0/The_Lord_of_the_Rings._The_Two_Towers_%E2%80%94_movie.jpg/200px-The_Lord_of_the_Rings._The_Two_Towers_%E2%80%94_movie.jpg', '2016-02-11', '3');
INSERT INTO `books` VALUES ('4', 'Руслан и людмила', '1455569550', '1455569550', 'http://sweetbook.net/uploads/topics/preview/00/00/08/08/5730d3f5d7.jpg', '2016-02-14', '2');
INSERT INTO `books` VALUES ('5', 'Оно', '1455569550', '1455569550', 'http://st.kp.yandex.net/images/film_big/94983.jpg', '2016-02-13', '1');
INSERT INTO `books` VALUES ('6', 'Сияние', '1455569550', '1455569550', 'https://upload.wikimedia.org/wikipedia/ru/archive/b/bb/20090515084019!The_shining_heres_johnny.jpg', '2016-02-05', '1');
INSERT INTO `books` VALUES ('7', 'Лангольеры', '1455569550', '1455569550', 'http://st.kp.yandex.net/images/film_big/81358.jpg', '2016-02-29', '1');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1455565672');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1455565674');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
