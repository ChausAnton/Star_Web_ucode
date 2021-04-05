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