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
}
