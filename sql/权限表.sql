CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(32) NOT NULL COMMENT '权限名称',
  `controller_name` varchar(50) NOT NULL COMMENT '控制器名称',
  `action_name` varchar(50) NOT NULL DEFAULT '' COMMENT '作操名称',
  `order_no` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序号 小的排在前',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';