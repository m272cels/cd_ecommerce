<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
    // $this->output->enable_profiler();
  }

  public function index()
  {
    // $this->load->view('carts/index');
  }

  public function create()
  {
    // invoked at user registration
  }

  public function add()
  {
    // adds one item
  }

  public function delete()
  {
    // removes one item
  }

  public function update()
  {
    // updates one item
  }

  public function clear()
  {
    // removes all items from a cart
  }

  public function display()
  {

  }
}

