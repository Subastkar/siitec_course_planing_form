<?php 

class Site extends CI_Controller {
  
  function __construct(){
    parent::__construct();
    $this->is_logged_in();
  }  

  function personal_area(){
    $user = $this->session->userdata('username'); 
    $this->load->model('personal_model');
    foreach($this->personal_model->infoUsuario($user) as $row){
      $data['nombre'] = $row->nombre;
      $data['apellido'] = $row->apellidop;
    }

    $query = $this->personal_model->infoGrupos($user);
    $data['row'] = $query->row_array();

    $data['main_content'] = 'personal_area';
    $this->load->view('includes/template',$data);

  }

  function is_logged_in(){
    $is_logged_in = $this->session->userdata('is_logged_in');

    if(!isset($is_logged_in) || $is_logged_in != true){
      echo 'No se ha iniciado sesion <a href="../login">Login</a>';
      die();
    }
  }

}
