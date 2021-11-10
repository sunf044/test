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
                    <form action="#" method="post" id="form_room" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-night-light">
                                <h5 class="font-weight-bold mb-0">
                                    แก้ไขข้อมูลรายวิชา
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="sub_title">
                                        ข้อมูลรายวิชา
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">ชื่อวิชา <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" id="name_subject" name="name_subject"  placeholder="ชื่อวิชา" value="<?= $data_subject['name_subject']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="first_name">รหัสวิชา <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" id="code_subject" name="code_subject" placeholder="รหัสวิชา" value="<?= $data_subject['code_subject']; ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="first_name">ชื่อย่อวิชา <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" id="initials" name="initials" placeholder="ชื่อย่อวิชา" value="<?= $data_subject['initials']; ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="first_name">หน่วยกิต <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" onKeyUp="IsNumer(this.value,this)" id="unit" name="unit" placeholder="หน่วยกิต" value="<?= $data_subject['unit']; ?>" required>

                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="room_id">กลุ่มวิชา</label>
                                                <select class="select2 form-control" id="group_subject_id" name="group_subject_id" style="width: 100%;" required>
                                                    <?php foreach ($subject_group as $data) { ?>
                                                        <option value="<?php echo $data->sgid; ?>" <?php if($data->sgid == $data_subject['group_subject_id']){echo "selected";} ?>>
                                                            <?php echo $data->name_subject_group; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="room_id">ประเภทวิชา</label>
                                                <select class="select2 form-control" id="subject_id" name="subject_id" style="width: 100%;" required>
                                                    <?php foreach ($subject_type as $data) { ?>
                                                        <option value="<?php echo $data->sjtid; ?>" <?php if($data->sjtid == $data_subject['subject_id']){echo "selected";} ?>>
                                                            <?php echo $data->subject_type; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
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

        $(".ft-rotate-cw").click(function() {
            location.reload();
        });

    });
</script>

<script>
    /* ------------------------- Add room ------------------------- */
    $('#form_room').submit(function(e) {
        e.preventDefault();

        var name_subject = document.getElementById("name_subject").value;
        var code_subject = document.getElementById("code_subject").value;
        var initials = document.getElementById("initials").value;
        var unit = document.getElementById("unit").value;
        var group_subject_id = document.getElementById("group_subject_id").value;
        var subject_id = document.getElementById("subject_id").value;

        if (name_subject == "" ||
        code_subject == "" ||
        initials == "" ||
        unit == "" ||
        group_subject_id == "" ||
        subject_id == ""
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
                    url: '<?php echo base_url('School/update_subject/'.$data_subject['sjid']); ?>',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                                title: "สำเร็จ!",
                                text: "ทำการเพิ่มข้อมูลห้องเรียนแล้ว",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "ตกลง"
                            },
                            function(isConfirm) {

                                if (isConfirm) {

                                    setTimeout(function() {
                                        $(location).attr("href", "<?php echo base_url('School/subject/'); ?>");
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
    /* ------------------------- End add student ------------------------- */
</script>
<script language="javascript">
    function IsNumer(sText, obj) {
        var ValidChars = "0123456789";
        var IsNumber = true;
        var Char;
        for (i = 0; i < sText.length && IsNumber == true; i++) {
            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1) {
                IsNumber = false;
            }
        }
        if (IsNumber == false) {

            swal({
                title: "แจ้งเตือน!",
                text: "กรุณาใส่ข้อมูลเป็นตัวเลข",
                type: "warning",
                showConfirmButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "ตกลง",
            });

            obj.value = sText.substr(0, sText.length = close);
        }
    }
</script>