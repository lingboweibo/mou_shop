CREATE TABLE `order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL COMMENT '订单ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `num` int(10) unsigned NOT NULL COMMENT '购买数',
  `name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `home` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产地',
  `format` varchar(32) NOT NULL DEFAULT '' COMMENT '规格',
  `content` text,
  `give_integral` mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '购买商品赠送积分',
  `required_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所需积分',
  `filename` varchar(800) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `order_goods_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `order_goods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单商品表';
