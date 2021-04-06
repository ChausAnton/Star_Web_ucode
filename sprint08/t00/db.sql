create database ucode_web;
create user 'anchaus'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
grant all privileges on ucode_web . * to 'anchaus'@'localhost' WITH GRANT OPTION;