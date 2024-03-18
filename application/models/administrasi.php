<?php
class administrasi extends CI_Model {

    public function get_administrasi() {
        $query = $this->db->get('administrasi');
        return $query->result_array();
    }

    public function save_administrasi($data) {
        $query = $this->db->insert('administrasi', $data);
        return $query;
    }

    public function getAdministrasiData() {
        // Your SQL query to fetch data from the 'akademik_model' table goes here.
        // For example:
        $query = $this->db->get('administrasi');

        return $query->result_array();
    }

    public function delete_administrasi($no_ref) {
        $this->db->where('no_ref', $no_ref);
        $this->db->delete('administrasi');
    }

    public function get_administrasi_by_id($no_ref) {
        $query = $this->db->get_where('administrasi', array('no_ref' => $no_ref));
        return $query->row_array();
    }

    public function update_administrasi($no_ref, $data) {
        $this->db->where('no_ref', $no_ref);
        $this->db->update('administrasi', $data);
        return $this->db->affected_rows() > 0;
    }
    public function update_status($no_ref, $status) {
        // Query untuk mengupdate data status berdasarkan nomor referensi
        $this->db->where('no_ref', $no_ref);
        $this->db->update('administrasi', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }
    
}
