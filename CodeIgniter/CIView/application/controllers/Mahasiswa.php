<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

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

    public function __construct()
    {
        parent::__construct();
        echo "TOP <BR>";
    }

	public function index()
	{
		// $this->load->view('welcome_message');
        echo "Hello World <br>";
	}

	public function cetakID()
	{
        $nim = '073119001';
        $nama = 'Chelsea Islan';
		// $this->load->view('welcome_message');
        echo "NIM Mahsiswa : ". $nim . "<br>";
        echo "Nama Mahsiswa : ". $nama . "<br>";;
	}

	public function cetakID2($nim, $nama)
	{
        $tahun = '2000';
		// $this->load->view('welcome_message');
        echo "NIM Mahsiswa : ". $nim . "<br>";
        echo "Nama Mahsiswa : ". $nama . "<br>";
        echo "Tahun Ajaran : ". $tahun . "<br>";
	}

    public function _output($output){
        echo $output;
        echo 'BOT';
    }

    public function cetakIDview()
    {
        $this->load->view('mahasiswa/detailMhs');
    }

    public function cetakIDview1($nim, $nama)
    {
        $data['nim'] = $nim;
        $data['nama'] = $nama;
        $data['tahun'] = 2021;
        $this->load->view('mahasiswa/detailMhs', $data);
    }

}
