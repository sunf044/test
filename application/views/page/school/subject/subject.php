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
                                <h4 class="card-title">รายการรายวิชา</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a href="<?php echo base_url('school/add_subject'); ?>" class="btn btn-success" ><i class="fas fa-plus-square mr-2"></i> เพิ่มข้อมูลห้องเรียน</a></li>
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!--                                             <li><a data-action="close"><i class="ft-x"></i></a></li>
 -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">

                                <?php if (!empty($data_subject)) { ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">


                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">ชื่อวิชา</th>
                                                        <th class="text-center">รหัสวิชา</th>
                                                        <th class="text-center">หน่วยกิต</th>
                                                        <th class="text-center">กลุ่มวิชา</th>
                                                        <th class="text-center">ประเภทวิชา</th>
                                                        <th class="text-center">แก้ไข / ลบ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0;
                                                    foreach ($data_subject as $row) { ?>

                                                        <tr class="text-center">
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $row->name_subject; ?></td>
                                                            <td><?php echo $row->code_subject; ?></td>
                                                            <td><?php echo $row->unit; ?></td>
                                                            <td><?php echo $row->name_subject_group; ?></td>
                                                            <td><?php echo $row->subject_type; ?></td>
                                                            <td>

                                                                <a role="button" href="<?php echo base_url('school/update_subject/' . $row->sjid); ?>" class="btn btn-warning text-white">
                                                                    <i class="ft-edit"></i>
                                                                </a>
                                                                /
                                                                <button type="button" class="btn btn-danger del" id="<?php echo $row->sjid; ?>">
                                                                    <i class="ft-delete"></i>
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
<?php $this->load->view('template/footer'); ?>
<script>
    $('.del').on('click', function() {
        var id = $(this).attr('id');
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

                    $.post("<?php echo base_url('School/delete_subject/'); ?>" + id)

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
                                $(location).attr("href", "<?php echo base_url('School/subject/'); ?>");
                            }, 1500);

                        });

                }


            });
    });
</script>