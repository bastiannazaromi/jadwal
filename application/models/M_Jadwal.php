<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jadwal extends CI_Model {

	public function getAll()
    {
		$this->db->select('tbjadwal.id, tbkaryawan.nama, tbkaryawan.grup, tbshift.shift, tbshift.tanggal_mulai, tbshift.tanggal_akhir, tbtempat.pos, tbtempat.tempat');
		$this->db->from('tbjadwal');
		$this->db->join('tbkaryawan', 'tbjadwal.id_grup_karyawan = tbkaryawan.grup');
		$this->db->join('tbshift', 'tbjadwal.id_shift = tbshift.id_shift');
		$this->db->join('tbtempat', 'tbkaryawan.id_tempat = tbtempat.id');
		$this->db->order_by('grup');
		
		return $this->db->get()->result_array();
	}

	public function getJadwal()
	{
		$this->db->order_by('id_grup_karyawan');
		$this->db->group_by('id_grup_karyawan');
		return $this->db->get('tbjadwal')->result_array();
	}
	
	public function addJadwal()
    {
		$data = [
            "id_grup_karyawan" => $this->input->post('grup', true),
            "id_shift" => $this->input->post('shift', true)
		];
		
		$grup = $this->db->get_where('tbjadwal', ['id_grup_karyawan' => $this->input->post('grup', true)])->result_array();
		
		if ($grup)
		{
			$this->session->set_flashdata('flash-error', 'jadwal sudah ada');
		}
		else
		{
			$this->db->insert('tbjadwal', $data);
			$this->session->set_flashdata('flash-success', 'data berhasil ditambahkan');
		}
    }

    public function deleteJadwal($grup)
    {
        $this->db->delete('tbjadwal', ['id_grup_karyawan' => $grup]);
    }

    public function editJadwal()
    {
        $data = [
            "id_shift" => $this->input->post('shift', true)
        ];
        $this->db->where('id_grup_karyawan', $this->input->post('grup'));
        $this->db->update('tbjadwal', $data);
    }

}

/* End of file M_Jadwal.php */
/* Location: ./application/models/M_Jadwal.php */