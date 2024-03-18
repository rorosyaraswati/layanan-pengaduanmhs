<?php
class admin_mod extends CI_Model {

    public function get_admin() {
        $query = $this->db->get('user');
        return $query->result_array();
    }

}