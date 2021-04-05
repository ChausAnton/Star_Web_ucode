USE ucode_web;

CREATE TABLE IF NOT EXISTS heroes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL UNIQUE,
    description TEXT,
    race VARCHAR(30) DEFAULT 'human',
    class_role ENUM('tankman', 'healer', 'dps')
);