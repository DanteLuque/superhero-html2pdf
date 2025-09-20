CREATE VIEW view_superhero_powers AS 
SELECT 
	SH.id, SH.superhero_name, SH.full_name,
	SP.power_name
FROM hero_power HP
INNER JOIN superhero SH
ON SH.id = HP.hero_id
INNER JOIN superpower SP
ON SP.id = HP.power_id;