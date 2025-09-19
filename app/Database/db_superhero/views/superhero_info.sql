CREATE VIEW view_superhero_info AS
SELECT 
	SH.id,
	SH.superhero_name,
	SH.full_name,
	PB.publisher_name,
	AL.alignment
FROM superhero SH
LEFT JOIN publisher PB 
ON SH.publisher_id = PB.id
LEFT JOIN alignment AL 
ON SH.alignment_id = AL.id
ORDER BY 4; -- CUARTA COLUMNA
