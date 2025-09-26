CREATE VIEW view_superhero_gender AS
SELECT 
	G.gender,
	COUNT(SH.gender_id) AS total
FROM superhero SH
INNER JOIN gender G
ON G.id = SH.gender_id
GROUP BY SH.gender_id;