<?php

class Datos_model extends CI_Model {
  function getInfo(){
    $this->db->select_max('ciclo_escolar');
    $query = $this->db->get('datos_curso');
    return $query->result();
  }
}
