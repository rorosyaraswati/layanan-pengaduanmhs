<?php
class keamanan extends CI_Model {

    public function get_keamanan() {
        $query = $this->db->get('keamanan');
        return $query->result_array();
    }

    public function save_keamanan($data) {
        $query = $this->db->insert('keamanan', $data);
        return $query;
    }

    public function getKeamananData() {
        // Your SQL query to fetch data from the 'akademik_model' table goes here.
        // For example:
        $query = $this->db->get('keamanan');

        return $query->result_array();
    }

    public function delete_keamanan($nim) {
        $this->db->where('nim', $nim);
        $this->db->delete('keamanan');
    }

    public function get_keamanan_by_id($nim) {
        $query = $this->db->get_where('keamanan', array('nim' => $nim));
        return $query->row_array();
    }

    public function update_keamanan($nim, $data) {
        $this->db->where('nim', $nim);
        $this->db->update('keamanan', $data);
        return $this->db->affected_rows() > 0;
    }
    public function update_status($nim, $status) {
        // Query untuk mengupdate data status berdasarkan nim
        $this->db->where('nim', $nim);
        $this->db->update('keamanan', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }
}
