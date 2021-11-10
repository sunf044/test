<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		$this->load->model('school/School_query_model', 'query');
		$this->load->model('school/School_insert_model', 'insert');
		$this->load->model('school/School_update_model', 'update');
		$this->load->model('school/School_delete_model', 'delete');
		$this->admin->login_system();
	}

	public function index()
	{	

		$data = new stdClass();
		$data->title = "หน้าแรก";
		$this->load->view('page/school/dashboard',$data);
	}


////////////// จัดการนักเรียน //////////////

//แสดงหน้ารายชื่อนักเรียน
	public function list_student()
	{	
		$data = new stdClass();
		$data->title = "แสดงหน้ารายชื่อนักเรียน";
		$data->page_list_student = $this->query->page_list_student();
		$this->load->view('page/school/student/list_student',$data);
	}

//แบบฟอร์มเพิ่มข้อมูลนักเรียน
	public function form_add_student()
	{	
		$data = new stdClass();
		$data->title = "เพิ่มข้อมูลนักเรียน";
		
		$this->load->view('page/school/student/form_add_student',$data);
	}

//เพิ่มข้อมูลนักเรียน
	public function add_student()
	{	
		
		$config['upload_path'] = 'assets/uploads/students';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);

        if($this->upload->do_upload("files")){
           $data = array('upload_data' => $this->upload->data());
           
            $data = array(
				'student_name' => $this->input->post('student_name'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'image' => $data['upload_data']['file_name'],
				'create'=> date("Y-m-d H:i:s"),
				'status_room'=> 0,
				'school_id'=> $_SESSION["school_id"]							
			);

            $tb_student = $this->insert->page_add_student($data);

    	}else{
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
            }
		
	}

//แบบฟอร์มแก้ไขข้อมูลนักเรียน
	public function form_update_student($sdid)
	{	
		$data = new stdClass();
		$data->title = "แก้ไขข้อมูลนักเรียน";
		$data->row = $this->query->page_list_update_student($sdid);
		$data->detail = $this->query->page_list_update_student_detail($sdid);

		$this->load->view('page/school/student/form_update_student',$data);
	}

//แก้ไขข้อมูลนักเรียน
	public function update_student($sdid)
	{	
		$data_update = $this->input->post();
		$config['upload_path'] = 'assets/uploads/students';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

	     if($this->upload->do_upload("files")){

            $data = array('upload_data' => $this->upload->data());

            $name_image = $this->input->post('image');

			$data_update["files"] = $data['upload_data']['file_name'];

			$tb_student = $this->update->page_update_student($sdid,$data_update,$name_image);

	      }else{

	      		$name_image = "";
                $tb_student = $this->update->page_update_student($sdid,$data_update,$name_image);
            }

	}

//ลบข้อมูลนักเรียน
	public function del_student($sdid)
	{

	 $this->delete->page_delete_student($sdid);

	}

//แสดงหน้าเพิ่มนักเรียนเข้าห้อง
	public function list_student_room()
	{

		$data = new stdClass();
		$data->title = "เพิ่มนักเรียนเข้าห้อง";
		$data->page_student_room = $this->query->page_student_room();
		$data->getAllStudentNotRoom = $this->query->page_getAllStudentNotRoom();
		$data->getAllRoom = $this->query->page_getAllRoom();

		$this->load->view('page/school/student/list_student_room',$data);

	}

//เพิ่มนักเรียนเข้าห้อง
	public function addStudentRoom()
	{

		$data_insert = array(
            'room_id'=> $this->input->post('room_id'),
            'student_id'=> $this->input->post('student_id'),
            'school_id'=> $_SESSION["school_id"]
        );

		$addStudentRoom = $this->insert->page_add_StudentRoom($data_insert);

		$data_update = array(
            'status_room'=> 1
        );

		$update_status_room = $this->update->page_update_status_room($this->input->post('student_id'),$data_update
		  );
	
	}


//แสดงแก้ไขข้อมูลนักเรียนเข้าห้อง
	public function Get_StudentRoom($stdrid)
	{

		$data = new stdClass();
		$data->query = $this->query->page_Get_StudentRoom($stdrid);
		$tmp_c = $data->query;
		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	} 

//แก้ไขข้อมูลนักเรียนเข้าห้อง
	public function Update_StudentRoom($stdrid)
	{

		$room_id = $this->input->post('e_room_id');

		if($room_id){

			$data = array(
            'room_id'=>$room_id
        );

			$tb_student_room = $this->update->page_update_StudentRoom($stdrid,$data);
		}

	} 

