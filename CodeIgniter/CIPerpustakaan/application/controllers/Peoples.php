<?php
class Peoples extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('email')){
            redirect('auth');
        }
        
        $this->load->library('pagination');
        $this->load->model('PeoplesModel');
    }

    public function index ()
    { 
        //configure pagination
        $config['base_url'] = 'http://localhost/pemweblan/CodeIgniter/Prak7/peoples/index';
        $config['total_rows'] = $this->PeoplesModel->countAllPeoples();
        $config['per_page'] = 15;
        
        //bootstrap
        $config['full_tag_open'] = '
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
        ';
        $config['full_tag_close'] = '
            </nav>
            </ul>
        ';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Random Peoples List";

        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->PeoplesModel->getPeoples($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }

    // public function tambah()
    // {
    //     $this->form_validation->set_rules('nis', 'NIS', 'required');
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
    //     $this->form_validation->set_rules('tg_lhr', 'Tanggal Lahir', 'required');
    //     $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
    //     $this->form_validation->set_rules('no_hp', 'No HP', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required');
    //     $this->form_validation->set_rules('kelas', 'Kelas', 'required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    //     if ($this->form_validation->run() == FALSE){
    //         $data['tab_title'] = "Registrasi";
    //         $data['title'] = "Form Registrasi Anggota";
    //         $data['kelas'] = $this->KelasModel->getAllData();
            
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('anggota/tambah', $data);
    //         $this->load->view('templates/footer');
    //     }else{
    //         //data diambil di model
    //         $data['anggota'] = $this->AnggotaModel->insertData();
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('anggota');
    //     }
    // }

    // public function detail($id)
    // {
    //     $data['tab_title'] = 'Detail';
    //     $data['judul'] = 'Detail Data Anggota';
    //     $data['anggota'] = $this->AnggotaModel->getDataById($id);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('anggota/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function hapus($id)
    // {
    //     // $data = $this->AnggotaModel->getDataById($id);
    //     $this->AnggotaModel->deleteDate($id);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     redirect('anggota'); 
    // }

    // public function edit($id)
    // {
    //     $data['tab_title'] = "Edit Data";
    //     $data['title'] = "Edit Data Anggota";
    //     $data['anggota'] = $this->AnggotaModel->getDataById($id);

    //     $this->form_validation->set_rules('nis', 'NIS', 'required');
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
    //     $this->form_validation->set_rules('tg_lhr', 'Tanggal Lahir', 'required');
    //     $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
    //     $this->form_validation->set_rules('no_hp', 'No HP', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required');
    //     $this->form_validation->set_rules('kelas', 'Kelas', 'required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    //     if ($this->form_validation->run() == FALSE){
    //         $data['kelas'] = $this->KelasModel->getAllData();
            
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('anggota/edit', $data);
    //         $this->load->view('templates/footer');

    //     }else{

    //         $this->AnggotaModel->editData();
    //         $this->session->set_flashdata('flash', 'Diubah');
    //         redirect('anggota');
            
    //     }
    // }
}