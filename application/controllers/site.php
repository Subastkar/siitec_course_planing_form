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

  function admin_area(){
    $data['main_content'] = 'admin_area';
    $this->load->view('includes/template',$data);
  }

  function new_curso(){
    $this->load->model('new_info');

    $data["dia_inicio"] = $this->input->post('fecha');
    $data["ciclo_escolar"] = $this->input->post('ciclo');

    if($data["dia_inicio"] != "" && $data["ciclo_escolar"] !="")
        $this->new_info->new_course($data);

    redirect('site/admin_area');
  }

  function curso_data(){
    $this->load->model('new_info');

    $data["materia"] = $this->input->post('materia');
    $unidades = $this->input->post('unidades');

    for($uni = 1; $uni <= $unidades; $uni++){
      $data["unidad"] = $uni;
      $data["nombre"] = $this->input->post('nombre_'.$uni);
      $data["contenido"] = $this->input->post('contenido_'.$uni);
      $data["tiempo"] = $this->input->post('semanas_'.$uni);
      $this->new_info->new_data($data);
    }

    redirect('site/admin_area');
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
    $data['inicio'] = $this->session->userdata('dia_inicio');
    $data['nombre'] = $this->personal_model->infoUsuario($user);
    $data['periodo'] = $periodo; 

    $data['formulario'] = $this->materia_model->getCourse($materia,$periodo);

    for($uni = 1; $uni <= $data['formulario']->unidades; $uni++){
      $data["contenido"][$uni] = $this->materia_model->getContent($materia,$uni);
    }

    $this->load->view('planing_form',$data);


  } 

  function save($materia){
    $unidades = $this->input->post('unidades');
    echo $materia.'<br/>';
    echo $unidades.'<br/>';
    for($uni = 1; $uni <= $unidades; $uni++){
      echo $this->input->post('inicio_'.$uni).'<br/>';
      echo $this->input->post('final_'.$uni).'<br/>';
    }
  }

}
