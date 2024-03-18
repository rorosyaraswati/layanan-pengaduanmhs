<?php
class pengaduan extends CI_Model {

    public function get_pengaduan() {
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }

    public function save_pengaduan($data) {
        $query = $this->db->insert('pengaduan', $data);
        return $query;
    }

    public function delete_pengaduan($id_pengaduan) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->delete('pengaduan');
    }

    public function get_pengaduan_by_id($id_pengaduan) {
        $query = $this->db->get_where('pengaduan', array('id_pengaduan' => $id_pengaduan));
        return $query->row_array();
    }

    public function update_pengaduan($id_pengaduan, $data) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $data);
        return $this->db->affected_rows() > 0;
    }
}
