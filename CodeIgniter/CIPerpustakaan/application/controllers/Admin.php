<?php

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('email')){
            redirect('auth');
        }
        
        $this->load->library('form_validation');
        $this->load->model(['AnggotaModel', 'KelasModel']);
    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['user'] = $this->session->userdata['name'];

        $data['total_anggota'] = $this->AnggotaModel->countAllAnggota();
        $data['total_kelas'] = $this->KelasModel->countKelas();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function anggota()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Anggota Perpustakaan";
        // $data['anggota'] = $this->AnggotaModel->getAllData();
        $data['anggota'] = $this->AnggotaModel->getAllJoinedData();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/anggota', $data);
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
            $this->load->view('admin/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            //data diambil di model
            $data['anggota'] = $this->AnggotaModel->insertData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/anggota');
        }
    }

    public function detail($id)
    {
        $data['tab_title'] = 'Detail';
        $data['judul'] = 'Detail Data Anggota';
        $data['anggota'] = $this->AnggotaModel->getDataById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        // $data = $this->AnggotaModel->getDataById($id);
        $this->AnggotaModel->deleteDate($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/anggota'); 
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
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');

        }else{

            $this->AnggotaModel->editData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/anggota');
            
        }
        
    }

    public function kelas()
    {
        $data['tab_title'] = 'Halaman Admin';
        $data['title'] = 'Data Kelas';
        $data['kelas'] = $this->KelasModel->getAllData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','
            <div class="alert alert-success" role="alert">
                Berhasil logout.
            </div>');

        redirect('auth');
    }
}