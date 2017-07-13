/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-13 21:11:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin`;
CREATE TABLE `ci_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin` varchar(5555) DEFAULT NULL,
  `password` varchar(5555) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1484293219 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_admin
-- ----------------------------
INSERT INTO `ci_admin` VALUES ('1', '111', '25f9e794323b453885f5181f1b624d0b', '2017-02-27 14:39:29');
INSERT INTO `ci_admin` VALUES ('1484187278', '222', '25f9e794323b453885f5181f1b624d0b', '2017-01-13 14:40:03');
INSERT INTO `ci_admin` VALUES ('1484293218', '庾治超', '25f9e794323b453885f5181f1b624d0b', null);

-- ----------------------------
-- Table structure for `ci_associated_up`
-- ----------------------------
DROP TABLE IF EXISTS `ci_associated_up`;
CREATE TABLE `ci_associated_up` (
  `associated_id` int(10) NOT NULL AUTO_INCREMENT,
  `associated_projectid` int(10) DEFAULT NULL,
  `associated_userid` int(10) DEFAULT NULL,
  `associated_score` int(10) DEFAULT NULL,
  `associated_time` datetime DEFAULT NULL,
  `associated_contract` varchar(200) DEFAULT NULL,
  `associated_digital` int(3) DEFAULT NULL,
  `associated_tag` int(1) DEFAULT NULL,
  `associated_balance` varchar(100) DEFAULT NULL,
  `associated_state` int(1) DEFAULT NULL,
  `associated_order` varchar(50) DEFAULT NULL,
  `associated_inner_trade_no` varchar(50) DEFAULT NULL,
  `associated_ransom` int(11) DEFAULT NULL,
  `associated_rebate` int(1) DEFAULT NULL,
  PRIMARY KEY (`associated_id`)
) ENGINE=InnoDB AUTO_INCREMENT=893 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_associated_up
-- ----------------------------
INSERT INTO `ci_associated_up` VALUES ('866', '15', '409', '490', '2016-09-18 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('867', '15', '409', '400', '2016-09-18 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('868', '17', '409', '492', '2016-09-18 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('869', '17', '409', '471', '2016-09-18 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('870', '17', '409', '475', '2016-09-18 13:13:44', '1', '3', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('871', '17', '409', '452', '2016-09-18 13:13:44', '1', '4', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('872', '18', '409', '215', '2016-10-15 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('873', '18', '409', '175', '2016-10-15 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('874', '19', '409', '182', '2016-10-23 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('875', '19', '409', '169', '2016-10-23 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('876', '19', '409', '139', '2016-10-23 13:13:44', '1', '3', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('877', '20', '409', '156', '2016-11-05 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('878', '20', '409', '143', '2016-11-05 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('879', '20', '409', '145', '2016-11-05 13:13:44', '1', '3', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('880', '20', '409', '126', '2016-11-05 13:13:44', '1', '4', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('881', '13', '409', '1070', '2016-09-10 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('882', '21', '409', '255', '2016-11-16 13:13:44', '1', '1', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('883', '21', '409', '195', '2016-11-16 13:13:44', '1', '2', '1', '0', '1', '201610161044170', '101147814165990021250', '1', '1');
INSERT INTO `ci_associated_up` VALUES ('884', '16', '409', '1', '2016-12-22 15:58:28', null, '1', '1', '0', null, '201603280358281', '101147814165990021250', null, '1');
INSERT INTO `ci_associated_up` VALUES ('892', '1484704775', '417', '8', '2017-01-20 14:58:26', null, '1', '1', '0', null, '201702260258268', '201702260258268', null, null);

-- ----------------------------
-- Table structure for `ci_envelope`
-- ----------------------------
DROP TABLE IF EXISTS `ci_envelope`;
CREATE TABLE `ci_envelope` (
  `envelope_id` int(11) NOT NULL AUTO_INCREMENT,
  `envelope_user_phone` varchar(100) DEFAULT NULL,
  `envelope_money` varchar(100) DEFAULT NULL,
  `envelope_range` varchar(50) DEFAULT NULL,
  `envelope_start` datetime DEFAULT NULL,
  `envelope_over` datetime DEFAULT NULL,
  `envelope_source` varchar(100) DEFAULT NULL,
  `envelope_tag` int(1) DEFAULT NULL,
  PRIMARY KEY (`envelope_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_envelope
