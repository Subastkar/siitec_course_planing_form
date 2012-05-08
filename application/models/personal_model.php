<?php

class Personal_model extends CI_Model {

  function validate(){
    $this->db->where('idpersonal', $this->input->post('username'));
    $this->db->where('clave', md5($this->input->post('password')));
    $query = $this->db->get('personal');

    if($query->num_rows == 1){
      return true;
    }
  }

  function infoUsuario($user){
    $this->db->where('idpersonal', $user);
    $query = $this->db->get('personal');
    if($query->num_rows == 1){
      return $query->row();
    }
  }

  function infoGrupos($user, $periodo){
    $this->db->where('idpersonal', $user);
    $this->db->where('idperiodo', $periodo);
    $query = $this->db->get('view_grupos_materia');
    return $query->result();
  }
}
