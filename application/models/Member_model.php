<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function checkusername()
  {
    $this->db->where('username', $this->input->post('user'));
    $query=$this->db->get('radcheck');
    if($query->num_rows()==1) {
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

  public function register()
  {
    $data=array(
      'username'=>$this->input->post('user'),
      'value'=>md5($this->input->post('pass')),
      'title'=>$this->input->post('title'),
      'firstname'=>$this->input->post('firstname'),
      'lastname'=>$this->input->post('lastname'),
    );
    $query=$this->db->insert('radcheck', $data);
    if ($query) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function checklogin()
  {
    $user=$this->input->post('user');
    $pass=$this->input->post('pass');

    $this->db->select('username, value');
    $this->db->from('radcheck');
    $this->db->where('username', $user);
    $this->db->where('value', md5($pass));
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function checksession()
  {
    if ($this->session->userdata('logged_in') != 'OK') {
      redirect('member/login');
    }
  }

  public function getmember()
  {
    $this->db->where('username', $this->session->userdata('sess_user'));
    $query=$this->db->get('radcheck');
    return $query;
  }

  public function update()
  {
    $data=array(
      'title'=>$this->input->post('title'),
      'firstname'=>$this->input->post('firstname'),
      'lastname'=>$this->input->post('lastname'),
    );
    $this->db->where('username', $this->session->userdata('user'));
    $query=$this->db->update('radcheck', $data);
    if ($query) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function changepassword()
  {
    $this->db->where('username', $this->session->userdata('sess_user'));
    $this->db->where('value', md5($this->input->post('oldpass')));
    $query=$this->db->get('radcheck');
    if ($query->num_rows()==1) {
      $data=array('value'=>md5($this->input->post('newpass')));
      $this->db->where('username', $this->session->userdata('sess_user'));
      $query=$this->db->update('radcheck', $data);
      if ($query) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
  }
}
