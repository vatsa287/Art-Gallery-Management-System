--
-- Table structure for table `table_payement`
--

DROP TABLE IF EXISTS `table_payement`;
CREATE TABLE IF NOT EXISTS `table_payement` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
