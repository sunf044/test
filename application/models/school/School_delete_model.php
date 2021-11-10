<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School_delete_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


//ลบข้อมูลนักเรียน
	public function page_delete_student($sdid)
	{	
		
        $this->db->where('sdid', $sdid);
        $query = $this->db->get('tb_student');

        if ($query->num_rows() != 0) {

        foreach ($query->result() as $row) {
            if ($row->image != "") {

                if (is_file('assets/uploads/students/' . $row->image)) {
                    unlink('assets/uploads/students/' . $row->image);
                }
            }

          $this->db->delete('tb_student', array('sdid' => $sdid));
          $this->db->delete('tb_student_detail', array('student_id' => $sdid));
        }

       }
        
	}

//ลบข้อข้อมูลนักเรียนเข้าห้อง
	public function page_delete_StudentRoom($stdrid)
	{	
		
		$this->db->delete('tb_student_room', array('stdrid' => $stdrid));

	}

//ลบข้อมูลครู
	public function page_delete_teacher($aid)
	{	
		
        $this->db->where('aid', $aid);
        $query = $this->db->get('tb_users');

        if ($query->num_rows() != 0) {

        foreach ($query->result() as $row) {
            if ($row->image != "") {

                if (is_file('assets/images/users/' . $row->image)) {
                    unlink('assets/images/users/' . $row->image);
                }
            }

          $this->db->delete('tb_users', array('aid' => $aid));
        }

       }
        
	}

//ลบข้อมูลห้องเรียน
    public function delete_room($id)
    {   
        $this->db->where('rid', $id)->delete('tb_room');
    }

//ลบข้อมูลรายวิชา
    public function delete_subject($id)
    {   
        $this->db->where('sjid', $id)->delete('tb_subject');
    }

//ลบข้อมูลกลุ่มวิชา
    public function delete_subject_group($id)
    {   
        $this->db->where('sgid', $id)->delete('tb_subject_group');
    }

//ลบข้อมูลลงทะเบียนวิชา
public function delete_registered_subjects($id)
    {   
        $this->db->where('rsid', $id)->delete('tb_registered_subjects');
    }


}
/* End of file Teacher_query_model.php */
/* Location: ./application/models/teacher/Teacher_query_model.php */
