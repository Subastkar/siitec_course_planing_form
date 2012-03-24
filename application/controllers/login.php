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

  function signup(){
    $data['main_content'] = 'signup_form';
    $this->load->view('includes/template', $data);
  }

  function create_personal() {
    $this->load->library('form_validation');
  }
}
