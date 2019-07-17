/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ads-project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-07-18 01:18:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `view_all` int(11) NOT NULL DEFAULT '0',
  `created` int(11) DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `disable` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('199', '2', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('200', '3', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('201', '5', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('202', '7', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('203', '20', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('210', '2', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('211', '3', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('212', '5', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('213', '7', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('214', '20', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('215', '21', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('216', '22', '2', '1', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `user_type`
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'Admin', '2');
INSERT INTO `user_type` VALUES ('2', 'User', '2');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `cnic` varchar(16) DEFAULT NULL,
  `jazz_no` varchar(16) DEFAULT NULL,
  `city_id` varchar(11) DEFAULT NULL,
  `referrer` varchar(100) DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT '0.000',
  `forgot_token` varchar(255) DEFAULT NULL,
  `forgot_token_expire` int(11) DEFAULT '0',
  `status` enum('Inactive','Pending','Approved') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'admin', '', '', '', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '1', '', '', '0', '', null, null, '0', 'Approved', '2019-07-06 03:32:45', '2019-07-11 15:49:37', null);
INSERT INTO `users` VALUES ('10', 'Abdul', 'Moiz', 'm0zee', '0312-3123112', 'moiz.hanif786@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '23454-3234323-1', '0309-8754321', 'Karachi', 'user@domain.com', '2.400', '0451248d6a073218b7a2dfc648a03623', '0', 'Approved', '2019-07-12 01:36:29', '2019-07-17 04:24:42', null);
INSERT INTO `users` VALUES ('11', 'Abdul', 'Moiz', 'm0zee1', '1231231123', 'user@domain.com', '4297f44b13955235245b2497399d7a93', '2', '12312312312312', '98765432', '0', null, '2.200', null, '0', 'Approved', '2019-07-12 01:08:22', '2019-07-17 01:43:29', null);
INSERT INTO `users` VALUES ('12', 'Abdul', 'Moiz', 'test', '0312-3123112', 'testkhan@gmail.com', '4297f44b13955235245b2497399d7a93', '2', '42301-7660439-0', '0312-3123___', 'Baretta', null, '0.000', null, '0', 'Approved', '2019-07-12 01:08:22', '2019-07-15 02:45:35', null);
INSERT INTO `users` VALUES ('13', 'Abdul', 'Moiz', '123', '0312-3123112', 'moiz.hanif786@gmail.com12332', '4297f44b13955235245b2497399d7a93', '2', '40123-_______-_', '0312-3______', 'Karachi', null, '0.000', null, '0', 'Approved', '2019-07-14 19:04:43', '2019-07-15 02:45:35', null);
