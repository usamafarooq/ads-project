/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ads-project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-07-10 02:34:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ads`
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `total_clicked` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('1', 'Moiz', 'https://www.facebook.com', null, '123', null, '2', '2019-07-07 06:02:15');
INSERT INTO `ads` VALUES ('2', 'Second company', 'https://www.facebook.com', '/uploads/18519754_524358311288210_2605788100714528157_n.jpg', null, null, '2', '2019-07-07 03:48:55');

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `main_name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('2', 'Dashboard', 'dashboard', '1', 'home', 'home', '4');
INSERT INTO `modules` VALUES ('3', 'Modules', 'modules', '4', 'home', 'modules', '4');
INSERT INTO `modules` VALUES ('5', 'Role/Permission', 'role', '2', 'home', 'role', '4');
INSERT INTO `modules` VALUES ('7', 'Users', 'user', '3', 'home', 'users', '2');
INSERT INTO `modules` VALUES ('20', 'Pricing Plan', 'pricing_plan', '5', 'home', 'pricing_plan', '2');
INSERT INTO `modules` VALUES ('21', 'Ads', 'ads', '6', 'home', 'ads', '2');

-- ----------------------------
-- Table structure for `modules_fileds`
-- ----------------------------
DROP TABLE IF EXISTS `modules_fileds`;
CREATE TABLE `modules_fileds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filed_type` varchar(100) NOT NULL,
  `options` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL,
  `is_relation` int(11) NOT NULL,
  `relation_column` varchar(100) DEFAULT NULL,
  `relation_table` varchar(100) DEFAULT NULL,
  `value_column` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules_fileds
-- ----------------------------
INSERT INTO `modules_fileds` VALUES ('1', 'name', 'VARCHAR', 'input', '', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('2', 'gender', 'VARCHAR', 'radio', 'male,female', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('3', 'relationship_status', 'VARCHAR', 'select', 'single,married,divorced,widowed', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('4', 'image', 'VARCHAR', 'file', 'jpg,png,jpeg,gif', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('5', 'education', 'VARCHAR', 'checkbox', 'matric,inter,bachlor', '255', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('6', 'message', 'TEXT', 'textarea', '', '255', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('7', 'Name', 'VARCHAR', 'input', '', '100', '1', '16', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('8', 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '16', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('9', 'Name', 'VARCHAR', 'input', '', '100', '1', '17', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('10', 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '17', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('11', 'Title', 'VARCHAR', 'input', '', '255', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('12', 'Description', 'TEXT', 'textarea', '', '500', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('13', 'category', 'INT', 'input', '', '11', '1', '18', '1', 'id', 'blog_category', 'Name');
INSERT INTO `modules_fileds` VALUES ('14', 'image', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('15', 'Name', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('16', 'Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('17', 'Refer_Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('18', 'Daily_Ads', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('19', 'Amount', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('20', 'Months', 'VARCHAR', 'input', '', '10', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('21', 'Name', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('22', 'Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('23', 'Refer_Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('24', 'Daily_Ads', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('25', 'Amount', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('26', 'Months', 'VARCHAR', 'input', '', '10', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('27', 'Name', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('28', 'Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('29', 'Refer_Click_Price', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('30', 'Daily_Ads', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('31', 'Amount', 'VARCHAR', 'input', '', '100', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('32', 'Months', 'VARCHAR', 'input', '', '10', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('33', 'Name', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('34', 'Click_Price', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('35', 'Refer_Click_Price', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('36', 'Daily_Ads', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('37', 'Amount', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('38', 'Duration', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('39', 'Name', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('40', 'Click_Price', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('41', 'Refer_Click_Price', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('42', 'Daily_Ads', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('43', 'Amount', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('44', 'Duration', 'VARCHAR', 'input', '', '100', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('45', 'Name', 'VARCHAR', 'input', '', '255', '1', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('46', 'link', 'VARCHAR', 'input', '', '255', '1', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('47', 'image', 'VARCHAR', 'file', 'file', '255', '0', '21', '0', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('199', '2', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('200', '3', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('201', '5', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('202', '7', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('203', '20', '2', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('204', '2', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('205', '3', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('206', '5', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('207', '7', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('208', '20', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('209', '21', '2', '1', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `plan_user`
-- ----------------------------
DROP TABLE IF EXISTS `plan_user`;
CREATE TABLE `plan_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of plan_user
-- ----------------------------
INSERT INTO `plan_user` VALUES ('1', '10', '1', '2019-07-10 01:36:29');

-- ----------------------------
-- Table structure for `pricing_plan`
-- ----------------------------
DROP TABLE IF EXISTS `pricing_plan`;
CREATE TABLE `pricing_plan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Click_Price` varchar(100) NOT NULL,
  `Refer_Click_Price` varchar(100) NOT NULL,
  `Daily_Ads` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pricing_plan
-- ----------------------------
INSERT INTO `pricing_plan` VALUES ('1', 'Silver', '1.20', '0.20', '100', '2000', '6', '2', '2019-07-02 23:21:11');
INSERT INTO `pricing_plan` VALUES ('2', 'Standard', '1.50', '0.30', '130', '3000', '6', '2', '2019-07-02 23:22:45');
INSERT INTO `pricing_plan` VALUES ('3', 'Platinum ', '1.70', '0.40', '170', '5000', '6', '2', '2019-07-02 23:23:56');

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
  `city_id` int(11) DEFAULT NULL,
  `referrer` varchar(11) DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT NULL,
  `status` enum('Inactive','Pending','Approved') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'admin', '', '', '', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '1', '', '', '0', null, null, 'Approved', '2019-07-06 03:32:45', '2019-07-07 02:45:38', null);
INSERT INTO `users` VALUES ('10', 'Abdul', 'Moiz', 'm0zee', '1231231123', 'moiz.hanif786@gmail.com', '4297f44b13955235245b2497399d7a93', '2', '234543234323', '09875432', '0', '', null, 'Approved', '2019-07-10 01:36:29', '2019-07-10 01:38:06', null);

-- ----------------------------
-- Table structure for `user_ads_view`
-- ----------------------------
DROP TABLE IF EXISTS `user_ads_view`;
CREATE TABLE `user_ads_view` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `amount` decimal(10,3) NOT NULL,
  `referrer_amount` decimal(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_ads_view
-- ----------------------------

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
