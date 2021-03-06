select 
	M.idmateria "id_materia", M.nombre "nombre_materia", M.horast "horas_teoricas", M.horasp "horas_practicas", M.creditos "creditos", M.numunidades "unidades", C.nombrecorto "carrera", C.idcarrera "id_carrera", A.nombre "aula", A.iddepartamento "id_departamento", G.idgrupo "grupo", H.horain "hora_inicio", H.horafin "hora_fin"
from 
	materia M, 
	carrera C, 
	aula A,
        grupo G,
        horario H,
        horariogrupo HG
where 
	M.idmateria = "TWM-0703" AND
        G.idmateria = "TWM-0703" AND
        G.idcarrera = C.idcarrera AND
        HG.idmateria = "TWM-0703" AND
        HG.idperiodo = "2121" AND
        H.idhorario = HG.idhorario
group by 
	M.idmateria

