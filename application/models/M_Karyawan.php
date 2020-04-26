<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Karyawan extends CI_Model {

	public function getAll()
	{
        $this->db->select('*');
        $this->db->join('tbtempat', 'tbkaryawan.id_tempat = tbtempat.id');
		$this->db->order_by('grup');
		return $this->db->get('tbkaryawan')->result_array();
    }
    
    public function grup()
	{
		$this->db->select('grup');
        $this->db->group_by('grup');
        $this->db->order_by('grup');
		return $this->db->get('tbkaryawan')->result_array();
	}

	public function addKaryawan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "grup" => $this->input->post('grup', true),
            "id_tempat" => $this->input->post('pos', true)
        ];

        $this->db->insert('tbkaryawan', $data);
    }

    public function deleteKaryawan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tbkaryawan', ['id_karyawan' => $id]);
    }

    public function editKaryawan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "grup" => $this->input->post('grup', true),
            "id_tempat" => $this->input->post('pos2', true)
        ];
        $this->db->where('id_karyawan', $this->input->post('id'));
        $this->db->update('tbkaryawan', $data);
    }
}

/* End of file M_Karyawan.php */
/* Location: ./application/models/M_Karyawan.php */