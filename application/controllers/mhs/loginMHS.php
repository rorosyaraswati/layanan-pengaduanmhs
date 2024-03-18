<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginMHS extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhs/usermhs');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('mhs/login');
        } else {
            $this->checkLogin();
        }
    }

    private function checkLogin()
    {
        $data = $this->input->post();

        if (isset($data['username']) && isset($data['password'])) {
            $check = $this->usermhs->check_user($data['username'], $data['password']);
            if ($check) {
                $this->session->set_userdata('username', $data['username']);
                redirect('pengaduan');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger pastel alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Username or Password are incorrect!
                    </div>');
                $this->load->view('mhs/login');
            }
        } else {
            $this->session->set_flashdata('message',
                '<div class="alert alert-danger pastel alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Account not registered
                </div>');
            $this->load->view('mhs/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[usermhs.nim]', [
            'is_unique' => 'This NIM has been used!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[usermhs.username]', [
            'is_unique' => 'This Username has been used!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usermhs.email]', [
            'is_unique' => 'This Email has been used!'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[usermhs.phone]', [
            'is_unique' => 'This Phone number has been used!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('mhs/register');
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jurusan' => $this->input->post('jurusan'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => '-'
            );
            $this->usermhs->registerUser($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success pastel alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Registration have been successfully! Please Login!
            </div>');
            redirect('loginmhs');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '
            <div class="alert alert-success pastel alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                You have been successfully logged out.
            </div>');

        redirect('loginmhs');
    }

    public function change_password() {
        $this->load->library('session');
        $data['username'] = $this->usermhs->get_user_by_username($this->session->userdata('username'));
    
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');
    
        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmhs/header', $data);
            $this->load->view('layoutmhs/sidebar', $data);
            $this->load->view('mhs/chpw', $data);
            $this->load->view('layoutmhs/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
    
            if (password_verify($current_password, $data['username']['password'])) {
                // Current password is correct, proceed with password change
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger pastel alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            New password cannot be the same as the current password.
                        </div>');
                    redirect('mhs/loginmhs/change_password');
                } else {
                    // Password is valid, update the password in the database
                    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $result = $this->usermhs->change_password($data['username']['username'], $new_password_hash);
    
                    if ($result) {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-success pastel alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Password has been changed successfully.
                            </div>');
                        redirect('mhs/loginmhs/change_password');
                    } else {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-danger pastel alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Password change failed. Please try again later.
                            </div>');
                        redirect('mhs/loginmhs/change_password');
                    }
                }
            } else {
                // Incorrect current password
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger pastel alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Incorrect current password. Password change failed.
                    </div>');
                redirect('mhs/loginmhs/change_password');
            }
        }
    }
    
    
    



}
