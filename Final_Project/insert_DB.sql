use electroshock;
-- tables needed customers. products, order_list
-- customers table contains ID, name, email, address, phone number,orderID 
-- product table contains price
-- order_list contains customername, quantity of items bought, price when bought.
insert into customers(ID, name, email, address, phone_number, orderID) values
  (1, "Bob", "Bob@gmail.com","1234 Elm Street","123-4567",1),
  (2, "Alice", "alice@gmail.com", "5678 Oak Avenue", "987-6543",2),
  (3, "Charlie", "charlie@gmail.com", "9876 Birch Road", "456-7890",3),
  (4, "David", "david@gmail.com", "2468 Cedar Lane", "789-0123",4),
  (5, "Eve", "eve@gmail.com", "1357 Pine Street", "345-6789",5);

insert into order_list(ID, customername) values
  (1,"Bob"),
  (2,"Alice"),
  (3,"Charlie"),
  (4,"David"),
  (5,"Eve");

INSERT INTO order_list_quantity(ID, AQ1, AQ2, AQ3, CQ1, CQ2, CQ3, TQ1, TQ2, TQ3)
VALUES
(1, 1, 2, 3, 1, 2, 3, 1, 2, 3),
(2, 3, 1, 2, 3, 1, 2, 3, 1, 2),
(3, 2, 3, 1, 2, 3, 1, 2, 3, 1),
(4, 1, 3, 2, 1, 3, 2, 1, 3, 2),
(5, 2, 1, 3, 2, 1, 3, 2, 1, 3);


  INSERT INTO order_list_price(ID, AP1, AP2, AP3, CP1, CP2, CP3, TP1, TP2, TP3)
  VALUES
(1, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(2, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(3, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(4, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(5, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99);

INSERT INTO product(item, price)
VALUES
('AP1', 120.99),
('AP2', 240.75),
('AP3', 299.99),
('CP1', 1500.50),
('CP2', 1850.75),
('CP3', 1999.99),
('TP1', 25.99),
('TP2', 75.49),
('TP3', 99.99);

INSERT INTO cart (product_name, quantity) VALUES 
('AQ1', 0),
('AQ2', 0),
('AQ3', 0),
('CQ1', 0),
('CQ2', 0),
('CQ3', 0),
('TP1', 0),
('TP2', 0),
('TP3', 0);




