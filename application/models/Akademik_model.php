<?php
class Akademik_model extends CI_Model {

    public function get_akademik() {
        $query = $this->db->get('Akademik_model');
        return $query->result_array();
    }

    public function save_akademik($data) {
        $query = $this->db->insert('Akademik_model', $data);
        return $query;
    }

    public function getAkademikData() {
        // Your SQL query to fetch data from the 'akademik_model' table goes here.
        // For example:
        $query = $this->db->get('akademik_model');

        return $query->result_array();
    }

    public function delete_akademik($id_akademik) {
        $this->db->where('id_akademik', $id_akademik);
        $this->db->delete('Akademik_model');
    }

    public function get_akademik_by_id($id_akademik) {
        $query = $this->db->get_where('Akademik_model', array('id_akademik' => $id_akademik));
        return $query->row_array();
    }

    public function update_akademik($id_akademik, $data) {
        $this->db->where('id_akademik', $id_akademik);
        $this->db->update('Akademik_model', $data);
        return $this->db->affected_rows() > 0;
    }
    public function update_status($id_akademik, $status) {
        // Query untuk mengupdate data status berdasarkan id akademik
        $this->db->where('id_akademik', $id_akademik);
        $this->db->update('Akademik_model', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }
}
