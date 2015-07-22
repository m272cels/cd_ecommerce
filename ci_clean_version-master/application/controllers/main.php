<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		if(!$this->session->userdata('cart'))
		{
			$this->session->set_userdata('cart', 0);
		}

		//redirect('/showproduct/2');
		$this->load->view('index');
	}
	public function register()
	{
		$this->load->view('register');
	}
}

//end of main controller
