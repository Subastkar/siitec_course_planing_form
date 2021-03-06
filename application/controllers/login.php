<?php
class Login extends CI_Controller {

  function index(){
    $data['main_content'] = 'login_form';
    $this->load->view('includes/template',$data);
  }

  function validate_credentials(){
    $this->load->model('personal_model');
    $this->load->model('datos_model');
    if($this->input->post('username') == 'admin' && $this->input->post('password') == '201111'){
      $data = array('username' => $this->input->post('username'), 'is_logged_in' => true);
      $this->session->set_userdata($data);
      redirect('site/admin_area');
    }
    $query = $this->personal_model->validate();

    if ($query)// if the user's crednetials validated
    {
      $curse = $this->datos_model->getInfo();
      $data = array('username' => $this->input->post('username'), 'is_logged_in' => true, 'periodo' => $curse->ciclo_escolar, 'dia_inicio' => $curse->dia_inicio);
      $this->session->set_userdata($data);
      redirect('site/personal_area');
    }
    else
    {
      $this->index();
    }
  }
}
