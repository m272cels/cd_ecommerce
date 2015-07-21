<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
    // $this->output->enable_profiler();
  }

  public function index()
  {
    // for admins to view all orders
    // $this->load->view('orders/index');
  }

  public function inventory()
  {
    // to view how much of each item in stock
    // $this->load->view('orders/inventory');
  }

  public function create()
  {
    // places all items from cart into order
  }

  public function update_status()
  {

  }

  public function display()
  {
    // for admins to view
  }
}

