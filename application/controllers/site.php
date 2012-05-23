<?php 

class Site extends CI_Controller {
  
  function __construct(){
    parent::__construct();
    $this->is_logged_in();
  }  

  function personal_area(){
    $user = $this->session->userdata('username'); 
    $periodo = $this->session->userdata('periodo'); 
    $this->load->model('personal_model');

    $data['nombre'] = $this->personal_model->infoUsuario($user);

    $data['grupos'] = $this->personal_model->infoGrupos($user,$periodo);

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
    $this->load->model('personal_model');
    $this->load->model('materia_model');
    $this->load->library('calendar');

    $user = $this->session->userdata('username'); 
    $periodo = $this->session->userdata('periodo'); 
    $data['dia_inicio'] = $this->session->userdata('dia_inicio');
    $data['mes_inicio'] = $this->session->userdata('mes_inicio');
    $data['ano_inicio'] = $this->session->userdata('ano_inicio');
    $data['nombre'] = $this->personal_model->infoUsuario($user);
    $data['periodo'] = $periodo; 

    $data['formulario'] = $this->materia_model->getCourse($materia,$periodo);

    for($uni = 1; $uni <= $data['formulario']->unidades; $uni++){
      $data["contenido"][$uni] = $this->materia_model->getContent($materia,$uni);
    }

    $data['main_content'] = 'planing_form';
    $this->load->view('includes/template',$data);


  } 

}
