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
    $all['cart_items'] = $this->Order->cart;
    $this->load->view('carts/cart', $all);
  }

  public function add()
  {
    $this->session->userdata('user_id');
    $this->input->post();
    $this->Order->insert_into_cart();
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
}

