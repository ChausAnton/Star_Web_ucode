USE ucode_web;

SELECT heroes.name, teams.name FROM heroes
LEFT JOIN teams ON teams.hero_id = heroes.id
ORDER BY heroes.id;

SELECT heroes.name, powers.name FROM heroes
LEFT JOIN powers ON powers.hero_id = heroes.id
ORDER BY heroes.id;

SELECT heroes.name, powers.name, teams.name FROM heroes
JOIN powers ON powers.hero_id = heroes.id
JOIN teams ON teams.hero_id = heroes.id
ORDER BY heroes.id;