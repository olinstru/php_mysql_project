DELETE FROM product;
ALTER TABLE product AUTO_INCREMENT = 1;

INSERT INTO product (name, price) VALUES
('Apple', 0.50),
('Milk', 2.00),
('Eggs', 1.50),
('Bread', 2.50);
