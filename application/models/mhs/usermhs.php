<?php
class usermhs extends CI_Model{

        public function registerUser($data)
    {
        $this->db->insert('usermhs', $data);
    }

    public function check_user($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('usermhs');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return true;
            }
        }

        return false;
    }
    public function change_password($username, $new_password_hash)
    {
        $this->db->where('username', $username);
        $this->db->update('usermhs', array('password' => $new_password_hash));
        
        return $this->db->affected_rows() > 0;
    }

    // Get user by username
    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('usermhs')->row_array();
    }
       
}