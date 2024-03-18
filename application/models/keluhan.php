<?php
class keluhan extends CI_Model {

    public function get_keluhan() {
        $query = $this->db->get('keluhan');
        return $query->result_array();
    }

    public function save_keluhan($data) {
        $query = $this->db->insert('keluhan', $data);
        return $query;
    }

    public function delete_keluhan($id_keluhan) {
        $this->db->where('id_keluhan', $id_keluhan);
        $this->db->delete('keluhan');
    }

    public function get_keluhan_by_id($id_keluhan) {
        $query = $this->db->get_where('keluhan', array('id_keluhan' => $id_keluhan));
        return $query->row_array();
    }

    public function update_keluhan($id_keluhan, $data) {
        $this->db->where('id_keluhan', $id_keluhan);
        $this->db->update('keluhan', $data);
        return $this->db->affected_rows() > 0;
    }
}
