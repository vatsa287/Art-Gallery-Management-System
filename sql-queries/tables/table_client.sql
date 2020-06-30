
--
-- Table structure for table `table_client`
--

DROP TABLE IF EXISTS `table_client`;
CREATE TABLE IF NOT EXISTS `table_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_Name` varchar(100) NOT NULL,
  `client_Email` varchar(100) NOT NULL,
  `client_Password` varchar(100) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `table_client`
--
DROP TRIGGER IF EXISTS `insertedUserTrigger`;
DELIMITER $$
CREATE TRIGGER `insertedUserTrigger` AFTER INSERT ON `table_client` FOR EACH ROW insert into user_log VALUES (null,NEW.client_id,'INSERTED',NOW())
$$
DELIMITER ;
COMMIT;
