<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mahasiswa/mahasiswa_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mahasiswa_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nim' => $row->nim,
		'nama' => $row->nama,
		'jurusan' => $row->jurusan,
		'jk' => $row->jk,
		'alamat' => $row->alamat,
		'username' => $row->username,
		'pw' => $row->pw,
	    );
            $this->load->view('mahasiswa/mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
	    'id' => set_value('id'),
	    'nim' => set_value('nim'),
	    'nama' => set_value('nama'),
	    'jurusan' => set_value('jurusan'),
	    'jk' => set_value('jk'),
	    'alamat' => set_value('alamat'),
	    'username' => set_value('username'),
	    'pw' => set_value('pw'),
	);
        $this->load->view('mahasiswa/mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'username' => $this->input->post('username',TRUE),
		'pw' => $this->input->post('pw',TRUE),
	    );

            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
		'id' => set_value('id', $row->id),
		'nim' => set_value('nim', $row->nim),
		'nama' => set_value('nama', $row->nama),
		'jurusan' => set_value('jurusan', $row->jurusan),
		'jk' => set_value('jk', $row->jk),
		'alamat' => set_value('alamat', $row->alamat),
		'username' => set_value('username', $row->username),
		'pw' => set_value('pw', $row->pw),
	    );
            $this->load->view('mahasiswa/mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'username' => $this->input->post('username',TRUE),
		'pw' => $this->input->post('pw',TRUE),
	    );

            $this->Mahasiswa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nim', 'nim', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('pw', 'pw', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mahasiswa.xls";
        $judul = "mahasiswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nim");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jurusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jk");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Pw");

	foreach ($this->Mahasiswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jurusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pw);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mahasiswa.doc");

        $data = array(
            'mahasiswa_data' => $this->Mahasiswa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mahasiswa/mahasiswa_doc',$data);
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-10 05:04:27 */
/* http://harviacode.com */