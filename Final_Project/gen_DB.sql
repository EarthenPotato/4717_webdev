CREATE TABLE customers (
    ID INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(15),
    orderID INT
);

CREATE TABLE order_list (
    ID INT PRIMARY KEY,
    customername VARCHAR(255)
);

CREATE TABLE order_list_quantity (
    ID INT PRIMARY KEY,
    AQ1 INT,
    AQ2 INT,
    AQ3 INT,
    CQ1 INT,
    CQ2 INT,
    CQ3 INT,
    TQ1 INT,
    TQ2 INT,
    TQ3 INT
);

CREATE TABLE order_list_price (
    AP1 DECIMAL(10,2),
    AP2 DECIMAL(10,2),
    AP3 DECIMAL(10,2),
    CP1 DECIMAL(10,2),
    CP2 DECIMAL(10,2),
    CP3 DECIMAL(10,2),
    TP1 DECIMAL(10,2),
    TP2 DECIMAL(10,2),
    TP3 DECIMAL(10,2)
);


CREATE TABLE product (
    item VARCHAR(255),
    price DECIMAL(10, 2)
);

CREATE TABLE cart (
    "product_name" VARCHAR(255),
    "quantity" INT
);
