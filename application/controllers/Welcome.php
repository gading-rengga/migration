<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('Api');
	}

	public function index()
	{
		$data = $this->Api->curl();
		var_dump($data);
	}
}
