<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		redirect('/showproduct/1');
		//$this->load->view('show');
	}
	public function register()
	{
		$this->load->view('register');
	}
}

//end of main controller
