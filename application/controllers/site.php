<?php 

class Site extends CI_Controller {
  
  function __construct(){
    parent::__construct();
    $this->is_logged_in();
  }  

  function personal_area(){
    $user = $this->session->userdata('username'); 
    $this->load->model('personal_model');

    $data['nombre'] = $this->personal_model->infoUsuario($user);

    $data['grupos'] = $this->personal_model->infoGrupos($user);

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

  function log_out(){
    $data = array('username' => null, 'is_logged_in' => false);
    $this->session->set_userdata($data);
    redirect('../');
  }

  function course($materia){
    echo $materia;
  } 

}
