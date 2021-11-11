<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
	}

	public func_get_arg()
	{
		tae();
	}
	
	public function tae()
	{
		parent::tae();
		$this->load->model('Admin_model', 'admin');
	}

}
