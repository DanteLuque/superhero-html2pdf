CREATE VIEW promedio_pesos_heroes AS
SELECT 
    P.publisher_name,
    AVG(CASE WHEN SH.weight_kg > 0 THEN SH.weight_kg END) AS peso_promedio
FROM publisher P
LEFT JOIN superhero SH ON P.id = SH.publisher_id
GROUP BY P.publisher_name;