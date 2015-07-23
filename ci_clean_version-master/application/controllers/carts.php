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
    $cart = $this->Order->show_cart($this->session->userdata('user')['id']);
    $cartCount = $this->session->userdata('cart');
    $this->load->view('cart/cart', array("cart_items" => $cart, 'cart' => $cartCount));
  }

  public function add($id)
  {
    //var_dump($this->session->userdata('user'));
    $cart = array("user_id" => $this->session->userdata('user')['id'],
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
    $product_delete = array("user_id" => $this->session->userdata('user')['id'], "product_id" => $id);
    $currentCart = $this->session->userdata('cart');
    $this->session->set_userdata('cart', $currentCart - 1);
    $this->Order->delete_from_cart($product_delete);
    redirect("/cart");
  }

  public function update()
  {
    // updates one item
    $post = $this->input->post();
    $post['user_id'] = '1';//$this->session->userdata('user_id');
    $this->Order->update_cart($post);
    redirect('/cart');
  }

  public function clear()
  {
    // removes all items from a cart
  }
}

