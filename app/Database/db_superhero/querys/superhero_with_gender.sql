SELECT 
	SH.id,
	SH.superhero_name,
	SH.full_name,
	G.gender
FROM superhero SH
LEFT JOIN gender G ON G.id = SH.gender_id;