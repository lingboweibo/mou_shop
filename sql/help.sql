/*
MySQL Data Transfer
Source Host: 127.0.01
Source Database: mou_shop
Target Host: 127.0.01
Target Database: mou_shop
Date: 2017/3/30 14:12:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for help
-- ----------------------------
CREATE TABLE `help` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '标题',
  `content` varchar(4000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='帮助中心';

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `help` VALUES ('1', '新手上路', '新手上路的详细内容');
INSERT INTO `help` VALUES ('2', '付款方式', '付款方式的详细内容');
INSERT INTO `help` VALUES ('3', '配送说明', '配送说明的详细内容');
INSERT INTO `help` VALUES ('4', '售后服务', '售后服务的详细内容');
INSERT INTO `help` VALUES ('5', '发票制度说明', '发票制度说明的详细内容');
INSERT INTO `help` VALUES ('6', '常见问题', '常见问题的详细内容');
INSERT INTO `help` VALUES ('7', '联系客服', '联系客服的详细内容');
