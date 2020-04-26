<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			redirect('Login', 'refresh');
		}
		$this->load->model('M_Jadwal', 'jadwal');
		$this->load->model('M_Karyawan', 'karyawan');
		$this->load->model('M_Shift', 'shift');
		$this->load->model('M_Tempat', 'tempat');
	}

	public function index()
	{
		$data['title'] = 'PT. Global Arrow';
		$data['page'] = 'backend/dashboard';
		$data['karyawan'] = $this->karyawan->getAll();
		$data['shift'] = $this->shift->getAll();
		$this->load->view('backend/index', $data, FALSE);
	}

	// Functio untuk view jadwal

	public function jadwal()
	{
		$data['title'] = 'Data Jadwal';
		$data['page'] = 'backend/jadwal';
		$data['data'] = $this->jadwal->getAll();
		$data['jadwal'] = $this->jadwal->getJadwal();
		$data['grup_by'] = $this->karyawan->grup();
		$data['grup_shift'] = $this->shift->grup();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addJadwal()
	{
		$this->jadwal->addJadwal();
		redirect('Dashboard/jadwal');
	}

	public function deleteJadwal()
	{
		$grup = $this->input->post("grup");
		
		$this->jadwal->deleteJadwal($grup);
		$this->session->set_flashdata('flash-success', 'Data berhasil dhapus');
	}

	public function editJadwal()
	{
		$this->jadwal->editJadwal();
		$this->session->set_flashdata('flash-success', 'Data berhasil diedit');
		redirect('Dashboard/jadwal');
	}

	// function untuk view karyawan 

	public function karyawan()
	{
		$data['title'] = 'Data Karyawan';
		$data['page'] = 'backend/karyawan';
		$data['data'] = $this->karyawan->getAll();
		$data['tempat'] = $this->tempat->getAll();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addKaryawan()
	{

		$this->karyawan->addKaryawan();
		$this->session->set_flashdata('flash-success', 'data berhasil ditambahkan');

		redirect('Dashboard/karyawan');
	}

	public function deleteKaryawan($id)
	{
		$this->karyawan->deleteKaryawan($id);
		$this->session->set_flashdata('flash-success', 'data berhasil dihapus');
		redirect('Dashboard/karyawan');
	}

	public function editKaryawan()
	{
		$this->karyawan->editKaryawan();
		$this->session->set_flashdata('flash-success', 'data berhasil diedit');
		redirect('Dashboard/karyawan');
	}

	// function untuk view shift

	public function shift()
	{
		$data['title'] = 'Data Shift Karyawan';
		$data['page'] = 'backend/shift';
		$data['data'] = $this->shift->getAll();
		$this->load->view('backend/index', $data, FALSE);
	}
	
	public function editShift()
	{
		$this->shift->editShift();
		$this->session->set_flashdata('flash-success', 'data berhasil diedit');
		redirect('Dashboard/shift');
	}

}
