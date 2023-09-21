SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Create the database
CREATE DATABASE IF NOT EXISTS admindb;

-- Use the database
USE admindb;

-- Create the admins table
CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  access VARCHAR(255) NOT NULL
);

-- Insert the first admin
INSERT INTO admins (username, password, access)
VALUES ('admin', MD5('admin123'), 'full');
INSERT INTO admins (username, password, access)
VALUES ('user', MD5('user123'), 'partial');
