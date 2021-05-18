<?php 

class Mahasiswa extends Controller{
    public function index(){

        $data['judul'] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMhs();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){

        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMhsById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMhs($_POST)>0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            
            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusDataMhs($id)>0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');

            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            
            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('Mahasiswa_model')->getMhsById($_POST['id']));
    }
    
    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMhs($_POST)>0){
            Flasher::setFlash('berhasil', 'diubah', 'success');

            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            
            header('Location: ' .BASEURL. '/mahasiswa');
            exit;
        }
    }
}