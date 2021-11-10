<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School_insert_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


//เพิ่มข้อมูลนักเรียน
	public function page_add_student($data)
	{	
		return $this->db->insert('tb_student', $data);
	}

//เพิ่มนักเรียนเข้าห้อง
	public function page_add_StudentRoom($data_insert)
	{	
		return $this->db->insert('tb_student_room', $data_insert);
	}

//เพิ่มข้อมูลข้อมูลครู
	public function page_add_teacher($data)
	{	
		return $this->db->insert('tb_users', $data);
	}

//เพิ่มข้อมูลห้องเรียน
	public function insert_data_room($data)
	{	
		return $this->db->insert('tb_room', $data);
	}

//เพิ่มข้อมูลเกรด
	public function page_add_grade($data_check)
	{	
		return $this->db->insert('tb_grade', $data_check);
	}

//เพิ่มข้อมูลรายวิชา
	public function insert_data_subject($data)
	{	
		return $this->db->insert('tb_subject', $data);
	}

//เพิ่มข้อมูลกลุ่มวิชา
	public function insert_data_subject_group($data)
	{	
		return $this->db->insert('tb_subject_group', $data);
	}

//ลงทะเบียนวิชา
	public function add_registered_subjects($data)
	{	
		return $this->db->insert('tb_registered_subjects', $data);
	}
	
}
/* End of file Teacher_query_model.php */
/* Location: ./application/models/teacher/Teacher_query_model.php */