//ลบข้อข้อมูลนักเรียนเข้าห้อง
	public function del_StudentRoom($stdrid)
	{	

		$data = new stdClass();

		$data_update = array(
            'status_room'=> 0
        );

		$data->query = $this->query->page_Get_StudentRoom($stdrid);

		$update_status_room = $this->update->page_update_status_room($data->query["student_id"],$data_update
		  );

	 	$this->delete->page_delete_StudentRoom($stdrid);

	}

//แสดงหน้าบันทึกเกรด : ค้นหารายการ
	public function list_student_score_search()
	{

		$data = new stdClass();
		$data->title = "แสดงหน้าบันทึกเกรด : ค้นหารายการ";
		$data->page_year = $this->query->page_year();

		$this->load->view('page/school/student/list_student_score_search',$data);
		
	}

//แสดงรายการกลุ่มวิชาแบบ json
	public function Get_group_subject_json()
	{	

		$data = new stdClass();
		$data->query = $this->query->page_subject_group();
		$tmp_c = [];
      $i = 0;

      foreach($data->query as $row) {

          $tmp_c[$i] = array('id'=>$row["sgid"],'text'=>$row["name_subject_group"]);
          $i++;
      }

		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	}


//แสดงรายการประเภทวิชาแบบ json
	public function Get_type_subject_json()
	{	

		$data = new stdClass();
		$data->query = $this->query->page_subject_type();
		$tmp_c = [];
      $i = 0;

      foreach($data->query as $row) {

          $tmp_c[$i] = array('id'=>$row["sjtid"],'text'=>$row["subject_type"]);
          $i++;
      }

		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	}


//แสดงรายการวิชาแบบ json
	public function Get_subject_json()
	{	

		$sgid = $this->input->post('sgid');
		$sjtid = $this->input->post('sjtid');

		$data = new stdClass();
		$data->query = $this->query->page_Get_subject_json($sgid,$sjtid);
		$tmp_c = [];
      $i = 0;

      foreach($data->query as $row) {

          $tmp_c[$i] = array('id'=>$row["sjid"],'text'=>$row["code_subject"]." ".$row["name_subject"]);
          $i++;
      }

		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	}


//แสดงเทอมแบบ json
	public function Get_term_json()
	{	

		$sjid = $this->input->post('sjid');
		$syid = $this->input->post('syid');

		$data = new stdClass();
		$data->query = $this->query->page_Get_term_json($sjid,$syid);
		$tmp_c = [];
      $i = 0;

      foreach($data->query as $row) {

          $tmp_c[$i] = array('id'=>$row["term"],'text'=>"เทอมที่ ".$row["term"]);
          $i++;
      }

		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	}

//แสดงห้องเรียนแบบ json
	public function Get_room_json()
	{	

		$sjid = $this->input->post('sjid');
		$syid = $this->input->post('syid');
		$term = $this->input->post('term');

		$data = new stdClass();
		$data->query = $this->query->page_Get_room_json($sjid,$syid,$term);
		$tmp_c = [];
      $i = 0;

      foreach($data->query as $row) {

          $tmp_c[$i] = array('id'=>$row["room_id"],'text'=>$row['degree_tag']." ".$row["class"]."/".$row["class_room"]);
          $i++;
      }

		$d = json_encode($tmp_c, JSON_UNESCAPED_UNICODE);
		echo $d;
	
	}


//แสดงหน้าบันทึกเกรด : บันทึกเกรด
	public function list_student_score($syid,$sgid,$sjtid,$sjid,$term,$room_id)
	{

		$data = new stdClass();
		$data->title = "แสดงหน้าบันทึกเกรด : บันทึกเกรด";
		$data->page_list_student_score_room = $this->query->page_list_student_score_room($syid,$sgid,$sjtid,$sjid,$term,$room_id);

		$data->row_score_room = $this->query->page_list_student_score_room_array($syid,$sgid,$sjtid,$sjid,$term,$room_id);

		$data->page_list_student_score = $this->query->page_list_student_score($syid,$sgid,$sjtid,$sjid,$term,$room_id);

		$this->load->view('page/school/student/list_student_score',$data);
	}  

