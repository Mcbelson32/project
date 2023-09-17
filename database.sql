-- Create the database
CREATE DATABASE IF NOT EXISTS admindb;

-- Use the database
USE admindb;

-- Create the admins table
CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL
);

-- Insert the first admin
INSERT INTO admins (username, password, type)
VALUES ('admin', '1234', 'full');
