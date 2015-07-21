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
    public function validate_reg($post)
    {
        var_dump($this->input->post());
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email", "trim|required|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|matches[confirm_password]");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('errors' , validation_errors());
            return 0;
        }
        else
        {
            return 1;
        } 
    }
    public function register($post)
    {

        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($this->input->post('password') . '' . $salt);
        $query = "INSERT INTO users (email, password, salt, created_at) 
        VALUES (?,?,?, NOW())";
        $values=array('email'=>$this->input->post('email'),'password'=>$encrypted_password,'salt'=>$salt);
        $this->db->query($query, $values);
        $this->session->set_flashdata('success' , "Success! Please log in!");
    }
    public function validate_log()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('errors' , validation_errors());
            return 0;
        }
        else
        {
            return 1;
        } 
    }
}
