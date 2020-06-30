--
-- Table structure for table `table_order`
--

DROP TABLE IF EXISTS `table_order`;
CREATE TABLE IF NOT EXISTS `table_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_picture` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_name` (`product_name`),
  KEY `product_price` (`product_price`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;