<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
    $this->output->enable_profiler();
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

  public function show($id)
  {
    // for admins to view one specific order
    $all['order_info'] = $this->Order->show_order_info($id);
    $all['order_items'] = $this->Order->show_order_items($id);
    $all['shipping_info'] = $this->Order->getshipping($id);
    $all['billing_info'] = $this->Order->getbilling($id);
    $this->load->view('orders/order', $all);
  }

  public function create()
  {
    // places all items from cart into order
  }

  public function update_status()
  {

  }
}

