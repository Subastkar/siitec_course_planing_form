<?php

class Personal_model extends CI_Model {

  function validate(){
    $this->db->where('idpersonal', $this->input->post('username'));
    $this->db->where('clave', md5($this->input->post('password')));
    $query = $this->db->get('personal');

    if($query->num_rows == 1){
      return true;
      echo $query->num_rows;
      $is_logged_in = true;
    }
  }

  //function create_personal() {
    //$new_personal_insert_data = (
      //'nombre' => $this->input->post->('nombre'),
      //'apellidop' => $this->input->post('apellidop'),
      //'apellidom' => $this->input->post('apellidom'),
      //'curp' => $this->input->post('curp'),
      //'clave' => md5($this->input->post('clave'))
    //);

    //$insert = $this->db->insert('personal', $new_personal_insert_data);
    //return $insert;
  //}
}
