<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Session');
    $this->load->model('Order');
		//$this->output->enable_profiler();
	}
  public function login()
  {
    $results=$this->Session->validate_log($this->input->post());
    if($results==0)
    {
      redirect('/');
    }
    else
    {
      $user=$this->Session->getuser_byemail($this->input->post('email_login'));
      if(empty($user))
      {
        $this->session->set_flashdata('errors', 'Email does not exist');
        redirect('/');
      }
      else
      {
        $password=$this->input->post('password_login');
        $encrypted_password=md5($password. '' .$user['salt']);
        if($encrypted_password==$user['password'])
        {
          $this->session->set_userdata('user' , array('admin'=> $user['admin'], 'id'=>$user['id'],'email'=>$user['email'], 'alias' => $user['alias']));
          if($user['admin'] == '1')
          {
            redirect('/dashboard');
          }
          $cartcount = $this->Order->getcartCount($user['id'])['count'];
          $this->session->set_userdata('cart', $cartcount);
         redirect('/products');
        }
        else
        {
          $this->session->set_flashdata('errors', 'Incorrect password');
          redirect('/');
        }
      }
    }
    $this->session->set_userdata('failreg', 0);
  }

  public function register()
  {
    $results=$this->Session->validate_reg($this->input->post());
    if($results===0)
    {
      $this->session->set_userdata('failreg', 1);
      redirect('/');
    }
    else
    {
      $this->session->set_userdata('failreg', 0);
      $this->Session->register($this->input->post());
      redirect('/');
    }
  }
}

