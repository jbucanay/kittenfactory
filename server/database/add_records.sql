USE kitten_factory
;
INSERT INTO 
	customer (first_name, last_name, address, username, password)
VALUES 
	('Eric', 'Bryan', '100 N 100 W, SLC, UT', 'ebryan', '12345'),
	('Ramona', 'Ali', '200 N 200 W, SLC, UT', 'rali', '12345'),
	('Mildred', 'Pace', '300 N 300 W, SLC, UT', 'mpace', '12345'),
	('Arlen', 'Green', '400 N 400 W, SLC, UT', 'agreen', '12345'),
	('Gordon', 'Wolf', '500 N 500 W, SLC, UT', 'gwolf', '12345'),
	('Betty', 'Morton', '600 N 600 W, SLC, UT', 'bmorton', '12345'),
	('Lisa', 'Howe', '700 N 700 W, SLC, UT', 'lhowe', '12345')
;
INSERT INTO
	payment (pmt_dttm, credit_card)
VALUES
	(NOW(), 12345678902),
	(NOW(), 12345678903),
	(NOW(), 12345678904),
	(NOW(), 12345678905),
	(NOW(), 12345678906)
;
INSERT INTO
	shipping (ship_dt, ship_cost)
VALUES
	(CURRENT_DATE, 10.75),
	(CURRENT_DATE, 7.23),
	(CURRENT_DATE, 9.02),
	(CURRENT_DATE, 8.54),
	(CURRENT_DATE, 10.89)
;
INSERT INTO 
	product (ski_name, makeup)
VALUES
	('Carbon Fiber Skis', 'carbon_fiber'),
	('Hybrid Skis', 'hybrid')
;
INSERT INTO
	ski_size_price_qty (product_id, ski_size, price, quantity_available)
VALUES
	(1, 175, 500, 25),
	(1, 180, 550, 25),
	(2, 175, 400, 25),
	(2, 180, 450, 25)
;
INSERT INTO 
	employee (username, password, first_name, last_name, position, product_id) 
VALUES
	('sbigelow', '12345', 'Stephen', 'Bigelow', 'Web Developer I', NULL),
	('gbaracka', '12345', 'Gilbert', 'Baracka', 'Web Developer II', NULL),
	('afarr', '12345', 'Ashley', 'Farr', 'Web Developer II', NULL),
	('pjordan', '12345', 'Peter', 'Jordan', 'Sales Associate', 1),
	('kwilliams', '12345', 'Kaylee', 'Williams', 'Sales Associate', 2)
;
INSERT INTO 
	employee_role (employee_id, role)
VALUES
	(1, 'admin'),
	(2, 'admin'),
	(3, 'admin'),
	(4, 'employee'),
	(5, 'employee')
;
INSERT INTO 
	order_table (customer_id, employee_id, order_dttm, pmt_id, ship_id)
VALUES
	(1, 1, NOW(), 1, 1),
	(2, 1, NOW(), 2, 2),
	(3, 2, NOW(), 3, 3),
	(4, 2, NOW(), 4, 4),
	(5, 2, NOW(), 5, 5)
;
INSERT INTO
	order_line (order_id, line_id, product_id, ski_size, quantity_ordered, price_paid)
VALUES
	(1, 1, 1, 175, 1, 500),
	(1, 2, 2, 175, 1, 400),
	(2, 1, 1, 180, 2, 1100),
	(2, 2, 2, 180, 1, 450),
	(3, 1, 1, 180, 1, 550),
	(3, 2, 1, 175, 1, 500),
	(3, 3, 2, 175, 2, 800),
	(4, 1, 1, 180, 4, 2200),
	(5, 1, 2, 175, 1, 400),
	(5, 2, 2, 180, 1, 450)
;
INSERT INTO
	return_table (return_dttm, order_id, product_id, ski_size, quantity_returned)
VALUES
	(NOW(), 2, 1, 180, 1),
	(NOW(), 4, 1, 180, 2)
;