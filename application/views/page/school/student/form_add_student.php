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
                        <form action="#" method="post" id="form_addstudent" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header bg-night-light">
                                    <h5 class="font-weight-bold mb-0">
                                        เพิ่มนักเรียน
                                    </h5>
                                </div>
                                <div class="card-body">

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
                                                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="ชื่อผู้ใช้ของนักเรียน" onKeyUp="Iscard(this.value,this)" minlength="13" maxlength="13" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกชื่อผู้ใช้ของนักเรียน
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="first_name">รหัสผ่าน <small class="text-danger">*</small></label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกรหัสผ่าน
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">ชื่อจริง <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อจริง" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกชื่อจริง
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">นามสกุล <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกนามสกุล
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nationality">เบอร์โทร <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="phone_number" id="phone_number" onKeyUp="IsNumer(this.value,this)" placeholder="เบอร์โทร" maxlength="10" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกเบอร์โทร
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="race">อีเมล <small class="text-danger">*</small></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกอีเมล
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
    $('#form_addstudent').submit(function(e) { 
        e.preventDefault();
        
        var student_name = document.getElementById("student_name").value;
        var password = document.getElementById("password").value;
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var phone_number = document.getElementById("phone_number").value;
        var email = document.getElementById("email").value;
        var files = document.getElementById("files").value;

        if(student_name.length == 13){
       
        if(student_name == "" || 
            password == "" || 
            first_name == "" || 
            last_name == "" || 
            phone_number == "" || 
            email == "" || 
            files == ""
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
                    url: '<?php echo base_url('School/add_student/');?>',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                              title: "สำเร็จ!",
                              text: "ทำการเพิ่มนักเรียนเรียบร้อยแล้ว?",
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