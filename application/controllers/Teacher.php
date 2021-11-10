<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		//$this->load->model('Teacher_model', 'teacher');
		$this->admin->login_system();
	}

	public function index()
	{
		$this->load->view('page/teacher/dashboard');
	}
}
