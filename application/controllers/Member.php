<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('member_model');
  }

  function index()
  {
    $this->member_model->checksession();
    $this->load->view('home_view');
  }

  public function login()
  {
    $this->load->view('login_view');
  }

  public function login2()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('user', 'Username', 'required');
    $this->form_validation->set_rules('pass', 'Password', 'required');
    //$this->form_validation->set_message('required', 'Error: request %s');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login_view');
    }
    else {
      if($this->member_model->checklogin() == TRUE) {
        $newdata = array(
          'sess_user'=>$this->input->post('user'),
          'logged_in'=>'OK',
        );
        $this->session->set_userdata($newdata);
        redirect('member/index');
      }
      else {
        $this->load->view('login_view');
      }
    }
  }

  public function changepassword()
  {
    $this->load->view('changepassword_view');
  }

  public function changepassword2()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('oldpass', 'Old password', 'required');
    $this->form_validation->set_rules('newpass', 'New password', 'required');
    $this->form_validation->set_rules('confpass', 'Confirm password', 'required|matches[newpass]');
    //$this->form_validation->set_message('required', 'Error: request %s');
    //$this->form_validation->set_message('matches', 'Error: New password not as Confirm password');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('changepassword_view');
    }
    else {
      if ($this->member_model->changepassword() == TRUE) {
        $data['result']='Change password success';
      }
      else {
        $data['result']='Not change password';
      }
      $this->load->view('changepassword2_view', $data);
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('sess_user');
    $this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    redirect('member/index');
  }
}
