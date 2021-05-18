<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{
    public function inputForm()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]',
            array(
                    'required'      => '%s tidak valid',
            )
        );

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('mahasiswa/myform');
        }
        else
        {
            $this->load->view('mahasiswa/formsuccess');
        }
    }
}