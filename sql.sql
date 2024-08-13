SELECT DISTINCT customer_id FROM orders;
SELECT	quantity_in_stock,	unit_price,	quantity_in_stock + unit_price AS 'sum' FROM products;
select * from order_items where order_id = 6 and unit_price * quantity > 30;
select * from products where quantity_in_stock in (49, 38, 72);
select * from customers where birth_date between '1990-01-01' and '2000-01-01';
select * from customers where address like '%trail%' or address like '%avenue%';
select * from customers where first_name like 'I____';
select * from customers where last_name regexp '^mac' or last_name regexp 'field$' or last_name regexp 'rose|son';
select * from customers where last_name regexp '[lgy]e' or last_name regexp '[a-h]e';
select *, quantity * unit_price as total_price from order_items where order_id = 2 order by total_price desc;
select * from customers  limit 6, 2;
select * from customers group by points desc limit 2;
select order_id, orders.customer_id, first_name, last_name from orders inner join customers on orders.customer_id= customers.customer_id;
select order_id, o.customer_id, first_name, last_name from orders o inner join customers c on o.customer_id= c.customer_id;
select customer_id, first_name, points, 'bronze' AS type from customers where points < 2000
 union select customer_id, first_name, points, 'silver' AS type from customers where points between 2000 and 3000
 union select customer_id, first_name, points, 'gold' AS type from customers where points > 3000;
 insert into customers values (default, 'arjen', 'robben', '1988-04-12', 05-83194583, 'kerkstraat 23', 'Werkendam', 'BR', 2500);
update invoices set payment_total = 10, payment_date = '2019-03-01' where invoiced_id = 1;
select * from order_items;
delete from order_items where quantity = (select * from order_items order by quantity desc limit 2);
