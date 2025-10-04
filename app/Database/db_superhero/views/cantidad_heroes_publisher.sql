CREATE VIEW view_cantidad_heroes_publisher AS
SELECT 
	P.publisher_name,
	COUNT(SH.publisher_id) AS total
FROM superhero SH
INNER JOIN publisher P
ON P.id = SH.publisher_id
GROUP BY SH.publisher_id;
