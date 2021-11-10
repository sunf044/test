<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School_update_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


//แก้ไขข้อมูลนักเรียน
	public function page_update_student($sdid,$data_update,$name_image)
	{	
		
		$data = array(
            'student_name'=>$data_update['student_name'], 
            'first_name'=>$data_update['first_name'], 
            'last_name'=>$data_update['last_name'], 
            'phone_number'=>$data_update['phone_number'], 
            'email'=>$data_update['email']
        );

        if(isset($data_update["files"])) {
                $data["image"] = $data_update["files"];
        }

        if($data_update["password"] != "") {
                $data["password"] = password_hash($data_update["password"], PASSWORD_BCRYPT);
        }

        if ($name_image != ""){

            if(is_file('assets/uploads/students/' . $name_image)) {
                unlink('assets/uploads/students/' . $name_image);
            }

        }

///// --- แก้ไขข้อมูลรายละเอียดนักเรียน  --- /////

      if($data_update["status_room"] == "1") {

           $data_detail = array(
                'student_id'=>$sdid, 
                'birthday'=>$data_update['birthday'], 
                'race'=>$data_update['race'], 
                'nationality'=>$data_update['nationality'], 
                'religion'=>$data_update['religion'],
                'home_number'=>$data_update['home_number'],
                'swine'=>$data_update['swine'],
                'alley'=>$data_update['alley'],
                'road'=>$data_update['road'],
                'district'=>$data_update['district'],
                'canton'=>$data_update['canton'],
                'province'=>$data_update['province'],
                'postcode'=>$data_update['postcode']
            );

           $this->db->select('said, count(*)');
           $this->db->where('student_id', $sdid);
           $count = $this->db->count_all_results('tb_student_detail');

           if($count >= 1){

                        $this->db->where('student_id', $sdid);
              $update =  $this->db->update('tb_student_detail', $data_detail);

           }
           else{

              $insert =  $this->db->insert('tb_student_detail', $data_detail);

           }

       }

///// --- End. แก้ไขข้อมูลรายละเอียดนักเรียน  --- /////


        $this->db->where('sdid', $sdid);
        return $this->db->update('tb_student', $data);

	}

//แก้ไขข้อมูลสถานะห้องของนักเรียน
    public function page_update_status_room($student_id,$data_update)
    {   
        $this->db->where('sdid', $student_id);
        return $this->db->update('tb_student', $data_update);
    }


//แก้ไขข้อมูลนักเรียน
    public function page_update_StudentRoom($stdrid,$data)
    {   
        $this->db->where('stdrid', $stdrid);
        return $this->db->update('tb_student_room', $data);
    }


//แก้ไขข้อมูลครู
    public function page_update_teacher($aid,$data_update,$name_image)
    {   
        
        $data = array(
            'username'=>$data_update['username'], 
            'first_name'=>$data_update['first_name'], 
            'last_name'=>$data_update['last_name'], 
            'phone_number'=>$data_update['phone_number'], 
            'email'=>$data_update['email']
        );

        if(isset($data_update["files"])) {
                $data["image"] = $data_update["files"];
        }

        if($data_update["password"] != "") {
                $data["password"] = password_hash($data_update["password"], PASSWORD_BCRYPT);
        }

        if ($name_image != ""){

            if(is_file('assets/images/users/' . $name_image)) {
                unlink('assets/images/users/' . $name_image);
            }

        }

        $this->db->where('aid', $aid);
        return $this->db->update('tb_users', $data);

    }


//แสดงหน้าบันทึกเกรด : แก้ไขเกรด
    public function page_update_student_score_data($did,$data)
    {   
        $this->db->where('did', $did);
        return $this->db->update('tb_grade', $data);
    }


############################## เต้ จัดการห้องเรียน #######################################

 //แก้ไขห้องเรียน
 public function update_data_room($id,$data)
 {
     return $this->db->where('rid',$id)->update('tb_room',$data);
 }

############################## เต้ จัดการรายวิชา #######################################
public function update_data_subject($id,$data)
{
    return $this->db->where('sjid',$id)->update('tb_subject',$data);
}

############################## เต้ จัดการกลุ่มวิชา #######################################
public function update_data_subject_group($id,$data)
{
    return $this->db->where('sgid',$id)->update('tb_subject_group',$data);
}

############################## เต้ จัดการลงทะเบียนรายวิชา #######################################

public function update_registered_subjects($id,$data)
{
    return $this->db->where('rsid',$id)->update('tb_registered_subjects',$data);
}



}
/* End of file Teacher_query_model.php */
/* Location: ./application/models/teacher/Teacher_query_model.php */
