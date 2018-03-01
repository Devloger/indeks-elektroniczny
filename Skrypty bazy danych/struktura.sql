/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dziennik

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-15 11:38:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `czasy`
-- ----------------------------
DROP TABLE IF EXISTS `czasy`;
CREATE TABLE `czasy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `czas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of czasy
-- ----------------------------

-- ----------------------------
-- Table structure for `grupy`
-- ----------------------------
DROP TABLE IF EXISTS `grupy`;
CREATE TABLE `grupy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of grupy
-- ----------------------------

-- ----------------------------
-- Table structure for `kierunki`
-- ----------------------------
DROP TABLE IF EXISTS `kierunki`;
CREATE TABLE `kierunki` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for `wydzialy`
-- ----------------------------
DROP TABLE IF EXISTS `wydzialy`;
CREATE TABLE `wydzialy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2018_01_13_144028_create_kierunki_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_01_13_144107_create_wydzialy_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_01_13_144119_create_grupy_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_01_13_144129_create_semestry_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_01_13_144153_create_przedmioty_table', '1');
INSERT INTO `migrations` VALUES ('7', '2018_01_13_144207_create_users_table', '1');
INSERT INTO `migrations` VALUES ('8', '2018_01_13_144208_create_studenci_table', '1');
INSERT INTO `migrations` VALUES ('9', '2018_01_13_150116_create_czasy_table', '1');
INSERT INTO `migrations` VALUES ('10', '2018_01_13_150804_create_lekcje_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `przedmioty`
-- ----------------------------
DROP TABLE IF EXISTS `przedmioty`;
CREATE TABLE `przedmioty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of przedmioty
-- ----------------------------

-- ----------------------------
-- Table structure for `semestry`
-- ----------------------------
DROP TABLE IF EXISTS `semestry`;
CREATE TABLE `semestry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wartosc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- ----------------------------
-- Table structure for `studenci`
-- ----------------------------
DROP TABLE IF EXISTS `studenci`;
CREATE TABLE `studenci` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `album` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wydzial` int(10) unsigned NOT NULL,
  `semestr` int(10) unsigned NOT NULL,
  `grupa` int(10) unsigned NOT NULL,
  `kierunek` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `studenci_album_unique` (`album`),
  KEY `studenci_wydzial_index` (`wydzial`),
  KEY `studenci_semestr_index` (`semestr`),
  KEY `studenci_grupa_index` (`grupa`),
  KEY `studenci_kierunek_index` (`kierunek`),
  CONSTRAINT `studenci_grupa_foreign` FOREIGN KEY (`grupa`) REFERENCES `grupy` (`id`),
  CONSTRAINT `studenci_kierunek_foreign` FOREIGN KEY (`kierunek`) REFERENCES `kierunki` (`id`),
  CONSTRAINT `studenci_semestr_foreign` FOREIGN KEY (`semestr`) REFERENCES `semestry` (`id`),
  CONSTRAINT `studenci_wydzial_foreign` FOREIGN KEY (`wydzial`) REFERENCES `wydzialy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of studenci
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wydzial` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_pesel_unique` (`pesel`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_wydzial_index` (`wydzial`),
  CONSTRAINT `users_wydzial_foreign` FOREIGN KEY (`wydzial`) REFERENCES `wydzialy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ----------------------------
-- Table structure for `lekcje`
-- ----------------------------
DROP TABLE IF EXISTS `lekcje`;
CREATE TABLE `lekcje` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student` int(10) unsigned NOT NULL,
  `grupa` int(10) unsigned NOT NULL,
  `wykladowca` int(10) unsigned NOT NULL,
  `przedmiot` int(10) unsigned NOT NULL,
  `ocena` int(11) DEFAULT NULL,
  `data_oceny` date DEFAULT NULL,
  `ocena_poprawkowa` int(11) DEFAULT NULL,
  `data_oceny_poprawkowej` date DEFAULT NULL,
  `czas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lekcje_student_foreign` (`student`),
  KEY `lekcje_grupa_foreign` (`grupa`),
  KEY `lekcje_wykladowca_foreign` (`wykladowca`),
  KEY `lekcje_przedmiot_foreign` (`przedmiot`),
  CONSTRAINT `lekcje_grupa_foreign` FOREIGN KEY (`grupa`) REFERENCES `grupy` (`id`),
  CONSTRAINT `lekcje_przedmiot_foreign` FOREIGN KEY (`przedmiot`) REFERENCES `przedmioty` (`id`),
  CONSTRAINT `lekcje_student_foreign` FOREIGN KEY (`student`) REFERENCES `studenci` (`id`),
  CONSTRAINT `lekcje_wykladowca_foreign` FOREIGN KEY (`wykladowca`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