-- ----------------------------
INSERT INTO `ci_envelope` VALUES ('1', '13558679988', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('2', '13558679988', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('3', '13558679988', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('4', '18280195336', '88', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('5', '18280195336', '16', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('6', '18280195336', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('7', '18280195336', '66', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('12', '13817004868', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('13', '13817004868', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('14', '13817004868', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('15', '13817031109', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('16', '13817031109', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('17', '13817031109', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('18', '18227685337', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('19', '18227685337', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('20', '18227685337', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('21', '13518151182', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('22', '13518151182', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('23', '13518151182', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('24', '15884434340', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('25', '15884434340', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('26', '15884434340', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('27', '17895420035', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('28', '17895420035', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('29', '17895420035', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('30', '18508197454', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('31', '18508197454', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('32', '18508197454', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('33', '15818374017', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('34', '15818374017', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('35', '15818374017', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('36', '13547925780', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('37', '13547925780', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('38', '13547925780', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('39', '15208320892', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('40', '15208320892', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('41', '15208320892', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('42', '15882055175', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('43', '15882055175', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('44', '15882055175', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('45', '18683930132', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('46', '18683930132', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('47', '18683930132', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('48', '18628175702', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('49', '18628175702', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('50', '18628175702', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('51', '18908080724', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('52', '18908080724', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('53', '18908080724', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('54', '13688378306', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('55', '13688378306', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('56', '13688378306', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('57', '13688146414', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('58', '13688146414', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('59', '13688146414', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('60', '13688386102', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('61', '13688386102', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('62', '13688386102', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('63', '18154157596', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('64', '18154157596', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('65', '18154157596', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('66', '18841824762', '16', '满¥1000减¥16', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('67', '18841824762', '36', '满¥5000减¥36', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');
INSERT INTO `ci_envelope` VALUES ('68', '18841824762', '66', '满¥10000减¥66', '2017-01-18 00:00:00', '2017-02-18 00:00:00', '新年大礼包', '1');

-- ----------------------------
-- Table structure for `ci_message`
-- ----------------------------
DROP TABLE IF EXISTS `ci_message`;
CREATE TABLE `ci_message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `message_user_phone` varchar(555) DEFAULT NULL,
  `message_name` varchar(555) DEFAULT NULL,
  `message_time` datetime DEFAULT NULL,
  `message_tag` int(10) DEFAULT NULL,
  `message_way` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_message
-- ----------------------------
INSERT INTO `ci_message` VALUES ('62', '18280195336', '111111', '2017-03-01 17:55:37', '1', '后一台');

-- ----------------------------
-- Table structure for `ci_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_permissions`;
CREATE TABLE `ci_permissions` (
  `permissions_id` int(10) NOT NULL AUTO_INCREMENT,
  `permissions_admin_id` int(10) DEFAULT NULL,
  `permissions_member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_project` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_cash` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_refund` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_redeem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_rebate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_station` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `permissions_admin` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`permissions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_permissions
-- ----------------------------
INSERT INTO `ci_permissions` VALUES ('4', '1484187278', '查看/', '查看/', '查看/', '查看/', '查看/', '查看/', '查看/', '查看/', '查看/', '查看/操作/');
INSERT INTO `ci_permissions` VALUES ('5', '1484123725', '查看/导出/', '查看/导出/', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/发送/操作/', '查看/发送/删除/', '查看/发送/删除/', '查看/操作/');
INSERT INTO `ci_permissions` VALUES ('6', '1', '查看/导出/编辑/删除/查看购买列表/', '查看/导出/修改/编辑/删除/已购项目列表/添加', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/发送/操作/', '查看/发送/删除/', '查看/发送/删除/', '查看/操作/');
INSERT INTO `ci_permissions` VALUES ('7', '1484293218', '查看/导出/编辑/删除/查看购买列表/', '查看/导出/跟新会员/编辑/删除/', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/导出/操作/', '查看/发送/操作/', '查看/发送/删除/', '查看/发送/删除/', '查看/操作/');

-- ----------------------------
-- Table structure for `ci_project`
-- ----------------------------
DROP TABLE IF EXISTS `ci_project`;
CREATE TABLE `ci_project` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(200) DEFAULT NULL,
  `project_time_start` datetime DEFAULT NULL,
  `project_time_over` datetime DEFAULT NULL,
  `project_time_subscribe` datetime DEFAULT NULL,
  `project_money_all` varchar(200) DEFAULT NULL,
  `project_introduce` varchar(5000) DEFAULT NULL,
  `project_introduction` varchar(200) DEFAULT NULL,
  `project_party` varchar(200) DEFAULT NULL,
  `project_cycle` varchar(100) DEFAULT NULL,
  `project_images` varchar(100) DEFAULT '',
  `project_images1` varchar(100) DEFAULT NULL,
  `project_images2` varchar(100) DEFAULT NULL,
  `project_images3` varchar(100) DEFAULT NULL,
  `project_images4` varchar(100) DEFAULT NULL,
  `project_images5` varchar(100) DEFAULT NULL,
  `project_tag` int(1) DEFAULT NULL,
  `project_withdrawal` varchar(100) DEFAULT NULL,
  `project_subscribe` int(3) DEFAULT NULL,
  `project_logo` varchar(100) DEFAULT NULL,
  `project_way` varchar(255) DEFAULT NULL,
  `project_data` varchar(5000) DEFAULT NULL,
  `project_one` int(1) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1487837373 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_project
-- ----------------------------
INSERT INTO `ci_project` VALUES ('13', 'ATP-1公寓', '2016-09-08 09:00:00', '2016-09-13 15:00:00', '2017-01-07 09:47:06', '1070000', '<img src=\"http://www.haitouwanhu.com/static/images/K1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/K10-7.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-1.png\"/>', '12个月', 'static/images/K0.png', 'static/images/LBXM1-5.png', 'static/images/LBXM1-4.png', 'static/images/LBXM1-3.png', 'static/images/LBXM1-2.png', 'static/images/LBXM1-1.png', '0', '10', '10', '', null, null, null);
INSERT INTO `ci_project` VALUES ('15', 'APT-5公寓', '2016-09-15 09:00:00', '2016-06-20 15:00:00', '2017-01-28 09:47:13', '890000', '<img src=\"http://www.haitouwanhu.com/static/images/Y1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/Y10-6.png\"/>', null, '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-2.png\"/>', '3-6个月', 'static/images/Y0.png', 'static/images/Y11-5.png', 'static/images/Y11-4.png', 'static/images/Y11-3.png', 'static/images/Y11-2.png', 'static/images/Y11-1.png', '0', '10', '10', null, null, null, null);
INSERT INTO `ci_project` VALUES ('17', '哈肯萨克市远观大道房产', '2016-09-18 09:00:00', '2016-09-23 15:00:00', '2017-01-03 09:47:17', '1890000', '<img src=\"http://www.haitouwanhu.com/static/images/XM20160912-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-2-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-2-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20160912-10-6.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-3.png\"/>', '3-12个月', 'static/images/XM20160912-0.png', 'static/images/LBXM3-5.png', 'static/images/LBXM3-4.png', 'static/images/LBXM3-3.png', 'static/images/LBXM3-2.png', 'static/images/LBXM3-1.png', '0', '10', '10', '', null, null, null);
INSERT INTO `ci_project` VALUES ('18', '友联市中央大街佛罗里', '2016-10-15 09:00:00', '2016-10-20 15:00:00', '2017-01-03 09:47:20', '390000', '<img src=\"http://www.haitouwanhu.com/static/images/XM20161010-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-7.png\"/><a href =\"http://cn.bing.com/ditu/?FORM=Z9LH4#JnE9LjUwMCUyYkNlbnRyYWwlMmJBdmVudWUlMmIlMjUyMyUyYkZMJTJiOVRIJTI1MmNVbmlvbiUyYkNpdHklMjUyYyUyYk5KJTJiMDcwODclN2Vzc3QuMCU3ZXBnLjEmYmI9NDAuNzczNDk0MTI0NjQxNSU3ZS03My45MDM2NDM5MzU5MTg4JTdlNDAuNzE3NzAxMjgyNjI0OSU3ZS03NC4wNzc4ODAyMzM1MjYy\" target=\"_blank\"><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-8.png\"/></a><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161010-10-6.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-4.png\"/>', '3-6个月', 'static/images/XM20161010-0.png', 'static/images/LBXM4-5.png', 'static/images/LBXM4-4.png', 'static/images/LBXM4-3.png', 'static/images/LBXM4-2.png', 'static/images/LBXM4-1.png', '0', '10', '10', '', null, null, null);
INSERT INTO `ci_project` VALUES ('19', '美洲大道800#第六公寓', '2016-10-23 09:00:00', '2016-10-28 15:00:00', '2017-01-03 09:47:22', '490000', '<img src=\"http://www.haitouwanhu.com/static/images/XM20161017-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161017-10-6.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-5.png\"/>', '3-9个月', 'static/images/XM20161017-0.png', 'static/images/LBXM5-5.png', 'static/images/LBXM5-4.png', 'static/images/LBXM5-3.png', 'static/images/LBXM5-2.png', 'static/images/LBXM5-1.png', '0', '10', '10', null, null, null, null);
INSERT INTO `ci_project` VALUES ('20', '杰斐逊公寓', '2016-11-05 09:00:00', '2016-11-11 15:00:00', '2017-01-03 09:47:25', '570000', '<img src=\"http://www.haitouwanhu.com/static/images/XM20161029-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-2-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-2-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XM20161029-10-6.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-6.png\"/>', '3-12个月', 'static/images/XM20161029-0.png', 'static/images/LBXM6-5.png', 'static/images/LBXM6-4.png', 'static/images/LBXM6-3.png', 'static/images/LBXM6-2.png', 'static/images/LBXM6-1.png', '0', '10', '10', '', null, null, null);
INSERT INTO `ci_project` VALUES ('21', 'Cast lron跃层式公寓', '2016-11-16 09:00:00', '2016-11-21 15:00:00', '2017-01-03 09:47:30', '450000', '<img src=\"http://www.haitouwanhu.com/static/images/20161110-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/XMFXTS.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-7.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-8.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-9.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-1.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-2.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-3.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-4.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-5.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-6.png\"/><img src=\"http://www.haitouwanhu.com/static/images/20161110-10-7.png\"/>', '', '<img src=\"http://www.haitouwanhu.com/static/images/XMFJJ-7.png\"/>', '3-6个月', 'static/images/20161110-0.png', 'static/images/LBXM7-5.png', 'static/images/LBXM7-4.png', 'static/images/LBXM7-3.png', 'static/images/LBXM7-2.png', 'static/images/LBXM7-1.png', '0', '10', '10', '', null, null, null);
INSERT INTO `ci_project` VALUES ('1487837372', '1111111111111111', null, '2017-02-24 10:29:30', '2017-02-24 10:29:33', '1510000', '简介', '项目面积', '项目方', '5个月', 'static/images/2017022316093158ae98bb8cbf914169360995.png', 'static/images/2017022316093158ae98bb8cbf914169360995.png', 'static/images/2017022316093158ae98bb8cbf914169360995.png', 'static/images/2017022316093158ae98bb8cbf914169360995.png', 'static/images/2017022316093158ae98bb8cbf914169360995.png', 'static/images/2017022316093158ae98bb8cbf914169360995.png', '1', '23', '2222', 'static/images/20170118095935587ecc078614518533130916.png', '收益', '20', '1');

-- ----------------------------
-- Table structure for `ci_project_data`
-- ----------------------------
DROP TABLE IF EXISTS `ci_project_data`;
CREATE TABLE `ci_project_data` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `data_projectid` int(11) DEFAULT NULL,
  `data_name` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `data_src` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_project_data
-- ----------------------------
INSERT INTO `ci_project_data` VALUES ('21', '1484288577', '2222222222', 'static/test/1 - 副本 (2).pdf');
INSERT INTO `ci_project_data` VALUES ('22', '1484288577', '5555555', 'static/test/1.pdf');
INSERT INTO `ci_project_data` VALUES ('23', '1484288577', '33333333', 'static/test/1 - 副本 (3).pdf');
INSERT INTO `ci_project_data` VALUES ('24', '1484704775', '阿斯达所大', 'static/project_pdf/1 - 副本 (3).pdf');
INSERT INTO `ci_project_data` VALUES ('25', '1487837371', '', 'project_pdf/');
INSERT INTO `ci_project_data` VALUES ('26', '1487837372', '22222222222222222', 'static/project_pdf/1 - 副本 (3).pdf');
INSERT INTO `ci_project_data` VALUES ('27', '1487837372', '1487837372', 'static/project_pdf/1 - 副本 (3).pdf');

-- ----------------------------
-- Table structure for `ci_project_gear`
-- ----------------------------
DROP TABLE IF EXISTS `ci_project_gear`;
CREATE TABLE `ci_project_gear` (
  `gear_id` int(10) NOT NULL AUTO_INCREMENT,
  `gear_projectid` int(10) DEFAULT NULL,
  `gear_money` varchar(100) DEFAULT NULL,
  `gear_each` varchar(100) DEFAULT NULL,
  `gear_copies` int(10) DEFAULT NULL,
  `gear_earning` varchar(100) DEFAULT NULL,
  `gear_digital` int(2) DEFAULT NULL,
  `gear_contract` varchar(100) DEFAULT NULL,
  `gear_signx` varchar(10) DEFAULT NULL,
  `gear_signy` varchar(10) DEFAULT NULL,
  `gear_sign_page` varchar(10) DEFAULT NULL,
  `gear_sign_docid` varchar(100) DEFAULT NULL,
  `gear_sign` varchar(100) DEFAULT NULL,
  `gear_cycle` int(2) DEFAULT NULL,
  `gear_images` varchar(100) DEFAULT NULL,
  `gear_redeem` int(1) DEFAULT NULL,
  PRIMARY KEY (`gear_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_project_gear
-- ----------------------------
INSERT INTO `ci_project_gear` VALUES ('23', '14', '135000', '1000', '0', '8.20%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '3', null, null);
INSERT INTO `ci_project_gear` VALUES ('24', '14', '127000', '1000', '0', '9.15%\r\n', '2', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '6', null, null);
INSERT INTO `ci_project_gear` VALUES ('25', '14', '121000', '1000', '0', '11.05%', '3', null, '', null, null, '1479696364609HC1O1', '1479696364609QVGB2', '9', null, null);
INSERT INTO `ci_project_gear` VALUES ('26', '14', '117000', '1000', '0', '12.06%', '4', null, '', null, null, '1479696364609HC1O1', '1479696364609QVGB2', '12', null, null);
INSERT INTO `ci_project_gear` VALUES ('27', '16', '1350', '1000', '132', '8.20%', '1', 'demo.pdf', '0.2', '0.1', '8', '1479696364609HC1O1', '1479696364609QVGB2', '3', 'static/images/3_mo.png', null);
INSERT INTO `ci_project_gear` VALUES ('28', '16', '1210', '2000', '126', '9.15%', '2', 'demo.pdf', '0.1', '0.1', '8', '1479696364609HC1O1', '1479696364609QVGB2', '6', 'static/images/6_mo.png', null);
INSERT INTO `ci_project_gear` VALUES ('29', '16', '1170', '3000', '121', '11.05%', '3', 'demo.pdf', '0.1', '0.1', '8', '1479696364609HC1O1', '1479696364609QVGB2', '9', 'static/images/9_mo.png', null);
INSERT INTO `ci_project_gear` VALUES ('30', '16', '1350', '4000', '115', '12.06%', '4', 'demo.pdf', '0.1', '0.1', '8', '1479696364609HC1O1', '1479696364609QVGB2', '12', 'static/images/12_mo.png', null);
INSERT INTO `ci_project_gear` VALUES ('31', '15', '490000', '1000', '0', '8.50%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '3', null, null);
INSERT INTO `ci_project_gear` VALUES ('32', '15', '0', '1000', '0', '11.00%', '2', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '6', null, null);
INSERT INTO `ci_project_gear` VALUES ('33', '17', '492000', '1000', '0', '6.95%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '3', null, null);
INSERT INTO `ci_project_gear` VALUES ('34', '17', '471000', '1000', '0', '7.09%', '2', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '6', null, null);
INSERT INTO `ci_project_gear` VALUES ('35', '17', '475000', '1000', '0', '8.04%', '3', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '9', null, null);
INSERT INTO `ci_project_gear` VALUES ('36', '17', '452000', '1000', '0', '12.01%', '4', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '12', null, null);
INSERT INTO `ci_project_gear` VALUES ('37', '18', '215000', '1000', '0', '8.33%', '1', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '3', '', null);
INSERT INTO `ci_project_gear` VALUES ('38', '18', '175000', '1000', '0', '10.27%', '2', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '6', '', null);
INSERT INTO `ci_project_gear` VALUES ('39', '19', '182000', '1000', '0', '6.92%', '1', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '3', '', null);
INSERT INTO `ci_project_gear` VALUES ('40', '19', '169000', '1000', '0', '9.25%', '2', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '6', '', null);
INSERT INTO `ci_project_gear` VALUES ('41', '19', '139000', '1000', '0', '11.02%', '3', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '9', '', null);
INSERT INTO `ci_project_gear` VALUES ('42', '20', '156000', '1000', '0', '7.25%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '3', null, null);
INSERT INTO `ci_project_gear` VALUES ('43', '20', '143000', '1000', '0', '9.52%', '2', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '6', null, null);
INSERT INTO `ci_project_gear` VALUES ('44', '20', '145000', '1000', '0', '11.20%', '3', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '9', null, null);
INSERT INTO `ci_project_gear` VALUES ('45', '20', '126000', '1000', '0', '12.09%', '4', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '12', null, null);
INSERT INTO `ci_project_gear` VALUES ('46', '13', '1070000', '1000', '0', '12.05%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '12', null, null);
INSERT INTO `ci_project_gear` VALUES ('47', '21', '255000', '1000', '0', '8.53%', '1', null, null, null, null, '1479696364609HC1O1', '1479696364609QVGB2', '3', null, null);
INSERT INTO `ci_project_gear` VALUES ('48', '21', '195000', '1000', '0', '10.11%', '2', '', '', '', '', '1479696364609HC1O1', '1479696364609QVGB2', '6', 'static/images/12_mo.png', null);
INSERT INTO `ci_project_gear` VALUES ('57', '1484704775', '22222222222', '222', '66', '22222222222222', '1', '1 - 副本 (3).pdf', '0.1', '0.1', '15', null, null, '3', 'static/images/20170118095935587ecc078614518533130917.png', null);

-- ----------------------------
-- Table structure for `ci_user`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user`;
CREATE TABLE `ci_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_phone` varchar(555) DEFAULT NULL,
  `user_passwork` varchar(555) DEFAULT NULL,
  `user_time` datetime DEFAULT NULL,
  `user_sex` varchar(10) DEFAULT NULL,
  `user_wechat` varchar(555) DEFAULT NULL,
  `user_email` varchar(555) DEFAULT NULL,
  `user_name` varchar(555) DEFAULT NULL,
  `user_IDcard` varchar(555) DEFAULT NULL,
  `user_province` varchar(555) DEFAULT NULL,
  `user_city` varchar(555) DEFAULT NULL,
  `user_town` varchar(555) DEFAULT NULL,
  `user_birth` varchar(555) DEFAULT NULL,
  `user_sign_id` varchar(100) DEFAULT NULL,
  `user_sign` varchar(100) DEFAULT NULL,
  `user_money` varchar(100) DEFAULT NULL,
  `user_grade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=572 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user
-- ----------------------------
INSERT INTO `ci_user` VALUES ('1', '13558679988', '123456', '2017-01-05 10:06:27', null, null, null, '李静', '5139221555555555', '四川', '成都', '金牛区', null, '1', '13558679988', '0', 'S');
INSERT INTO `ci_user` VALUES ('2', '13666228091', 'tc791001', '2017-01-03 12:26:28', null, null, null, '马恒怡', '510106198812023823', '四川', '成都', '金牛区', '1988年12月02日', '1', '13666228091', '0', 'B');
INSERT INTO `ci_user` VALUES ('3', '13980721161', 'zhangji554301', '2017-01-03 12:46:16', null, null, 'zhangji237@qq.con', '张冀', '510106198811034117', '四川', '成都', '金牛区', '1988年11月03日', '1', '13980721161', '0', 'B');
INSERT INTO `ci_user` VALUES ('4', '13880072825', '520522', '2017-01-03 12:53:51', null, null, null, '廖大龙', '510105198805221518', '四川', '成都', '青羊区', '1988年05月22日', null, '13880072825', '0', 'B');
INSERT INTO `ci_user` VALUES ('5', '13408516752', '090725', '2017-01-03 13:11:21', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('6', '13808082046', '904255', '2017-01-03 13:12:41', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('7', '13678072660', 'wppylylj', '2017-01-03 13:18:21', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('8', '13666167170', '886456cc', '2017-01-03 13:45:42', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('9', '18280195336', '123456', '2017-01-13 15:26:57', '阿斯达大师', 'Y111111111', '1932425337@qq.com', '庾治超', '513922199607140650', '四川', '资阳', '乐至县', '1996年07月14日', '1', '18280195336', '0', 'C');
INSERT INTO `ci_user` VALUES ('10', '14708159776', '123456', '2017-01-04 15:27:12', '成都市武侯区天府五街', 'zl738752334', 'mdzz@qq.com', '周林', '513721199610025197', null, null, null, null, null, null, '0', 'A');
INSERT INTO `ci_user` VALUES ('11', '18980033938', 'wyx980520', '2017-01-04 16:53:02', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('12', '18080432295', '123456', '2017-01-05 10:33:20', null, null, 'yang_55635359@qq.com', null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('13', '18227667382', '84434629', '2017-01-06 09:50:32', null, null, null, '邓翔宇', '510105199206273273', '四川', '成都', '青羊区', '1992年06月27日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('14', '13882269070', 'yqs880304', '2017-01-06 10:25:38', null, null, null, '杨秦生', '510105198803041513', '四川', '成都', '青羊区', '1988年03月04日', '1', '13882269070', '0', 'B');
INSERT INTO `ci_user` VALUES ('15', '13668131151', 'lyj0613', '2017-01-06 11:00:30', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('16', '15982887021', '564335', '2017-01-08 12:06:51', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('17', '13817004868', '19850447', '2017-02-05 21:55:47', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('18', '13817031109', 'champion840119', '2017-02-06 02:57:33', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('19', '18227685337', 'yqm416213', '2017-02-08 00:08:32', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('20', '13518151182', '20170209', '2017-02-09 16:04:00', null, null, null, '吴良川', '652801198404030513', '新疆', '巴音郭楞', '库尔勒市', '1984年04月03日', '1', '13518151182', '0', 'B');
INSERT INTO `ci_user` VALUES ('21', '15884434340', '123456789', '2017-02-09 17:09:42', null, null, null, '颜浩', '510121199202067819', '四川', '成都', '金堂县', '1992年02月06日', '1', '15884434340', '0', 'B');
INSERT INTO `ci_user` VALUES ('22', '17895420035', 'a123456', '2017-02-10 15:45:23', null, null, null, '郑小雷', '513001196906010253', '四川', '达州', '达川区', '1969年06月01日', null, null, '0', 'B');
INSERT INTO `ci_user` VALUES ('23', '18508197454', '111111', '2017-02-10 23:21:58', null, null, null, '涂雄伟', '360102198610273337', '江西', '南昌', '东湖区', '1986年10月27日', null, '18508197454', '0', 'B');
INSERT INTO `ci_user` VALUES ('24', '15818374017', 'a15818374017', '2017-02-13 10:40:33', null, null, null, '李长晓', '411329198908013534', '河南', '南阳', '新野县', '1989年08月01日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('25', '13547925780', 'yuanhongbin', '2017-02-13 16:07:43', '', null, null, '袁洪斌', '513701198809184339', '四川', '巴中', '巴中市', '1988年09月18日', '1', '13547925780', '0', 'B');
INSERT INTO `ci_user` VALUES ('26', '15208320892', '123456Q', '2017-02-14 14:16:39', null, null, null, '张华建', '510108197911130016', '四川', '成都', '成华区', '1979年11月13日', '1', '15208320892', '0', 'B');
INSERT INTO `ci_user` VALUES ('27', '15882055175', 'wswcx520', '2017-02-14 14:35:17', null, null, null, '王晨曦', '511381198909194073', '四川', '南充', '阆中市', '1989年09月19日', '1', '15882055175', '0', 'B');
INSERT INTO `ci_user` VALUES ('28', '18683930132', '861104', '2017-02-14 14:53:15', null, null, null, '凌杰', '510104198611041475', '四川', '成都', '锦江区', '1986年11月04日', '1', '18683930132', '0', 'B');
INSERT INTO `ci_user` VALUES ('29', '18628175702', 'yang418', '2017-02-14 15:59:34', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('30', '18908080724', 'ly19847258', '2017-02-14 16:14:42', null, null, null, '李云', '510105198407021270', '四川', '成都', '青羊区', '1984年07月02日', '1', '18908080724', '0', 'B');
INSERT INTO `ci_user` VALUES ('31', '13688378306', '880816', '2017-02-14 17:12:01', null, null, null, '李卓洋', '513030198808160056', '四川', '达州', '渠县', '1988年08月16日', null, '13688378306', '0', 'B');
INSERT INTO `ci_user` VALUES ('32', '13688146414', '122688', '2017-02-15 00:24:11', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('33', '13688386102', '3521668', '2017-02-15 15:53:59', null, null, null, '徐琳', '510106198806130024', '四川', '成都', '金牛区', '1988年06月13日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('34', '18154157596', 'a12345678', '2017-02-16 14:22:25', null, null, null, '宋晓洁', '370521198109200022', '山东', '东营', '垦利县', '1981年09月20日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('35', '13678109160', '770420yx', '2017-02-17 16:39:56', null, null, null, '吴永削', '152634197704200012', '内蒙古', '乌兰察布', '四子王旗', '1977年04月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('36', '13881953083', '13881953083', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('37', '15108201288', '15108201288', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('38', '13608018228', '13608018228', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('39', '13980523661', '13980523661', '2017-02-17 16:39:56', null, null, null, '熊星', '510108198106010315', '四川', '成都', '成华区', '1981年06月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('40', '13808044682', '13808044682', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('41', '13880982321', '13880982321', '2017-02-17 16:39:56', null, null, null, '车美娟', '510183198307104369', '四川', '成都', '邛崃', '1983年07月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('42', '13308208295', '13308208295', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('43', '18982191211', '18982191211', '2017-02-17 16:39:56', null, null, null, '严梅', '510107198112114624', '四川', '成都', '武侯区', '1981年12月11日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('44', '13908091095', '13908091095', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('45', '13980020588', '13980020588', '2017-02-17 16:39:56', null, null, null, '何云友', '511011198611296258', '四川', '内江', ' 东兴区', '1986年11月29日', null, '13980020588', null, 'B');
INSERT INTO `ci_user` VALUES ('46', '15882265400', '15882265400', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('47', '13882085669', '13882085669', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('48', '13982293675', '13982293675', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('49', '13558899295', '13558899295', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('50', '13618099733', '13618099733', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('51', '13981911636', '13981911636', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('52', '13880929679', '13880929679', '2017-02-17 16:39:56', null, null, null, '陈婉怡', '511321198103105186', '四川', '南充', '南部县', '1981年03月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('53', '13094411949', '13094411949', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('54', '13547892598', '13547892598', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('55', '13558817649', '13558817649', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('56', '13882182372', '13882182372', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('57', '13075436643', '13075436643', '2017-02-17 16:39:56', null, null, null, '许诚', '510106199408131819', '四川', '成都', '金牛区\r\n', '1994年08月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('58', '13908042299', '13908042299', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('59', '13908001732', '13908001732', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('60', '13880244561', '13880244561', '2017-02-17 16:39:56', null, null, null, '赵波', '430626197909135635', '湖南', '岳阳', '平江', '1979年09月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('61', '15828221019', '15828221019', '2017-02-17 16:39:57', null, null, null, '杜剑波', '513021197711188713', '四川', '达州', '达县', '1977年11月18日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('62', '13094431846', '13094431846', '2017-02-17 16:39:57', null, null, null, '谭森耀', '513029198207010070', '四川', '达州', '大竹县', '1982年07月01日\r\n1982年07月01日\r\n', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('63', '13880645796', '13880645796', '2017-02-17 16:39:57', null, null, null, '贺岷珏', '510181198012176725', '四川', '成都', '都江堰', '1980年12月17日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('64', '13320686375', '13320686375', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('65', '13880075666', '13880075666', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('66', '13683475344', '13683475344', '2017-02-17 16:39:57', null, null, null, '刘扬', '652201198104206019', '新疆', '哈密', '哈密市', '1981年04月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('67', '13908182202', '13908182202', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('68', '13408083502', '13408083502', '2017-02-17 16:39:57', null, null, null, '白志鹏', '510106198101254115', '四川', '成都', '金牛区 ', '1981年01月25日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('69', '18728812170', '18728812170', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('70', '15208368868', '15208368868', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('71', '13308088357', '13308088357', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('72', '13458596878', '13458596878', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('73', '13982268568', '13982268568', '2017-02-17 16:39:57', null, null, null, '季宏', '510105198003121013', '四川', '成都', '青羊区', '1980年03月12日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('74', '13808007994', '13808007994', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('75', '13880532161', '13880532161', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('76', '13982832771', '13982832771', '2017-02-17 16:39:57', null, null, null, '秦立祥', '510105198707200270', '四川', '成都', '青羊区', '1987年07月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('77', '13981294799', '13981294799', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('78', '13688348606', '13688348606', '2017-02-17 16:39:57', null, null, null, '罗荔芊', '510107197709210024', '四川', '成都', '武侯区 ', '1977年09月21日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('79', '13808028679', '13808028679', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('80', '13881805222', '13881805222', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('81', '13608197978', '13608197978', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('82', '13708072450', '13708072450', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('83', '13808029592', '13808029592', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('84', '13678069979', '13678069979', '2017-02-17 16:39:57', null, null, null, '王臻', '510112198502011832', '四川', '成都', '龙泉驿区', '1985年02月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('85', '13908000798', '13908000798', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('86', '15181153253', '15181153253', '2017-02-18 04:36:38', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('87', '13018212088', '13018212088', '2017-02-18 08:36:38', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('88', '13088024246', '13088024246', '2017-02-18 08:38:36', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('89', '13688496681', '13688496681', '2017-02-18 09:36:00', null, null, null, '童琴', '511132198304160024', '四川', '乐山', '峨边县', '1983年04月16日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('90', '18602889523', '18602889523', '2017-02-18 10:30:00', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('91', '13550000247', '13550000247', '2017-02-18 10:44:38', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('92', '13808035930', '13808035930', '2017-02-18 12:13:38', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('93', '13982000108', '13982000108', '2017-02-18 13:01:33', null, null, null, '张超', '510104198201171891', '四川', '成都', '锦江区', '1982年01月17日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('94', '13608091056', '13608091056', '2017-02-18 13:36:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('95', '13981814061', '13981814061', '2017-02-18 13:50:38', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('96', '13981795762', '13981795762', '2017-02-18 14:05:07', null, null, null, '杨鹏', '362429197501104335', '江西', '吉安', '安福县', '1975年01月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('97', '3908070902', '3908070902', '2017-02-18 14:20:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('98', '13628054336', '13628054336', '2017-02-18 15:36:39', null, null, null, '毛芙蓉', '510107197607063000', '四川', '成都', '武侯区', '1976年07月06日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('99', '13088079817', '13088079817', '2017-02-18 15:50:09', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('100', '18980785299', '18980785299', '2017-02-18 16:02:21', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('101', '13540774083', '13540774083', '2017-02-18 16:14:15', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('102', '13880617231', '13880617231', '2017-02-18 16:27:21', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('103', '13980509271', '13980509271', '2017-02-18 16:36:03', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('104', '13880481066', '13880481066', '2017-02-18 16:40:39', null, null, null, '马丽', '510181198306281926', '四川', '成都', '都江堰市', '1983年06月28日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('105', '13908276724', '13908276724', '2017-02-18 16:45:20', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('106', '13398177022', '13398177022', '2017-02-18 16:48:35', null, null, null, '周逸锦', '510107199601061273', '四川', '成都', '武侯区', '1996年01月06日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('107', '13982166688', '13982166688', '2017-02-18 17:50:45', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('108', '13666213099', '13666213099', '2017-02-18 17:36:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('109', '13628350770', '13628350770', '2017-02-18 19:00:39', null, null, null, '凌勇', '510282198004240813', '', '重庆', '江津区', '1980年04月24日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('110', '13980799509', '13980799509', '2017-02-18 19:05:01', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('111', '13881884829', '13881884829', '2017-02-18 19:21:09', null, null, null, '曾凯特', '330302198506234018', '浙江', '温州', '鹿城区', '1985年06月23日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('112', '13708190789', '13708190789', '2017-02-18 20:15:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('113', '13438390721', '13438390721', '2017-02-18 20:36:39', null, null, null, '李静', '650106198501220820', '新疆', '乌鲁木齐', '头屯河区', '1985年01月22日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('114', '13618075396', '13618075396', '2017-02-18 20:40:15', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('115', '13086628878', '13086628878', '2017-02-18 20:36:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('116', '13688043275', '13688043275', '2017-02-18 20:40:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('117', '13111872332', '13111872332', '2017-02-18 20:43:45', null, null, null, '谢金池', '360124198710156654', '江西', '南昌', '进贤县', '1987年10月15日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('118', '13982090961', '13982090961', '2017-02-18 20:50:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('119', '15928070447', '15928070447', '2017-02-18 21:23:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('120', '13679076293', '13679076293', '2017-02-18 22:36:39', null, null, null, '胡余峰', '510107197905012674', '四川', '成都', '武侯区', '1979年05月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('121', '13708212503', '13708212503', '2017-02-19 08:05:23', null, null, null, '梁建', '510521198110077013', '四川', '泸州', '泸县', '1981年10月07日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('122', '13882638875', '13882638875', '2017-02-19 08:36:07', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('123', '13018273930', '13018273930', '2017-02-19 08:46:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('124', '13880593248', '13880593248', '2017-02-19 08:57:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('125', '13558765753', '13558765753', '2017-02-19 09:14:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('126', '13194882725', '13194882725', '2017-02-19 09:36:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('127', '18608003609', '18608003609', '2017-02-19 09:47:45', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('128', '13666169949', '13666169949', '2017-02-19 09:50:28', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('129', '18980886860', '18980886860', '2017-02-19 10:03:45', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('130', '15183655566', '15183655566', '2017-02-19 10:13:20', null, null, null, '申伟弘', '510681198512040055', '四川', '德阳', '广汉市', '1985年12月04日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('131', '13880745966', '13880745966', '2017-02-19 10:23:39', null, null, null, '杨路', '510402198411100913', '四川', '攀枝花', '东区', '1984年11月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('132', '13547841391', '13547841391', '2017-02-19 10:45:23', null, null, null, '易欢', '510106199104111421', '四川', '成都', '金牛区', '1991年04月11日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('133', '13608090305', '13608090305', '2017-02-19 10:50:39', null, null, null, '胡书桃', '510112198201010027', '四川', '成都', '龙泉驿区', '1982年01月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('134', '13808050335', '13808050335', '2017-02-19 11:02:15', null, null, null, '罗乃曦', '51010819810326001X', '四川', '成都', '成华区', '1981年03月26日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('135', '13908045957', '13908045957', '2017-02-19 11:15:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('136', '13882230318', '13882230318', '2017-02-19 11:23:39', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('137', '18980616991', '18980616991', '2017-02-19 11:27:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('138', '13980567128', '13980567128', '2017-02-19 11:35:22', null, null, null, '余栋梁', '511323198610132974', '四川', '南充', '蓬安县', '1986年10月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('139', '13551130371', '13551130371', '2017-02-19 11:57:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('140', '13880486995', '13880486995', '2017-02-19 12:12:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('141', '13896213558', '13896213558', '2017-02-19 12:24:37', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('142', '13540280096', '13540280096', '2017-02-19 12:27:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('143', '13908171225', '13908171225', '2017-02-19 12:40:20', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('144', '13808078889', '13808078889', '2017-02-19 12:53:37', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('145', '15884465643', '15884465643', '2017-02-19 12:57:40', null, null, null, '王帅帅', '370302199002222111', '山东', '淄博', '淄川区', '1990年02月22日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('146', '18608062667', '18608062667', '2017-02-19 13:27:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('147', '13880749990', '13880749990', '2017-02-19 14:37:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('148', '13808223133', '13808223133', '2017-02-19 15:20:10', null, null, null, '袁科', '511502198502090016', '四川', '宜宾', '翠屏区', '1985年02月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('149', '13684089816', '13684089816', '2017-02-19 15:37:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('150', '13108330633', '13108330633', '2017-02-19 16:50:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('151', '13982092980', '13982092980', '2017-02-19 17:38:20', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('152', '13880777524', '13880777524', '2017-02-19 17:45:35', null, null, null, '李建梅', '511024198509134561', '四川', '内江', '威远县', '1985年09月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('153', '13880448082', '13880448082', '2017-02-19 17:48:07', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('154', '13808065855', '13808065855', '2017-02-19 17:56:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('155', '13308181932', '13308181932', '2017-02-19 18:15:40', null, null, null, '余书洋', '510104199002073177', '四川', '成都', '锦江区', '1990年02月07日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('156', '15680666600', '15680666600', '2017-02-19 18:23:35', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('157', '13438219889', '13438219889', '2017-02-19 18:27:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('158', '13980633798', '13980633798', '2017-02-19 18:30:50', null, null, null, '刘根固', '510108198611300612', '四川', '成都', '成华区', '1986年11月30日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('159', '13678008951', '13678008951', '2017-02-19 18:50:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('160', '13908035188', '13908035188', '2017-02-19 20:27:15', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('161', '13808080292', '13808080292', '2017-02-19 21:15:40', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('162', '13693442078', '13693442078', '2017-02-19 21:37:40', null, null, null, '潘晓飞', '510108198801260068', '四川', '成都', '成华区', '1988年01月26日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('163', '13880611755', '13880611755', '2017-02-20 05:20:54', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('164', '13981881555', '13981881555', '2017-02-20 06:21:28', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('165', '13709006797', '13709006797', '2017-02-20 06:43:47', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('166', '13981389876', '13981389876', '2017-02-20 06:50:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('167', '13980811223', '13980811223', '2017-02-20 07:57:23', null, null, null, '姚直亨', '510104198608230478', '四川', '成都', '锦江区', '1986年08月23日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('168', '13551200102', '13551200102', '2017-02-20 08:09:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('169', '13880008011', '13880008011', '2017-02-20 08:37:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('170', '13330983670', '13330983670', '2017-02-20 08:50:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('171', '18980097973', '18980097973', '2017-02-20 09:09:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('172', '13882291015', '13882291015', '2017-02-20 09:35:48', null, null, null, '刘婧玉', '210682198402200041', '辽宁', '丹东', '凤城市', '1984年02月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('173', '13551886234', '13551886234', '2017-02-20 09:50:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('174', '13908088581', '13908088581', '2017-02-20 10:09:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('175', '13981751760', '13981751760', '2017-02-20 10:23:58', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('176', '13060090016', '13060090016', '2017-02-20 15:09:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('177', '13908171161', '13908171161', '2017-02-20 15:25:20', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('178', '13518219377', '13518219377', '2017-02-20 15:31:48', null, null, null, '曾广明', '510107199001081596', '四川', '成都', '武侯区', '1990年01月08日', '1', '13518219377', null, 'B');
INSERT INTO `ci_user` VALUES ('179', '13908187556', '13908187556', '2017-02-20 15:35:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('180', '13908054828', '13908054828', '2017-02-20 15:47:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('181', '13072863818', '13072863818', '2017-02-20 15:49:58', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('182', '13629003558', '13629003558', '2017-02-20 15:57:00', null, null, null, '李杰', '511025198807088811', '四川', '内江', '资中', '1988年07月08日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('183', '15082239456', '15082239456', '2017-02-20 15:09:35', null, null, null, '石晶', '510104198912292622', '四川', '成都', '锦江区', '1989年12月29日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('184', '13658010045', '13658010045', '2017-02-20 15:09:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('185', '13880492922', '13880492922', '2017-02-20 15:19:53', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('186', '18980839783', '18980839783', '2017-02-20 15:21:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('187', '13668119238', '13668119238', '2017-02-20 15:27:35', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('188', '15208220572', '15208220572', '2017-02-20 15:37:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('189', '13997169566', '13997169566', '2017-02-20 15:47:35', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('190', '13689099022', '13689099022', '2017-02-20 15:50:45', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('191', '13308201234', '13308201234', '2017-02-20 16:09:48', null, null, null, '朱华磊', '510107198802222198', '四川', '成都', '武侯区', '1988年02月22日', null, '13308201234', null, 'B');
INSERT INTO `ci_user` VALUES ('192', '13882257536', '13882257536', '2017-02-20 15:17:22', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('193', '13908177473', '13908177473', '2017-02-20 15:23:35', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('194', '13890968455', '13890968455', '2017-02-20 15:30:37', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('195', '13688333730', '13688333730', '2017-02-20 15:31:01', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('196', '13881844766', '13881844766', '2017-02-20 15:35:09', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('197', '15882258540', '15882258540', '2017-02-20 15:47:35', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('198', '13550283535', '13550283535', '2017-02-20 15:50:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('199', '13882288942', '13882288942', '2017-02-20 16:01:59', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('200', '13808285318', '13808285318', '2017-02-20 16:15:23', null, null, null, '郭睿涵', '510502198702160030', '四川', '泸州', '江阳区', '1987年02月16日', null, '13808285318', null, 'B');
INSERT INTO `ci_user` VALUES ('201', '13608013020', '13608013020', '2017-02-20 16:23:48', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('202', '13730857848', '13730857848', '2017-02-20 16:15:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('203', '13678002725', '13678002725', '2017-02-20 16:23:11', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('204', '15982001063', '15982001063', '2017-02-20 16:25:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('205', '13568802118', '13568802118', '2017-02-20 16:31:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('206', '13908011177', '13908011177', '2017-02-20 16:32:00', null, null, null, '何效珂', '50010319890505621X', '重庆', '重庆', '渝中区', '1989年05月05日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('207', '18683812868', '18683812868', '2017-02-20 16:45:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('208', '18980078035', '18980078035', '2017-02-20 16:53:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('209', '13551136045', '13551136045', '2017-02-20 17:09:52', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('210', '18980005459', '18980005459', '2017-02-20 17:15:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('211', '13608238933', '13608238933', '2017-02-20 17:23:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('212', '13436188702', '13436188702', '2017-02-20 17:23:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('213', '15982347138', '15982347138', '2017-02-20 17:25:23', null, null, null, '何谷川', '51010619850216441X', '四川', '成都', '金牛区', '1985年02月16日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('214', '13883222667', '13883222667', '2017-02-20 17:27:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('215', '13568824266', '13568824266', '2017-02-20 17:29:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('216', '13990408002', '13990408002', '2017-02-20 17:32:11', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('217', '13419161866', '13419161866', '2017-02-20 17:35:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('218', '15883394274', '15883394274', '2017-02-20 17:40:39', null, null, null, '张博', '511621198706205473', '四川', '广安', '岳池县', '1987年06月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('219', '13568973738', '13568973738', '2017-02-20 17:50:54', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('220', '13666171978', '13666171978', '2017-02-20 18:03:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('221', '15982403505', '15982403505', '2017-02-20 18:07:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('222', '13808039431', '13808039431', '2017-02-20 18:09:23', null, null, null, '何九江', '511321199206270170', ' 四川', '南充', '南部县', '1992年06月27日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('223', '13981970702', '13981970702', '2017-02-20 18:10:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('224', '13688096263', '13688096263', '2017-02-20 18:18:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('225', '13981723610', '13981723610', '2017-02-20 18:23:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('226', '13880898300', '13880898300', '2017-02-20 18:47:22', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('227', '13880441537', '13880441537', '2017-02-20 18:58:12', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('228', '13880613877', '13880613877', '2017-02-20 19:09:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('229', '13628069985', '13628069985', '2017-02-20 19:15:05', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('230', '13980476926', '13980476926', '2017-02-20 19:23:21', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('231', '13608080202', '13608080202', '2017-02-20 19:27:49', null, null, null, '陈超', '340403198701040415', ' 安徽', '淮南', '田家庵区', '1987年01月04日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('232', '13981889168', '13981889168', '2017-02-20 19:39:03', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('233', '15982839920', '15982839920', '2017-02-20 19:43:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('234', '13666266951', '13666266951', '2017-02-20 19:50:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('235', '13980503888', '13980503888', '2017-02-20 20:09:32', null, null, null, '刘昊坤', '510105199702212779', '四川', '成都', '青羊区', '1997年02月21日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('236', '13678172072', '13678172072', '2017-02-20 20:15:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('237', '13980042627', '13980042627', '2017-02-20 20:23:11', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('238', '13438245898', '13438245898', '2017-02-20 20:32:55', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('239', '1380803943', '1380803943', '2017-02-20 20:45:11', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('240', '18628057257', '18628057257', '2017-02-20 20:57:30', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('241', '13880783251', '13880783251', '2017-02-20 21:09:31', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('242', '15982179830', '15982179830', '2017-02-20 21:13:49', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('243', '13550100759', '13550100759', '2017-02-20 21:15:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('244', '13518207999', '13518207999', '2017-02-20 21:23:49', null, null, null, '邓宏博', '510105198910313799', ' 四川', '成都', '青羊区', null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('245', '18982277833', '18982277833', '2017-02-20 21:43:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('246', '13982086966', '13982086966', '2017-02-20 21:56:11', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('247', '13980079325', '13980079325', '2017-02-20 22:09:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('248', '13372716811', '13372716811', '2017-02-20 22:13:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('249', '13608207749', '13608207749', '2017-02-20 22:13:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('250', '13808094180', '13808094180', '2017-02-20 22:23:52', null, null, null, '范纤千', '510106200006141825', '四川', '成都', '金牛区', '2000年06月14日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('251', '13882227738', '13882227738', '2017-02-20 22:32:50', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('252', '13982250399', '13982250399', '2017-02-20 22:45:22', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('253', '13881853922', '13881853922', '2017-02-20 22:59:20', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('254', '13908069316', '13908069316', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('255', '13881860794', '13881860794', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('256', '15982005516', '15982005516', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('257', '15228930256', '15228930256', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('258', '13908067445', '13908067445', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('259', '13880627231', '13880627231', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('260', '13980971356', '13980971356', '2017-02-20 16:19:33', null, null, null, '张嘉维', '510122199611073212', '四川', '成都', '双流县', '1996年11月07日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('261', '13981953779', '13981953779', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('262', '15882472542', '15882472542', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('263', '13908034084', '13908034084', '2017-02-20 16:19:33', null, null, null, '刁鑫', '510106199106144438', '四川', '成都', '金牛区', '1991年06月14日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('264', '13882070338', '13882070338', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('265', '18782246968', '18782246968', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('266', '13541233657', '13541233657', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('267', '13666258243', '13666258243', '2017-02-20 16:19:33', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('268', '18608311682', '18608311682', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('269', '13980558671', '13980558671', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('270', '13183874769', '13183874769', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('271', '15982825258', '15982825258', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('272', '13350073877', '13350073877', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('273', '13688018368', '13688018368', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('274', '13558816384', '13558816384', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('275', '15108257367', '15108257367', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('276', '13981927989', '13981927989', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('277', '13880532115', '13880532115', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('278', '13880690138', '13880690138', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('279', '13666109213', '13666109213', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('280', '15982151410', '15982151410', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('281', '13458051873', '13458051873', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('282', '15982105554', '15982105554', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('283', '13402891882', '13402891882', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('284', '18628169868', '18628169868', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('285', '15082225866', '15082225866', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('286', '13880930257', '13980083574', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('287', '15908134673', '15908134673', '2017-02-20 16:19:34', null, null, null, '杨志', '510922198102090291', '四川', '遂宁', '射洪县', '1981年02月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('288', '15082160300', '15082160300', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('289', '18980863720', '18980863720', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('290', '13880403958', '13880403958', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('291', '13198277170', '13198277170', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('292', '15982285878', '15982285878', '2017-02-20 16:19:34', null, null, null, '熊楚', '510106198202282916', '四川', '成都', '金牛区', '1982年02月28日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('293', '13981837349', '13981837349', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('294', '13880826057', '13880826057', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('295', '13880727878', '13880727878', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('296', '13980838368', '13980838368', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('297', '13982290374', '13982290374', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('298', '13308226356', '13308226356', '2017-02-20 16:19:34', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('299', '13908206010', '13908206010', '2017-02-20 16:19:34', null, null, null, '党宇', '510105198011010516', '四川', '成都', '青羊区', '1980年11月01日', '1', '13908206010', null, 'B');
INSERT INTO `ci_user` VALUES ('300', '13980812868', '13980812868', '2017-02-21 15:22:23', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('301', '13540260606', '13540260606', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('302', '13880739764', '13880739764', '2017-02-21 15:22:24', null, null, null, '杨魁志', '510902198209048696', '四川', '遂宁', '市中区', '1982年09月04日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('303', '15184478217', '15184478217', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('304', '13880746299', '13880746299', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('305', '13308082300', '13308082300', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('306', '13908001112', '13908001112', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('307', '13419215063', '13419215063', '2017-02-21 15:22:24', null, null, null, '陈钧炜', '510105198703172516', '四川', '成都', '青羊区', '1987年03月17日', null, '13419215063', null, 'B');
INSERT INTO `ci_user` VALUES ('308', '18908003100', '18908003100', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('309', '13551043131', '13551043131', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('310', '13982103691', '13982103691', '2017-02-21 15:22:24', null, null, null, '刘彬', '510106198501250439', '四川', '成都', '金牛区', '1985年01月25日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('311', '18908003100', '18908003100', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('312', '13693409604', '13693409604', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('313', '13808001893', '13808001893', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('314', '13880346651', '13880346651', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('315', '13980089080', '13980089080', '2017-02-21 15:22:24', null, null, null, '邓伟', '510183198103261610', '四川', '成都', '邛崃市', '1981年03月26日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('316', '13541063267', '13541063267', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('317', '15828467114', '15828467114', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('318', '13857339754', '13857339754', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('319', '13880171517', '13880171517', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('320', '13882115070', '13882115070', '2017-02-21 15:22:24', null, null, null, '侯雨', '510106198005173219', '四川', '成都', '金牛区', '1980年05月17日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('321', '13880688042', '13880688042', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('322', '13551112855', '13551112855', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('323', '13880369773', '13880369773', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('324', '18980021555', '18980021555', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('325', '15182284070', '15182284070', '2017-02-21 15:22:24', null, null, null, '蒋金宏', '511011198509043190', '四川', '内江', '东兴区', '1985年09月04日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('326', '13734905606', '13734905606', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('327', '18608005556', '18608005556', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('328', '13980079069', '13980079069', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('329', '13666100018', '13666100018', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('330', '13550311475', '13550311475', '2017-02-21 15:22:24', null, null, null, '黄浩', '510108198307271239', '四川', '成都', '成华区', '1983年07月27日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('331', '13808028081', '13808028081', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('332', '13980837499', '13980837499', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('333', '13550123323', '13550123323', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('334', '13880903446', '13880903446', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('335', '13438984275', '13438984275', '2017-02-21 15:22:24', null, null, null, '高宇', '510124198412080012', '四川', '成都', '郫县', '1984年12月08日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('336', '13688346460', '13688346460', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('337', '13818455661', '13818455661', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('338', '13594167234', '13594167234', '2017-02-21 15:22:24', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('339', '13908232179', '13908232179', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('340', '18980983555', '18980983555', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('341', '13982708905', '13982708905', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('342', '15008498815', '15008498815', '2017-02-21 15:22:25', null, null, null, '朱世衡', '510106198607220414', '四川', '成都', '金牛区', '1986年07月22日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('343', '13880734290', '13880734290', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('344', '13980989144', '13980989144', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('345', '13908200161', '13908200161', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('346', '13981799547', '13981799547', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('347', '13730663579', '13730663579', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('348', '13438344687', '13438344687', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('349', '13795933666', '13795933666', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('350', '18602839955', '18602839955', '2017-02-21 15:22:25', null, null, null, '孙玺', '510822198204300012', '四川', '广元', '青川县', '1982年04月30日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('351', '13808198482', '13808198482', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('352', '13980088103', '13980088103', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('353', '13648060911', '13648060911', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('354', '13881882341', '13881882341', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('355', '15883834359', '15883834359', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('356', '13982171079', '13982171079', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('357', '13618271666', '13618271666', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('358', '13693438970', '13693438970', '2017-02-21 15:22:25', null, null, null, '龚敬', '510107198302082192', '四川', '成都', '武侯区', '1983年02月08日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('359', '15823888240', '15823888240', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('360', '18228987016', '18228987016', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('361', '13882231169', '13882231169', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('362', '13608099482', '13608099482', '2017-02-21 15:22:25', null, null, null, '舒江枫', '510107198907272618', '四川', '成都', '武侯区', '1989年07月27日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('363', '18615711580', '18615711580', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('364', '18602309853', '18602309853', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('365', '13881811962', '13881811962', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('366', '13438111927', '13438111927', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('367', '13628033901', '13628033901', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('368', '15882031867', '15882031867', '2017-02-21 15:22:25', null, null, null, '许可', '510108198804250914', '四川', '成都', '成华区', '1988年04月25日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('369', '13882075338', '13882075338', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('370', '15208250306', '15208250306', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('371', '13628028009', '13628028009', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('372', '13880763987', '13880763987', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('373', '18628294332', '18628294332', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('374', '15928731589', '15928731589', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('375', '13880617063', '13880617063', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('376', '13880225932', '13880225932', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('377', '18328315057', '18328315057', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('378', '13348853017', '13348853017', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('379', '13880803229', '13880803229', '2017-02-21 15:22:25', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('380', '13438975189', '13438975189', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('381', '13550380505', '13550380505', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('382', '13668293086', '13668293086', '2017-02-21 15:22:26', null, null, null, '赵寒驰', '510104199012070671', '四川', '成都', '锦江区', '1990年12月07日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('383', '13880676414', '13880676414', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('384', '13518189991', '13518189991', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('385', '13908086887', '13908086887', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('386', '13541351090', '13541351090', '2017-02-21 15:22:26', null, null, null, '沈索恒', '51012519891022007X', '四川', '成都', '新都县', '1989年10月22日', '1', '13541351090', null, 'B');
INSERT INTO `ci_user` VALUES ('387', '13880756428', '13880756428', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('388', '13551279998', '13551279998', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('389', '15680582653', '15680582653', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('390', '13980014954', '13980014954', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('391', '13881718421', '13881718421', '2017-02-21 15:22:26', null, null, null, '袁盛维多', '510106198207192936', '四川', '成都', '金牛区', '1982年07月19日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('392', '13808085181', '13808085181', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('393', '13880489491', '13880489491', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('394', '13438867918', '13438867918', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('395', '13880532677', '13880532677', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('396', '13882088392', '13882088392', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('397', '18602866321', '18602866321', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('398', '13981789369', '13981789369', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('399', '13908354541', '13908354541', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('400', '13666111927', '13666111927', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('401', '15803075588', '15803075588', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('402', '13808077661', '13808077661', '2017-02-21 15:22:26', null, null, null, '周淦', '510104198409144075', '四川', '成都', '锦江区', '1984年09月14日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('403', '13880704363', '13880704363', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('404', '18583838588', '18583838588', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('405', '13880125339', '13880125339', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('406', '13880506620', '13880506620', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('407', '13880579408', '13880579408', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('408', '18980759688', '18980759688', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('409', '13258253119', '13258253119', '2017-02-21 15:22:26', null, null, null, '杨蕊', '510107199104291561', '四川', '成都', '武侯区', '1991年04月29日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('410', '13628067536', '13628067536', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('411', '13981707957', '13981707957', '2017-02-21 15:22:26', null, null, null, '陈健', '511123198401167336', '四川', '乐山', '犍为县', '1984年01月16日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('412', '13908073205', '13908073205', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('413', '18615793265', '18615793265', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('414', '13880565579', '13880565579', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('415', '13730817882', '13730817882', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('416', '13980004870', '13980004870', '2017-02-21 15:22:26', null, null, null, '李雷', '500103198911042113', '重庆', '重庆', '渝中区', '1989年11月04日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('417', '13808080807', '13808080807', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('418', '13540418770', '13540418770', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('419', '13908216852', '13908216852', '2017-02-21 15:22:26', null, null, null, '李平', '510108198101110018', '四川', '成都', '成华区', '1981年01月11日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('420', '13032827768', '13032827768', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('421', '13880017173', '13880017173', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('422', '13568886085', '13568886085', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('423', '13689616621', '13689616621', '2017-02-21 15:22:26', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('424', '13908055433', '13908055433', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('425', '13880418629', '13880418629', '2017-02-21 15:22:27', null, null, null, '赵梦雪', '510105198806292529', '四川', '成都', '青羊区', '1988年06月29日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('426', '15002817277', '15002817277', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('427', '13540875084', '13540875084', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('428', '13348922066', '13348922066', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('429', '13438156600', '13438156600', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('430', '13688060000', '13688060000', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('431', '13608193252', '13608193252', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('432', '13438489703', '13438489703', '2017-02-21 15:22:27', null, null, null, '黄丽', '510108198704151222', '四川', '成都', '成华区', '1987年04月15日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('433', '13568992929', '13568992929', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('434', '15008494397', '15008494397', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('435', '13980775853', '13980775853', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('436', '13880886071', '13880886071', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('437', '13982703333', '13982703333', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('438', '18683931209', '18683931209', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('439', '13308002928', '13308002928', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('440', '13618086208', '13618086208', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('441', '13990524777', '13990524777', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('442', '13982962351', '13982962351', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('443', '13540007501', '13540007501', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('444', '15902855175', '15902855175', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('445', '13890649818', '13890649818', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('446', '18996098005', '18996098005', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('447', '13550149899', '13550149899', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('448', '13980432373', '13980432373', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('449', '15982343309', '15982343309', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('450', '13980070569', '13980070569', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('451', '13880033436', '13880033436', '2017-02-21 15:22:27', null, null, null, '刘刚', '510125198506213812', '四川', '成都', '新都县', '1985年06月21日', null, '13880033436', null, 'B');
INSERT INTO `ci_user` VALUES ('452', '13628040009', '13628040009', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('453', '13699036032', '13699036032', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('454', '13438082399', '13438082399', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('455', '13881844333', '13881844333', '2017-02-21 15:22:27', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('456', '13550289038', '13550289038', '2017-02-22 14:18:17', null, null, null, '陈龙', '513902198701140032', '四川', '资阳', '简阳市', '1987年1月14日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('457', '13808183513', '13808183513', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('458', '13808207893', '13808207893', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('459', '13679005009', '13679005009', '2017-02-22 14:18:17', null, null, null, '傅劫睿', '510104199008243472', '四川', '成都', '锦江区', '1990年08月24日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('460', '13808056859', '13808056859', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('461', '13882190880', '13882190880', '2017-02-22 14:18:17', null, null, null, '伍泽林', '510104198910291474', '四川', '成都', '锦江区', '1989年10月29日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('462', '18982239162', '18982239162', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('463', '13883324871', '13883324871', '2017-02-22 14:18:17', null, null, null, '李惠', '510522198808160261', '四川', '泸州', '合江县', '1988年08月16日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('464', '13008115715', '13008115715', '2017-02-22 14:18:17', null, null, null, '刘楚康', '510104198412093774', '四川', '成都', '锦江区', '1984年12月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('465', '13408486171', '13408486171', '2017-02-22 14:18:17', null, null, null, '陈鹏', '510113198307190413', '四川', '成都', '青白江区', '1983年07月19日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('466', '13882282557', '13882282557', '2017-02-22 14:18:17', null, null, null, '张凯', '513101198106270510', '四川', '雅安', '雅安地区', '1981年06月27日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('467', '13350799963', '13350799963', '2017-02-22 14:18:17', null, null, null, '钟汶含', '513001198904180215', '四川', '达州', '达州市', '1989年04月18日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('468', '15215098698', '15215098698', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('469', '18608012366', '18608012366', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('470', '13981766588', '13981766588', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('471', '13678048866', '13678048866', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('472', '13708098837', '13708098837', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('473', '13880776009', '13880776009', '2017-02-22 14:18:17', null, null, null, '叶易凡', '510108198108071218', '四川', '成都', '成华区', '1981年08月07日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('474', '13882282197', '13882282197', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('475', '13981793360', '13981793360', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('476', '13551107336', '13551107336', '2017-02-22 14:18:17', null, null, null, '杨佐俊', '51010819910210305X', '四川', '成都', '成华区', '1991年02月10日', null, '13551107336', null, 'B');
INSERT INTO `ci_user` VALUES ('477', '13551107336', '13551107336', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, '13551107336', null, 'C');
INSERT INTO `ci_user` VALUES ('478', '18602875175', '18602875175', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('479', '15196638909', '15196638909', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('480', '13668162074', '13668162074', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('481', '13880800151', '13880800151', '2017-02-22 14:18:17', null, null, null, '张茜唯', '510603198802097667', '四川', ' 德阳', '旌阳区', '1988年02月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('482', '13808190537', '13808190537', '2017-02-22 14:18:17', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('483', '13699063856', '13699063856', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('484', '13880921809', '13880921809', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('485', '13438095216', '13438095216', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('486', '13908091237', '13908091237', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('487', '13032806768', '13032806768', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('488', '13088050801', '13088050801', '2017-02-22 14:18:18', null, null, null, '邓平姜', '510124198207302931', '四川', ' 成都', '郫县', '1982年07月30日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('489', '18980624148', '18980624148', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('490', '13568900108', '13568900108', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('491', '13880404393', '13880404393', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('492', '13980039226', '13980039226', '2017-02-22 14:18:18', null, null, null, '张怡然', '510105199207030281', '四川', '成都', '青羊区', '1992年07月03日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('493', '13183833050', '13183833050', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('494', '13408691566', '13408691566', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('495', '13438886703', '13438886703', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('496', '13980856741', '13980856741', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('497', '15308181286', '15308181286', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('498', '13778808898', '13778808898', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('499', '13981822521', '13981822521', '2017-02-22 14:18:18', null, null, null, '蒋璞', '510113198804096217', '四川', '成都', '青白江区', '1988年04月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('500', '13880342389', '13880342389', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('501', '13540269602', '13540269602', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('502', '13908058531', '13908058531', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('503', '13881928991', '13881928991', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('504', '13883659494', '13883659494', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('505', '13808012321', '13808012321', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('506', '13880003346', '13880003346', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('507', '13980938620', '13980938620', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('508', '13880273515', '13880273515', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('509', '13980864184', '13980864184', '2017-02-22 14:18:18', null, null, null, '刘琳', '510107198207042985', '四川', '成都', '武侯区', '1982年07月04日', null, '13980864184', null, 'B');
INSERT INTO `ci_user` VALUES ('510', '13678133096', '13678133096', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('511', '13550162261', '13550162261', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('512', '13882226932', '13882226932', '2017-02-22 14:18:18', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('513', '13808033420', '13808033420', '2017-02-22 14:18:18', null, null, null, '夏均婧', '510108198403141821', '四川', '成都', '成华区', '1984年03月14日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('514', '13981808067', '13981808067', '2017-02-22 14:18:18', null, null, null, '杨潋滟', '510105198704180067', '四川', '成都', '青羊区', '1987年04月18日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('515', '15823269228', '15823269228', '2017-02-22 14:18:18', null, null, null, '吴念颖', '510104198702084104', '四川', '成都', '锦江区', '1987年02月08日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('516', '13908234187', '13908234187', '2017-02-22 14:18:18', null, null, null, '周家丞', '511502198809080656', '四川', '宜宾', '翠屏区', '1988年09月08日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('517', '13568826411', '13568826411', '2017-02-22 14:18:18', null, null, null, '刁磊', '510105198011101514', '四川', '成都', '青羊区', '1980年11月10日', null, '13568826411', null, 'B');
INSERT INTO `ci_user` VALUES ('518', '13882115289', '13882115289', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('519', '13808181320', '13808181320', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('520', '13981713368', '13981713368', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('521', '13982218252', '13982218252', '2017-02-22 14:18:19', null, null, null, '孟繁', '511024198608090015', '四川', '内江', '威远县', '1986年08月09日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('522', '15528224181', '15528224181', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('523', '13658003882', '13658003882', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('524', '18628121011', '18628121011', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('525', '13540782951', '13540782951', '2017-02-22 14:18:19', null, null, null, '黄博', '510106198702273514', '四川', '成都', '金牛区', '1987年02月27日', null, '13540782951', null, 'B');
INSERT INTO `ci_user` VALUES ('526', '13981818670', '13981818670', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('527', '13438458323', '13438458323', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('528', '13281193119', '13281193119', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('529', '13508238139', '13508238139', '2017-02-22 14:18:19', null, null, null, '张博', '510402199109260910', '四川', '攀枝花', '东区', '1991年09月26日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('530', '18780220535', '18780220535', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('531', '13981962399', '13981962399', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('532', '13808041614', '13808041614', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('533', '13981907632', '13981907632', '2017-02-22 14:18:19', null, null, null, '杨骏', '510681198208221310', '四川', '德阳', '广汉市', '1982年08月22日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('534', '13550207878', '13550207878', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('535', '13880429445', '13880429445', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('536', '18602814123', '18602814123', '2017-02-22 14:18:19', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('537', '13438029081', '13438029081', '2017-02-22 14:18:19', null, null, null, '池进波', '510104198503311474', '四川', '成都', '锦江区', '1985年03月31日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('538', '13658020043', '13658020043', '2017-02-22 14:18:19', null, null, null, '李文宇', '510108198601022110', '四川', '成都', '成华区', '1986年01月02日', null, '13658020043', null, 'B');
INSERT INTO `ci_user` VALUES ('539', '15008207557', '15008207557', '2017-02-22 14:18:19', null, null, null, '杨韬', '510104198601171874', '四川', '成都', '锦江区', '1986年01月17日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('540', '18728490620', '18728490620', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('541', '13880734677', '13880734677', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('542', '13881763491', '13881763491', '2017-02-27 11:19:03', null, null, null, '张一', '510104198707213497', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('543', '13981942943', '13981942943', '2017-02-27 11:19:03', null, null, null, '陈楠', '511302198005090014', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('544', '13228681808', '13228681808', '2017-02-27 11:19:03', null, null, null, '张鹏', '51010419780331981X', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('545', '13880037610', '13880037610', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('546', '13908218823', '13908218823', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('547', '13980766700', '13980766700', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('548', '13880798349', '13880798349', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('549', '15928751098', '15928751098', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('550', '13880798733', '13880798733', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('551', '15183201859', '15183201859', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('552', '13880118722', '13880118722', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('553', '13981839415', '13981839415', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('554', '13541264820', '13541264820', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('555', '13541250198', '13541250198', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('556', '13889000058', '13889000058', '2017-02-27 11:19:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('557', '13550398080', '13550398080', '2017-02-27 11:19:03', null, null, null, '蒲林', '510107198606035037', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('558', '13880359611', '13880359611', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('559', '15902394283', '15902394283', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('560', '13908040029', '13908040029', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('561', '13880403366', '13880403366', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('562', '13551843064', '13551843064', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('563', '15882445594', '15882445594', '2017-02-27 11:19:04', null, null, null, '李良梁', '510104198605051271', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('564', '13882238112', '13882238112', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('565', '13438290563', '13438290563', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('566', '13402876586', '13402876586', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('567', '13881702666', '13881702666', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('568', '13308217705', '13308217705', '2017-02-27 11:19:04', null, null, null, '龙毅', '510108197705011534', null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('569', '13880333129', '13880333129', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('570', '18602899990', '18602899990', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('571', '13438174455', '13438174455', '2017-02-27 11:19:04', null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `ci_user_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_bank`;
CREATE TABLE `ci_user_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_user_phone` varchar(100) DEFAULT NULL,
  `bank_number` varchar(100) DEFAULT NULL,
  `bank_user_name` varchar(100) DEFAULT NULL,
  `bank_bank_name` varchar(100) DEFAULT NULL,
  `bank_province` varchar(100) DEFAULT NULL,
  `bank_city` varchar(100) DEFAULT NULL,
  `bank_address` varchar(500) DEFAULT NULL,
  `bank_type` varchar(100) DEFAULT NULL,
  `bank_attribute` varchar(100) DEFAULT NULL,
  `bank_time` datetime DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user_bank
-- ----------------------------
INSERT INTO `ci_user_bank` VALUES ('24', '18280195336', '6217003810054142065', '庾治超', '中国建设银行CCB', '四川', '成都', '东门大桥支行', 'DEBIT', 'B', '2016-11-18 11:17:39');
INSERT INTO `ci_user_bank` VALUES ('78', '18080432295', '6225881280815456', '杨旨杰', '招商银行CMB', '四川', '成都', '西安北路支行', 'DEBIT', 'C', '2016-11-29 05:18:50');
INSERT INTO `ci_user_bank` VALUES ('83', '13558679988', '6215654635267678', 'lijing', '中国工商银行ICBC', 'sichuan', 'chengdu', 'gaoxin', null, null, '2017-01-04 14:27:38');
INSERT INTO `ci_user_bank` VALUES ('84', '13558679988', '65457362736272', 'lijing', '中国工商银行ICBC', 'sichuan', 'chengdu', 'gaoxin', 'DEBIT', 'C', '2017-01-04 14:29:12');
INSERT INTO `ci_user_bank` VALUES ('92', '18280195336', '111111111111', '1111', '中国农业银行ABC', '1', '11111', '11111111111', 'DEBIT', 'C', '2017-01-05 14:21:16');
INSERT INTO `ci_user_bank` VALUES ('94', '14708159776', '11111111111', '11111111111111111', '上海浦东发展银行SPDB', '1', '1', '11', 'DEBIT', 'C', '2017-01-09 10:58:40');

-- ----------------------------
-- Table structure for `ci_user_cash`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_cash`;
CREATE TABLE `ci_user_cash` (
  `cash_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_bank_number` varchar(100) DEFAULT NULL,
  `cash_money` varchar(100) DEFAULT NULL,
  `cash_time` datetime DEFAULT NULL,
  `cash_tag` int(1) DEFAULT NULL,
  `cash_user_phone` varchar(100) DEFAULT NULL,
  `cash_order` varchar(100) DEFAULT NULL,
  `cash_cash_time` datetime DEFAULT NULL,
  PRIMARY KEY (`cash_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user_cash
-- ----------------------------
INSERT INTO `ci_user_cash` VALUES ('38', '11111111111111', '10', '2017-01-09 01:30:10', null, '14708159776', null, null);
INSERT INTO `ci_user_cash` VALUES ('39', '6217003810054142065', '898', '2017-01-04 16:43:36', null, '18280195336', null, null);
INSERT INTO `ci_user_cash` VALUES ('40', '1111111111', '990', '2017-01-05 17:01:34', null, '14708159776', null, null);

-- ----------------------------
-- Table structure for `ci_user_email`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_email`;
CREATE TABLE `ci_user_email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_user_phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email_content` varchar(9999) CHARACTER SET utf8 DEFAULT NULL,
  `email_time` datetime DEFAULT NULL,
  `email_way` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email_user_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email_tag` int(1) DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_user_email
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_user_mobile`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_mobile`;
CREATE TABLE `ci_user_mobile` (
  `mobile_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_user_phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_content` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_time` datetime DEFAULT NULL,
  `mobile_tag` int(1) DEFAULT NULL,
  `mobile_way` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`mobile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_user_mobile
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_user_order`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_order`;
CREATE TABLE `ci_user_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_userphone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `order_time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_project_id` int(11) DEFAULT NULL,
  `order_project_di` int(11) DEFAULT NULL,
  `order_project_sore` int(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ci_user_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_user_project`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_project`;
CREATE TABLE `ci_user_project` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_corporation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_userName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_userPhone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_userEmail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_userAddress` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_configuration` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_area` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_homeDegression` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_homeRent` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_rentStart` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_rentOver` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_utilities` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_opex` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_otherSpending` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_income` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pro_incomeTag` varchar(100) DEFAULT NULL,
  `pro_moneyAll` varchar(100) DEFAULT NULL,
  `pro_introduce` varchar(5000) DEFAULT NULL,
  `pro_images` varchar(500) DEFAULT NULL,
  `pro_renStart` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_user_project
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_user_recommended`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_recommended`;
CREATE TABLE `ci_user_recommended` (
  `recommend_id` int(10) NOT NULL AUTO_INCREMENT,
  `recommend_oldUser` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `recommend_newUser` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `recommend_rebate` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `recommend_time` datetime DEFAULT NULL,
  PRIMARY KEY (`recommend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ci_user_recommended
-- ----------------------------
INSERT INTO `ci_user_recommended` VALUES ('1', '18280195336', '13558679988', null, null);
INSERT INTO `ci_user_recommended` VALUES ('14', '18280195336', '14708159776', null, null);
INSERT INTO `ci_user_recommended` VALUES ('15', '18280195336', '14708159776', null, null);
INSERT INTO `ci_user_recommended` VALUES ('16', '13880072825', '18080432295', null, null);
INSERT INTO `ci_user_recommended` VALUES ('17', '18080432295', '15982887021', null, null);

-- ----------------------------
-- Table structure for `ci_user_record`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_record`;
CREATE TABLE `ci_user_record` (
  `record_id` int(10) NOT NULL AUTO_INCREMENT,
  `record_time` datetime DEFAULT NULL,
  `record_ip` varchar(5555) DEFAULT NULL,
  `record_address` varchar(5555) DEFAULT NULL,
  `record_user_phone` varchar(555) DEFAULT NULL,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user_record
-- ----------------------------
INSERT INTO `ci_user_record` VALUES ('1', '2016-12-22 09:29:25', '::1', null, '18280195224');
INSERT INTO `ci_user_record` VALUES ('2', '2016-12-22 10:40:29', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('3', '2016-12-22 01:41:31', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('4', '2016-12-22 01:45:56', '::1', null, '18943241254');
INSERT INTO `ci_user_record` VALUES ('5', '2016-12-22 03:27:07', '::1', null, '14708159776');
INSERT INTO `ci_user_record` VALUES ('6', '2016-12-22 04:14:04', '::1', null, '14708159776');
INSERT INTO `ci_user_record` VALUES ('7', '2016-12-22 05:51:21', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('8', '2016-12-22 05:52:27', '::1', null, '14708159776');
INSERT INTO `ci_user_record` VALUES ('9', '2016-12-23 09:35:53', '::1', null, '14708159776');
INSERT INTO `ci_user_record` VALUES ('10', '2016-12-23 01:41:35', '::1', null, '14708159776');
INSERT INTO `ci_user_record` VALUES ('11', '2017-01-03 10:11:20', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('12', '2017-01-03 10:11:20', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('13', '2017-01-03 10:11:21', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('14', '2017-01-03 11:19:50', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('15', '2017-01-03 01:13:52', '223.104.9.81', '成都', '13408516752');
INSERT INTO `ci_user_record` VALUES ('16', '2017-01-03 02:31:46', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('17', '2017-01-03 02:32:23', '125.70.77.124', '成都', '13554299821');
INSERT INTO `ci_user_record` VALUES ('18', '2017-01-03 06:17:16', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('19', '2017-01-04 09:57:41', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('20', '2017-01-04 10:21:07', '125.70.77.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('21', '2017-01-04 02:24:47', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('22', '2017-01-04 02:25:47', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('23', '2017-01-04 02:49:03', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('24', '2017-01-04 02:49:04', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('25', '2017-01-04 02:49:04', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('26', '2017-01-04 02:49:04', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('27', '2017-01-04 02:49:04', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('28', '2017-01-04 02:49:04', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('29', '2017-01-04 03:32:29', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('30', '2017-01-04 03:37:53', '125.70.77.124', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('31', '2017-01-04 03:55:25', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('32', '2017-01-04 03:56:04', '125.70.77.124', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('33', '2017-01-04 04:13:13', '125.70.77.124', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('34', '2017-01-04 04:21:08', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('35', '2017-01-04 04:23:07', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('36', '2017-01-04 05:54:19', '125.70.77.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('37', '2017-01-05 02:09:50', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('38', '2017-01-05 02:35:16', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('39', '2017-01-05 04:36:44', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('40', '2017-01-05 04:55:36', '125.70.77.124', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('41', '2017-01-05 04:58:09', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('42', '2017-01-05 05:00:02', '125.70.77.124', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('43', '2017-01-05 05:03:25', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('44', '2017-01-05 05:11:43', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('45', '2017-01-05 05:28:48', '125.70.77.123', '成都', '18080432295');
INSERT INTO `ci_user_record` VALUES ('46', '2017-01-05 07:54:36', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('47', '2017-01-05 08:13:49', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('48', '2017-01-06 09:36:22', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('49', '2017-01-06 09:36:54', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('50', '2017-01-06 09:44:18', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('51', '2017-01-06 09:44:53', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('52', '2017-01-06 10:01:32', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('53', '2017-01-06 10:01:32', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('54', '2017-01-06 10:28:04', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('55', '2017-01-06 10:42:28', '125.70.77.124', '成都', '18227667382');
INSERT INTO `ci_user_record` VALUES ('56', '2017-01-06 11:06:13', '182.144.190.46', '成都', '13668131151');
INSERT INTO `ci_user_record` VALUES ('57', '2017-01-06 11:06:20', '182.144.190.46', '成都', '13668131151');
INSERT INTO `ci_user_record` VALUES ('58', '2017-01-06 11:06:21', '182.144.190.46', '成都', '13668131151');
INSERT INTO `ci_user_record` VALUES ('59', '2017-01-06 11:16:09', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('60', '2017-01-06 11:16:44', '125.70.77.123', '成都', '18080432295');
INSERT INTO `ci_user_record` VALUES ('61', '2017-01-06 11:47:11', '125.70.77.123', '成都', '18080432295');
INSERT INTO `ci_user_record` VALUES ('62', '2017-01-06 12:11:16', '125.70.77.124', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('63', '2017-01-06 01:55:32', '125.70.77.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('64', '2017-01-06 01:56:50', '125.70.77.123', '成都', '18227667382');
INSERT INTO `ci_user_record` VALUES ('65', '2017-01-06 01:58:31', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('66', '2017-01-06 04:06:16', '125.70.77.124', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('67', '2017-01-06 04:58:32', '182.149.126.199', '成都', '13882269070');
INSERT INTO `ci_user_record` VALUES ('68', '2017-01-06 05:38:10', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('69', '2017-01-06 05:41:06', '125.70.77.123', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('70', '2017-01-06 10:12:05', '139.207.150.12', '成都', '13668131151');
INSERT INTO `ci_user_record` VALUES ('71', '2017-01-07 09:45:00', '171.210.41.41', '成都', '13668131151');
INSERT INTO `ci_user_record` VALUES ('72', '2017-01-09 09:27:02', '182.148.58.118', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('73', '2017-01-09 09:27:15', '182.148.58.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('74', '2017-01-09 09:28:22', '182.148.58.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('75', '2017-01-09 09:29:20', '182.148.58.118', '成都', '13882269070');
INSERT INTO `ci_user_record` VALUES ('76', '2017-01-09 09:32:04', '182.148.58.123', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('77', '2017-01-09 09:37:09', '182.148.58.123', '成都', '13558679988');
INSERT INTO `ci_user_record` VALUES ('78', '2017-01-09 09:40:16', '182.148.58.123', '成都', '18280195336');
INSERT INTO `ci_user_record` VALUES ('79', '2017-01-09 09:45:29', '182.148.58.123', '成都', '18227667382');
INSERT INTO `ci_user_record` VALUES ('80', '2017-01-09 10:54:34', '182.148.58.118', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('81', '2017-01-09 11:15:10', '182.148.58.118', '成都', '14708159776');
INSERT INTO `ci_user_record` VALUES ('82', '2017-01-13 02:26:49', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('83', '2017-01-16 02:42:46', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('84', '2017-01-16 06:17:38', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('85', '2017-01-16 06:17:39', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('86', '2017-01-17 02:40:52', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('87', '2017-01-17 02:40:52', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('88', '2017-01-18 10:04:53', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('89', '2017-01-18 10:04:55', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('90', '2017-01-19 11:14:13', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('91', '2017-01-19 03:20:48', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('92', '2017-01-20 09:38:39', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('93', '2017-01-20 01:36:33', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('94', '2017-01-21 02:48:16', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('95', '2017-01-21 02:48:18', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('96', '2017-01-21 02:48:20', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('97', '2017-01-21 02:48:42', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('98', '2017-01-21 03:00:23', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('99', '2017-01-21 03:05:31', '::1', null, '18280195336');
INSERT INTO `ci_user_record` VALUES ('100', '2017-02-23 04:13:52', '::1', null, '18280195336');

-- ----------------------------
-- Table structure for `ci_user_refund`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user_refund`;
CREATE TABLE `ci_user_refund` (
  `refund_id` int(11) NOT NULL AUTO_INCREMENT,
  `refund_user_phone` varchar(100) DEFAULT NULL,
  `refund_associated_order` varchar(100) DEFAULT NULL,
  `refund_time` datetime DEFAULT NULL,
  `refund_why` varchar(5000) DEFAULT NULL,
  `refund_money` varchar(100) DEFAULT NULL,
  `refund_tag` int(1) DEFAULT NULL,
  `refund_refund_time` datetime DEFAULT NULL,
  PRIMARY KEY (`refund_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user_refund
-- ----------------------------
INSERT INTO `ci_user_refund` VALUES ('18', '13558679988', '201603280358281', '2017-01-05 16:33:47', '拍错了', '¥1000.00', '1', null);
INSERT INTO `ci_user_refund` VALUES ('19', '1828@qq.com', null, null, null, null, null, null);
INSERT INTO `ci_user_refund` VALUES ('20', '193242@qq.com', null, null, null, null, null, null);
INSERT INTO `ci_user_refund` VALUES ('21', '1932425337@qq.com', null, null, null, null, null, null);
