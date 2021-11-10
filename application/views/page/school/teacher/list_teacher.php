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
                                    <h4 class="card-title">รายการครู</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
<!--                                             <li><a data-action="close"><i class="ft-x"></i></a></li>
 -->                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">

                                <?php if ( ! empty($page_list_teacher)){ ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                          

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">ที่</th>
                                                        <th class="text-center">รูปประจำตัว</th>
                                                        <th class="text-center">เลขบัตรประชาชน</th>
                                                        <th class="text-center">ชื่อ-สกุล</th>
                                                        <th class="text-center">เบอร์โทร</th>
                                                        <th class="text-center">แก้ไข / ลบ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0 ; foreach ($page_list_teacher as $row) {?>

                                                    <tr class="text-center">
                                                        <td><?php echo ++$i ;?></td>

                                                        <?php if($row['image'] != ""){?>

                                                        <td><img alt="" class="table-avatar" src="<?php echo base_url('assets/images/users/').$row['image']; ?>" width="50px"></td>

                                                        <?php }else{?>

                                                        <td>รออัพโหลดรูป</td>

                                                        <?php }?>

                                                        <td><?php echo $row['username']; ?></td>

                                                        <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                                        <td><?php echo $row['phone_number']; ?></td>
                                                        
                                                        <td>
                                                          
                                                          <a role="button" href="<?php echo base_url('School/form_update_teacher/').$row['aid'];?>" class="btn btn-warning text-white">
                                                              <i class="ft-edit"></i>
                                                          </a>
                                                           / 
                                                          <button type="button" class="btn btn-danger" onclick="del(<?= $row['aid']; ?>);">
                                                              <i class="ft-delete"></i>
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
<?php $this->load->view('template/footer'); ?>


<script>
  $(document).ready(function() {
    
    $(".ft-rotate-cw").click(function()
    {
      location.reload();
    });

});

  function del(aid)
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

           $.post("<?php echo base_url('School/del_teacher/');?>"+aid)

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
                    $(location).attr("href", "<?php echo base_url('School/list_teacher/');?>");
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