/*
MySQL Data Transfer
Source Host: 127.0.01
Source Database: mou_shop
Target Host: 127.0.01
Target Database: mou_shop
Date: 2017/3/22 15:12:07
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for address
-- ----------------------------
CREATE TABLE `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '所属会员',
  `consignee` varchar(60) NOT NULL COMMENT '收货人',
  `mobile` varchar(60) NOT NULL COMMENT '手机号',
  `city` int(10) unsigned NOT NULL COMMENT '所在地区',
  `address` varchar(120) NOT NULL COMMENT '街道地址',
  `is_default` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为默认地址',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='收货地址表';

-- ----------------------------
-- Records 
-- ----------------------------

INSERT INTO `address` VALUES ('2', '813', '张三2', '15566788990', '440000000', '中山大道99号', '0');
INSERT INTO `address` VALUES ('3', '813', '张三3', '15566788990', '440000000', '中山大道99号', '0');
INSERT INTO `address` VALUES ('4', '813', '张三4', '15566788990', '440000000', '中山大道99号', '0');
INSERT INTO `address` VALUES ('5', '813', '张三5', '15566788990', '440000000', '中山大道99号', '0');
INSERT INTO `address` VALUES ('6', '813', '张三6', '15566788990', '440000000', '中山大道99号', '0');
INSERT INTO `address` VALUES ('7', '813', '张三7', '15566788990', '440000000', '中山大道99号', '0');
