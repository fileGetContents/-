/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-20 15:12:18
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_user
-- ----------------------------
INSERT INTO `ci_user` VALUES ('1', '13558679988', '123456', '2017-01-05 10:06:27', null, null, null, '李静', '5139221555555555', '四川', '成都', '金六', null, '1', '13558679988', '0', 'S');
INSERT INTO `ci_user` VALUES ('2', '13666228091', 'tc791001', '2017-01-03 12:26:28', null, null, null, '马恒怡', '510106198812023823', '四川', '成都', '金牛区', '1988年12月02日', '1', '13666228091', '0', 'B');
INSERT INTO `ci_user` VALUES ('3', '13980721161', 'zhangji554301', '2017-01-03 12:46:16', null, null, 'zhangji237@qq.con', '张冀', '510106198811034117', '四川', '成都', '金牛区', '1988年11月03日', '1', '13980721161', '0', 'B');
INSERT INTO `ci_user` VALUES ('4', '13880072825', '520522', '2017-01-03 12:53:51', null, null, null, '廖大龙', '510105198805221518', '四川', '成都', '青羊区', '1988年05月22日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('5', '13408516752', '090725', '2017-01-03 13:11:21', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('6', '13808082046', '904255', '2017-01-03 13:12:41', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('7', '13678072660', 'wppylylj', '2017-01-03 13:18:21', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('8', '13666167170', '886456cc', '2017-01-03 13:45:42', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('9', '18280195336', '123456', '2017-01-13 15:26:57', '阿斯达大师', 'Y111111111', '1222@qq.com', '庾治超', '513922199607140650', '四川', '资阳', '乐至县', '1996年07月14日', '1', '18280195336', '0', 'C');
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
INSERT INTO `ci_user` VALUES ('25', '13547925780', 'yuanhongbin', '2017-02-13 16:07:43', '成都', null, null, '袁洪斌', '513701198809184339', '', '四川', '巴中', '1988年09月18日', '1', '13547925780', '0', 'B');
INSERT INTO `ci_user` VALUES ('26', '15208320892', '123456Q', '2017-02-14 14:16:39', null, null, null, '张华建', '510108197911130016', '四川', '成都', '成华区', '1979年11月13日', '1', '15208320892', '0', 'B');
INSERT INTO `ci_user` VALUES ('27', '15882055175', 'wswcx520', '2017-02-14 14:35:17', null, null, null, '王晨曦', '511381198909194073', '四川', '南充', '阆中市', '1989年09月19日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('28', '18683930132', '861104', '2017-02-14 14:53:15', null, null, null, '凌杰', '510104198611041475', '四川', '成都', '锦江区', '1986年11月04日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('29', '18628175702', 'yang418', '2017-02-14 15:59:34', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('30', '18908080724', 'ly19847258', '2017-02-14 16:14:42', null, null, null, '李云', '510105198407021270', '四川', '成都', '青羊区', '1984年07月02日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('31', '13688378306', '880816', '2017-02-14 17:12:01', null, null, null, '李卓洋', '513030198808160056', '四川', '达州', '渠县', '1988年08月16日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('32', '13688146414', '122688', '2017-02-15 00:24:11', null, null, null, null, null, null, null, null, null, null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('33', '13688386102', '3521668', '2017-02-15 15:53:59', null, null, null, '徐琳', '510106198806130024', '四川', '成都', '金牛区', '1988年06月13日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('34', '18154157596', 'a12345678', '2017-02-16 14:22:25', null, null, null, '宋晓洁', '370521198109200022', '山东', '东营', '垦利县', '1981年09月20日', null, null, '0', 'C');
INSERT INTO `ci_user` VALUES ('36', '13678109160', '13678109160', '2017-02-17 16:39:56', null, null, null, '吴永削', '152634197704200012', '内蒙古', '乌兰察布', '四子王旗', '1977年04月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('37', '13881953083', '13881953083', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('38', '15108201288', '15108201288', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('39', '13608018228', '13608018228', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('40', '13980523661', '13980523661', '2017-02-17 16:39:56', null, null, null, '熊星', '510108198106010315', '四川', '成都', '成华区', '1981年06月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('41', '13808044682', '13808044682', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('42', '13880982321', '13880982321', '2017-02-17 16:39:56', null, null, null, '车美娟', '510183198307104369', '四川', '成都', '邛崃', '1983年07月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('43', '13308208295', '13308208295', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('44', '18982191211', '18982191211', '2017-02-17 16:39:56', null, null, null, '严梅', '510107198112114624', '四川', '成都', '武侯区', '1981年12月11日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('45', '13908091095', '13908091095', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('46', '13980020588', '13980020588', '2017-02-17 16:39:56', null, null, null, '何云友', '511011198611296258', '四川', '内江', ' 东兴区', '1986年11月29日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('47', '15882265400', '15882265400', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('48', '13882085669', '13882085669', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('49', '13982293675', '13982293675', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('50', '13558899295', '13558899295', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('51', '13618099733', '13618099733', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('52', '13981911636', '13981911636', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('53', '13880929679', '13880929679', '2017-02-17 16:39:56', null, null, null, '陈婉怡', '511321198103105186', '四川', '南充', '南部县', '1981年03月10日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('54', '13094411949', '13094411949', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('55', '13547892598', '13547892598', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('56', '13558817649', '13558817649', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('57', '13882182372', '13882182372', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('58', '13075436643', '13075436643', '2017-02-17 16:39:56', null, null, null, '许诚', '510106199408131819', '四川', '成都', '金牛区 \r\n金牛区 \r\n金牛区 \r\n金牛区 \r\n', '1994年08月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('59', '13908042299', '13908042299', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('60', '13908001732', '13908001732', '2017-02-17 16:39:56', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('61', '13880244561', '13880244561', '2017-02-17 16:39:56', null, null, null, '赵波', '430626197909135635', '湖南', '岳阳', '平江', '1979年09月13日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('62', '15828221019', '15828221019', '2017-02-17 16:39:57', null, null, null, '杜剑波', '513021197711188713', '四川', '达州', '达县', '1977年11月18日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('63', '13094431846', '13094431846', '2017-02-17 16:39:57', null, null, null, '谭森耀', '513029198207010070', '四川', '达州', ' 大竹县', '1982年07月01日\r\n1982年07月01日\r\n', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('64', '13880645796', '13880645796', '2017-02-17 16:39:57', null, null, null, '贺岷珏', '510181198012176725', '四川', '成都', '都江堰', '1980年12月17日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('65', '13320686375', '13320686375', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('66', '13880075666', '13880075666', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('67', '13683475344', '13683475344', '2017-02-17 16:39:57', null, null, null, '刘扬', '652201198104206019', '新疆', '哈密', '哈密', '1981年04月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('68', '13908182202', '13908182202', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('69', '13408083502', '13408083502', '2017-02-17 16:39:57', null, null, null, '白志鹏', '510106198101254115', '四川', '成都', '金牛区 ', '1981年01月25日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('70', '18728812170', '18728812170', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('71', '15208368868', '15208368868', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('72', '13308088357', '13308088357', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('73', '13458596878', '13458596878', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('74', '13982268568', '13982268568', '2017-02-17 16:39:57', null, null, null, '季宏', '510105198003121013', '四川', '成都', '青羊区', '1980年03月12日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('75', '13808007994', '13808007994', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('76', '13880532161', '13880532161', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('77', '13982832771', '13982832771', '2017-02-17 16:39:57', null, null, null, '秦立祥', '510105198707200270', '四川', '成都', '青羊区', '1987年07月20日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('78', '13981294799', '13981294799', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('79', '13688348606', '13688348606', '2017-02-17 16:39:57', null, null, null, '罗荔芊', '510107197709210024', '四川', '成都', '武侯区 ', '1977年09月21日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('80', '13808028679', '13808028679', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('81', '13881805222', '13881805222', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('82', '13608197978', '13608197978', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('83', '13708072450', '13708072450', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('84', '13808029592', '13808029592', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('85', '13678069979', '13678069979', '2017-02-17 16:39:57', null, null, null, '王臻', '510112198502011832', '四川', '成都', '龙泉驿区', '1985年02月01日', null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('86', '13908000798', '13908000798', '2017-02-17 16:39:57', null, null, null, null, null, null, null, null, null, null, null, null, 'C');
INSERT INTO `ci_user` VALUES ('103', '15181153253', '15181153253', '2017-02-18 04:36:38', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('104', '13018212088', '13018212088', '2017-02-18 08:36:38', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('105', '13088024246', '13088024246', '2017-02-18 08:38:36', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('106', '13688496681', '13688496681', '2017-02-18 09:36:00', null, null, null, '童琴', '511132198304160024', '四川', '乐山', '峨边县', '1983年04月16日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('107', '18602889523', '18602889523', '2017-02-18 10:30:00', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('108', '13550000247', '13550000247', '2017-02-18 10:44:38', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('109', '13808035930', '13808035930', '2017-02-18 12:13:38', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('110', '13982000108', '13982000108', '2017-02-18 13:01:33', null, null, null, '张超', '510104198201171891', '四川', '成都', '锦江区', '1982年01月17日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('111', '13608091056', '13608091056', '2017-02-18 13:36:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('112', '13981814061', '13981814061', '2017-02-18 13:50:38', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('113', '13981795762', '13981795762', '2017-02-18 14:05:07', null, null, null, '杨鹏', '362429197501104335', '江西', '吉安', '安福县', '1975年01月10日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('114', '3908070902', '3908070902', '2017-02-18 14:20:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('115', '13628054336', '13628054336', '2017-02-18 15:36:39', null, null, null, '毛芙蓉', '510107197607063000', '四川', '成都', '武侯区', '1976年07月06日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('116', '13088079817', '13088079817', '2017-02-18 15:50:09', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('117', '18980785299', '18980785299', '2017-02-18 16:02:21', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('118', '13540774083', '13540774083', '2017-02-18 16:14:15', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('119', '13880617231', '13880617231', '2017-02-18 16:27:21', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('120', '13980509271', '13980509271', '2017-02-18 16:36:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('121', '13880481066', '13880481066', '2017-02-18 16:40:39', null, null, null, '马丽', '510181198306281926', '四川', '成都', '都江堰市', '1983年06月28日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('122', '13908276724', '13908276724', '2017-02-18 16:45:20', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('123', '13398177022', '13398177022', '2017-02-18 16:48:35', null, null, null, '周逸锦', '510107199601061273', '四川', '成都', '武侯区', '1996年01月06日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('124', '13982166688', '13982166688', '2017-02-18 17:50:45', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('125', '13666213099', '13666213099', '2017-02-18 17:36:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('126', '13628350770', '13628350770', '2017-02-18 19:00:39', null, null, null, '凌勇', '510282198004240813', '', '重庆', '江津区', '1980年04月24日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('127', '13980799509', '13980799509', '2017-02-18 19:05:01', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('128', '13881884829', '13881884829', '2017-02-18 19:21:09', null, null, null, '曾凯特', '330302198506234018', '浙江', '温州', '鹿城区', '1985年06月23日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('129', '13708190789', '13708190789', '2017-02-18 20:15:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('130', '13438390721', '13438390721', '2017-02-18 20:36:39', null, null, null, '李静', '650106198501220820', '新疆', '乌鲁木齐', '头屯河区', '1985年01月22日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('131', '13618075396', '13618075396', '2017-02-18 20:40:15', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('132', '13086628878', '13086628878', '2017-02-18 20:36:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('133', '13688043275', '13688043275', '2017-02-18 20:40:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('134', '13111872332', '13111872332', '2017-02-18 20:43:45', null, null, null, '谢金池', '360124198710156654', '江西', '南昌', '进贤县', '1987年10月15日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('135', '13982090961', '13982090961', '2017-02-18 20:50:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('136', '15928070447', '15928070447', '2017-02-18 21:23:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('137', '13679076293', '13679076293', '2017-02-18 22:36:39', null, null, null, '胡余峰', '510107197905012674', '四川', '成都', '武侯区', '1979年05月01日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('138', '13708212503', '13708212503', '2017-02-19 08:05:23', null, null, null, '梁建', '510521198110077013', '四川', '泸州', '泸县', '1981年10月07日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('139', '13882638875', '13882638875', '2017-02-19 08:36:07', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('140', '13018273930', '13018273930', '2017-02-19 08:46:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('141', '13880593248', '13880593248', '2017-02-19 08:57:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('142', '13558765753', '13558765753', '2017-02-19 09:14:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('143', '13194882725', '13194882725', '2017-02-19 09:36:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('144', '18608003609', '18608003609', '2017-02-19 09:47:45', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('145', '13666169949', '13666169949', '2017-02-19 09:50:28', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('146', '18980886860', '18980886860', '2017-02-19 10:03:45', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('147', '15183655566', '15183655566', '2017-02-19 10:13:20', null, null, null, '申伟弘', '510681198512040055', '四川', '德阳', '广汉市', '1985年12月04日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('148', '13880745966', '13880745966', '2017-02-19 10:23:39', null, null, null, '杨路', '510402198411100913', '四川', '攀枝花', '东区', '1984年11月10日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('149', '13547841391', '13547841391', '2017-02-19 10:45:23', null, null, null, '易欢', '510106199104111421', '四川', '成都', '金牛区', '1991年04月11日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('150', '13608090305', '13608090305', '2017-02-19 10:50:39', null, null, null, '胡书桃', '510112198201010027', '四川', '成都', '龙泉驿区', '1982年01月01日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('151', '13808050335', '13808050335', '2017-02-19 11:02:15', null, null, null, '罗乃曦', '51010819810326001X', '四川', '成都', '成华区', '1981年03月26日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('152', '13908045957', '13908045957', '2017-02-19 11:15:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('153', '13882230318', '13882230318', '2017-02-19 11:23:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('154', '18980616991', '18980616991', '2017-02-19 11:27:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('155', '13980567128', '13980567128', '2017-02-19 11:35:22', null, null, null, '余栋梁', '511323198610132974', '四川', '南充', '蓬安县', '1986年10月13日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('156', '13551130371', '13551130371', '2017-02-19 11:57:57', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('157', '13880486995', '13880486995', '2017-02-19 12:12:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('158', '13896213558', '13896213558', '2017-02-19 12:24:37', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('159', '13540280096', '13540280096', '2017-02-19 12:27:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('160', '13908171225', '13908171225', '2017-02-19 12:40:20', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('161', '13808078889', '13808078889', '2017-02-19 12:53:37', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('162', '15884465643', '15884465643', '2017-02-19 12:57:40', null, null, null, '王帅帅', '370302199002222111', '山东', '淄博', '淄川区', '1990年02月22日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('163', '18608062667', '18608062667', '2017-02-19 13:27:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('164', '13880749990', '13880749990', '2017-02-19 14:37:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('165', '13980567128', '13980567128', '2017-02-19 14:50:40', null, null, null, '余栋梁', '511323198610132974', '四川', '南充', '蓬安县', '1986年10月13日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('166', '13808223133', '13808223133', '2017-02-19 15:20:10', null, null, null, '袁科', '511502198502090016', '四川', '宜宾', '翠屏区', '1985年02月09日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('167', '13684089816', '13684089816', '2017-02-19 15:37:24', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('168', '13108330633', '13108330633', '2017-02-19 16:50:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('169', '13982092980', '13982092980', '2017-02-19 17:38:20', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('170', '13880777524', '13880777524', '2017-02-19 17:45:35', null, null, null, '李建梅', '511024198509134561', '四川', '内江', '威远县', '1985年09月13日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('171', '13880448082', '13880448082', '2017-02-19 17:48:07', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('172', '13808065855', '13808065855', '2017-02-19 17:56:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('173', '13678008951', '13678008951', '2017-02-19 18:04:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('174', '13308181932', '13308181932', '2017-02-19 18:15:40', null, null, null, '余书洋', '510104199002073177', '四川', '成都', '锦江区', '1990年02月07日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('175', '15680666600', '15680666600', '2017-02-19 18:23:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('176', '13438219889', '13438219889', '2017-02-19 18:27:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('177', '13980633798', '13980633798', '2017-02-19 18:30:50', null, null, null, '刘根固', '510108198611300612', '四川', '成都', '成华区', '1986年11月30日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('178', '13678008951', '13678008951', '2017-02-19 18:50:27', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('179', '13908035188', '13908035188', '2017-02-19 20:27:15', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('180', '13808080292', '13808080292', '2017-02-19 21:15:40', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('181', '13693442078', '13693442078', '2017-02-19 21:37:40', null, null, null, '潘晓飞', '510108198801260068', '四川', '成都', '成华区', '1988年01月26日', null, null, null, null);
INSERT INTO `ci_user` VALUES ('182', '13880611755', '13880611755', '2017-02-20 05:20:54', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('183', '13981881555', '13981881555', '2017-02-20 06:21:28', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('184', '13709006797', '13709006797', '2017-02-20 06:43:47', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('185', '13981389876', '13981389876', '2017-02-20 06:50:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('186', '13980811223', '13980811223', '2017-02-20 07:57:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('187', '13551200102', '13551200102', '2017-02-20 08:09:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('188', '13880008011', '13880008011', '2017-02-20 08:37:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('189', '13330983670', '13330983670', '2017-02-20 08:50:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('190', '18980097973', '18980097973', '2017-02-20 09:09:57', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('191', '13882291015', '13882291015', '2017-02-20 09:35:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('192', '13551886234', '13551886234', '2017-02-20 09:50:27', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('193', '13908088581', '13908088581', '2017-02-20 10:09:57', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('194', '13981751760', '13981751760', '2017-02-20 10:23:58', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('195', '13060090016', '13060090016', '2017-02-20 15:09:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('196', '13908171161', '13908171161', '2017-02-20 15:25:20', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('197', '13518219377', '13518219377', '2017-02-20 15:31:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('198', '13908187556', '13908187556', '2017-02-20 15:35:57', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('199', '13908054828', '13908054828', '2017-02-20 15:47:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('200', '13072863818', '13072863818', '2017-02-20 15:49:58', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('201', '13629003558', '13629003558', '2017-02-20 15:57:00', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('202', '13880777524', '13880777524', '2017-02-20 16:05:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('203', '15082239456', '15082239456', '2017-02-20 15:09:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('204', '13658010045', '13658010045', '2017-02-20 15:09:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('205', '13880492922', '13880492922', '2017-02-20 15:19:53', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('206', '18980839783', '18980839783', '2017-02-20 15:21:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('207', '13668119238', '13668119238', '2017-02-20 15:27:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('208', '13880982321', '13880982321', '2017-02-20 15:34:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('209', '15208220572', '15208220572', '2017-02-20 15:37:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('210', '13997169566', '13997169566', '2017-02-20 15:47:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('211', '13689099022', '13689099022', '2017-02-20 15:50:45', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('212', '13308201234', '13308201234', '2017-02-20 16:09:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('213', '13882257536', '13882257536', '2017-02-20 15:17:22', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('214', '13908177473', '13908177473', '2017-02-20 15:23:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('215', '13890968455', '13890968455', '2017-02-20 15:30:37', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('216', '13688333730', '13688333730', '2017-02-20 15:31:01', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('217', '13881844766', '13881844766', '2017-02-20 15:35:09', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('218', '15882258540', '15882258540', '2017-02-20 15:47:35', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('219', '13550283535', '13550283535', '2017-02-20 15:50:24', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('220', '13882288942', '13882288942', '2017-02-20 16:01:59', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('221', '13808285318', '13808285318', '2017-02-20 16:15:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('222', '13608013020', '13608013020', '2017-02-20 16:23:48', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('223', '13730857848', '13730857848', '2017-02-20 16:15:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('224', '13678002725', '13678002725', '2017-02-20 16:23:11', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('225', '15982001063', '15982001063', '2017-02-20 16:25:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('226', '13568802118', '13568802118', '2017-02-20 16:31:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('227', '13908011177', '13908011177', '2017-02-20 16:32:00', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('228', '18683812868', '18683812868', '2017-02-20 16:45:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('229', '18980078035', '18980078035', '2017-02-20 16:53:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('230', '13551136045', '13551136045', '2017-02-20 17:09:52', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('231', '18980005459', '18980005459', '2017-02-20 17:15:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('232', '13608238933', '13608238933', '2017-02-20 17:23:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('233', '13436188702', '13436188702', '2017-02-20 17:23:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('234', '15982347138', '15982347138', '2017-02-20 17:25:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('235', '13883222667', '13883222667', '2017-02-20 17:27:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('236', '13568824266', '13568824266', '2017-02-20 17:29:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('237', '13990408002', '13990408002', '2017-02-20 17:32:11', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('238', '13419161866', '13419161866', '2017-02-20 17:35:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('239', '15883394274', '15883394274', '2017-02-20 17:40:39', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('240', '13568973738', '13568973738', '2017-02-20 17:50:54', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('241', '13666171978', '13666171978', '2017-02-20 18:03:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('242', '15982403505', '15982403505', '2017-02-20 18:07:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('243', '13808039431', '13808039431', '2017-02-20 18:09:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('244', '13981970702', '13981970702', '2017-02-20 18:10:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('245', '13688096263', '13688096263', '2017-02-20 18:18:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('246', '13981723610', '13981723610', '2017-02-20 18:23:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('247', '13734905606', '13734905606', '2017-02-20 18:36:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('248', '13880898300', '13880898300', '2017-02-20 18:47:22', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('249', '13880441537', '13880441537', '2017-02-20 18:58:12', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('250', '13880613877', '13880613877', '2017-02-20 19:09:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('251', '13628069985', '13628069985', '2017-02-20 19:15:05', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('252', '13980476926', '13980476926', '2017-02-20 19:23:21', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('253', '13608080202', '13608080202', '2017-02-20 19:27:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('254', '13981889168', '13981889168', '2017-02-20 19:39:03', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('255', '15982839920', '15982839920', '2017-02-20 19:43:17', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('256', '13666266951', '13666266951', '2017-02-20 19:50:27', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('257', '13980503888', '13980503888', '2017-02-20 20:09:32', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('258', '13678172072', '13678172072', '2017-02-20 20:15:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('259', '13980042627', '13980042627', '2017-02-20 20:23:11', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('260', '13438245898', '13438245898', '2017-02-20 20:32:55', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('261', '1380803943', '1380803943', '2017-02-20 20:45:11', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('262', '18628057257', '18628057257', '2017-02-20 20:57:30', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('263', '13880783251', '13880783251', '2017-02-20 21:09:31', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('264', '15982179830', '15982179830', '2017-02-20 21:13:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('265', '13550100759', '13550100759', '2017-02-20 21:15:23', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('266', '13518207999', '13518207999', '2017-02-20 21:23:49', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('267', '18982277833', '18982277833', '2017-02-20 21:43:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('268', '13982086966', '13982086966', '2017-02-20 21:56:11', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('269', '13980079325', '13980079325', '2017-02-20 22:09:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('270', '13372716811', '13372716811', '2017-02-20 22:13:25', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('271', '13608207749', '13608207749', '2017-02-20 22:13:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('272', '13808094180', '13808094180', '2017-02-200 22:23:52', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('273', '13882227738', '13882227738', '2017-02-20 22:32:50', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('274', '13982250399', '13982250399', '2017-02-20 22:45:22', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ci_user` VALUES ('275', '13881853922', '13881853922', '2017-02-20 22:59:20', null, null, null, null, null, null, null, null, null, null, null, null, null);
