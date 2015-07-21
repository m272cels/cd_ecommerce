<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Model {

    public function adduser($user) {
        return $this->db->query('INSERT INTO users (email, password, salt, admin, created_at, updated_at', array());
    }

    public function getuser_byid($id) {
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }

    public function getuser_byemail($email) {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

    // validate login

    // validate registration

}
