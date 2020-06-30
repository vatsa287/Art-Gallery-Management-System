--
-- Procdure structure for procedure `getOrder()`
--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOrder`()
select sum(product_price),count(order_id) from table_order$$
DELIMITER ;