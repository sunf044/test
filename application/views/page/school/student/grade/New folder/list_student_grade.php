<?php $this->load->view('template/header'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <h3 class="content-header-title white"><?php echo $title; ?></h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
              <!-- เริ่ม: เนื้อหา -->
            
               <!-- Restore & show all table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">รายการเกรดนักเรียน</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">

                                             <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddStudentGrade">
                                             <i class="fas fa-plus-square mr-2"></i> เพิ่มเกรดนักเรียน
                                            </button></li>

                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

<!--                                             <li><a data-action="close"><i class="ft-x"></i></a></li>
 -->                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">

                                <?php if ( ! empty($page_list_grade_student)){ ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                          

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                         <th class="text-center font-weight-bold" style="width: 10px">ที่</th>
                                                          <th class="text-center">ชื่อกลุ่มวิชา</th>
                                                          <th class="text-center">ชื่อ - สกุล</th>
                                                          <th class="text-center">รหัสวิชา</th>
                                                          <th class="text-center">รายชื่อวิชา</th>
                                                          <th class="text-center">หน่วยกิต</th>
                                                          <th class="text-center">เกรด</th>
                                

                                                        <th class="text-center">แก้ไข / ลบ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0 ; foreach ($page_list_grade_student as $row) {?>

                                                    <tr class="text-center">
                                                        <td class="text-center font-weight-bold">
                                                            <?= ++$i; ?>
                                                        </td>
                                                        <td class="text-center"><?= $row['name_subject_group']; ?></td>
                                                        <td>
                                                            <?= $row['first_name']; ?> <?= $row['last_name']; ?>
                                                        </td>
                                                        <td class="text-center"><?= $row['code_subject']; ?></td>
                                                        <td class="text-center"><?= $row['name_subject']; ?></td>
                                                        <td class="text-center"><?= $row['unit']; ?></td>
                                                        <td class="text-center"><?= $row['grade']; ?></td>
                                                       
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-warning text-white" onclick="showModalEditStudentGrade(<?= $row['did']; ?>);">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                             / 
                                                            <button type="button" class="btn btn-danger" onclick="del(<?= $row['did']; ?>);">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                    </div>

                                <?php } else { ?>
                                  <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h1><i class="icon fas fa-exclamation-triangle"></i> Alert!</h1>
                                    ไม่พบข้อมูล.
                                  </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Restore & show all table -->


              <!-- สินสุด: เนื้อหา -->
            </div>
        </div>
    </div>
    <!-- END: Content-->


<!-- Modal add -->
     <div class="modal fade text-left" id="modalAddStudentGrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="myModalLabel33">เพิ่มเกรดนักเรียน</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="form_addStudentRoom" class="needs-validation" novalidate>
                    <div class="modal-body">
                       <div class="row">

                         <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="student_id">นักเรียน</label>
                                <select class="select2 form-control" id="student_id" name="student_id" style="width: 100%;" required>
                                    <option value="" selected disabled>-- เลือกนักเรียน --</option>
                                    <?php foreach($page_student_room as $row) { ?>
                                        <option name="<?= $row['sdid']; ?>" value="<?= $row['sdid']; ?>">
                                            <?= $row['first_name']; ?> <?= $row['last_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    กรุณาเลือกนักเรียน
                                </div>
                            </div>
                        </div>


                         <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="student_id">กลุ่มวิชา</label>
                                <select class="select2 form-control" id="sgid" name="sgid" style="width: 100%;" required>
                                    <option value="" selected disabled>-- เลือกกลุ่มวิชา --</option>
                                    <?php foreach($page_subject_group as $row) { ?>
                                        <option name="<?= $row['sgid']; ?>" value="<?= $row['sgid']; ?>">
                                            <?= $row['name_subject_group']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    กรุณาเลือกกลุ่มวิชา
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="student_id">รายการวิชา</label>
                                <select class="select2 form-control" id="sjid" name="sjid" style="width: 100%;" required>
                                    <option value="" selected disabled>-- เลือกวิชา --</option>
                                   
                                </select>
                                <div class="invalid-feedback">
                                    กรุณาเลือกรายการวิชา
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="first_name">หน่วยกิต <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" onKeyUp="IsNumber(this.value,this)" id="unit" name="unit" placeholder="หน่วยกิต" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกหน่วยกิต
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="first_name">เกรด <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" onKeyUp="IsNumber(this.value,this)" id="grade" name="grade" placeholder="เกรด" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกเกรด
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="first_name">หมายเหตุ <small class="text-danger">*</small></label>
                                <textarea class="form-control" id="note" name="note" placeholder="หมายเหตุ" required></textarea>
                                <div class="invalid-feedback">
                                    กรุณากรอกหมายเหตุ   
                                </div>
                            </div>
                        </div>

                      <!--    <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label for="room_id">ห้องเรียน</label>
                                <select class="select2 form-control" id="room_id" name="room_id" style="width: 100%;" required>
                                    <option value="" selected disabled>-- เลือกห้องเรียน --</option>
                                    <?php foreach($getAllRoom as $row) { ?>
                                        <option name="<?= $row['rid']; ?>" value="<?= $row['rid']; ?>">
                                            <?= $row['degree_tag']; ?> <?= $row['class']; ?>/<?= $row['class_room']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    กรุณาเลือกห้องเรียน
                                </div>
                            </div>
                        </div> -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="บันทึก">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="ยกเลิก">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End modal add -->


<!-- Modal Edit -->
<!--      <div class="modal fade text-left" id="modalEditStudentRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="myModalLabel33">แก้ไขห้องนักเรียน</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="form_EditStudentRoom" class="needs-validation" novalidate>
                    <div class="modal-body">
                       <div class="row">

                        <input type="hidden" class="form-control" id="stdrid" name="stdrid">

                        <div class="col-lg-12 col-md-12 col-12">
                            <p><span class="text-primary">ชื่อนักเรียน : </span><span id="name_student"></span></p>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="room_id">ห้องเรียน</label>
                                <select class="select2 form-control" id="e_room_id" name="e_room_id" style="width: 100%;" required>

                                    <?php foreach($getAllRoom as $row) { ?>
                                        <option name="<?= $row['rid']; ?>" value="<?= $row['rid']; ?>">
                                            <?= $row['degree_tag']; ?> <?= $row['class']; ?>/<?= $row['class_room']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    กรุณาเลือกห้องเรียน
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="บันทึก">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="ยกเลิก">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
<!-- End modal Edit -->




<?php $this->load->view('template/footer'); ?>


<script>
  $(document).ready(function() {
    
    $(".ft-rotate-cw").click(function()
    {
      location.reload();
    });


  $('#sgid').change(function(){

     $('#sjid').html('').select2({data: [{id: '', text: '-- เลือกวิชา --'}]});

     var sgid =$(this).val();

     $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>School/Get_subject_json/" + sgid,
            dataType: 'json',
            cache: false,
            success: function(data) {

                $("#sjid").select2({data});
            },


        });

  });

























    /* ------------------------- Add room ------------------------- */
    $('#form_addStudentRoom').submit(function(e) { 
        e.preventDefault();
        
        var student_id = document.getElementById("student_id").value;
        var room_id = document.getElementById("room_id").value;
        
       
        if(student_id == "" || 
            room_id == "" 
        ) {

            Swal.fire({
                title: 'ผิดพลาด!',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                confirmButtonText: 'ตกลง'
            })

        } else {
            Swal.fire({
                title: 'รอสักครู่ ...',
                html: 'ระบบกำลังตรวจสอบข้อมูล',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timer: 1000,
                onOpen: () => {
                    swal.showLoading();
                }
            }).then(() => {
                $.ajax({
                    url: '<?php echo base_url('School/addStudentRoom/');?>',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                              title: "สำเร็จ!",
                              text: "ทำการเพิ่มเกรดนักเรียนเรียบร้อยแล้ว?",
                              type: "success",
                              showCancelButton: false,
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "ตกลง"
                            },
                            function(isConfirm){

                            if (isConfirm) {

                              setTimeout(function() {
                                    $(location).attr("href", "<?php echo base_url('School/list_student_room/');?>");
                                  }, 1500);

                              }

                            });

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                title: 'ผิดพลาด!',
                                text: 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                                type: 'error',
                                confirmButtonText: 'ตกลง'
                        })
                    }
                });
            })
        }
        
    });
    /* ------------------------- End add room ------------------------- */

});

  /* ------------------------- Show modal edit room_id ------------------------- */
    function showModalEditStudentRoom(stdrid) {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>School/Get_StudentRoom/" + stdrid,
            dataType: 'json',
            success: function(data) {
                $('#stdrid').val(stdrid);
                $('#name_student').html(data.first_name + " " + data.last_name);
                $('#e_room_id').val(data.room_id).trigger('change');
                $('#modalEditStudentRoom').modal('show');

                console.log(data.room_id);
            }
        });
    }
    /* ------------------------- End show modal edit room_id ------------------------- */


    /* ------------------------- Edit room ------------------------- */
    $('#form_EditStudentRoom').submit(function(e) {
        e.preventDefault();

        var stdrid = document.getElementById("stdrid").value;
        var e_room_id = document.getElementById("e_room_id").value;
       
        if(stdrid == "" || 
            e_room_id == "" 
        ) {

            Swal.fire({
                title: 'ผิดพลาด!',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                confirmButtonText: 'ตกลง'
            })

        } else {
            Swal.fire({
                title: 'รอสักครู่ ...',
                html: 'ระบบกำลังตรวจสอบข้อมูล',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timer: 1000,
                onOpen: () => {
                    swal.showLoading();
                }
            }).then(() => {
                $.ajax({
                    url: '<?php echo base_url('School/Update_StudentRoom/');?>'+ stdrid,
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                              title: "สำเร็จ!",
                              text: "ทำการแก้ไขเกรดนักเรียนเรียบร้อยแล้ว?",
                              type: "success",
                              showCancelButton: false,
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "ตกลง"
                            },
                            function(isConfirm){

                            if (isConfirm) {

                              setTimeout(function() {
                                    $(location).attr("href", "<?php echo base_url('School/list_student_room/');?>");
                                  }, 1500);

                              }

                            });

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                title: 'ผิดพลาด!',
                                text: 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                                type: 'error',
                                confirmButtonText: 'ตกลง'
                        })
                    }
                });
            })
        }
    });

    /* ------------------------- End edit room ------------------------- */

  function del(stdrid)
  { 
    swal({
      title: "ยืนยันการลบข้อมูล!",
      text: "คุณต้องการลบข้อมูลหรือไม่?",
      type: "warning",
      showCancelButton: true,
      cancelButtonColor: '#d33',
      cancelButtonText: 'ยกเลิก',
      confirmButtonClass: "btn-danger",
      confirmButtonText: "ตกลง",
      closeOnConfirm: false
    },
    function(isConfirm){

        if (isConfirm) {

           $.post("<?php echo base_url('School/del_StudentRoom/');?>"+stdrid)

           swal({
              title: "สำเร็จ!",
              text: "ลบข้อมูลสำเร็จ?",
              type: "success",
              showCancelButton: false,
              confirmButtonClass: "btn-success",
              confirmButtonText: "ตกลง"
            },
            function(){

              setTimeout(function() {
                    $(location).attr("href", "<?php echo base_url('School/list_student_room/');?>");
                  }, 1500);

            });

        }
        else{

              Swal.fire({
                    title: 'ผิดพลาด!',
                    text: 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                    type: 'error',
                    confirmButtonText: 'ตกลง'
                })

           }

    });
  }
</script>

<script language="javascript">
function IsNumber(sText,obj)
{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
        if(IsNumber==false){

           swal({
              title: "แจ้งเตือน!",
              text: "กรุณาใส่ข้อมูลเป็นตัวเลข",
              type: "warning",
              showConfirmButton: true,
               confirmButtonClass: "btn-success",
               confirmButtonText: "ตกลง",
              });
             
            obj.value=sText.substr(0,sText.length=close);
        }
   }
</script>