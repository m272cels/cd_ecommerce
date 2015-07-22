<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product');
    $this->load->model('Order');
    $this->output->enable_profiler();

  }

  public function index()
  {
    // main page with search and stuff
    $images=$this->Product->get_all_main_images();
    $carosel=$this->Product->get_carosel_images();
    $cartCount = $this->session->userdata('cart');
    $products=$this->Product->getall_products();
    $this->load->view('products/mainpage', array('images'=>$images, 'carosel'=>$carosel, 'products'=>$products, 'cart' => $cartCount));
  }
  public function show($p_id)
  {
    $product = $this->Product->getproduct_byid($p_id);
    $main_pic = $this->Product->getmain_image($p_id);
    $other_pics = array('product' => $p_id, 'main_photo_id' => $main_pic['id']);
    $pics = $this->Product->getother_images($other_pics);
    $cartcount = $this->session->userdata('cart');
    $this->load->view("products/show", array("product" => $product, "main_img" => $main_pic, "images" => $pics, 'cart' => $cartcount));
    //$this->load->view("");
    // details page for an individual product
    // $info = $this->Product->show($id);
    // $this->load->view('products/show', $info);
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

  public function delete($p_id)
  {
    // removes a product
  }

  public function update($p_id)
  {
    // updates a product
  }

  public function add_review($p_id)
  {

  }

  public function delete_review($p_id)
  {

  }

  public function update_review($p_id)
  {

  }

  public function show_reviews($p_id)
  {

  }
}

