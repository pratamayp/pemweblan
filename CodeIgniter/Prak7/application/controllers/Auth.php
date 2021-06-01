<?php

class Auth extends CI_Controller{

    public function index()
    {
        // echo 'auth/index';
        $this->load->view('templates/header');
        $this->load->view('auth/index');
        $this->load->view('templates/footer');
    }

}