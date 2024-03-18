<?php
class Profile_model extends CI_Model {

    public function get_profile($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('usermhs')->row_array();
    }

    public function update_profile($id, $data) {
        $this->db->where('username', $id);
        $this->db->update('usermhs', $data);
        return $this->db->affected_rows() > 0;
    }

    public function save_profile($data) {
        return $this->db->insert('usermhs', $data);
    }
}

