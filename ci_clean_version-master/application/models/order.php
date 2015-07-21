 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Model {
	public function sold_products() {
		return $this->db->query("SELECT p.id, ph.source, ph.alt, p.name, p.count_in_stock, SUM(o.quantity) as sold
			FROM products as p
			LEFT JOIN photos as ph on p.main_photo_id = ph.id
			LEFT JOIN order_items as o on p.id = o.product_id
			GROUP BY p.id")->result_array();
	}

	public function show_order_items($id) {
		return $this->db->query("SELECT p.id, p.name, p.price, oi.quantity, p.price*ci.quantity as total
			FROM orders as o
			LEFT JOIN order_items as oi on o.id = oi.order_id
			LEFT JOIN products as p on p.id = oi.product_id
			WHERE o.id = ?", array($id))->result_array();
	}

	public function show_order_info($id)
	{
		return $this->db->query("SELECT o.status, o.total
			FROM orders as o
			WHERE o.id = ?", array($id))->row_array();
	}

	public function show_cart($id) {
		return $this->db->query("SELECT p.name, p.price, ci.quantity, p.price*ci.quantity as total 
			FROM products as p
			LEFT JOIN cart_items as ci on p.id = ci.product_id
			LEFT JOIN users as u on u.id = ci.user_id
			WHERE u.id = ?", array($id))->result_array();
	}

	public function insert_into_cart($cart) {
		return $this->db->query("INSERT INTO cart_items(user_id, product_id, quantity, created_at, updated_at)
			VALUES (?,?,?,NOW(),NOW())", array($cart['user_id'], $cart['product_id'], $cart['quantity']));
	}

	public function update_cart($cart) {
		return $this->db->query("UPDATE cart_items SET quantity = ?
			WHERE id = ? AND product_id = ? AND used_id = ?", array());
	}

	public function delete_from_cart($cart) {
		return $this->db->query("DELETE FROM cart_items WHERE id = ? AND product_id = ?
			AND user_id = ?", array());
	}
	public function update_order_status($id) {
		return $this->db->query("UPDATE order SET status = ?
			WHERE id = ? ", array($id['status'], $id['order_id']))->row_array();
	}

	public function getshipping($shipping) {
		return $this->db->query("SELECT mo.first_name, CONCAT(mo.address, ' ', mo.address2) as address,
			mo.city, mo.state, mo.zipcode FROM orders as o
			LEFT JOIN mailing_info as mo on o.shipping_id = mo.id WHERE o.id = ?", array())->row_array();
	}

	public function getbilling($billing) {

		return $this->db->query("SELECT mo.first_name, CONCAT(mo.address, ' ', mo.address2) as address,
			mo.city, mo.state, mo.zipcode FROM orders as o
			LEFT JOIN mailing_info as mo on o.shipping_id = mo.id WHERE o.id = ?", array())->row_array();
	}

	public function addshipping($shipping) {
		return $this->db->query("INSERT INTO mailing_info (first_name, last_name, address, address2, city, state, zipcode, created_at, updated_at, user_id)
			VALUES (?,?,?,?,?,?,?,NOW(), NOW(),?)", array());
	}

	public function addbilling($billing) {
		return $this->db->query("INSERT INTO mailing_info (first_name, last_name, address, address2, city, state, zipcode, created_at, updated_at, user_id)
			VALUES (?,?,?,?,?,?,?,NOW(), NOW(),?)", array());
	}

}
