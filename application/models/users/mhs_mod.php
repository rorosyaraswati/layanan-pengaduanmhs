<?php
class mhs_mod extends CI_Model {

    public function get_usermhs() {
        $query = $this->db->get('usermhs');
        return $query->result_array();
    }

}