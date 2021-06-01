<?php

class KelasModel extends CI_Model{
    
    public function getAllData()
    {
        $table = 'kelas_ci';
        $query = $this->db->get($table);
        return $query->result_array();
    }

}