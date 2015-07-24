<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

    public function get_categories()
    {
        return $this->db->query("select category,id from categories", array())->result_array();
    }
    public function getproduct_bycategory($category) {
        return $this->db->query("SELECT * FROM products as p LEFT JOIN photos as i on p.main_photo_id = i.id WHERE p.category_id = ?", array($category))->result_array();
    }

    public function getall_products() {
        return $this->db->query("SELECT * FROM products left join categories on products.category_id = categories.id")->result_array();
    }

    public function getproductcount(){
        return $this->db->query("SELECT count(p.id) as count FROM products as p")->row_array();
    }

    public function getproducts_bypopularity() {
        return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.price, SUM(o.quantity) as sold
            FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            LEFT JOIN order_items as o on p.id = o.product_id
            GROUP BY p.id
            ORDER BY sold DESC
            LIMIT 0,8")->result_array();
    }

    public function getproducts_bypopularity_category($category) {
        return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.price, SUM(o.quantity) as sold
            FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            LEFT JOIN order_items as o on p.id = o.product_id
            WHERE p.category_id = ?
            GROUP BY p.id
            ORDER BY sold DESC
            LIMIT 0,8", array($category))->result_array();
    }
    public function getproducts_byprice_category($category) {
        return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.price, SUM(o.quantity) as sold
            FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            LEFT JOIN order_items as o on p.id = o.product_id
            WHERE p.category_id = ?
            GROUP BY p.id
            ORDER BY price DESC
            LIMIT 0,8", array($category))->result_array();
    }
    // tested
    public function getproduct_byid($id) {
        return $this->db->query("SELECT * FROM products as p where p.id = ?", array($id))->row_array();
    }
    public function getproduct_byname($name) {
        return $this->db->query("SELECT * FROM products as p where p.name or p.description like '%?%'", array($name))->row_array();
    }

    public function getsimilar_products($product) {
        return $this->db->query("SELECT p.id, p.name, p.price, ph.source, ph.alt FROM products as p
            LEFT JOIN photos as ph on p.main_photo_id = ph.id
            WHERE p.category_id = ?
            AND p.id NOT IN (SELECT pr.id FROM products as pr where pr.id = ?) LIMIT 6", array($product['category_id'], $product['id']))->result_array();
    }
    public function add_category($category) {
        $query = ("INSERT INTO categories (created_at, updated_at, category)
            VALUES (NOW(), NOW(), ?)");
        $values = array($category);
        return $this->db->query($query, $values);
    }

    public function get_category_id_by_title($category) {
        return $this->db->query("SELECT id FROM categories where category = ?", array($category))->row_array();
    }
    public function delete_category($id) {
        return $this->db->query("DELETE FROM categories
            WHERE id = ?");
    }

    public function update_category($id) {
        return $this->db->query("UPDATE categories set category = ?
            WHERE id = ?");
    }
    //MUST ADD MAIN PHOTO ID
    public function add_product($product) {
        $query = ("INSERT INTO products (name, description, price, count_in_stock, created_at, updated_at, category_id)
            VALUES (?,?,?,?,NOW(),NOW(),?)");
        $values = array($product['product_name'], $product['description'], $product['price'], $product['stock'], $product['category']);
        return $this->db->query($query, $values);
    }
    //MUST ADD MAIN PHOTO ID
    public function update_product($product) {
        return $this->db->query("UPDATE products SET name = ?, description = ?,
            count_in_stock = ?, price = ?, category_id = ?, updated_at = NOW()
            WHERE id = ?", array($product['product_name'], $product['description'], $product['stock'], $product['price'],
                $product['category']['id'], $product['product_id']));
    }

    public function updateproduct_inventory($id) {
        return $this->db->query("UPDATE products SET count_in_stock = ?
            WHERE id = ?", array($id['stock'], $id['product_id']));
    }


    public function getproduct_inventory($id) {
        return $this->db->query("SELECT count_in_stock FROM products WHERE id = ?", array($id))->row_array();
    }

    public function remove_product($id) {
        return $this->db->query("UPDATE products SET count_in_stock = 0
            WHERE id = ?", $id);

    }

    // --------------images queries
    // tested
    public function getmain_image($id) {
        return $this->db->query("SELECT i.source, i.alt, i.id
            FROM products as p
            LEFT JOIN photos as i on p.main_photo_id = i.id
            WHERE p.id = ?", array($id))->row_array();
    }
    public function get_all_main_images() {
        return $this->db->query("SELECT i.source, i.alt, i.product_id
            FROM products as p
            LEFT JOIN photos as i on p.main_photo_id = i.id
            LIMIT 0,8", array())->result_array();
    }
    public function get_all_main_images_with_price() {
        return $this->db->query("SELECT i.source, i.alt, i.product_id, p.price
            FROM products as p
            LEFT JOIN photos as i on p.main_photo_id = i.id
            order by price desc LIMIT 0,8", array())->result_array();
    }
    // tested
    public function getother_images($id) {
        return $this->db->query("SELECT p.source, p.alt
            FROM photos as p
            WHERE p.product_id = ?
            AND p.id NOT IN (SELECT pr.main_photo_id from products pr
            WHERE pr.id = ?)", array($id['product'], $id['main_photo_id']))->result_array();
    }
    public function get_carosel_images()
    {
        $random=rand(1,9);
        return $this->db->query("Select p.source, p.alt, products.name, products.description, products.price from photos as p left join products on p.product_id=products.id where p.product_id = ?", array($random))->result_array();
    }

    public function updatemain($id) {
        return $this->db->query("UPDATE products SET main_photo_id = ? WHERE id = ?", array($id['main_photo_id'], $id['p_id']));
    }

    public function addpic($image_info) {
        $this->db->query("INSERT INTO photos (source, alt, created_at, updated_at, product_id
            VALUES(?,?, NOW(), NOW(), ?)", array($image_info['source'], $image_info['alt'], $image_info['p_id']));
        return $this->db->insert_id();
    }
    public function search_products($search)
    {
        return $this->db->query("SELECT * FROM products as p left join photos on p.main_photo_id = photos.id where p.name like ? or p.description like ? LIMIT 0,8", array("%" .$search."%","%" .$search."%"))->result_array();
    }
    public function search_products_sort_popularity($search)
    {
        return $this->db->query("SELECT * FROM products as p left join photos on p.main_photo_id = photos.id LEFT JOIN order_items as o on p.id = o.product_id where p.name like ? or p.description like ? order by quantity desc LIMIT 0,8", array("%" .$search."%","%" .$search."%"))->result_array();
    }
    public function search_products_sort_price($search)
    {
        return $this->db->query("SELECT * FROM products as p left join photos on p.main_photo_id = photos.id where p.name like ? or p.description like ? order by price desc LIMIT 0,8", array("%" .$search."%","%" .$search."%"))->result_array();
    }
    //=======-------========---------REVIEWS--------==========--------=========
    public function addreview($review) {
        return $this->db->query("INSERT INTO reviews (review, rating, helpful, created_at, updated_at, user_id, products_id)
            VALUES (?,?,?,NOW(),NOW(),?,?)", array($review['review'],$review['rating'], $review['helpful'], $review['user_id'], $review['product_id']));

    }

    public function getreviews_bydate($pid) {
        return $this->db->query("SELECT u.alias, u.id, DATE_FORMAT(r.created_at, '%M %e, %Y') as dt, r.rating, r.review FROM reviews as r
                    LEFT JOIN users as u on r.user_id = u.id WHERE r.products_id = ? ORDER BY r.created_at DESC", array($pid))->result_array();
    }

    public function getreviews_byhelp($pid) {
        return $this->db->query("SELECT * FROM reviews WHERE products_id = ? ORDER BY
            helpful DESC", array($pid))->result_array();
    }

    public function getreview_byid($ids)
    {
        return $this->db->query("SELECT * FROM reviews WHERE products_id = ? AND user_id = ?", array($ids['p_id'], $ids['u_id'] ))->row_array();
    }

    public function getcount_review($pid)
    {
        return $this->db->query("SELECT COUNT(r.id) as count FROM reviews as r WHERE r.products_id = ?", array($pid))->row_array();
    }



}
