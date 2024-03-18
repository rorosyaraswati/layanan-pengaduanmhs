<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('login_view');
        } else {
            $this->checkLogin();
        }
    }

    private function checkLogin()
    {
        $data = $this->input->post();

        if (isset($data['username']) && isset($data['password'])) {
            $check = $this->User->check_user($data['username'], $data['password']);
            if ($check) {
                $this->session->set_userdata('username', $data['username']);
                redirect('akademik_ctl');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger pastel alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Username or Password are incorrect
                    </div>');
                $this->load->view('login_view');
            }
        } else {
            $this->session->set_flashdata('message',
                '<div class="alert alert-danger pastel alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Account not registered
                </div>');
            $this->load->view('login_view');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This Username has been used!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has been used!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('registration');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email')
            );
            $this->User->registerUser($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success pastel alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Registration have been successfully! Please Login!
            </div>');
            redirect('login-admin');
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

        redirect('login-admin');
    }

}
