<?php

class New_info extends CI_Model {
  function new_course($data){
    $this->db->insert('datos_curso',$data);
  }

  function new_data($data){
    $this->db->insert('contenido_materia',$data);
  }
}
