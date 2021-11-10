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
            
              <section class="add__student form__design">
                    <div class="container">
                        <form action="#" method="post" id="form_update_student" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header bg-night-light">
                                    <h5 class="font-weight-bold mb-0">
                                        แก้ไขข้อมูลนักเรียน
                                    </h5>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" class="form-control" id="sdid" name="sdid" value="<?= $row['sdid']; ?>">

                                    <input type="hidden" class="form-control" id="image" name="image" value="<?= $row['image']; ?>">

                                    <input type="hidden" class="form-control" id="status_room" name="status_room" value="<?= $row['status_room']; ?>">


                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="sub_title">
                                            ข้อมูลส่วนตัว
                                        </div>
                                        <a role="button" class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#form-info" aria-expanded="false" aria-controls="form-info">
                                            <div class="arrow my-auto">
                                                <span class="text"></span>
                                                <i class="fas fa-eye-slash text-white"></i>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="collapse show" id="form-info">
                                        <div class="form-row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="first_name">ชื่อผู้ใช้ของนักเรียน <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="ชื่อผู้ใช้ของนักเรียน" onKeyUp="Iscard(this.value,this)" minlength="13" maxlength="13" value="<?php echo $row["student_name"];?>" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกชื่อผู้ใช้ของนักเรียน
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="first_name">เปลี่ยนรหัสผ่าน <small class="text-danger">*</small></label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกรหัสผ่าน
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">ชื่อจริง <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อจริง" value="<?php echo $row["first_name"];?>" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกชื่อจริง
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">นามสกุล <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" value="<?php echo $row["last_name"];?>" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกนามสกุล
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nationality">เบอร์โทร <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="phone_number" id="phone_number" onKeyUp="IsNumer(this.value,this)" placeholder="เบอร์โทร" maxlength="10" value="<?php echo $row["phone_number"];?>" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกเบอร์โทร
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="race">อีเมล <small class="text-danger">*</small></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" value="<?php echo $row["email"];?>" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกอีเมล
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if($row["status_room"] == "1"){?>
                                            <hr>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <div class="sub_title">
                                                        ข้อมูลรายละเอียด
                                                    </div>
                                                    <a role="button" class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#form-detail" aria-expanded="false" aria-controls="form-detail">
                                                        <div class="arrow my-auto">
                                                            <span class="text"></span>
                                                            <i class="fas fa-eye-slash text-white"></i>
                                                        </div>
                                                    </a>
                                                </div>

                                                 <div class="collapse show" id="form-detail">
                                                    <div class="form-row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="first_name">วัน/เดือน/ปีเกิด <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="วัน/เดือน/ปีเกิด" value="<?php if(isset($detail['birthday'])){ echo $detail['birthday']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก วัน/เดือน/ปีเกิด
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="race">เชื้อชาติ <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="race" name="race" placeholder="เชื้อชาติ" value="<?php if(isset($detail['race'])){ echo $detail['race']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกเชื้อชาติ
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="nationality">สัญชาติ <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="สัญชาติ" value="<?php if(isset($detail['nationality'])){ echo $detail['nationality']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกสัญชาติ
                                                            </div>
                                                        </div>
                                                    </div>


                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="religion">ศาสนา <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="religion" name="religion" placeholder="ศาสนา" value="<?php if(isset($detail['religion'])){ echo $detail['religion']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกศาสนา
                                                            </div>
                                                        </div>
                                                    </div>


                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="home_number">บ้านเลขที่ <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="home_number" name="home_number" placeholder="บ้านเลขที่" value="<?php if(isset($detail['home_number'])){ echo $detail['home_number']; } ?>" >
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกบ้านเลขที่
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="swine">หมู่ที่</label>
                                                            <input type="number" class="form-control" id="swine" name="swine" placeholder="หมู่ที่" value="<?php if(isset($detail['swine'])){ echo $detail['swine']; } ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="alley">ซอย</label>
                                                            <input type="text" class="form-control" id="alley" name="alley" placeholder="ซอย" value="<?php if(isset($detail['alley'])){ echo $detail['alley']; } ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="road">ถนน</label>
                                                            <input type="text" class="form-control" id="road" name="road" placeholder="ถนน" value="<?php if(isset($detail['road'])){ echo $detail['road']; } ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="district">ตำบล <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="district" name="district" placeholder="ตำบล" value="<?php if(isset($detail['district'])){ echo $detail['district']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกตำบล
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="canton">อำเภอ <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="canton" name="canton" placeholder="อำเภอ" value="<?php if(isset($detail['canton'])){ echo $detail['canton']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกอำเภอ
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="province">จังหวัด <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" id="province" name="province" placeholder="จังหวัด" value="<?php if(isset($detail['province'])){ echo $detail['province']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกจังหวัด
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="postcode">รหัสไปรษณีย์ <small class="text-danger">*</small></label>
                                                            <input type="number" class="form-control" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์" oninput="javascript: if(this.value.length > this.maxLength) { this.value = this.value.slice(0, this.maxLength); }" maxlength = "5" value="<?php if(isset($detail['postcode'])){ echo $detail['postcode']; } ?>">
                                                            <div class="invalid-feedback">
                                                                กรุณากรอกรหัสไปรษณีย์
                                                            </div>
                                                        </div>
                                                    </div>


                                                  </div>
                                             </div>

                                        <?php }?>

                                    </div>
                                    
                                    <hr>

                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="sub_title">
                                            รูปประจำตัว <small class="text-danger">*</small>
                                        </div>
                                        <a role="button" class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#form-image" aria-expanded="false" aria-controls="form-image">
                                            <div class="arrow my-auto">
                                                <span class="text"></span>
                                                <i class="fas fa-eye-slash text-white"></i>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="collapse show" id="form-image">
                                        <div class="form-row">

                                        <?php if($row['image'] != ""){?>
                                            <div class="col-12">
                                                <div align="center">
                                                <img src="<?= base_url() ?>assets/uploads/students/<?= $row['image']; ?>" class="img-fluid rounded" width="200px" height="200px">
                                                </div>
                                                </br>        
                                            </div>
                                        <?php }?>
                                            <div class="col-12">
                                                <div class="file-loading">
                                                <input type="file" id="files" name="files" class="file form-control" data-browse-on-zone-click="true" accept="image/*" aria-label="file example" required>
                                            </div>
                                                 </p>
                                                 <small class="text-danger">*เฉพาะไฟล์ jpeg, jpg และ png เท่านั้น</small>

                                                </div>

                                            </div>
                                        </div>

                                      <div class="card-footer" style="margin-top:15px;">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save mr-2"></i>บันทึก
                                            </button>
                                            <button type="reset" class="btn btn-danger">
                                                <i class="fas fa-redo-alt mr-2"></i>รีเซ็ต
                                            </button>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </section>


              <!-- สินสุด: เนื้อหา -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $this->load->view('template/footer'); ?>

<script>
  $(document).ready(function() {
    
    $(".ft-rotate-cw").click(function()
    {
      location.reload();
    });


     var d = new Date();
        d.setDate(d.getDate());
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear()+543);

        $("#birthday").datepicker({
              changeMonth: true, 
              changeYear: true, 
              dateFormat: 'dd/mm/yy', 
              isBuddhist: true, 
              defaultDate: toDay, 
              dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              yearRange: "c-50:c+0",
              dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
              monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
              monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
        });

});
</script>

<script>
   
/* ------------------------- Upload image file ------------------------- */
$(document).ready(function() {
    $("#files").fileinput({
            language: "th",
            // uploadUrl: "/site/test-upload",
            initialPreviewAsData: true,
            enableResumableUpload: true,
            showUpload: false,
            // // maxFileCount: 3,
            overwriteInitial: false,
            theme: 'fas',
            deleteUrl: '/site/file-delete/',
            fileActionSettings: {
                showZoom: function(config) {
                    if (config.type === 'image') {
                        return true;
                    }
                    return false;
                }
            },
            allowedFileExtensions: ["jpeg", "jpg", "png"]
        });
    });
    /* ------------------------- End upload image file ------------------------- */

    /* ------------------------- Add student ------------------------- */
    $('#form_update_student').submit(function(e) { 
        e.preventDefault();
        
        var sdid = document.getElementById("sdid").value;
        var student_name = document.getElementById("student_name").value;
        var password = document.getElementById("password").value;
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var phone_number = document.getElementById("phone_number").value;
        var email = document.getElementById("email").value;
        var files = document.getElementById("files").value;
        var image = document.getElementById("image").value;
        var status_room = document.getElementById("status_room").value;


        if(student_name.length == 13){
       
        if(sdid == "" ||
            student_name == "" || 
            first_name == "" || 
            last_name == "" || 
            phone_number == "" || 
            email == "" ||
            status_room == ""
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
                    url: '<?php echo base_url('School/update_student/');?>'+ sdid,
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        
                        swal({
                              title: "สำเร็จ!",
                              text: "ทำการแก้ไขข้อมูลนักเรียนเรียบร้อยแล้ว?",
                              type: "success",
                              showCancelButton: false,
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "ตกลง"
                            },
                            function(isConfirm){

                            if (isConfirm) {

                              setTimeout(function() {
                                    $(location).attr("href", "<?php echo base_url('School/list_student/');?>");
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

        }else{

            Swal.fire({
                title: 'ผิดพลาด!',
                text: 'กรุณาใส่ข้อมูลเป็นตัวเลขบัตรประชาชน 13 หลัก',
                type: 'error',
                confirmButtonText: 'ตกลง'
            })
        }
    });
    /* ------------------------- End add student ------------------------- */
</script>

<script language="javascript">
function IsNumer(sText,obj)
{
   var ValidChars = "0123456789";
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

<script language="javascript">
function Iscard(sText,obj)
{
   var ValidChars = "0123456789";
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
              text: "กรุณาใส่ข้อมูลเป็นตัวเลขบัตรประชาชน 13 หลัก",
              type: "warning",
              showConfirmButton: true,
               confirmButtonClass: "btn-success",
               confirmButtonText: "ตกลง",
              });
             
            obj.value=sText.substr(0,sText.length=close);
        }
   }
</script>