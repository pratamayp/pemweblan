<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form']);
        $this->load->library('form_validation');
        $this->load->model('Model_mhs');
        $this->load->database();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('pw', 'Password', 'required');
        $this->form_validation->set_rules('confpw', 'Konfirmasi Password', 'required|matches[pw]');
        $this->form_validation->set_rules('agree', 'Persetujuan', 'required');
    
        if($this->form_validation->run() == FALSE){
            $this->load->view('form/tampilanform');
        }else{

            // KIRIM DATA DENGAN VAR $_POST
            // $data['username'] = $_POST['username']; 
            $data['mahasiswa'] = $this->Model_mhs->tambahDataMhs();

            $this->load->view('form/formsuccess', $data);
        }
	}

    public function data()
    {
        
    }
}