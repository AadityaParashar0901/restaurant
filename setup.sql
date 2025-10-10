CREATE DATABASE IF NOT EXISTS sizzlespot;
USE sizzlespot;

-- Table for users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Table for menu items
CREATE TABLE menu_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(100) DEFAULT 'default.jpg'
);

-- Example data
INSERT INTO menu_items (name, price, image) VALUES
('Grilled Chicken', 250, 'chicken.jpg'),
('Tandoori Wings', 200, 'wings.jpg'),
('Mutton Biryani', 300, 'biryani.jpg'),
('Fish Fry', 220, 'fish.jpg');

-- Employee accounts
CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO employees (username, password) VALUES
('chef', 'chef123'),
('manager', 'admin123');

-- Orders table
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  item_name VARCHAR(100),
  price DECIMAL(10,2),
  order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

