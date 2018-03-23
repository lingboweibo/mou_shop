CREATE TABLE `job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_name` varchar(32) NOT NULL COMMENT '职业名称',
  `order_no` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `job` VALUES ('1', '学生', '1');
INSERT INTO `job` VALUES ('2', '职员', '2');
INSERT INTO `job` VALUES ('3', '公务员', '3');