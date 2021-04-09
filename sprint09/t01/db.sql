create database sword;
create user 'anchaus'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
grant all privileges on sword . * to 'anchaus'@'localhost' WITH GRANT OPTION;
USE sword;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin BOOLEAN NOT NULL,
    login VARCHAR(30) NOT NULL UNIQUE KEY,
    password VARCHAR(30) NOT NULL,
    full_name VARCHAR(30) NOT NULL,
    email_address VARCHAR(30) NOT NULL UNIQUE
);
