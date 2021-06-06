<?php

class AnggotaModel extends CI_Model{

    public $title;
    public $content;
    public $date;

    public function getAllData()
    {
        $query = $this->db->get('anggota_ci');
        return $query->result_array();
    }

    public function getAllJoinedData()
    {
        $this->db->select('*');
        $this->db->from('anggota_ci');
        $this->db->join('kelas_ci', 'anggota_ci.kelas = kelas_ci.id_kelas');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function insertData()
    {
        $data = [
            'nis' => $this->input->post('nis', true),
            'nama' => $this->input->post('nama', true),
            'tp_lhr' => $this->input->post('tp_lhr', true),
            'tg_lhr' => $this->input->post('tg_lhr', true),
            'gender' => $this->input->post('gender'),
            'no_hp' => $this->input->post('no_hp', true),
            'email' => $this->input->post('email', true),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat', true)
        ];

        $this->db->insert('anggota_ci', $data);
    }

    public function deleteDate($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anggota_ci');
    }

    public function getDataById($id)
    {
        return $this->db->get_where('anggota_ci', ['id' => $id])->row_array();
    }
    
    public function editData()
    {
        $data = [
            'nis' => $this->input->post('nis', true),
            'nama' => $this->input->post('nama', true),
            'tp_lhr' => $this->input->post('tp_lhr', true),
            'tg_lhr' => $this->input->post('tg_lhr', true),
            'gender' => $this->input->post('gender'),
            'no_hp' => $this->input->post('no_hp', true),
            'email' => $this->input->post('email', true),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat', true)
        ];

        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('anggota_ci', $data);
    }

    public function countAllAnggota()
    {
        return $this->db->get('anggota_ci')->num_rows();
    }
}