<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Session');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('users/index');
	}

  public function login()
  {

  }

  public function register()
  {

  }

  public function logout()
  {

  }
}

