CREATE TABLE customers (
    ID INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(15),
    orderID INT
);
CREATE TABLE order_list (
    customername VARCHAR(255),
    quantity INT,
    price DECIMAL(10, 2)
);
CREATE TABLE product (
    price DECIMAL(10, 2)
);
