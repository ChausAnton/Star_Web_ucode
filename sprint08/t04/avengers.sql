USE ucode_web;

SELECT total.hero_id, total.points from (
    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers GROUP BY powers.hero_id
) as total ORDER BY total.points DESC LIMIT 1;

SELECT total.hero_id, total.points from (
    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers WHERE powers.type = 'defense'
    GROUP BY powers.hero_id
) as total ORDER BY total.points ASC LIMIT 1;

SELECT total.hero_id, total.points FROM (
        SELECT powers.hero_id, SUM(powers.points) AS points
        FROM (
            SELECT hero_id, COUNT(*) FROM teams GROUP BY hero_id HAVING COUNT(*) = 1
        ) as count1 INNER JOIN powers ON count1.hero_id = powers.hero_id
        GROUP BY powers.hero_id
) as total INNER JOIN teams ON total.hero_id = teams.hero_id WHERE teams.name != "Hydra" ORDER BY total.points DESC;


SELECT teams.name, SUM(powers.points) AS sum_of_points
FROM teams JOIN powers ON teams.hero_id=powers.hero_id
WHERE teams.name IN ('Avengers', 'Hydra') GROUP BY teams.name
ORDER BY SUM(powers.points);