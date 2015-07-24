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
  public function mainpage_products_json_price_default($category)
  {
    $products=$this->Product->getproducts_byprice_category($category);
    echo json_encode($products);
  }
  public function mainpage_products_json_popularity($category)
  {
    $products=$this->Product->getproducts_bypopularity_category($category);
    echo json_encode($products);
  }
  public function category_json($category)
  {
    $products=$this->Product->getproduct_bycategory($category);
    echo json_encode($products);
  }
  public function show_admin_products() {
    $categories=$this->Product->get_categories();
    $cart = $this->session->userdata("cart");
    $this->load->view("products/products", array("cart" => $cart, "categories" => $categories));
  }

  public function search_products($search)
  {
    $info = array('search' => $search);
    $products = $this->Order->search_sold_products($info);
    $this->load->view('partials/admin_products', array('product_info' => $products));
  }

  public function add_product()
  {

      // //load library
      // $this->load->library('upload');

      // //Set the config
      // $config['upload_path'] = './uploads/'; //Use relative or absolute path
      // $config['allowed_types'] = 'gif|jpg|png';
      // // $config['max_size'] = '100';
      // // $config['max_width'] = '1024';
      // // $config['max_height'] = '768';
      // $config['overwrite'] = FALSE; //If the file exists it will be saved with a progressive number appended

      // //Initialize
      // $this->upload->initialize($config);

      // //Upload file
      // if( ! $this->upload->do_upload("fileToUpload")){

      //     //echo the errors
      //     echo $this->upload->display_errors();
      // }
      // //If the upload success
      // $file_name = $this->upload->file_name;

      // //Save the file name into the db
      // //$main_photo_id = $this->Product->addpic($file_name)






    $existing_category = $this->input->post("existing_category");
    $new_category = $this->input->post("new_category");
    if (!empty($new_category)) {
      $category = $new_category;
      $this->Product->add_category($category);
    } else {
      $category = $existing_category;
    }
    $category_id = $this->Product->get_category_id_by_title($category);
    $name = $this->input->post("name");
    $price = $this->input->post("price");
    $description = $this->input->post("description");
    $category = $category_id['id'];
    $inventory_count = $this->input->post("stock");
    $product_info = array("product_name" => $name, "description" => $description,
       "category" => $category, "stock" => $inventory_count, "price" => $price);
    $this->Product->add_product($product_info);
    $this->show_partial_products();
  }

  public function delete_product($p_id)
  {
    $this->Product->remove_product($p_id);
    $products = $this->Order->sold_products();
    $this->load->view("partials/admin_products", array("product_info" => $products));
  }

  public function update_product($p_id)
  {
    $existing_category = $this->input->post("existing_category");
    $new_category = $this->input->post("new_category");
    if (!empty($new_category)) {
      $category = $new_category;
      $this->Product->add_category($category);
    } else {
      $category = $existing_category;
    }
    $category_id = $this->Product->get_category_id_by_title($category);
    $product_id = $this->input->post("product_id");
    $name = $this->input->post("name");
    $description = $this->input->post("description");
    $price = $this->input->post("price");
    $category = $category_id;
    $inventory_count = $this->input->post("stock");
    $product_info = array("product_id" => $product_id, "product_name" => $name, "description" => $description,
       "category" => $category, "price" => $price, "stock" => $inventory_count);
    $this->Product->update_product($product_info);

    redirect('/admin');
  }
  public function search_json()
  {
    $products= $this->Product->search_products($this->input->post('search'));
    echo json_encode($products);
  }
  public function search_json_sort_pop($search)
  {
    $products= $this->Product->search_products_sort_popularity($search);
    echo json_encode($products);
  }
  public function search_json_sort_price($search)
  {
    $products=$this->Product->search_products_sort_price($search);
    echo json_encode($products);
    // $this->show_partial_products();
  }
  public function getCount($prod_id) {
    $count = $this->Product->getcount_review($prod_id);
  }

  public function addreview()
  {
    $user_id = $this->session->userdata('user')['id'];
    $info = array('user_id' => $user_id, 'product_id' => $this->input->post('prod_id'), 'review' => $this->input->post('review'),
      'rating' => $this->input->post('rating'), 'helpful' => 0);
    $this->Product->addreview($info);
    $product = $this->Product->getproduct_byid($this->input->post('prod_id'));
    $reviews = $this->Product->getreviews_bydate($this->input->post('prod_id'));
    $reviewcount = $this->Product->getcount_review($this->input->post('prod_id'));
    $hasreview = $this->Product->getreview_byid(array('p_id' => $this->input->post('prod_id'), 'u_id'=> $this->session->userdata('user')['id']));
    $this->load->view('partials/reviews', array('reviews' => $reviews,'hasreview' => $hasreview, 'count' => $reviewcount, 'product' => $product));
  }

  public function delete_review($p_id)
  {

  }

  public function update_review($p_id)
  {

  }

  public function show_reviews($id)
  {
    $product = $this->Product->getproduct_byid($id);
    $reviews = $this->Product->getreviews_bydate($id);
    $reviewcount = $this->Product->getcount_review($id);
    $hasreview = $this->Product->getreview_byid(array('p_id' => $id, 'u_id'=> $this->session->userdata('user')['id']));
    $this->load->view('partials/reviews', array('reviews' => $reviews,'hasreview' => $hasreview, 'count' => $reviewcount, 'product' => $product));
  }
}

