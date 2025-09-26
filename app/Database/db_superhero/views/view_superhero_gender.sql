CREATE VIEW view_superhero_gender AS
SELECT 
	G.gender,
	COUNT(SH.gender_id) AS total
FROM superhero SH
LEFT JOIN gender G
ON G.id = SH.alignment_id
GROUP BY SH.gender_id;