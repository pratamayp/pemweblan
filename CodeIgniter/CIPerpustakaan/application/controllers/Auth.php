<?php

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('email')){
            redirect('admin');
        }

        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['form','url']);

    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email belum diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password belum diisi'
        ]);

        if($this->form_validation->run() == false){
            $data['tab_title'] = 'Login';
    
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');    
        } else {
            $this->_login();
        }
    }

    protected function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message','
                    <div class="alert alert-danger" role="alert">
                        Password salah!!
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message','
                <div class="alert alert-danger" role="alert">
                    <strong>Email belum diaktivasi</strong>, Silahkan cek email untuk aktivasi!
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','
            <div class="alert alert-danger" role="alert">
                <strong>Email belum terdaftar</strong>, Silahkan daftar akun 
                <a href="'. base_url() .'auth/registration" style="text-decoration : none">
                    disini
                </a>
            </div>');
            redirect('auth');
        }
    }
    
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama belum diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email belum diisi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email telah digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
            'required' => 'Password belum diisi',
            'matches' => 'Konfirmasi password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if($this->form_validation->run() == FALSE){
            $data['tab_title'] = 'Registrasi';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');

        }else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'=> 2,
                'is_active' => 1,
                'date_created' => time() 
            ];
            // echo date('dmY-His', strtotime('+5 hours'));
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','
            <div class="alert alert-success" role="alert">
                Akun berhasil dibuat. <strong>Silahkan login!</strong>
            </div>');
            redirect('auth');
        }
    }

    public function forgot()
    {
        $data['tab_title'] = 'Forgot Password';

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/forgot-password');
        $this->load->view('templates/auth_footer');

    }
}