<?php

class Bobot_model extends CI_Model{
    public function getAllBobot()
    {
        return $this->db->get('data_bobot')->result_array();
    }
}
?>