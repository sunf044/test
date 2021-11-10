<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	############################## เข้าสู่ระบบ ###########################################
  #เช็คการล๊อกอิน
  public function login_system()
  {
    if ($this->session->userdata('login_system') == NULL)
    {
      redirect('login', 'refresh');
      exit();
    }
  }
  public function check_admin()
  {
		$type_id = $this->session->userdata('type_id');
		if ($type_id == 2)
    {
      redirect('school', 'refresh');
      exit();
    }
		else if ($type_id == 3)
    {
			redirect('teacher', 'refresh');
      exit();
    }
		else if ($type_id == 4)
    {
			redirect('student', 'refresh');
      exit();
    }
  }
  /* เข้ารหัสผ่าน */
	private function hash_password($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	/* สร้างรหัสผ่าน */
	private function verify_password_hash($password, $hash)
	{
		return password_verify($password, $hash);
	}

	/* Admin */
  public function user_login($username, $password)
  {
    $this->db->select('password')->from('tb_users')->where('username', $username);
    $hash = $this->db->get()->row('password');
    return $this->verify_password_hash($password, $hash);
  }
  public function get_user_id($username)
  {
    return $this->db->select('aid')->from('tb_users')->where('username', $username)->get()->row('aid');
  }
  public function get_user($user_id)
  {
    return $this->db->from('tb_users')->where('aid', $user_id)->get()->row();
  }

	/* Student */
	public function student_login($username, $password)
	{
		$this->db->select('password')->from('tb_student')->where('student_name', $username);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);
	}
	public function get_student_id($username)
	{
		return $this->db->select('sdid')->from('tb_student')->where('student_name', $username)->get()->row('sdid');
	}
	public function get_student($student_id)
	{
		return $this->db->from('tb_student')->where('sdid', $student_id)->get()->row();
	}

  ############################## เข้าสู่ระบบ ###########################################
	############################## หน้าแรก  ###########################################
	public function user_online()
	{
		return $this->db->get('tb_users_online')->result();
	}
	############################## หน้าแรก ###########################################


	############################## ผู้ใช้งาน  ###########################################
	public function data_users($limit = NULL, $page = NULL)
	{
		return $this->db->select('*')
		->select("CONCAT((a.first_name),(' '),(a.last_name)) as fullname")
		->order_by('a.aid', 'asc')
		->join('tb_users_type b', 'b.utid = a.type_id', 'left outer')
		->join('tb_school c', 'c.sid = a.school_id', 'left outer')
		->get('tb_users a', $limit, $page)
		->result();
	}
	public function add_user($id)
	{
		$this->db->trans_begin();
		$data = array('name_type' => $this->input->post('name_type', TRUE));
		if ($id == NULL)
		{
			$this->db->insert('tb_users_type', $data);
		}
		else
		{
			$this->db->update('tb_users_type', $data, 'utid = '.$id);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('status' => 'danger');
		}
		else
		{
			$this->db->trans_commit();
			return array('status' => 'success');
		}
	}

	public function del_user($id)
  {
    $this->db->trans_begin();
		$data = $this->get_user($id);
		@unlink('./assets/images/users/'.$data->image);
		$this->db->where('aid', $id)->delete('tb_users');
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('status' => 'danger');
		}
		else
		{
			$this->db->trans_commit();
			return array('status '=> 'success');
		}
  }

	public function data_user_type($limit = NULL, $page = NULL)
	{
		if ($limit > 0)
		{
			$data = $this->db->order_by('utid', 'ASC')->get('tb_users_type', $limit, $page)->result();
		}
		else
		{
			$data = $this->db->order_by('utid', 'ASC')->get('tb_users_type')->result();
		}
		return $data;
	}
	public function check_user_type($id)
	{
		$is_available = true;
		$count = $this->db->where(array('name_type' => $this->input->post('name_type', TRUE), 'utid <>' => $id))->count_all_results('tb_users_type');
		if ($count > 0)
		{
			$is_available = false;
		}
		return $is_available;
	}
	public function add_user_type($id)
	{
		$this->db->trans_begin();
		$data = array('name_type' => $this->input->post('name_type', TRUE));
		if ($id == NULL)
		{
			$this->db->insert('tb_users_type', $data);
		}
		else
		{
			$this->db->update('tb_users_type', $data, 'utid = '.$id);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('status' => 'danger');
		}
		else
		{
			$this->db->trans_commit();
			return array('status' => 'success');
		}
	}
	public function get_user_type($id)
	{
		return $this->db->from('tb_users_type')->where('utid', $id)->get()->row();
	}
	public function del_user_type($id)
	{
		$this->db->trans_begin();
		$this->db->where('utid', $id)->delete('tb_users_type');
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('status' => 'danger');
		}
		else
		{
			$this->db->trans_commit();
			return array('status '=> 'success');
		}
	}

	############################## ผู้ใช้งาน  ###########################################
	public function select_school($limit = NULL, $page = NULL)
	{
		return $this->db->select('*')
		->order_by('sid', 'asc')
		->get('tb_school', $limit, $page)
		->result();
	}

	public function get_data_resig_subject()
	{
		return $this->db->select('tb_registered_subjects.subject_id,
		tb_subject.name_subject,
		tb_subject.code_subject,
		tb_registered_subjects.users_id,
		tb_registered_subjects.room_id,
		COUNT( tb_registered_subjects.subject_id ) AS num_room ')
		->join('tb_subject','tb_registered_subjects.subject_id = tb_subject.sjid')
		->where('tb_registered_subjects.users_id',$_SESSION['user_id'])
		->group_by('tb_registered_subjects.subject_id')
		->get('tb_registered_subjects')
		->result();
	}

	public function show_data_resig_subject($id)
	{
		return $this->db->select('tb_room.class, 
		tb_room.class_room, 
		tb_room.rid, 
		tb_room_degree.degree_name, 
		COUNT(tb_student_room.room_id) AS num_stu')
		->join('tb_room_degree','tb_room.room_degree_id = tb_room_degree.rdid')
		->join('tb_student_room','tb_room.rid = tb_student_room.room_id')
		->where('tb_room.rid',$id)
		->group_by('tb_student_room.room_id')
		->get('tb_room')
		->result();
	}

  private function __destruction()
  {
    $this->db->cache_delete_all();
    $this->db->close();
  }
}
/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
