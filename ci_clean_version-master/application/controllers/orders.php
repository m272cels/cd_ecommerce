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
    $user_id = $this->session->userdata('user_id');
    // create shipping/billing
    $info = $this->Order->insertAddresses();
    $info['user_id'] = $user_id;
    // create new order
    $order_id = $this->Order->create_order($info);
    // place all items from cart into order
    $cart = $this->Order->get_cart_by_id($user_id);
    foreach ($cart as $item) {
      $item['order_id'] = $order_id;
      $this->Order->insert_into_order()
    }
    // clear the user's cart
    $this->Order->clear_cart($user_id);
    redirect('/');
  }

  public function update_status()
  {

  }
}

