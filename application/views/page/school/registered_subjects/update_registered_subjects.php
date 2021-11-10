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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">กลุ่มวิชา</label>
                                                <select class="select2 form-control" id="sgid" name="sgid" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...กลุ่มวิชา
                                                    </option>
                                                    <?php foreach ($data_subject_group as $data) { ?>
                                                        <option value="<?php echo $data->sgid; ?>">
                                                            <?php echo $data->name_subject_group; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">วิชา</label>
                                                <select class="select2 form-control" id="subject_id" name="subject_id" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...วิชา
                                                    </option>
                                                    <?php foreach ($data_subject as $data) { ?>
                                                        <option value="<?php echo $data->sjid; ?>">
                                                            <?php echo $data->name_subject; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">ครูผู้สอน</label>
                                                <select class="select2 form-control" id="users_id" name="users_id" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...ครูผู้สอน
                                                    </option>
                                                    <?php foreach ($data_teacher as $data) { ?>
                                                        <option value="<?php echo $data->aid; ?>">
                                                            <?php echo $data->first_name . " " . $data->last_name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">ระดับประเภทระดับชั้น</label>
                                                <select class="select2 form-control" id="rdid" name="rdid" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...ประเภทระดับชั้น
                                                    </option>
                                                    <?php foreach ($data_degree as $data) { ?>
                                                        <option value="<?php echo $data->rdid; ?>">
                                                            <?php echo $data->degree_name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">ระดับชั้น</label>
                                                <select class="select2 form-control" id="class_room" name="class_room" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...ระดับชั้น
                                                    </option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">ห้องเรียน</label>
                                                <select class="select2 form-control" id="room_id" name="room_id" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...ห้องเรียน
                                                    </option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">ปีการศึกษา</label>
                                                <select class="select2 form-control" id="year" name="year" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...ปีการศึกษา
                                                    </option>
                                                    <?php foreach ($data_year as $data) { ?>
                                                        <option value="<?php echo $data->syid; ?>" <?php if($data->syid == $data_registered_subjects['year']){echo "selected";}  ?>>
                                                            <?php echo $data->year; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">เทอม</label>
                                                <select class="select2 form-control" id="term" name="term" style="width: 100%;" required>
                                                    <option value="">
                                                        เลือก...เทอม
                                                    </option>
                                                    <option value="1" <?php if($data_registered_subjects['term'] == 1){echo "selected";}  ?>>
                                                        เทอมที่ 1
                                                    </option>
                                                    <option value="2" <?php if($data_registered_subjects['term'] == 2){echo "selected";}  ?>>
                                                        เทอมที่ 2
                                                    </option>
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

        $('#sgid').val('<?= $data_registered_subjects['group_subject_id'] ?>').trigger('change');
        $('#subject_id').val('<?= $data_registered_subjects['subject_id'] ?>').trigger('change');
        $('#users_id').val('<?= $data_registered_subjects['users_id'] ?>').trigger('change');
        $('#rdid').val('<?= $data_registered_subjects['room_degree_id'] ?>').trigger('change');



    });
</script>

<script>
    /* ------------------------- Add room ------------------------- */

    $('#sgid').on('change', function() {
        $("#subject_id").empty();
        var option = new Option('เลือก...วิชา', '', true, true);
        $('#subject_id').append(option);
        var id = $('#sgid').val();
        fetch('<?php echo base_url('School/select_data_subject/'); ?>' + id).then(response => response.json())
            .then((response) => {
                response.forEach(function(item, index) {
                    var option = new Option(response[index].name_subject, response[index].sjid, true, true);
                    $('#subject_id').append(option);
                    $('#subject_id').val('').trigger('change');
                });
                $('select#subject_id').find('option').each(function() {
                    if ($(this).val() == <?= $data_registered_subjects['subject_id'] ?>) {
                        $('#subject_id').val('<?= $data_registered_subjects['subject_id'] ?>').trigger('change');
                    }
                });

            })
            .catch(err => console.log(err))
    });

    $('#rdid').on('change', function() {
        $("#class_room").empty();
        var option = new Option('เลือก...ระดับชั้น', '', true, true);
        $('#class_room').append(option);
        $("#room_id").empty();
        var option = new Option('เลือก...ห้องเรียน', '', true, true);
        $('#room_id').append(option);
        var id = $('#rdid').val();
        fetch('<?php echo base_url('School/select_data_class/'); ?>' + id).then(response => response.json())
            .then((response) => {
                response.forEach(function(item, index) {
                    var option = new Option(response[index].degree_tag + " " + response[index].class, response[index].class, true, true);
                    $('#class_room').append(option);
                    $("#class_room").val('').trigger('change');
                });
                $('select#class_room').find('option').each(function() {
                    if ($(this).val() == <?= $data_registered_subjects['class'] ?>) {
                        $('#class_room').val('<?= $data_registered_subjects['class'] ?>').trigger('change');
                    }
                });
                

            })
            .catch(err => console.log(err))
    });

    $('#class_room').on('change', function() {
        if ($('#class_room').val() != '') {
            $("#room_id").empty();
            var option = new Option('เลือก...ห้องเรียน', '', true, true);
            $('#room_id').append(option);
            var cid = $('#class_room').val();
            var rdid = $('#rdid').val();
            fetch('<?php echo base_url('School/select_data_room_where/'); ?>' + rdid + '/' + cid).then(response => response.json())
                .then((response) => {
                    response.forEach(function(item, index) {
                        var option = new Option(response[index].class_room, response[index].rid, true, true);
                        $('#room_id').append(option);
                        $("#room_id").val('').trigger('change');
                    });
                    $('select#room_id').find('option').each(function() {
                    if ($(this).val() == <?= $data_registered_subjects['rid'] ?>) {
                        $('#room_id').val('<?= $data_registered_subjects['rid'] ?>').trigger('change');
                    }
                });
                })
                .catch(err => console.log(err))
        }

    });


    $('#form_room').submit(function(e) {
        e.preventDefault();
        var subject_id = document.getElementById("subject_id").value;
        var users_id = document.getElementById("users_id").value;
        var room_id = document.getElementById("room_id").value;
        var year = document.getElementById("year").value;
        var term = document.getElementById("term").value;

        if (subject_id == "" ||
            users_id == "" ||
            room_id == "" ||
            year == "" ||
            term == ""
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
                    url: '<?php echo base_url('School/update_registered_subjects/' . $data_registered_subjects['rsid']); ?>',
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
                                        $(location).attr("href", "<?php echo base_url('School/registered_subjects/'); ?>");
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