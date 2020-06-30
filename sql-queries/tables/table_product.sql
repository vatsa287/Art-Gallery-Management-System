--
-- Table structure for table `table_product`
--

DROP TABLE IF EXISTS `table_product`;
CREATE TABLE IF NOT EXISTS `table_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_picture` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
