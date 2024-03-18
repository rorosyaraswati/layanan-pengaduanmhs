<?php
class infrastruktur extends CI_Model {

    public function get_infrastruktur() {
        $query = $this->db->get('infrastruktur');
        return $query->result_array();
    }

    public function save_infrastruktur($data) {
        $query = $this->db->insert('infrastruktur', $data);
        return $query;
    }

    public function getInfrastrukturData() {
        // Your SQL query to fetch data from the 'akademik_model' table goes here.
        // For example:
        $query = $this->db->get('infrastruktur');

        return $query->result_array();
    }

    public function delete_infrastruktur($nim) {
        $this->db->where('nim', $nim);
        $this->db->delete('infrastruktur');
    }

    public function get_infrastruktur_by_id($nim) {
        $query = $this->db->get_where('infrastruktur', array('nim' => $nim));
        return $query->row_array();
    }

    public function update_infrastruktur($nim, $data) {
        $this->db->where('nim', $nim);
        $this->db->update('infrastruktur', $data);
        return $this->db->affected_rows() > 0;
    }
    public function update_status($nim, $status) {
        // Query untuk mengupdate data status berdasarkan nim
        $this->db->where('nim', $nim);
        $this->db->update('infrastruktur', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }
}
