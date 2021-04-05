create database ucode_web;
create user 'anchaus'@'localhost' identified by 'securepass';
grant all privileges on ucode_web . * to anchaus@localhost;