//แสดงหน้าบันทึกเกรด : ดึงข้อมูล
	public function list_student_score_data()
	{

		$data = new stdClass();

		$number = $this->input->post('number');
		$subject_id = $this->input->post('subject_id');
		$student_id = $this->input->post('student_id');
		$unit = $this->input->post('unit');
		$term = $this->input->post('term');
		$year = $this->input->post('year');
		$room_id = $this->input->post('room_id');

		foreach ($number as $key => $id) {

			$subject_ids = $subject_id[$key];
			$student_ids = $student_id[$key];
			$units = $unit[$key];
			$terms = $term[$key];
			$years = $year[$key];
			$room_ids = $room_id[$key];
 			
 			$data->score_check = $this->query->page_list_student_score_check($subject_ids,$student_ids,$units,$terms,$years,$room_ids);

 			if($data->score_check == "0"){

 				$data_check = array(

								'subject_id' => $subject_ids,
								'student_id' => $student_ids,
								'unit' => $units,
								'creation_date'=> date("Y-m-d H:i:s"),
								'term' => $terms,
								'year' => $years,
								'room_id' => $room_ids,
								'school_id'=>$_SESSION["school_id"]

							);

		 		$tb_grade = $this->insert->page_add_grade($data_check);

 			}

		}

	}


//แสดงหน้าบันทึกเกรด : แก้ไขเกรด
	public function update_student_score_data()
	{

		$did = $this->input->post('did');
		$grade = $this->input->post('grade');

		$data = array(
					'grade' => $grade,
					'creation_date'=> date("Y-m-d H:i:s")
					);

		$tb_grade = $this->update->page_update_student_score_data($did,$data);

	}

//แสดงหน้าบันทึกเกรด : แก้ไขหมายเหตุ
	public function update_student_note_data()
	{

		$did = $this->input->post('did');
		$note = $this->input->post('note');

		$data = array(
					'note' => $note,
					'creation_date'=> date("Y-m-d H:i:s")
					);

		$tb_grade = $this->update->page_update_student_score_data($did,$data);

	}

////////////// End. จัดการนักเรียน //////////////


////////////// จัดการครู / บุคลากร //////////////

//แสดงหน้ารายชื่อครู
	public function list_teacher()
	{	
		$data = new stdClass();
		$data->title = "แสดงข้อมูลครู";
		$data->page_list_teacher = $this->query->page_list_teacher();
		$this->load->view('page/school/teacher/list_teacher',$data);
	}

//แบบฟอร์มเพิ่มข้อมูลครู
	public function form_add_teacher()
	{	
		$data = new stdClass();
		$data->title = "เพิ่มข้อมูลครู";
		
		$this->load->view('page/school/teacher/form_add_teacher',$data);

	}

//เพิ่มข้อมูลข้อมูลครู
	public function add_teacher()
	{	
		
		$config['upload_path'] = 'assets/images/users';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);

        if($this->upload->do_upload("files")){
           $data = array('upload_data' => $this->upload->data());
           
            $data = array(
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'image' => $data['upload_data']['file_name'],
				'create'=> date("Y-m-d H:i:s"),
				'type_id'=> 3,
				'last_login'=> 0,
				'status'=> 1,
				'school_id'=> $_SESSION["school_id"]							
			);

            $tb_teacher = $this->insert->page_add_teacher($data);

    	}else{
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
            }
		
	}


//แบบฟอร์มแก้ไขข้อมูลครู
	public function form_update_teacher($aid)
	{	
		$data = new stdClass();
		$data->title = "แก้ไขข้อมูลครู";
		$data->row = $this->query->page_list_update_teacher($aid);
		$this->load->view('page/school/teacher/form_update_teacher',$data);
	}


//แก้ไขข้อมูลครู
	public function update_teacher($aid)
	{	
		$data_update = $this->input->post();
		$config['upload_path'] = 'assets/images/users';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

	     if($this->upload->do_upload("files")){

            $data = array('upload_data' => $this->upload->data());

            $name_image = $this->input->post('image');

			$data_update["files"] = $data['upload_data']['file_name'];

			$tb_teacher = $this->update->page_update_teacher($aid,$data_update,$name_image);

	      }else{

	      		$name_image = "";
                $tb_teacher = $this->update->page_update_teacher($aid,$data_update,$name_image);
            }

	}

//ลบข้อมูลครู
	public function del_teacher($aid)
	{

	 $this->delete->page_delete_teacher($aid);

	}

////////////// End. จัดการครู / บุคลากร //////////////


////////////// จัดการห้องเรียน //////////////
	//จัดการห้องเรียน
	public function room_class()
	{
		$data = new stdClass();
		$data->title = 'จัดการระดับชั้น';
		$data->data_room = $this->query->data_room();
		$this->load->view('page/school/class_room/class_room',$data);
	}
