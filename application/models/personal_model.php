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

  function infoGrupos($user){
    $this->db->where('idpersonal', $user);
    $query = $this->db->get('view_grupos_materia');
    return $query->result();
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