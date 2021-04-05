USE ucode_web;

CREATE TABLE IF NOT EXISTS powers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hero_id INT not NULL,
    name VARCHAR(30) not NULL,
    points INT not NULL,
    type ENUM('attack', 'defense'),

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS race (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hero_id INT not NULL,
    name VARCHAR(30),

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hero_id INT not NULL,
    name VARCHAR(30),

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);

INSERT INTO powers (hero_id, name, points, type) values (
    1,
    'bloody fist',
    110,
    'attack'
);

INSERT INTO powers (hero_id, name, points, type) values (
    2,
    'iron shield',
    200,
    'defense'
);

INSERT INTO race (hero_id, name) values (
    3,
    'Human'
);

INSERT INTO race (hero_id, name) values (
    4,
    'Kree'
);

INSERT INTO teams (hero_id, name) values (
    5,
    'Avengers'
);

INSERT INTO teams (hero_id, name) values (
    5,
    'Hydra'
);

INSERT INTO teams (hero_id, name) values (
    6,
    'Avengers'
);

INSERT INTO teams (hero_id, name) values (
    7,
    'Hydra'
);

