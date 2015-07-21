<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('mainpage');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function login()
	{
		$this->load->view('login');
	}

}

//end of main controller