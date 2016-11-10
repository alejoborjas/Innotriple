SELECT a.codigo_pulsera, a.imagen, a.disponibles, a.precio, 
	b.codigo_usuario, b.nombre, b.apellido, b.direccion
FROM tbl_pulseras a
INNER JOIN tbl_usuarios b
WHERE (a.codigo_pulsera = --codigo pulsera) 
AND (b.codigo_usuario = --codigo usuario)