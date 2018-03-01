/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dziennik

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-15 11:26:48
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Records of czasy
-- ----------------------------
INSERT INTO `czasy` VALUES ('1', '1', '2018-01-14 18:53:55', '2018-01-14 19:37:37');
-- ----------------------------
-- Records of grupy
-- ----------------------------

INSERT INTO `wydzialy` VALUES ('1', 'Elektrotechniki Informatyki i Automatyki', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `wydzialy` VALUES ('2', 'Prawa i Sprawiedliwosci', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `wydzialy` VALUES ('3', 'Psychologii i Socjologii', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `wydzialy` VALUES ('4', 'Fizyki i Astronomii', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `wydzialy` VALUES ('5', 'Matematyki i Robotyki', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `wydzialy` VALUES ('6', 'Autonomii', '2018-01-14 17:48:21', '2018-01-14 17:48:21');

INSERT INTO `grupy` VALUES ('1', '11INF-SP', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `grupy` VALUES ('2', '22ASM-PE', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `grupy` VALUES ('3', '33FE-ISM', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `grupy` VALUES ('4', '13INF-SP', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `grupy` VALUES ('5', '14ASM-SP', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
-- ----------------------------
-- Records of kierunki
-- ----------------------------
INSERT INTO `kierunki` VALUES ('1', 'Informatyka', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `kierunki` VALUES ('2', 'Mechanika', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `kierunki` VALUES ('3', 'Biznes Elektroniczny', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `kierunki` VALUES ('4', 'Automatyka', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `kierunki` VALUES ('5', 'Robotyka', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
-- ----------------------------
-- Records of przedmioty
-- ----------------------------
INSERT INTO `przedmioty` VALUES ('1', 'Bazy danych', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `przedmioty` VALUES ('2', 'Programowanie WEB', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `przedmioty` VALUES ('3', 'Java', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `przedmioty` VALUES ('4', 'C++', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
-- ----------------------------
-- Records of semestry
-- ----------------------------
INSERT INTO `semestry` VALUES ('1', 'Pierwszy', '1', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `semestry` VALUES ('2', 'Drugi', '2', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `semestry` VALUES ('3', 'Trzeci', '3', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `semestry` VALUES ('4', 'Czwarty', '4', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
INSERT INTO `semestry` VALUES ('5', 'Piąty', '5', '2018-01-14 17:48:20', '2018-01-14 17:48:20');
-- ----------------------------
-- Records of studenci
-- ----------------------------
INSERT INTO `studenci` VALUES ('1', 'Martyna', 'Kubiak', '71030888773', '1988-09-01', '39047', '1', '1', '1', '1', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
INSERT INTO `studenci` VALUES ('2', 'Liliana', 'Wróbel', '98110608346', '2007-12-25', '79817', '1', '1', '1', '1', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
INSERT INTO `studenci` VALUES ('3', 'Joanna', 'Bąk', '02312649296', '2001-10-04', '80727', '1', '1', '1', '1', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
INSERT INTO `studenci` VALUES ('4', 'Jędrzej', 'Dudek', '49121786613', '1995-05-26', '54719', '2', '2', '2', '2', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
INSERT INTO `studenci` VALUES ('5', 'Daria', 'Makowska', '76031279414', '2011-03-25', '69607', '2', '2', '2', '2', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Michał', 'Miładowski', '95041600111', 'admin@admin', '$2y$10$7XgJNEm/AFQooDJC9.7RqOoRS8oI4jzTgMbqQlgptFrsqZa90fYhW', '6', 'BcSK0Ko2j4EuKyQAbUUgpqxAKggm5soZJnAMYBfxynhevOVNABvBWCOQC5qe', '2018-01-14 17:48:21', '2018-01-14 17:48:21');
-- ----------------------------
-- Records of wydzialy
-- ----------------------------


INSERT INTO `lekcje` VALUES ('1', '1', '1', '1', '1', '5', '2018-01-10', '5', '2018-01-23', '1', '2018-01-14 18:57:11', '2018-01-14 19:17:47');
INSERT INTO `lekcje` VALUES ('2', '2', '1', '1', '1', null, null, null, null, '1', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `lekcje` VALUES ('3', '3', '1', '1', '1', null, null, null, null, '1', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `lekcje` VALUES ('4', '4', '2', '1', '2', null, null, null, null, '1', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
INSERT INTO `lekcje` VALUES ('5', '5', '2', '1', '2', null, null, null, null, '1', '2018-01-14 18:57:11', '2018-01-14 18:57:11');
