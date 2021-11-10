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
                                    <h4 class="card-title">แสดงหน้าจัดการเกรดนักเรียน : กลุ่มวิชาเรียน</h4>
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

                                <?php if ( ! empty($page_list_student_subject_group)){ ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                          

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                         <th class="text-center font-weight-bold" style="width: 10px">ที่</th>
                                                          <th class="text-center">ชื่อกลุ่มวิชา</th>
                                                          
                                

                                                        <th class="text-center">ค้นหา</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0 ; foreach ($page_list_student_subject_group as $row) {?>

                                                    <tr class="text-center">
                                                        <td class="text-center font-weight-bold">
                                                            <?= ++$i; ?>
                                                        </td>
                                                        <td class="text-center"><?= $row['name_subject_group']; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo base_url('School/list_student_subject/').$row['sgid'];?>">
                                                                <button type="button" class="btn btn-info">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </a>
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

  }
</script>