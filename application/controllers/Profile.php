<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('session'); // Load Session Library for using session data
        is_loginmhs(); // If this function exists, it should be handled separately
    }

    public function index() {
        // Assuming you have a function to check login status, you can uncomment the next line
        // is_loginmhs();
    
        $id = $this->session->userdata('username');
        $data['prf'] = $this->Profile_model->get_profile($id);
    
        // Check if the $data['prf'] is null before loading the view
        if ($data['prf'] === null) {
            // Handle the case when the profile data is not found, such as redirecting to an error page or displaying a message.
            // For example:
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Profile data not found.
                </div>');
            redirect('profile');
            return;
        }
    
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('profile_view', $data); // Load the view with profile data
        $this->load->view('layoutmhs/footer');
    }
    

    public function save_profile() {
        $id = $this->session->userdata('username');
        $data = $this->input->post();
        $update = $this->Profile_model->update_profile($id, $data);
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Profile berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Profile gagal diubah.
                </div>');
        }
        redirect('profile');
    }
}
