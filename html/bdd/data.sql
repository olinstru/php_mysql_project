DELETE FROM products;
ALTER TABLE products AUTO_INCREMENT = 1;

INSERT INTO products (name, price) VALUES
('Apple', 0.50),
('Milk', 2.00),
('Eggs', 1.50),
('Bread', 2.50);

DELETE FROM `orders`;
ALTER TABLE `orders` AUTO_INCREMENT = 1;

