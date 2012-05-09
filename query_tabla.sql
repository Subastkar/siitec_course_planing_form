select 
	M.idmateria "id_materia", M.nombre "nombre_materia", M.horast "horas_teoricas", M.horasp "horas_practicas", M.creditos "creditos", M.numunidades "unidades", 
	C.nombrecorto "carrera", C.idcarrera "id_carrera",
	A.nombre "aula", A.iddepartamento "id_departamento"
from 
	materia M, 
	carrera C, 
	aula A
where 
	M.idmateria = "TWM-0703" 
group by 
	M.idmateria

