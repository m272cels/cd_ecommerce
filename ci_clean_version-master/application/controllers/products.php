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
    $this->Product->getmain_photo();
    $this->load->view('mainpage', array('products'=>$results));
  }

  public function show($p_id)
  {
    // details page for an individual product
    // $info = $this->Product->show($id);
    // $this->load->view('products/show', $info);
  }



  public function add()
  {
    // adds a new product
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

