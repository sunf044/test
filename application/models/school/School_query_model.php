<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School_query_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


//แสดงหน้ารายชื่อนักเรียน
	public function page_list_student()
	{	
		$this->db->select("student.*,
                           school.*
                        ");
        $this->db->from("tb_student as student");
        $this->db->join("tb_school as school", "student.school_id = school.sid");
        $this->db->where('student.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();

	}

//แสดงหน้ารายชื่อแก้ไขนักเรียน
	public function page_list_update_student($sdid)
	{	
		$this->db->select("student.*,
                           school.*
                        ");
        $this->db->from("tb_student as student");
        $this->db->join("tb_school as school", "student.school_id = school.sid");
        $this->db->where('student.sdid', $sdid);
        $this->db->where('student.school_id', $_SESSION['school_id']);
        return $this->db->get()->row_array();

	}


//แสดงหน้ารายชื่อแก้ไขรายละเอียดนักเรียน
    public function page_list_update_student_detail($sdid)
    {   
        $this->db->select("
                          detail.*
                        ");
        $this->db->from("tb_student as student");
        $this->db->join("tb_student_detail as detail", "student.sdid = detail.student_id");
        $this->db->join("tb_school as school", "student.school_id = school.sid");
        $this->db->where('student.sdid', $sdid);
        $this->db->where('student.school_id', $_SESSION['school_id']);
        return $this->db->get()->row_array();

    }


//แสดงรายชื่อนักเรียนเข้าห้องเรียน
	public function page_student_room()
	{	

		$this->db->select("student.*,
                           school.*,
                           student_room.*,
                           room.*,
                           room_degree.*
                        ");
        $this->db->from("tb_student as student");
        $this->db->join("tb_school as school", "student.school_id = school.sid");
        $this->db->join("tb_student_room as student_room", "student.sdid = student_room.student_id");
        $this->db->join("tb_room as room", "student_room.room_id = room.rid");
        $this->db->join("tb_room_degree as room_degree", "room.room_degree_id = room_degree.rdid");
        $this->db->where('student.status_room', 1);
        $this->db->where('room.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();

	}

//แสดงรายชื่อนักเรียนไม่มีห้องเรียน
	public function page_getAllStudentNotRoom()
	{	

		$this->db->select("student.*,
                           school.*
                        ");
        $this->db->from("tb_student as student");
        $this->db->join("tb_school as school", "student.school_id = school.sid");
        $this->db->where('student.status_room',"!=", 1);
        $this->db->where('student.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();

	}

//แสดงรายชื่อนักเรียน
	
	public function page_getAllRoom()
	{	

		$this->db->select("r.*,
                            sh.*,
                            rd.*
                        ");
        $this->db->from("tb_room as r");
        $this->db->join("tb_school as sh", "sh.sid = r.school_id");
        $this->db->join("tb_room_degree as rd", "rd.rdid = r.room_degree_id");
        $this->db->where("r.school_id", $_SESSION['school_id']);
        $this->db->order_by("rd.rdid"  , "Asc"  );
        $this->db->order_by("class" , "Asc"  );
        $this->db->order_by("class_room" , "Asc"  );

        return $this->db->get()->result_array();

	}

//แสดงแก้ไขข้อมูลนักเรียนเข้าห้อง

	public function page_Get_StudentRoom($stdrid) {

        $this->db->select("stdr.*,
                           std.*,
                           r.*,
                           rd.*
                        ");
        $this->db->from("tb_student_room as stdr");
        $this->db->join("tb_student as std", "std.sdid = stdr.student_id");
        $this->db->join("tb_room as r", "r.rid = stdr.room_id");
        $this->db->join("tb_room_degree as rd", "rd.rdid = r.room_degree_id");
        $this->db->where('stdr.stdrid', $stdrid);
        $this->db->where('std.school_id', $_SESSION['school_id']);
        return $this->db->get()->row_array();
    }


// -----------------  เกรด

//แสดงรายการปี
    public function page_year() {

        $this->db->from("tb_year");
        $this->db->order_by("syid", "DESC");
        return $this->db->get()->result_array();
    }

//แสดงรายการกลุ่มวิชาเรียน
    public function page_subject_group() {

        $this->db->from("tb_subject_group");
        $this->db->where('school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();
    }

//แสดงรายการประเภทวิชาเรียน
    public function page_subject_type() {

        $this->db->from("tb_subject_type");
        return $this->db->get()->result_array();
    }



//แสดงรายการวิชาแบบ json
    public function page_Get_subject_json($sgid,$sjtid) {

        $this->db->select("sj.*,
                           st.*
                        ");
        $this->db->from("tb_subject as sj");
        $this->db->join("tb_subject_type as st", "st.sjtid = sj.subject_id");
        $this->db->where('sj.group_subject_id', $sgid);
        $this->db->where('sj.subject_id', $sjtid);
        $this->db->where('sj.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();
    }

//แสดงเทอมแบบ json
    public function page_Get_term_json($sjid,$syid) {

        $this->db->select("rs.*
                        ");
        $this->db->from("tb_registered_subjects as rs");
        $this->db->where('rs.subject_id', $sjid);
        $this->db->where('rs.year', $syid);        
        $this->db->where('rs.school_id', $_SESSION['school_id']);
        $this->db->group_by('rs.term');
        return $this->db->get()->result_array();
    }

//แสดงห้องเรียนแบบ json
    public function page_Get_room_json($sjid,$syid,$term) {

        $this->db->select("rs.*,
                           sr.*,
                           r.*,
                           rd.*
                        ");
        $this->db->from("tb_registered_subjects as rs");
        $this->db->join("tb_student_room as sr", "sr.room_id = rs.room_id");
        $this->db->join("tb_room as r", "r.rid = sr.room_id");
        $this->db->join("tb_room_degree as rd", "rd.rdid = r.room_degree_id");
        $this->db->where('rs.subject_id', $sjid);
        $this->db->where('rs.year', $syid);
        $this->db->where('rs.term', $term);
        $this->db->where('rs.school_id', $_SESSION['school_id']);
        $this->db->where('sr.school_id', $_SESSION['school_id']);
        $this->db->group_by('rs.room_id');
        return $this->db->get()->result_array();
    }


//แสดงหน้าบันทึกเกรด : แสดงรายชื่อนักเรียนในห้อง
    public function page_list_student_score_room($syid,$sgid,$sjtid,$sjid,$term,$room_id) {

        $this->db->select("sr.*,
                           s.*,
                           rs.*,
                           sj.*
                        ");
        $this->db->from("tb_student_room as sr");
        $this->db->join("tb_student as s", "s.sdid = sr.student_id");
        $this->db->join("tb_registered_subjects as rs", "rs.room_id = sr.room_id");
        $this->db->join("tb_subject as sj", "sj.sjid = rs.subject_id");
        $this->db->where('rs.subject_id', $sjid);
        $this->db->where('rs.year', $syid);
        $this->db->where('rs.term', $term);
        $this->db->where('rs.room_id', $room_id);
        $this->db->where('rs.school_id', $_SESSION['school_id']);
        $this->db->where('sr.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();
    }

//แสดงหน้าบันทึกเกรด : แสดงรายชื่อนักเรียนในห้อง array
    public function page_list_student_score_room_array($syid,$sgid,$sjtid,$sjid,$term,$room_id) {

        $this->db->select("rs.*,
                           y.*,
                           sj.*,
                           u.*,
                           sr.*,
                           r.*,
                           rd.*
                           
                        ");
        $this->db->from("tb_registered_subjects as rs");
        $this->db->join("tb_year as y", "y.syid = rs.year");
        $this->db->join("tb_subject as sj", "sj.sjid = rs.subject_id");
        $this->db->join("tb_users as u", "u.aid = rs.users_id");
        $this->db->join("tb_student_room as sr", "sr.room_id = rs.room_id");
        $this->db->join("tb_room as r", "r.rid = sr.room_id");
        $this->db->join("tb_room_degree as rd", "rd.rdid = r.room_degree_id");
        $this->db->where('rs.subject_id', $sjid);
        $this->db->where('rs.year', $syid);
        $this->db->where('rs.term', $term);
        $this->db->where('rs.room_id', $room_id);
        $this->db->where('rs.school_id', $_SESSION['school_id']);
        $this->db->where('sr.school_id', $_SESSION['school_id']);
        return $this->db->get()->row_array();


    }

//แสดงหน้าบันทึกเกรด : แสดงรายชื่อนักเรียน
    public function page_list_student_score($syid,$sgid,$sjtid,$sjid,$term,$room_id) {

        $this->db->select("g.*,
                           s.*
                        ");
        $this->db->from("tb_grade as g");
        $this->db->join("tb_student as s", "s.sdid = g.student_id");
        $this->db->where('g.subject_id', $sjid);
        $this->db->where('g.year', $syid);
        $this->db->where('g.term', $term);
        $this->db->where('g.room_id', $room_id);
        $this->db->where('s.status_room', 1);
        $this->db->where('g.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();


    }


//แสดงหน้าบันทึกเกรด : ตรวจสอบรายชื่อนักเรียน
    public function page_list_student_score_check($subject_ids,$student_ids,$units,$terms,$years,$room_ids) {

        $this->db->select('did, count(*)');
        $this->db->where('subject_id', $subject_ids);
        $this->db->where('student_id', $student_ids);
        $this->db->where('unit', $units);
        $this->db->where('term', $terms);
        $this->db->where('year', $years);
        $this->db->where('room_id', $room_ids);
        $this->db->where('school_id', $_SESSION['school_id']);
        return $this->db->count_all_results('tb_grade');

    }


// -----------------  เกรด

//แสดงหน้ารายชื่อครู
    public function page_list_teacher()
    {   
        $this->db->select("users.*,
                           users_type.*,
                           school.*
                        ");
        $this->db->from("tb_users as users");
        $this->db->join("tb_users_type as users_type", "users.type_id = users_type.utid");
        $this->db->join("tb_school as school", "users.school_id = school.sid");
        $this->db->where('users.type_id', 3);
        $this->db->where('users.status', 1);
        $this->db->where('users.school_id', $_SESSION['school_id']);
        return $this->db->get()->result_array();

    }


//แสดงหน้ารายชื่อแก้ไขข้อมูลครู
    public function page_list_update_teacher($aid)
    {   

         $this->db->select("users.*,
                           users_type.*,
                           school.*
                        ");
        $this->db->from("tb_users as users");
        $this->db->join("tb_users_type as users_type", "users.type_id = users_type.utid");
        $this->db->join("tb_school as school", "users.school_id = school.sid");
        $this->db->where('users.type_id', 3);
        $this->db->where('users.status', 1);
        $this->db->where('users.aid', $aid);
        $this->db->where('users.school_id', $_SESSION['school_id']);
        return $this->db->get()->row_array();

    }

############################## เต้ จัดการห้องเรียน #######################################

 //แสดงห้องเรียน
 public function data_room()
 {
     return $this->db->select('tb_room.rid,tb_room.room_no,tb_room.room_name,tb_room.class,tb_room.class_room,tb_room_degree.degree_name,tb_room_degree.degree_tag,tb_school.school_name')
     ->order_by('rid', 'asc')
     ->where('school_id',$_SESSION['school_id'])
     ->join('tb_room_degree', 'tb_room.room_degree_id = tb_room_degree.rdid')
     ->join('tb_school', 'tb_room.school_id = tb_school.sid')
     ->get('tb_room')
     ->result();
     
 }
 public function get_data_room_form_id($id)
 {
     return $this->db->where('rid',$id)->get('tb_room')->row_array();
     
 }

 //แสดงข้อมูลระดับชั้น
 public function get_tb_room_degree()
 {
     return $this->db->get('tb_room_degree')->result();
     
 }
############################## เต้ จัดการห้องเรียน #######################################

 ############################## เต้ จัดการรายวิชา #######################################

public function data_subject()
{
    return $this->db->select("tb_subject.*,tb_subject_group.name_subject_group,tb_subject_type.subject_type")
    ->join('tb_subject_group','tb_subject.group_subject_id = tb_subject_group.sgid')
    ->join('tb_subject_type','tb_subject.subject_id = tb_subject_type.sjtid')
    ->where('tb_subject.school_id',$_SESSION['school_id'])
    ->get('tb_subject')->result();
}

public function data_subject_form_id($id)
{
    return $this->db->select("tb_subject.*,tb_subject_group.name_subject_group")
    ->join('tb_subject_group','tb_subject.group_subject_id = tb_subject_group.sgid')
    ->where('tb_subject.school_id',$_SESSION['school_id'])
    ->where('tb_subject.sjid',$id)
    ->get('tb_subject')->row_array();
}


public function get_type_subject()
{
    return $this->db->get('tb_subject_type')->result();
}

############################## เต้ จัดการรายวิชา #######################################

############################## เต้ จัดการกลุ่มวิชา #######################################

public function get_subject_group()
{
    return $this->db->where('school_id',$_SESSION['school_id'])->get('tb_subject_group')->result();
}

public function get_subject_group_from_id($id)
{
    return $this->db->where('school_id',$_SESSION['school_id'])->where('sgid',$id)->get('tb_subject_group')->row_array();
}


############################## เต้ จัดการกลุ่มวิชา #######################################

############################## เต้ จัดการลงทะเบียนรายวิชา #######################################
public function data_registered_subjects($id)
{
    return $this->db->select('tb_registered_subjects.rsid, 
    tb_registered_subjects.term, 
    tb_year.`year`, 
    tb_subject.name_subject, 
    tb_room.class, 
    tb_room.class_room,
    tb_room_degree.degree_tag, 
    tb_school.school_name, 
    `user`.first_name AS first_name_teacher, 
    `user`.last_name AS last_name_teacher, 
    `save_by`.first_name AS first_name_save_by,
    `save_by`.last_name AS last_name_save_by,  
    tb_registered_subjects.school_id')
    ->where('tb_registered_subjects.school_id',$id)
    ->join('tb_subject','tb_registered_subjects.subject_id = tb_subject.sjid') 
    ->join('tb_room','tb_registered_subjects.room_id = tb_room.rid')
    ->join('tb_room_degree','tb_room_degree.rdid = tb_room.room_degree_id')  
    ->join('tb_year','tb_registered_subjects.`year` = tb_year.syid') 
    ->join('tb_school','tb_registered_subjects.school_id = tb_school.sid') 
    ->join('tb_users AS `user`','tb_registered_subjects.users_id = `user`.aid') 
    ->join('tb_users AS `save_by`','tb_registered_subjects.saved_by = `save_by`.aid')
    ->order_by('tb_registered_subjects.rsid', 'asc')
    ->get('tb_registered_subjects')->result();
}

public function get_data_registered_subjects_form_id($id)
{
    return $this->db->select('	tb_registered_subjects.*, 
	tb_subject.name_subject, 
	tb_subject.group_subject_id, 
	tb_room.room_degree_id, 
	tb_room.class, 
	tb_room.class_room,
    tb_room.rid')
    ->join('tb_subject','tb_registered_subjects.subject_id = tb_subject.sjid')
    ->join('tb_room','tb_registered_subjects.room_id = tb_room.rid')
    ->where('tb_registered_subjects.rsid',$id)
    ->get('tb_registered_subjects')->row_array();
}

public function select_data_subject_where($id)
{
    return $this->db->where('school_id',$_SESSION['school_id'])
    ->where('group_subject_id',$id)
    ->get('tb_subject')->result();
}

public function select_data_subject()
{
    return $this->db->where('school_id',$_SESSION['school_id'])
    ->get('tb_subject')->result();
}

public function select_data_class($id)
{
    return $this->db->where('school_id',$_SESSION['school_id'])
    ->join('tb_room_degree', 'tb_room.room_degree_id = tb_room_degree.rdid')
    ->where('room_degree_id',$id)->group_by('tb_room.class')
    ->get('tb_room')->result();
}

public function select_data_room_where($rdid,$classid)
{
    return $this->db->where('school_id',$_SESSION['school_id'])
    ->where('room_degree_id',$rdid)
    ->where('class',$classid)
    ->get('tb_room')->result();
     
}

public function select_data_room_degree()
{
    return $this->db
    ->get('tb_room_degree')->result();
}

public function select_data_subject_group()
{
    return $this->db->where('school_id',$_SESSION['school_id'])
    ->get('tb_subject_group')->result();
}

public function select_data_teacher()
{
    return $this->db->select('tb_users.first_name, 
    tb_users.last_name, 
    tb_users.aid')->where('school_id',$_SESSION['school_id'])
    ->where('type_id',3)
    ->get('tb_users')->result();
}

public function select_data_room()
{
    return $this->db->order_by('rid', 'asc')
    ->where('school_id',$_SESSION['school_id'])
    ->get('tb_room')
    ->result();
    
}

public function select_data_year()
{
    return $this->db->order_by('syid', 'asc')
    ->get('tb_year')
    ->result();
}


}
/* End of file Teacher_query_model.php */
/* Location: ./application/models/teacher/Teacher_query_model.php */
