CREATE DATABASE kitten_factory
;
USE kitten_factory
;
CREATE TABLE customer (
	customer_id INT(11) NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	address VARCHAR(100) NOT NULL,
	username VARCHAR(100) UNIQUE NOT NULL,
	password VARCHAR(100) NOT NULL,
	PRIMARY KEY(customer_id)
)
;
CREATE TABLE payment (
	pmt_id INT(11) NOT NULL AUTO_INCREMENT,
	pmt_dttm DATETIME NOT NULL,
	credit_card BIGINT(11) NOT NULL,
	PRIMARY KEY(pmt_id)
)
;
CREATE TABLE shipping (
	ship_id INT(11) NOT NULL AUTO_INCREMENT,
	ship_dt DATE NOT NULL,
	delivery_dt DATE,
	ship_cost DECIMAL(8,2) NOT NULL,
	PRIMARY KEY(ship_id)
)
;
/*
CREATE TABLE raw_material (
	material_id INT(11) NOT NULL AUTO_INCREMENT,
	quantity_available INT(7) NOT NULL,
	material_name VARCHAR(100) NOT NULL,
	PRIMARY KEY(material_id)
)
;
CREATE TABLE material_purchase (
	material_purchase_id INT(11) NOT NULL AUTO_INCREMENT,
	material_id INT(11) NOT NULL,
	purchase_dt DATE NOT NULL,
	purchase_quantity INT(7) NOT NULL,
	PRIMARY KEY(material_purchase_id), 
	FOREIGN KEY(material_id) REFERENCES raw_material(material_id)
)
;
*/
CREATE TABLE product (
	product_id INT(11) NOT NULL AUTO_INCREMENT,
	ski_name VARCHAR(100) NOT NULL,
	makeup VARCHAR(30) NOT NULL,
	-- manufacturing_cost DECIMAL(8,2) NOT NULL,
	-- ski_width DECIMAL(4,2) NOT NULL,
	description BLOB,
	product_img_path VARCHAR(200),
	PRIMARY KEY(product_id)
)
;
/*
CREATE TABLE product_materials (
	product_id INT(11) NOT NULL, 
	material_id INT(11) NOT NULL,
	material_quantitiy DECIMAL(9,2), 
	PRIMARY KEY(product_id, material_id),
	FOREIGN KEY(material_id) REFERENCES raw_material(material_id),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
*/
CREATE TABLE ski_size_price_qty (
	product_id INT(11) NOT NULL,
	ski_size VARCHAR(100) NOT NULL,
	price DECIMAL(8,2) NOT NULL,
	quantity_available INT(7) NOT NULL,
	PRIMARY KEY(product_id, ski_size),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE employee (
	employee_id INT(11) NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) UNIQUE NOT NULL,
	password VARCHAR(100) NOT NULL, 
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	position VARCHAR(50),
	product_id INT(11),
	PRIMARY KEY(employee_id),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE employee_role (
	employee_id INT(11) NOT NULL,
	role VARCHAR(50) NOT NULL,
	PRIMARY KEY(employee_id, role),
	FOREIGN KEY(employee_id) REFERENCES employee(employee_id)
)
;
CREATE TABLE order_table (
	order_id INT(11) NOT NULL AUTO_INCREMENT,
	customer_id INT(11) NOT NULL,
	employee_id INT(11) NOT NULL,
	order_dttm DATETIME NOT NULL,
	-- total_price DECIMAL(8,2) NOT NULL,
	pmt_id INT(11) NOT NULL,
	ship_id INT(11) NOT NULL,
	PRIMARY KEY(order_id),
	FOREIGN KEY(customer_id) REFERENCES customer(customer_id),
	FOREIGN KEY(employee_id) REFERENCES employee(employee_id),
	FOREIGN KEY(pmt_id) REFERENCES payment(pmt_id),
	FOREIGN KEY(ship_id) REFERENCES shipping(ship_id)
)
;
CREATE TABLE order_line (
	order_id INT(11) NOT NULL,
	line_id INT(11) NOT NULL,
	product_id INT(11) NOT NULL,
	ski_size VARCHAR(100) NOT NULL,
	quantity_ordered INT(3) NOT NULL,
	price_paid DECIMAL(8,2) NOT NULL,
	PRIMARY KEY(order_id, line_id),
	FOREIGN KEY(order_id) REFERENCES order_table(order_id),
	FOREIGN KEY(product_id) REFERENCES product(product_id)
)
;
CREATE TABLE return_table (
	return_id INT(11) NOT NULL AUTO_INCREMENT,
	return_dttm DATETIME NOT NULL,
	order_id INT(11) NOT NULL,
	product_id INT(11) NOT NULL,
	ski_size VARCHAR(100) NOT NULL, 
	quantity_returned INT(3) NOT NULL,
	PRIMARY KEY(return_id),
	FOREIGN KEY(order_id) REFERENCES order_table(order_id),
	FOREIGN KEY(product_id, ski_size) REFERENCES ski_size_price_qty(product_id, ski_size)
)
;