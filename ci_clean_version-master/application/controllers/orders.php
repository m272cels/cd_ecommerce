<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
    //$this->output->enable_profiler();
  }

  public function index()
  {
    // for admins to view all orders
    $this->load->view('orders/dashboard');
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
    //var_dump($this->Order->show_order_items($id));
    $all['shipping_info'] = $this->Order->getshipping($id);
    $all['billing_info'] = $this->Order->getbilling($id);
    $this->load->view('orders/order', $all);
  }

  public function dashboard_orders()
  {
    $this->load->view('orders/dashboard_orders');
  }

  public function orderspartial($status) {
    $orders = $this->Order->get_orders($status);
    //var_dump($orders);
    $this->load->view('partials/admin_orders', array('orders' => $orders));
  }

  public function insertAddresses() {
    $shipping_info = array('fn' => $this->input->post('first_name'), 'ln' => $this->input->post('last_name'), 'add' => $this->input->post('address'),
      'add2' => $this->input->post('address2'), 'city' => $this->input->post('city'), 'state' => $this->input->post('state'),
      'zip' => $this->input->post('zip'));
    $billing_info = array('fn' => $this->input->post('first_name_bill'), 'ln' => $this->input->post('last_name_bill'), 'add' => $this->input->post('address_bill'),
      'add2' => $this->input->post('address2_bill'), 'city' =>$this->input->post('city_bill'), 'state' => $this->input->post('state_bill'),
      'zip' => $this->input->post('zip_bill'));
    $ship_id = $this->Order->add_address($shipping_info);
    $bill_id = $this->Order->add_address($billing_info);
    return array('shipping_id' => $ship_id, 'billing_id' => $bill_id);
  }

  public function create($total)
  {
    // places all items from cart into order
    $user_id = $this->session->userdata('user_id');
    // create shipping/billing
    $info = $this->insertAddresses();
    //$info['user_id'] = $user_id;
    $info['user_id'] = '1';
    $info['total'] = $total;
    // create new order
    $order_id = $this->Order->create_order($info);
    // place all items from cart into order
    $cart = $this->Order->get_cart_by_id('1');
    foreach ($cart as $item) {
      $item['order_id'] = $order_id;
      $this->Order->insert_into_order($item);
    }
    // clear the user's cart
    $this->Order->clear_cart('1');
    $this->session->set_userdata('cart', 0);
    redirect('/products');

  }

  public function updatestatus($status_id, $id)
  {
    //var_dump($this->input->post());
    //$status_id = $this->input->post('status');
    //$id = $this->input->post('id');
    $status = '';
    switch($status_id){
      case '1':
        $status = "Order in process";
        break;
      case '2':
        $status = "Need to ship";
        break;
      case '3':
        $status = "shipped";
        break;
      case '4':
        $status = "Cancelled";
        break;
    }
    $info = array('status' => $status, 'order_id' => $id);
    $this->Order->update_order_status($info);
    $orders = $this->Order->get_orders('1');
    $this->load->view('partials/admin_orders', array('orders' => $orders));
  }
}

