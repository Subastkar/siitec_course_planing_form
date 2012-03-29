create view view_grupos_materia as select G.idpersonal, G.idgrupo, G.idmateria, G.idperiodo, M.nombre as materia
from grupo G, materia M
where M.idmateria = G.idmateria
