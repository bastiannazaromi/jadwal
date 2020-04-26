<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Jadwal', 'jadwal');
		$this->load->model('M_Karyawan', 'karyawan');
		$this->load->model('M_Shift', 'shift');
		$this->load->model('M_Tempat', 'tempat');
	}

	public function index()
	{
        $data['title'] = 'PT. Global Arrow';
        $data['jadwal'] = $this->jadwal->getAll();
		$data['karyawan'] = $this->karyawan->getAll();
		$data['shift'] = $this->shift->getAll();
		$this->load->view('frontend/index', $data, FALSE);
	}

}
