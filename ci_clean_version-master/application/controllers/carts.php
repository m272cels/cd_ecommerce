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
    $cart = $this->Order->show_cart('1');
    $cartCount = $this->session->userdata('cart');
    $this->load->view('cart/cart', array("cart_items" => $cart, 'cart' => $cartCount));
  }

  public function add()
  {
    $this->session->userdata('user_id');
    $this->input->post();
    $this->Order->insert_into_cart();
  }

  public function delete($id)
  {
    $product_delete = array("user_id" => '1', "product_id" => $id);
    $currentCart = $this->session->userdata('cart');
    $this->session->set_userdata('cart', $currentCart - 1);
    $this->Order->delete_from_cart($product_delete);
    redirect("/cart");
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