//เพิ่มห้องเรียน
	public function add_room()
	{
		$data['title'] = 'เพิ่มห้องเรียน';
		if ($this->input->post(NULL, TRUE)) {
			$data = array(
				'room_no' => $this->input->post('room_no'),
				'room_name' => $this->input->post('room_name'),
				'room_degree_id' => $this->input->post('rdid'),
				'class' => $this->input->post('class_'),
				'class_room' => $this->input->post('class_room'),
				'school_id' => $_SESSION['school_id']
			);
			$this->insert->insert_data_room($data);
		}else {
			$data['room_degree'] = $this->query->get_tb_room_degree();
			$this->load->view('page/school/class_room/add_room',$data);
		}
	}
//แก้ไขห้องเรียน
	public function update_room_class($id){
		$data['title'] = 'แก้ไขห้องเรียน';
		if ($this->input->post(NULL, TRUE)) {
			$data = array(
				'room_no' => $this->input->post('room_no'),
				'room_name' => $this->input->post('room_name'),
				'room_degree_id' => $this->input->post('rdid'),
				'class' => $this->input->post('class_'),
				'class_room' => $this->input->post('class_room')
			);
			$this->update->update_data_room($id,$data);
		}else {
			$data['data_room'] = $this->query->get_data_room_form_id($id);
			$data['room_degree'] = $this->query->get_tb_room_degree();
			$this->load->view('page/school/class_room/update_room',$data);
		}
		
	}
//ลบห้องเรียน
	public function delete_room($id)
	{
	 	$this->delete->delete_room($id);
	}

////////////// End. จัดการห้องเรียน //////////////

//////////////  จัดการรายวิชา //////////////

//แสดงรายวิชา
public function subject()
{
	 $data['data_subject'] = $this->query->data_subject();
	 $data['title'] = "จัดการรายวิชา";
	 $this->load->view('page/school/subject/subject',$data);
}

//เพิ่มรายวิชา
public function add_subject()
{
	$data['title'] = 'เพิ่มรายวิชา';
	if ($this->input->post(NULL, TRUE)) {
		$data = array(
			'name_subject' => $this->input->post('name_subject'),
			'code_subject' => $this->input->post('code_subject'),
			'initials' => $this->input->post('initials'),
			'unit' => $this->input->post('unit'),
			'group_subject_id' => $this->input->post('group_subject_id'),
			'school_id' => $_SESSION['school_id'],
			'subject_id' => $this->input->post('subject_id')
		);
		$this->insert->insert_data_subject($data);
	}else {
		$data['subject_group'] = $this->query->get_subject_group();
		$data['subject_type'] = $this->query->get_type_subject();
		$this->load->view('page/school/subject/add_subject',$data);
	}
}

//แก้ไขรายวิชา
public function update_subject($id)
{
	$data['title'] = 'แก้ไขรายวิชา';
	if ($this->input->post(NULL, TRUE)) {
		$data = array(
			'name_subject' => $this->input->post('name_subject'),
			'code_subject' => $this->input->post('code_subject'),
			'initials' => $this->input->post('initials'),
			'unit' => $this->input->post('unit'),
			'group_subject_id' => $this->input->post('group_subject_id'),
			'subject_id' => $this->input->post('subject_id')
		);
		$this->update->update_data_subject($id,$data);
	}else {
		$data['data_subject'] = $this->query->data_subject_form_id($id);
		$data['subject_group'] = $this->query->get_subject_group();
		$data['subject_type'] = $this->query->get_type_subject();
		$this->load->view('page/school/subject/update_subject',$data);
	}
}

//ลบรายวิชา
public function delete_subject($id)
{
	 $this->delete->delete_subject($id);
}


////////////// End. จัดการรายวิชา //////////////


//////////////  จัดการกลุ่มวิชา //////////////

public function subject_group()
{
	 $data['data_subject_group'] = $this->query->get_subject_group();
	 $data['title'] = "จัดการกลุ่มวิชา";
	 $this->load->view('page/school/subject/subject_group/subject_group',$data);
}

//เพิ่มกลุ่มวิชา
public function add_subject_group()
{
	if ($this->input->post(NULL, TRUE)) {
		$data = array(
			'name_subject_group' => $this->input->post('name_subject_group'),
			'school_id' => $_SESSION['school_id']
		);
		$this->insert->insert_data_subject_group($data);
	}
}

public function update_subject_group($id)
{
	$data['title'] = 'แก้ไขกลุ่มวิชา';
	if ($this->input->post(NULL, TRUE)) {
		$data = array(
			'name_subject_group' => $this->input->post('name_subject_group'),
		);
		$this->update->update_data_subject_group($id,$data);
	}else{
		echo json_encode($this->query->get_subject_group_from_id($id)); 
	}
}

