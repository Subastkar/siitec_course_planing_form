<?php
class Login extends CI_Controller {

  function index(){
    $data['main_content'] = 'login_form';
    $this->load->view('includes/template',$data);
  }

  function validate_credentials(){
    $this->load->model('personal_model');
    $query = $this->personal_model->validate();

    if ($query)// if the user's crednetials validated
    {
      $data = array('username' => $this->input->post('username'), 'is_logged_in' => true);
      $this->session->set_userdata($data);
      redirect('site/personal_area');
    }
    else
    {
      $this->index();
    }
  }

  //function signup(){
    //$data['main_content'] = 'signup_form';
    //$this->load->view('includes/template', $data);
  //}

  //function create_personal() {

    //$this->load->library('form_validation');

    //$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
    //$this->form_validation->set_rules('apellidop', 'Apellido paterno', 'trim|required');
    //$this->form_validation->set_rules('apellidom', 'Apellido materno', 'trim|required');


    //$this->form_validation->set_rules('curp', 'CURP', 'trim|required|min_length[18]');
    //$this->form_validation->set_rules('clave', 'Contrase&ntilde;a', 'trim|required|min_length[4]|max_length[32]');
    //$this->form_validation->set_rules('clave2', 'Confrimaci&oacute;nde contrase&ntilde;a', 'trim|required|matches[clave]');

    //if($this->form_validation->run() == FALSE) {
      //$this->signup();
    //}else {
      //$this->load->model('personal_model');
      //if($query = $this->personal_model->create_personal()) {
        //$data['main_content'] = 'signup_succesful';
        //$this->load->view('includes/template',$data);
      //}else {
        //$this->signup();
      //}
    //}
  //}
}
