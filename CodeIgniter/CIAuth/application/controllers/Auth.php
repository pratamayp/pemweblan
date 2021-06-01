<?php

class Auth extends CI_Controller{

    public function index()
    {
        $data['tab_title'] = 'Login';
        $data['menu'] = 'Halaman Login';

        // echo 'auth/index';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth_footer');
    }
    
    public function registration()
    {
        $data['tab_title'] = 'Registrasi';
        $data['menu'] = 'Registrasi Akun Baru';

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration', $data);
        $this->load->view('templates/auth_footer');
    }

}