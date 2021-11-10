<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		$this->admin->check_admin();
	}
	public function index()
	{
		$data['title'] = 'หน้าแรก';
		$data['online'] = $this->admin->user_online();
		$this->load->view('page/admin/dashboard', $data);
	}

	############################## จัดการผู้ใช้งาน #############################################
	public function user()
	{
		$this->load->library("pagination");
		$config = array(
			'base_url' => base_url('admin/user/'),
			'total_rows' => $this->db->count_all('tb_users'),
			'per_page' => 20,
			'uri_segment' => 3
		);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['users'] = $this->admin->data_users($config['per_page'], $page);
		$data["pages"] = $this->pagination->create_links();
		$data['title'] = 'ผู้ใช้งาน';
		$this->load->view('page/admin/user/user', $data);
	}
	public function get_user_id($id)
	{
		if (isAjax())
		{
			echo json_encode($this->admin->get_user($id));
		}
	}
	public function del_user_id($id)
	{
		if (isAjax())
		{
			echo json_encode($this->admin->del_user($this->uri->segment(3)));
		}
	}
	public function user_type()
	{
		$this->load->library("pagination");
		$config = array(
			'base_url' => base_url('admin/user_type/'),
			'total_rows' => $this->db->count_all('tb_users_type'),
			'per_page' => 20,
			'uri_segment' => 3
		);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['type'] = $this->admin->data_user_type($config['per_page'], $page);
		$data["pages"] = $this->pagination->create_links();
		$data['title'] = 'ประเภทผู้ใช้งาน';
		$this->load->view('page/admin/user/user_type', $data);
	}
	public function check_user_type($param = '')
	{
		if (isAjax())
		{
			$is_available = $this->admin->check_user_type($param);
			echo json_encode(array('valid' => $is_available));
		}
	}
	public function add_user_type()
	{
		if (isAjax())
		{
			if ($this->input->post('name_type') == '')
			{
				echo json_encode(array('status' => 'danger'));
			}
			else
			{
				echo json_encode($this->admin->add_user_type($this->input->post('utid', TRUE)));
			}
		}
	}
	public function get_user_type_id($id)
	{
		if (isAjax())
		{
			echo json_encode($this->admin->get_user_type($id));
		}
	}
	public function del_user_type($id)
	{
		if (isAjax())
		{
			echo json_encode($this->admin->del_user_type($this->uri->segment(3)));
		}
	}

	############################## จัดการผู้ใช้งาน #############################################
	############################## จัดการโรงเรียน #############################################
	public function select()
	{
		$this->load->library("pagination");
		$config = array(
			'base_url' => base_url('admin/select/'),
			'total_rows' => $this->db->count_all('tb_school'),
			'per_page' => 20,
			'uri_segment' => 3
		);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['select'] = $this->admin->select_school($config['per_page'], $page);
		$data["pages"] = $this->pagination->create_links();
		$data['title'] = 'เลือกโรงเรียน';
		$this->load->view('page/admin/school/select', $data);
	}
	public function school()
	{
		$this->load->library("pagination");
		$config = array(
			'base_url' => base_url('admin/select/'),
			'total_rows' => $this->db->count_all('tb_school'),
			'per_page' => 20,
			'uri_segment' => 3
		);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['select'] = $this->admin->select_school($config['per_page'], $page);
		$data["pages"] = $this->pagination->create_links();
		$data['title'] = 'จัดการโรงเรียน';
		$this->load->view('page/admin/school/select', $data);
	}
	public function add_session($id='')
	{
		//ตรวจสอบว่ามีการเลือกโรงเรียนหรือยัง
		if(! empty($this->session->userdata('school_id')))
		{
			//ตรวจสอบค่าไอดีที่ส่งมากับ session ว่าตรงกันหรือไม่
			if ($this->session->userdata('school_id') != $this->uri->segment(3))
			{
				//ถ้าไม่ตรงให้สร้าง session ใหม่ขึ้นมา
				$this->session->set_userdata('school_id', $this->uri->segment(3));
			}
		}
		else
		{
			//ถ้ายังให้ตรวจสอบค่าไอดีว่าง
			if ($this->uri->segment(3) == '') {
				//ให้รีเฟตรหน้ากลับไป select
				redirect('adminstipeo/select', 'refresh');
			}
			else {
				//ถ้ามีค่าให้สร้าง session
				$this->session->set_userdata('school_id', $this->uri->segment(3));
			}
		}
		$this->load->view('admin/school');
	}
	public function add_school($value='')
	{
		if ($this->input->post('school_name') == '')
		{
			echo json_encode(array('status' => 'danger'));
		}
		else
		{
			echo json_encode($this->admin->add_school($this->input->post('uid', TRUE)));
		}
	}
	public function edit_school($value='')
	{
		echo json_encode($this->admin->edit_school($this->uri->segment(3)));
	}
	public function del_school($value='')
	{
		echo json_encode($this->admin->del_school($this->uri->segment(3)));
	}
	############################## จัดการโรงเรียน #############################################

}
