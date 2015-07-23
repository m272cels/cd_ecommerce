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
    $cartCount = $this->session->userdata('cart');
    $this->load->view('cart/cart', array('cart' => $cartCount));
  }

  public function index_html()
  {
    $cart = $this->Order->show_cart('1');
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function add($id)
  {
    $cart = array("user_id" => '1',
        "product_id" => $id, "quantity" => $this->input->post("quantity"));
    $this->Order->insert_into_cart($cart);
    $currentcart = $this->session->userdata('cart');
    $this->session->set_userdata('cart', $currentcart + 1);
    //$this->show($id);
    redirect('/showproduct/'.$id);
    // var_dump($this->input->post("quantity"));
    // die();
  }

  public function delete($id)
  {
    $product_delete = array("user_id" => '1', "product_id" => $id);
    $currentCart = $this->session->userdata('cart');
    $this->session->set_userdata('cart', $currentCart - 1);
    $this->Order->delete_from_cart($product_delete);
    $cart = $this->Order->show_cart('1');
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function update()
  {
    // updates one item
    $post = $this->input->post();
    $post['user_id'] = '1';//$this->session->userdata('user_id');
    $this->Order->update_cart($post);
    $cart = $this->Order->show_cart('1');
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function clear()
  {
    // removes all items from a cart
  }
}

