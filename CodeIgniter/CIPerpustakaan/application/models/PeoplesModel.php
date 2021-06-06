<?php

class PeoplesModel extends CI_Model{
    
    public function getAllPeoples()
    {
        return $this->db->get('random_ppl')->result_array();
    }

    public function getPeoples($limit, $start)
    {
        return $this->db->get('random_ppl', $limit, $start)->result_array();
    }

    public function countAllPeoples()
    {
        return $this->db->get('random_ppl')->num_rows();
    }

}