DROP DATABASE IF EXISTS webshop;

CREATE DATABASE webshop;

USE webshop;

-- Table users
DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS orders;


CREATE TABLE users (
  id INTEGER NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  attempts INTEGER DEFAULT 0
);

CREATE TABLE products (
  id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
  product_name VARCHAR(255) NOT NULL UNIQUE,
  price FLOAT NOT NULL,
  description VARCHAR(255) NOT NULL,
  img VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE orders (
    orderID INT NOT NULL AUTO_INCREMENT,
    orderTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    productID TEXT NOT NULL,
    FullName VARCHAR(250) NOT NULL,
    PRIMARY KEY(orderID)
);

INSERT INTO
  products (product_name, price, description, img)
VALUES
  ('Exotisk svamp', 10000, "Exotic swamp for the swamp-king", "exotic-swamp"),
  ('Enkel svamp', 100, "Just a simple swamp, found anywhere.", "simple-swamp"),
  ('Glow swamp', 1000, "its glows in the darkest of places!", "glow-swamp")
  