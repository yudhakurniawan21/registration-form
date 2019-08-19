<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('number', 'Mobile Number', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        // $number = $this->input->post('number');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            redirect('welcome');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        $this->form_validation->set_rules('number', 'Mobile Number', 'required|trim|numeric|min_length[12]|is_unique[user.number]', [
            'is_unique' => 'This Mobile Number Already Registered!'
        ]);
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('date', 'Date Of Birth', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email Already Registered!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Form';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'number' => htmlspecialchars($this->input->post('number', true)),
                'fname' => htmlspecialchars($this->input->post('fname', true)),
                'lname' => htmlspecialchars($this->input->post('lname', true)),
                'date' => htmlspecialchars($this->input->post('date', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your Account has been created. Please Login</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out !</div>');
        redirect('auth');
    }
}
