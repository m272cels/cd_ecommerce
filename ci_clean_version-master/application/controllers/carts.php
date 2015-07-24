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
    // echo FCPATH;
    // die()
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


    $fname = $this->input->post("first_name");
    $lname = $this->input->post("last_name");
    $address = $this->input->post("address");
    $address2 = $this->input->post("address2");
    $city = $this->input->post("city");
    $state = $this->input->post("state");
    $zip = $this->input->post("zip");

    $fname_b = $this->input->post("first_name_bill");
    $lname_b = $this->input->post("last_name_bill");
    $address_b = $this->input->post("address_bill");
    $address2_b = $this->input->post("address2_bill");
    $city_b = $this->input->post("city_bill");
    $state_b = $this->input->post("state_bill");
    $zip_b = $this->input->post("zip_bill");

    $validate_bill_info = array("first_name" => $fname, "last_name" => $lname, "address" => $address, "address2" => $address2,
        "city" => $city, "state" => $state, "zip" => $zip, "first_name_bill" => $fname_b, "last_name_bill" => $lname_b,
        "address_bill" => $address_b, "address2_bill" => $address2_b,
        "city_bill" => $city_b, "state_bill" => $state_b, "zip_bill" => $zip_b);
    $validation = $this->Order->validate_billing($validate_bill_info);

    if ($validation == 1) {
      $mail_info = $this->insertAddresses();
      $this->session->set_userdata('mail_info', $mail_info);
      $total = $this->input->post('total');
      $this->load->view('cart/pay_credit', array('cart' => $cartCount, 'total' => $total));
    } else {
      redirect('/carts');
    }
    // $results=$this->Session->validate_log($this->input->post());
    // if($results==0)
    // {
    //   redirect('/');
    // }
    // else
    // {

    // }
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

  public function charge_card()
  {
    // IF USING COMPOSER, UNCOMMENT THE FOLLOWING LINE:
    //require_once('./vendor/autoload.php');
    // OTHERWISE, REQUIRE THE NATIVE STRIPE PHP LIBRARY:

    require_once("./stripe-php-2.3.0/init.php");

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey("sk_test_Vm2vZVZEMkocuikftKPgOuEk");

    // Get the credit card details submitted by the form
    $token = $this->input->post('stripeToken');

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => $this->input->post('total')*100, // amount in cents, again
        "currency" => "usd",
        "source" => $token,
        "description" => "testing charges")
      );
      redirect('/addorder/'.$this->input->post('total'));
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined
      redirect('/carts/pay_credit');
    }
  }
}

