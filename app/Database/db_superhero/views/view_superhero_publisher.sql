CREATE VIEW view_superhero_publisher AS
SELECT 
	P.publisher_name,
	COUNT(SH.publisher_id) AS total
FROM superhero SH
LEFT JOIN publisher P
ON P.id = SH.publisher_id
GROUP BY SH.publisher_id;