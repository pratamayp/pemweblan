<?php

class Model_mhs extends CI_Model{
    public function getAllMhs()
    {   
        $query = $this->db->get('mahasiswa');
        return $query->result_array();

        foreach ($query->result_array() as $row)
        {
                echo $row['username'];
                echo $row['nim'];
                echo $row['nama'];
        }
    }

    public function tambahDataMhs()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan'),
            "jk" => $this->input->post('jk'),
            "alamat" => $this->input->post('alamat', true),
            "username" => $this->input->post('username', true),
            "pw" => $this->input->post('pw', true)
        ];
 
        $this->db->insert('mahasiswa', $data);

    }
}