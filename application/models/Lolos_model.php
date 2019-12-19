<?php

class Lolos_model extends CI_Model{
    public function getAllLolos()
    {
        return $this->db->get('data_lolos')->result_array();
    }
}
?>