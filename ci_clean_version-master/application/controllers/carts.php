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
    $cart = $this->Order->show_cart($this->session->userdata('user')['id']);
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function show_payment()
  {
    $cartCount = $this->session->userdata('cart');
    $this->load->view('cart/pay_credit', array('cart' => $cartCount));
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
    redirect('/carts');
    // var_dump($this->input->post("quantity"));
    // die();
  }

  public function delete($id)
  {
    $product_delete = array("user_id" => $this->session->userdata('user')['id'], "product_id" => $id);
    $currentCart = $this->session->userdata('cart');
    $this->session->set_userdata('cart', $currentCart - 1);
    $this->Order->delete_from_cart($product_delete);
    $cart = $this->Order->show_cart($this->session->userdata('user')['id']);
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function update()
  {
    // updates one item
    $post = $this->input->post();
    $post['user_id'] = $this->session->userdata('user')['id'];
    $this->Order->update_cart($post);
    $cart = $this->Order->show_cart($this->session->userdata('user')['id']);
    $this->load->view('partials/cart_items_table', array("cart_items" => $cart));
  }

  public function charge_cart()
  {
    var_dump($this->input->post());
    die();
    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey("sk_test_Vm2vZVZEMkocuikftKPgOuEk");

    // Get the credit card details submitted by the form
    $token = $this->input->post('stripeToken');

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
    $charge = \Stripe\Charge::create(array(
      "amount" => 10000, // amount in cents, again
      "currency" => "usd",
      "source" => $token,
      "description" => "testing charges")
    );
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined
    }
  }
}

