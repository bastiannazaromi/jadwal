<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tempat extends CI_Model {

    public function getAll()
    {
        return $this->db->get('tbtempat')->result_array();
    }

}