//ลบกลุ่มวิชา
public function delete_subject_group($id)
{
	 $this->delete->delete_subject_group($id);
}


//////////////  End. จัดการกลุ่มวิชา //////////////

//////////////   จัดการการลงทะเบียนรายวิชา //////////////
public function registered_subjects()
{
	$data['title'] = 'ลงทะเบียนรายวิชา';
	$data['data_registered_subjects'] = $this->query->data_registered_subjects($_SESSION['school_id']);
	$this->load->view('page/school/registered_subjects/registered_subjects',$data);
}

public function add_registered_subjects()
{
	$data['title'] = 'เพิ่มลงทะเบียนรายวิชา';
	if ($this->input->post(NULL, TRUE)) {
		$data = array(
			'subject_id' => $this->input->post('subject_id'),
			'users_id' => $this->input->post('users_id'),
			'room_id' => $this->input->post('room_id'),
			'year' => $this->input->post('year'),
			'term' => $this->input->post('term'),
			'saved_by' => $_SESSION['user_id'],
			'school_id' => $_SESSION['school_id'],
		);
		$this->insert->add_registered_subjects($data);
	}else{
		$data['data_subject_group'] = $this->query->select_data_subject_group();
		$data['data_teacher'] = $this->query->select_data_teacher();
		$data['data_room'] = $this->query->select_data_room();
		$data['data_degree'] = $this->query->select_data_room_degree();
		$data['data_year'] = $this->query->select_data_year();
		$this->load->view('page/school/registered_subjects/add_registered_subjects',$data);
	}
}

public function select_data_subject($id){
	echo json_encode($this->query->select_data_subject_where($id));
}

public function select_data_class($id){
	echo json_encode($this->query->select_data_class($id));
}

public function select_data_room_where($rdid,$classid){
	echo json_encode($this->query->select_data_room_where($rdid,$classid));
}

public function update_registered_subjects($id)
{
	$data['title'] = 'แก้ไขลงทะเบียนรายวิชา';
	if ($this->input->post(NULL, TRUE)) {

		$data = array(
			'subject_id' => $this->input->post('subject_id'),
			'users_id' => $this->input->post('users_id'),
			'room_id' => $this->input->post('room_id'),
			'year' => $this->input->post('year'),
			'term' => $this->input->post('term'),
			'saved_by' => $_SESSION['user_id'],
			'school_id' => $_SESSION['school_id'],
		);
		$this->update->update_registered_subjects($id,$data);
	}else{
		$data['data_registered_subjects'] = $this->query->get_data_registered_subjects_form_id($id);
		$data['data_subject_group'] = $this->query->select_data_subject_group();
		$data['data_subject'] = $this->query->select_data_subject();
		$data['data_teacher'] = $this->query->select_data_teacher();
		$data['data_room'] = $this->query->select_data_room();
		$data['data_year'] = $this->query->select_data_year();
		$data['data_degree'] = $this->query->select_data_room_degree();
		$this->load->view('page/school/registered_subjects/update_registered_subjects',$data);
	}
}

public function update_registered_subjects($id)
{
	$data['title'] = 'แก้ไขลงทะเบียนรายวิชา';
	if ($this->input->post(NULL, TRUE)) {

		$data = array(
			'subject_id' => $this->input->post('subject_id'),
			'users_id' => $this->input->post('users_id'),
			'room_id' => $this->input->post('room_id'),
			'year' => $this->input->post('year'),
			'term' => $this->input->post('term'),
			'saved_by' => $_SESSION['user_id'],
			'school_id' => $_SESSION['school_id'],
		);
		$this->update->update_registered_subjects($id,$data);
	}else{
		$data['data_registered_subjects'] = $this->query->get_data_registered_subjects_form_id($id);
		$data['data_subject_group'] = $this->query->select_data_subject_group();
		$data['data_subject'] = $this->query->select_data_subject();
		$data['data_teacher'] = $this->query->select_data_teacher();
		$data['data_room'] = $this->query->select_data_room();
		$data['data_year'] = $this->query->select_data_year();
		$data['data_degree'] = $this->query->select_data_room_degree();
		$this->load->view('page/school/registered_subjects/update_registered_subjects',$data);
	}
}


//ลบกลุ่มวิชา
public function delete_registered_subjects($id)
{
	 $this->delete->delete_registered_subjects($id);
}

//////////////  End. จัดการการลงทะเบียนรายวิชา //////////////




}
