<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Shift extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tbshift')->result_array();
    }
    
    public function grup()
	{
		$this->db->select('id_shift, shift');
        $this->db->group_by('shift');
        $this->db->order_by('id_shift');
		return $this->db->get('tbshift')->result_array();
	}

    public function editShift()
    {
        $data = [
            "tanggal_mulai" => $this->input->post('tanggal_mulai', true),
            "tanggal_akhir" => $this->input->post('tanggal_akhir', true)
        ];
        $this->db->where('id_shift', $this->input->post('id'));
        $this->db->update('tbshift', $data);
    }
}

/* End of file M_Karyawan.php */
/* Location: ./application/models/M_Shift.php */