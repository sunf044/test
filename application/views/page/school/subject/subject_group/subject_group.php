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
                                <h4 class="card-title">รายการกลุ่มวิชา</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">

                                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaladdsubjectgroup">
                                                <i class="fas fa-plus-square mr-2"></i> เพิ่มกลุ่มวิชา
                                            </button></li>

                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                        <!--                                             <li><a data-action="close"><i class="ft-x"></i></a></li>
 -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">

                                <?php if (!empty($data_subject_group)) { ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">


                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center font-weight-bold" style="width: 10px">ที่</th>
                                                        <th class="text-center">กลุ่มวิชา</th>
                                                        <th class="text-center col-3">แก้ไข / ลบ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0;
                                                    foreach ($data_subject_group as $row) { ?>

                                                        <tr class="text-center">
                                                            <td class="text-center font-weight-bold">
                                                                <?= ++$i; ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->name_subject_group; ?>
                                                            </td>


                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-warning text-white" id="<?= $row->sgid; ?>" onclick="showModalEditsubject_group(<?= $row->sgid; ?>);">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                /
                                                                <button type="button" class="btn btn-danger" onclick="del(<?= $row->sgid; ?>);">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
<div class="modal fade text-left" id="modaladdsubjectgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="myModalLabel33">เพิ่มกลุ่มวิชา</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="form_addsubjectgroup" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">ชื่อกลุ่มวิชา <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="name_subject_group" name="name_subject_group" placeholder="ชื่อกลุ่มวิชา" value="" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn-submit-add btn btn-outline-primary btn-lg" value="บันทึก">
                    <input type="reset" class="btn-close-add btn btn-outline-secondary btn-lg" data-dismiss="modal" value="ยกเลิก">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal add -->


<!-- Modal Edit -->
<div class="modal fade text-left" id="modalEditStudentRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="myModalLabel33">แก้ไขห้องนักเรียน</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="form_editsubjectgroup" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">ชื่อกลุ่มวิชา <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="edit_name_subject_group" name="name_subject_group" placeholder="ชื่อกลุ่มวิชา" value="" required>
                            </div>
                        </div>

                        

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn-submit-edit btn btn-outline-primary btn-lg" value="บันทึก">
                    <input type="reset" class="btn-close-edit btn btn-outline-secondary btn-lg" data-dismiss="modal" value="ยกเลิก">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal Edit -->




<?php $this->load->view('template/footer'); ?>


<script>
    $(document).ready(function() {
        
        $(".btn-submit-add").click(function() {
            $('#form_addsubjectgroup').submit();
        });

        $(".btn-close-add").click(function() {
            $('#modaladdsubjectgroup').modal('toggle');
        });

        $(".btn-submit-edit").click(function() {
            $('#form_editsubjectgroup').submit();
        });

        $(".btn-close-edit").click(function() {
            $('#modalEditStudentRoom').modal('toggle');
        });

        $(".ft-rotate-cw").click(function() {
            location.reload();
        });
        var sid;  

        /* ------------------------- Add room ------------------------- */
        $('#form_addsubjectgroup').submit(function(e) {
            e.preventDefault();

            var name_subject_group = document.getElementById("name_subject_group").value;


            if (name_subject_group == "") {

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
                        url: '<?php echo base_url('School/add_subject_group/'); ?>',
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(data) {

                            swal({
                                    title: "สำเร็จ!",
                                    text: "ทำการเพิ่มนักเรียนเข้าห้องเรียบร้อยแล้ว?",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "ตกลง"
                                },
                                function(isConfirm) {

                                    if (isConfirm) {

                                        setTimeout(function() {
                                            $(location).attr("href", "<?php echo base_url('School/subject_group/'); ?>");
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
    function showModalEditsubject_group(id) {
        sid = id
        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>School/update_subject_group/" + id,
            dataType: 'json',
            success: function(data) {
                $('#edit_name_subject_group').val(data.name_subject_group);
                $('#modalEditStudentRoom').modal('show');

                console.log(data);
            }
        });
    }
    /* ------------------------- End show modal edit room_id ------------------------- */


    /* ------------------------- Edit room ------------------------- */
    $('#form_editsubjectgroup').submit(function(e) {
        e.preventDefault();

        var edit_name_subject_group = document.getElementById("edit_name_subject_group").value;

        if (edit_name_subject_group == "" ) {

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
                    url: '<?php echo base_url('School/update_subject_group/'); ?>' + sid,
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                                title: "สำเร็จ!",
                                text: "ทำการแก้ไขนักเรียนเข้าห้องเรียบร้อยแล้ว?",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "ตกลง"
                            },
                            function(isConfirm) {

                                if (isConfirm) {

                                    setTimeout(function() {
                                        $(location).attr("href", "<?php echo base_url('School/subject_group/'); ?>");
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

    function del(sid) {
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
            function(isConfirm) {

                if (isConfirm) {

                    $.post("<?php echo base_url('School/delete_subject_group/'); ?>" + sid)

                    swal({
                            title: "สำเร็จ!",
                            text: "ลบข้อมูลสำเร็จ?",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "ตกลง"
                        },
                        function() {

                            setTimeout(function() {
                                $(location).attr("href", "<?php echo base_url('School/subject_group/'); ?>");
                            }, 1500);

                        });

                }

            });
    }
</script>