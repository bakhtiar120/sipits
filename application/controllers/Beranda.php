<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {


	public function index()
	{
		$this->load->view('beranda');
	}

	public function informasi()
	{
		$this->load->view('informasi');
	}
	public function tentang()
	{
		$this->load->view('tentang');
	}
}
