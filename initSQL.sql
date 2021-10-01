DROP DATABASE IF EXISTS webshop;

CREATE DATABASE webshop;

USE webshop;

-- Table users
DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS orders;

DROP TABLE IF EXISTS products;

CREATE TABLE users (
  id INTEGER NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
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
  id INTEGER NOT NULL AUTO_INCREMENT,
  product_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  time_of_order TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id),
  PRIMARY KEY (id)
);

INSERT INTO
  users (username, password, address)
VALUES
  ('Svampbob2', 'password1', 'Lund, Svampgatan 15A');

INSERT INTO
  products (product_name, price, description, img)
VALUES
  ('Exotisk svamp', 10000, "Exotic swamp for the swamp-king", "exotic-swamp"),
  ('Enkel svamp', 100, "Just a simple swamp, found anywhere.", "simple-swamp")
  