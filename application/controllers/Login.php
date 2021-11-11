<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		if ( ! empty($this->session->userdata('login_system')))
		{
			$type = $this->session->userdata('type_id');
			if ($type == 1)
			{
				redirect('admin', 'refresh');
				exit();
			}
			if ($type == 2)
			{
				redirect('school', 'refresh');
				exit();
			}
			else if ($type == 3)
			{
				redirect('teacher', 'refresh');
				exit();
			}
			else if ($type == 4)
			{
				redirect('student', 'refresh');
				exit();
			}
		}
		else
		{
			redirect('login/student', 'refresh');
			//$this->load->view('page/system/login');
		}
	}

	public function student()
	{
		$this->load->view('page/system/student');
	}

	public function system()
	{
		$this->load->view('page/system/login');
	}

	public function login($url = '')
	{
		$this->load->helper('cookie');
		$this->load->view('page/system/login');
	}
	public function logout() {
		session_unset();
		session_destroy();
		redirect('login', 'refresh');
	}

	public function check_login($url = '')
	{
		$this->load->helper('cookie');
		if (isAjax())
		{
			$get_username = $this->input->post('username', TRUE);
			$get_password = $this->input->post('password', TRUE);

			if (empty($get_username) || empty($get_password))
			{
				echo json_encode(array('status' => 'error', 'message' => "กรุณากรอกชื่อผู้ใช้งาน และ รหัสผ่าน"));
			}
			else
			{
				if ($this->admin->user_login($get_username, $get_password))
				{
					$user_id = $this->admin->get_user_id($get_username);
					$data = $this->admin->get_user($user_id);
					
					// set session user datas
					$add_session = array(
						'user_id' => $user_id,
						'username' => $data->username,
						'type_id' => $data->type_id,
						'first_name' => $data->first_name,
						'last_name' => $data->last_name,
						'phone_number' => $data->phone_number,
						'email' => $data->email,
						'image' => $data->image,
						'create' => $data->create,
						'last_login' => $data->last_login,
						'status' => $data->status,
						'school_id' => $data->school_id,
						'login_system' => (bool)true
					);

					$this->session->set_userdata($add_session);
					$this->session->set_flashdata('welcome', $data->first_name . ' '. $data->last_name);
					echo json_encode(array('status' => 'success','message' => "Welcome ". $data->username ."."));
					if ($data->type_id == 1)
					{
						redirect('admin', 'refresh');
					}
					else if ($data->type_id == 2)
					{
						redirect('school', 'refresh');
					}
					else if ($data->type_id == 3)
					{
						redirect('teacher', 'refresh');
					}
				}
				else
				{
					echo json_encode(array('status' => 'warning','message' => "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง."));
				}
			}
		}
	}

	public function check_login_student($url = '')
	{
		$this->load->helper('cookie');
		if (isAjax())
		{
			$get_username = $this->input->post('username', TRUE);
			$get_password = $this->input->post('password', TRUE);

			if (empty($get_username) || empty($get_password))
			{
				echo json_encode(array('status' => 'error', 'message' => "กรุณากรอกชื่อผู้ใช้งาน และ รหัสผ่าน"));
			}
			else
			{
				if ($this->admin->student_login($get_username, $get_password))
				{
					$user_id = $this->admin->get_student_id($get_username);
					$data = $this->admin->get_student($user_id);
					// set session user datas
					$add_session = array(
						'student_id' => $user_id,
						'username' => $data->student_name,
						'school_id' => $data->school_id,
						'type_id' => 4,
						'login_system' => (bool)true
					);

					$this->session->set_userdata($add_session);
					$this->session->set_flashdata('welcome', $data->first_name . ' '. $data->last_name);
					echo json_encode(array('status' => 'success','message' => "Welcome ". $data->student_name."."));
					redirect('student', 'refresh');
				}
				else
				{
					echo json_encode(array('status' => 'warning','message' => "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง."));
				}
			}
		}
	}
	public function tae(){
		tae
	}
	public function tong(){
			tong
	}
}
