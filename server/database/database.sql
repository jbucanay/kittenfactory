CREATE DATABASE kitten_factory
;
USE kitten_factory
;

CREATE TABLE payment (
	pmt_id INT(11) NOT NULL AUTO_INCREMENT,
	pmt_dttm DATETIME NOT NULL,
	credit_card INT(11) NOT NULL,
	PRIMARY KEY(pmt_id)
)
;
CREATE TABLE shipping (
	ship_id INT(11) NOT NULL AUTO_INCREMENT,
	ship_dt DATE NOT NULL,
	delivery_dt DATE NOT NULL,
	ship_cost DECIMAL(8,2) NOT NULL,
	PRIMARY KEY(ship_id)
)
;

CREATE TABLE product (
	product_id INT(11) NOT NULL AUTO_INCREMENT,
	ski_name VARCHAR(100) NOT NULL,
	makeup VARCHAR(30) NOT NULL,
	ski_length DECIMAL(5,2) NOT NULL,
	ski_width DECIMAL(4,2) NOT NULL,
	description BLOB,
	quantity_available INT(7) NOT NULL,
	PRIMARY KEY(product_id)
)
;

CREATE TABLE product_size_price (
	product_id INT(11) NOT NULL,
	product_size VARCHAR(100) NOT NULL,
	price DECIMAL(8,2) NOT NULL,
	PRIMARY KEY(product_id, product_size),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	position VARCHAR(50),
	username VARCHAR(200) NOT NULL,
	password VARCHAR(258) NOT NULL,
	address VARCHAR(258) not null,
	product_id INT(11),
	PRIMARY KEY(user_id),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE order_table (
	order_id INT(11) NOT NULL AUTO_INCREMENT,
	user_id INT(11) NOT NULL,
	order_dttm DATETIME NOT NULL,
	total_price DECIMAL(8,2) NOT NULL,
	pmt_id INT(11) NOT NULL,
	ship_id INT(11) NOT NULL,
	PRIMARY KEY(order_id),
	FOREIGN KEY(user_id) REFERENCES users(user_id),
	FOREIGN KEY(pmt_id) REFERENCES payement(pmt_id),
	FOREIGN KEY(ship_id) REFERENCES shipping(ship_id)
)
;
CREATE TABLE order_line (
	line_id INT(11) NOT NULL AUTO_INCREMENT,
	order_id INT(11) NOT NULL,
	product_id INT(11) NOT NULL,
	quantity_ordered INT(3) NOT NULL,
	price_paid DECIMAL(8,2) NOT NULL,
	PRIMARY KEY(line_id),
	FOREIGN KEY(order_id) REFERENCES order_table(order_id),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE return_table (
	return_id INT(11) NOT NULL AUTO_INCREMENT,
	return_dttm DATETIME NOT NULL,
	order_id INT(11) NOT NULL,
	quantity_returned INT(3) NOT NULL,
	PRIMARY KEY(return_id),
	FOREIGN KEY(order_id) REFERENCES order_table(order_id)
)
;