use myuser;
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

insert into order_list(customername, quantity, price) values
  ("Bob", 5, 50.00),
  ("Alice", 3, 30.50),
  ("Charlie", 2, 15.75),
  ("David", 4, 42.00),
  ("Eve", 6, 60.75);


insert into product values
  (50.00),
  (30.50),
  (15.75),
  (42.00),
  (60.75);


