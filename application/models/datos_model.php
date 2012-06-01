<?php

class Datos_model extends CI_Model {
  function getInfo(){
    $this->db->select_max('ciclo_escolar');
    $this->db->select_max('dia_inicio');
    $query = $this->db->get('datos_curso');
    return $query->row();
  }
}
