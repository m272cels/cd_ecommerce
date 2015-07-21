<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product');

    $this->output->enable_profiler();

  }

  public function index()
  {
    // main page with search and stuff
    $results=$this->Product->getall_products();
    $this->Product->getmain_photo
    $this->load->view('mainpage', array('products'=>$results));
  }

  public function show($p_id)
  {
    $product = $this->Product->getproduct_byid($p_id);
    $main_pic = $this->Product->getmain_image($p_id);
    $other_pics = array('product' => $p_id, 'main_photo_id' => $main_pic['id']);
    $pics = $this->Product->getother_images($other_pics);
    var_dump($main_pic);
    var_dump($pics);
    $this->load->view("show", array("product" => $product, "main_img" => $main_pic, "images" => $pics));
    //$this->load->view("");
    // details page for an individual product
    // $info = $this->Product->show($id);
    // $this->load->view('products/show', $info);
  }



  public function add($id)
  {
    $cart = array("user_id" => $this->session->userdata("user_data"),
        "product_id" => $id, "quantity" => $this->input->post("quantity"));
    $this->Order->insert_into_cart($cart);
    // var_dump($id);
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

