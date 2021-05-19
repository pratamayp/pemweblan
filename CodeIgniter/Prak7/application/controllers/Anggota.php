<?php
class Anggota extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model(['AnggotaModel', 'KelasModel']);
    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Anggota Perpustakaan";
        // $data['anggota'] = $this->AnggotaModel->getAllData();
        $data['anggota'] = $this->AnggotaModel->getAllJoinedData();

        $this->load->view('templates/header', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tg_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['tab_title'] = "Registrasi";
            $data['title'] = "Form Registrasi Anggota";
            $data['kelas'] = $this->KelasModel->getAllData();
            
            $this->load->view('templates/header', $data);
            $this->load->view('anggota/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            //data diambil di model
            $data['anggota'] = $this->AnggotaModel->insertData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('anggota');
        }
    }

    public function hapus($id)
    {
        // $data = $this->AnggotaModel->getDataById($id);
        $this->AnggotaModel->deleteDate($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('anggota'); 
    }

    public function edit($id)
    {
        $data['tab_title'] = "Edit Data";
        $data['title'] = "Edit Data Anggota";
        $data['anggota'] = $this->AnggotaModel->getDataById($id);

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tg_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['kelas'] = $this->KelasModel->getAllData();
            
            $this->load->view('templates/header', $data);
            $this->load->view('anggota/edit', $data);
            $this->load->view('templates/footer');

        }else{

            $this->AnggotaModel->editData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('anggota');
            
        }
    }
}