<?php
class user extends CI_Model{

    // function check_user($username, $password){
    //     $query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
    //     if ($query->num_rows() > 0) {
    //         $detail = $query->row_array();          
    //         return $detail;
    //     }
    // }    

    function get_user(){
        $myuserArr = $this->db->get('user');
        if ($myuserArr->num_rows() > 0){
            $detail=$myuserArr->result_array();
            return $detail;
        }
    }

    function user_save($data){
        $query = $this->db->insert('user', $data);
        return $query;
    }

    function del_user($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    function detail_user($id_user){
        $query= $this->db->get_where('user',array('id_user' => $id_user));
        if ($query->num_rows() > 0) {
            $detail  = $query->result_array();          
            return $detail[0];
            }
        return false;
    }

    function update_user($id_user, $data){
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    function add_user($id_user){
        $query= $this->db->get_where('user',array('id_user' => $id_user));
        if ($query->num_rows() > 0) {
            $detail  = $query->result_array();          
            return $detail[0];
            }
        return false;
    }
    public function registerUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function check_user($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return true;
            }
        }

        return false;
    }

    
}