<?php 

class Mahasiswa_model{
    private $table = 'form_review';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMhs(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getMhsById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE  id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMhs($data){
        $query = "INSERT INTO form_review VALUES
                    ('',:nim, :nama, :pass, :tgl_lahir, :jk, :prodi, :kewarganegaraan, :stat, :keterangan)";

        $this->db->query($query);

        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('pass', $data['pass']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('kewarganegaraan', $data['kewarganegaraan']);
        $this->db->bind('stat', $data['stat']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        
        return $this->db->rowCount();
        // return 0;
    }

    public function hapusDataMhs($id){
        $query = "DELETE FROM form_review WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMhs($data){
        $query = "UPDATE form_review SET
                    nim = :nim,
                    nama = :nama,
                    pass = :pass,
                    tgl_lahir = :tgl_lahir,
                    jk = :jk,
                    prodi = :prodi,
                    kewarganegaraan = :kewarganegaraan,
                    stat = :stat,
                    keterangan = keterangan
                WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('pass', $data['pass']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('kewarganegaraan', $data['kewarganegaraan']);
        $this->db->bind('stat', $data['stat']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        
        return $this->db->rowCount();
        // return 0;
    }
}