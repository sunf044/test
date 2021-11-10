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
            <section class="form_update form__design">
                <div class="container">
                    <form action="#" method="post" id="form_update_room" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-night-light">
                                <h5 class="font-weight-bold mb-0">
                                    แก้ไขข้อมูลห้องเรียน
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="sub_title">
                                        ข้อมูลห้องเรียน
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
                                                <label for="first_name">เลขห้อง <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" id="room_no" name="room_no" placeholder="เลขห้อง" onKeyUp="IsNumer(this.value,this)" value="<?= $data_room['room_no'] ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">ชื่อห้อง <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" id="room_name" name="room_name" placeholder="ชื่อห้อง" value="<?= $data_room['room_name'] ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="room_id">ประเภทระดับชั้น</label>
                                                <select class="select2 form-control" id="rdid" name="rdid" style="width: 100%;" required>
                                                    <?php foreach ($room_degree as $data) { ?>
                                                        <option value="<?php echo $data->rdid; ?>" <?php if ($data_room['room_degree_id'] == $data->rdid) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                            <?php echo $data->degree_name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="first_name">ระดับชั้น <small class="text-danger">* ปีที่ *</small></label>
                                                <input type="text" class="form-control" id="class_" name="class_" placeholder="" onKeyUp="IsNumer(this.value,this)" value="<?= $data_room['class'] ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="first_name">ห้อง <small class="text-danger">* ห้องที่ *</small></label>
                                                <input type="text" class="form-control" id="class_room" name="class_room" placeholder="" onKeyUp="IsNumer(this.value,this)" value="<?= $data_room['class_room'] ?>" required>

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
    /* ------------------------- update room ------------------------- */
    $('#form_update_room').submit(function(e) {
        e.preventDefault();

        var room_no = document.getElementById("room_no").value;
        var room_name = document.getElementById("room_name").value;
        var rdid = document.getElementById("rdid").value;
        var class_ = document.getElementById("class_").value;
        var class_room = document.getElementById("class_room").value;

        if (room_no == "" ||
            room_name == "" ||
            rdid == "" ||
            class_room == "" ||
            class_ == ""
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
                    url: '<?php echo base_url('School/update_room_class/' . $data_room['rid']); ?>',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                                title: "สำเร็จ!",
                                text: "ทำการแก้ไขข้อมูลห้องเรียนเรียบร้อยแล้ว?",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "ตกลง"
                            },
                            function(isConfirm) {

                                if (isConfirm) {

                                    setTimeout(function() {
                                        $(location).attr("href", "<?php echo base_url('School/room_class/'); ?>");
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
    /* ------------------------- End update room ------------------------- */
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