<?php

class Datos_model extends CI_Model {
  function getInfo(){
    $this->db->select_max('ciclo_escolar');
    $this->db->select_max('dia');
    $this->db->select_max('mes');
    $this->db->select_max('ano');
    $query = $this->db->get('datos_curso');
    return $query->row();
  }
}
