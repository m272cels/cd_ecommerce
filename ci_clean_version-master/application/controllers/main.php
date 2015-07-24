<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

	public function index()
	{
		//$this->session->sess_destroy();
		if(!$this->session->userdata('cart'))
		{
			$this->session->set_userdata('cart', 0);
		}
		if(!$this->session->userdata('failreg'))
		{
			$this->session->set_userdata('failreg', 0);
		}

		//redirect('/products');
		$this->load->view('users/test');
	}
	public function register()
	{
		$this->load->view('users/register');
	}

	public function admin_nav() {
		$this->load->view('partials/adminnavbar');
	}

	public function user_nav(){
		$cartcount = $this->session->userdata('cart');
		$this->load->view('partials/usernavbar', array('cart' => $cartcount));
	}
}

//end of main controller
