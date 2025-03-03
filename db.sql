CREATE DATABASE storage_inventory;

USE storage_inventory;

CREATE TABLE USER(
    ID int primary key auto_increment,
    USERNAME varchar(255) NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    ROLE enum('ADMIN', 'WORKER', 'USER') NOT NULL
);

CREATE TABLE CATEGORY(
    ID int primary key auto_increment,
    CATEGORY varchar(255) NOT NULL
);

CREATE TABLE SHELF(
    ID int primary key auto_increment,
    SHELFNAME varchar(255) NOT NULL
);

CREATE TABLE PRODUCTS(
    ID int primary key auto_increment,
    PRODUCTNAME varchar(255) NOT NULL,
    CATEGORY_ID int NOT NULL,
    PRICE int NOT NULL,
    SUPPLIER varchar(255) NOT NULL,
    FOREIGN KEY (CATEGORY_ID) REFERENCES CATEGORY(ID)
);

CREATE TABLE INVENTORY(
    ID int primary key auto_increment,
    SHELF_ID int NOT NULL,
    PRODUCT_ID int NOT NULL,
    QUANTITY int NOT NULL,
    LASTUPDATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (SHELF_ID) REFERENCES SHELF(ID),
    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(ID)
);

CREATE TABLE ORDERS(
    ID int primary key auto_increment,
    USER_ID int NOT NULL,
    PRODUCT_ID int NOT NULL,
    QUANTITY int NOT NULL,
    STATE enum('COMPLITED', 'PENDING', 'DONE') NOT NULL,
    ORDERDATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
);

CREATE TABLE LOGS(
    ID int primary key auto_increment,
    USER_ID int NOT NULL,
    TARGET_ID int NOT NULL,
    TARGET_TYPE varchar(255) NOT NULL,
    DESCRIPTION varchar(255) NOT NULL,
    ACTION_TIME TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (USER_ID) REFERENCES USER(ID)
);


-- Insert data into USER table
INSERT INTO USER (USERNAME, PASSWORD, ROLE) VALUES
('admin1', 'password1', 'ADMIN'),
('worker1', 'password2', 'WORKER'),
('user1', 'password3', 'USER'),
('admin2', 'password4', 'ADMIN'),
('worker2', 'password5', 'WORKER');

-- Insert data into CATEGORY table
INSERT INTO CATEGORY (CATEGORY) VALUES
('Electronics'),
('Furniture'),
('Clothing'),
('Books'),
('Toys');

-- Insert data into SHELF table
INSERT INTO SHELF (SHELFNAME) VALUES
('Shelf A'),
('Shelf B'),
('Shelf C'),
('Shelf D'),
('Shelf E');

-- Insert data into PRODUCTS table
INSERT INTO PRODUCTS (PRODUCTNAME, CATEGORY_ID, PRICE, SUPPLIER) VALUES
('Laptop', 1, 1000, 'Supplier A'),
('Chair', 2, 150, 'Supplier B'),
('T-shirt', 3, 20, 'Supplier C'),
('Novel', 4, 10, 'Supplier D'),
('Action Figure', 5, 25, 'Supplier E');

-- Insert data into INVENTORY table
INSERT INTO INVENTORY (SHELF_ID, PRODUCT_ID, QUANTITY) VALUES
(1, 1, 10),
(2, 2, 20),
(3, 3, 30),
(4, 4, 40),
(5, 5, 50);

-- Insert data into LOGS table
INSERT INTO LOGS (USER_ID, TARGET_ID, TARGET_TYPE, DESCRIPTION) VALUES
(1, 1, 'PRODUCT', 'Added new product'),
(2, 2, 'PRODUCT', 'Updated product quantity'),
(3, 3, 'PRODUCT', 'Deleted product'),
(4, 4, 'PRODUCT', 'Viewed product details'),
(5, 5, 'PRODUCT', 'Added new product');