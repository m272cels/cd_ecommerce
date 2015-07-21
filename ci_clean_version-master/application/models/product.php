<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

    public function getproduct_bycategory($category) {
        return $this->db->query("SELECT * FROM products as p WHERE p.category_id = ?", array($category))->result_array();
    }

    public function getall_products() {
        return $this->db->query("SELECT * FROM products")->result_array();
    }

    public function getproducts_byprice() {
        return $this->db->query("SELECT * FROM products ORDER BY price ASC")->result_array();
    }

    public function getproducts_bypopularity() {
        return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.price, SUM(o.quantity) as sold
            FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            LEFT JOIN order_items as o on p.id = o.product_id
            GROUP BY p.id
            ORDER BY sold DESC")->result_array();
    }

    public function getproducts_bypopularity_category($category) {
        return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.price, SUM(o.quantity) as sold
            FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            LEFT JOIN order_items as o on p.id = o.product_id
            WHERE p.category_id = ?
            GROUP BY p.id
            ORDER BY sold DESC")->result_array();
    }
    // tested
    public function getproduct_byid($id) {
        return $this->db->query("SELECT * FROM products as p where p.id = ?", array($id))->row_array();
    }

    public function getsimilar_products($id) {
        return $this->db->query("SELECT * FROM products as p
            WHERE p.category_id = ?
            AND p.id NOT IN (SELECT pr.id FROM products as pr where pr.id = ?) LIMIT 6", array($id['category_id'], $id['product_id']))->row_array();
    }
    public function add_category($category) {
        $query = ("INSERT INTO categories (created_at, updated_at, category)
            VALUES (NOW(), NOW(), ?)");
        $values = array();
        return $this->db->query($query, $values);
    }

    public function delete_category($id) {
        return $this->db->query("DELETE FROM categories
            WHERE id = ?");
    }

    public function update_category($id) {
        return $this->db->query("UPDATE categories set category = ?
            WHERE id = ?");
    }
    public function add_product($product) {
        $query = ("INSERT INTO products (name, description, price, count_in_stock, created_at, updated_at, main_photo_id, category_id)
            VALUES (?,?,?,?,NOW(),NOW(),?,?)");
        $values = array();
        return $this->db->query($query, $values);
    }

    public function update_product($product) {
        return $this->db->query("UPDATE products SET name = ?, description = ?, count_in_stock = ?, main_photo_id = ?, category_id = ?, updated_at = NOW()
            WHERE id = ?",array());
    }

    public function updateproduct_inventory($id) {
        return $this->db->query("UPDATE products SET count_in_stock = ?
            WHERE id = ?", array($id['stock'], $id['product_id']));
    }

    public function delete_product($id) {
        return $this->db-query("DELETE FROM products
            WHERE id = ? ");
    }

    // --------------images queries
    // tested
    public function getmain_image($id) {
        return $this->db->query("SELECT i.source, i.alt
            FROM products as p
            LEFT JOIN photos as i on p.main_photo_id = i.id
            WHERE p.id = ?", array($id))->row_array();
    }

    // tested
    public function getother_images($id) {
        return $this->db->query("SELECT p.source, p.alt
            FROM photos as p
            WHERE p.product_id = ?
            AND p.id NOT IN (SELECT pr.main_photo_id from products pr
            WHERE pr.id = ?)", array($id['product'], $id['main_photo_id']))->row_array();
    }
    public function get_carosel_images()
    {

    }

    public function updatemain($id) {
        return $this->db->query("UPDATE products SET main_photo_id = ? WHERE id = ?", array($id['main_photo_id'], $id['p_id']));
    }

    public function addpic($image_info) {
        return $this->db->query("INSERT INTO photos (source, alt, created_at, updated_at, product_id VALUES(?,?, NOW(), NOW(), ?)", array($image_info['source'], $image_info['alt'], $image_info['p_id']));
    }


    //=======-------========---------REVIEWS--------==========--------=========
    public function addreview($review) {
        return $this->db->query("INSERT INTO reviews (user_id, product_id, review, rating, created_at, updated_at, helpful
            VALUES (?,?,?,?,NOW(),NOW(),?)");
    }

    public function getreviews_bydate($pid) {
        return $this->db->query("SELECT * FROM reviews WHERE product_id = ? ORDER BY created_at", array($pid))->result_array();
    }

    public function getreviews_byhelp($pid) {
        return $this->db->query("SELECT * FROM reviews WHERE product_id = ? ORDER BY
            helpful DESC", array($pid))->result_array();


    }



}
