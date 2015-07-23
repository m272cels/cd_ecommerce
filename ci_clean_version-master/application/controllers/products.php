<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product');
    $this->load->model('Order');
    //$this->output->enable_profiler();

  }

  public function index()
  {
    // main page with search and stuff
    $categories=$this->Product->get_categories();
    // $images=$this->Product->get_all_main_images();
    $carosel=$this->Product->get_carosel_images();
    $cartCount = $this->session->userdata('cart');
    $products=$this->Product->getall_products();
    $this->load->view('products/mainpage', array(/*'images'=>$images,*/ 'carosel'=>$carosel, 'products'=>$products, 'categories' => $categories, 'cart' => $cartCount));
  }
  public function show($p_id)
  {
    //gets similar items to show
    $product = $this->Product->getproduct_byid($p_id);
    $similar_products = $this->Product->getsimilar_products($product);
    $main_pic = $this->Product->getmain_image($p_id);
    $other_pics = array('product' => $p_id, 'main_photo_id' => $main_pic['id']);
    $pics = $this->Product->getother_images($other_pics);
    $cartcount = $this->session->userdata('cart');
    $this->load->view("products/show", array("product" => $product,
      "main_img" => $main_pic, "images" => $pics, 'cart' => $cartcount, "similar_products" => $similar_products));
    //$this->load->view("");
    // details page for an individual product
    // $info = $this->Product->show($id);
    // $this->load->view('products/show', $info);
  }

  public function show_partial_products() {
    $products = $this->Order->sold_products();
    $this->load->view("partials/admin_products", array("product_info" => $products));
  }
  public function mainpage_products_json_price()
  {
    $products=$this->Product->get_all_main_images_with_price();
    echo json_encode($products);
  }
public function mainpage_products_json_popularity()
  {
    $products=$this->Product->getproducts_bypopularity();
    echo json_encode($products);
  }
  public function show_admin_products() {
    $categories=$this->Product->get_categories();
    $cart = $this->session->userdata("cart");

    $this->load->view("products/products", array("cart" => $cart, "categories" => $categories));

  }


  public function add($id)
  {

  }

  public function delete_product($p_id)
  {
    $this->Product->remove_product($p_id);
    $this->show_admin_products();
  }

  public function update_product($p_id)
  {
    $updated_product_info = $this->input->post();
    var_dump(($updated_product_info));
    $this->Product->update_product($updated_product_info);
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

