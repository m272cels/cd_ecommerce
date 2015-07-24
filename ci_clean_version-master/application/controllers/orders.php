<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
    $this->load->model('Product');
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

  public function searchorders($status,$search) {
    $info = array('search' => $search, 'status' => $status);
    $orders = $this->Order->search_orders($info);
    $this->load->view('partials/admin_orders', array('orders' => $orders));
  }

  public function create($total)
  {
    // places all items from cart into order
    $user = $this->session->userdata('user');
    $info = $this->session->userdata('mail_info');
    $info['user_id'] = $user['id'];
    $info['total'] = $total;
    // create new order
    $order_id = $this->Order->create_order($info);
    // place all items from cart into order
    $cart = $this->Order->get_cart_by_id($user['id']);
    foreach ($cart as $item) {
      $item['order_id'] = $order_id;
      $currinventory = intval($this->Product->getproduct_inventory($item['product_id']));
      $currinventory = $currinventory - intval($item['quantity']);
      $this->Product->updateproduct_inventory(array('stock' => $currinventory, 'product_id' => $item['product_id']));
      $this->Order->insert_into_order($item);
    }
    // clear the user's cart
    $this->Order->clear_cart($user['id']);
    $this->session->set_userdata('cart', 0);
    $this->session->unset_userdata('mail_info');
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

