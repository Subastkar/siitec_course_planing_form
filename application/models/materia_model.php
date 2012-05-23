<?php

class Materia_model extends CI_Model {
  function getCourse($materia,$periodo){
    $query = $this->db->query('select M.idmateria "id_materia", M.nombre "nombre_materia", M.horast "horas_teoricas", M.horasp "horas_practicas", M.creditos "creditos", M.numunidades "unidades",M.objetivo "objetivo", C.nombrecorto "carrera", C.idcarrera "id_carrera", A.nombre "aula", A.iddepartamento "id_departamento", G.idgrupo "grupo", H.horain "hora_inicio", H.horafin "hora_fin" from materia M, carrera C, aula A, grupo G, horario H, horariogrupo HG where M.idmateria = "' . $materia . '" AND G.idmateria = "' . $materia . '" AND G.idcarrera = C.idcarrera AND HG.idmateria = "' . $materia .'" AND HG.idperiodo = "' . $periodo . '" AND H.idhorario = HG.idhorario group by M.idmateria');
    return $query->row();
  }

  function getContent($materia,$unidad){
    $this->db->where('materia',$materia);
    $this->db->where('unidad',$unidad);
    $query = $this->db->get('contenido_materia');

    if($query->num_rows == 1){
      return $query->row();
    }
  }
}
