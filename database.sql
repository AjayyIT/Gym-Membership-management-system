CREATE DATABASE IF NOT EXISTS gym_db;
USE gym_db;
CREATE TABLE IF NOT EXISTS members (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
password VARCHAR(100),
phone VARCHAR(15),
plan_id INT,
status ENUM('active', 'inactive') DEFAULT 'inactive',
role ENUM('admin', 'member') DEFAULT 'member',
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS plans (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
price DECIMAL(10,2),
duration INT
);
CREATE TABLE IF NOT EXISTS attendance (
id INT AUTO_INCREMENT PRIMARY KEY,
member_id INT,
check_in DATETIME,
check_out DATETIME
);
