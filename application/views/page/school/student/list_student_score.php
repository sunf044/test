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
            <?php if ( ! empty($row_score_room)){ ?>
               <!-- Restore & show all table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ปี <?= $row_score_room["year"];?> เทอม : (<?= $row_score_room["term"];?>) <span class="text-info"><?= $row_score_room["code_subject"];?></span> วิชา <?= $row_score_room["name_subject"];?> (<?= $row_score_room["initials"];?>) <span class="text-primary">ชื่ออาจารย์ผู้สอน : </span><?= $row_score_room["first_name"]." ".$row_score_room["last_name"];?></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">

                                            <li>

                                    <form action="" method="POST" id="form_student_score_data" class="needs-validation" novalidate>

                                    <?php if ( ! empty($page_list_student_score_room)){ ?>

                                        <?php $i=0 ; foreach ($page_list_student_score_room as $row) {?>


                                             <input type="hidden" name="number[]" id="number" value="<?= $i++ ;?>">

                                            <input type="hidden" name="subject_id[]" id="subject_id" value="<?= $row["subject_id"];?>">
                                            <input type="hidden" name="student_id[]" id="student_id" value="<?= $row["student_id"];?>">
                                            <input type="hidden" name="unit[]" id="unit" value="<?= $row["unit"];?>">
                                            <input type="hidden" name="term[]" id="term" value="<?= $row["term"];?>">
                                            <input type="hidden" name="year[]" id="year" value="<?= $row["year"];?>">
                                            <input type="hidden" name="room_id[]" id="room_id" value="<?= $row["room_id"];?>">

                                         <?php }?>

                                        <?php }else{?>

                                            <input type="hidden" name="number[]" id="number" value="">

                                         <?php }?>

                                            <button type="submit" class="btn btn-success">
                                             <i class="fas fa-plus-square mr-2"></i>ดึงข้อมูลนักเรียน ห้อง <?= $row_score_room["degree_tag"]." ".$row_score_room["class"]."/".$row_score_room["class_room"] ;?>
                                            </button>

                                         </form>
                                        

                                           </li>

                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

<!--                                             <li><a data-action="close"><i class="ft-x"></i></a></li>
 -->                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">

                                <?php if ( ! empty($page_list_student_score)){ ?>

                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                          

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                         <th class="text-center font-weight-bold" style="width: 10px">ที่</th>
                                                          <th class="text-center">ชื่อ - สกุล</th>
                                                          <th class="text-center" width="5%">หน่วยกิต</th>
                                                          <th class="text-center" width="15%">เกรด</th>
                                                          <th class="text-center" width="30%">หมายเหตุ</th>
                                                          <th class="text-center" width="20%">เวลาบันทึก</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0 ; foreach ($page_list_student_score as $row) {?>

                                                    <tr class="text-center">
                                                        <td class="text-center font-weight-bold">
                                                            <?= ++$i; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['first_name']; ?> <?= $row['last_name']; ?>
                                                        </td>
                                                        <td class="text-center"><?= $row['unit']; ?></td>

                                                        <td class="text-center">
                                                        
                                                        <input type="text" class="form-control" name="grade" id="grade" onKeyUp="textgrade(this.value,<?= $row['did']; ?>)" placeholder="เกรด" value="<?= $row['grade']; ?>" style="width: 50%;
                                                          background-color: #FFF;
                                                          padding: 5px 10px;
                                                          margin: 3px 0;
                                                          display: inline-block;
                                                          border: 1px solid #ccc;
                                                          border-radius: 4px;
                                                          box-sizing: border-box;
                                                          text-align: center;">

                                                        </td>
                                                        <td class="text-center">
                                                            
                                                        <input type="text" class="form-control" name="note" id="note" onKeyUp="textnote(this.value,<?= $row['did']; ?>)" placeholder="หมายเหตุ" value="<?= $row['note']; ?>" style="width: 100%;
                                                          transition: width 0.4s ease-in-out;
                                                          background-color: #FFF;
                                                          padding: 5px 10px;
                                                          margin: 3px 0;
                                                          display: inline-block;
                                                          border: 1px solid #ccc;
                                                          border-radius: 4px;
                                                          box-sizing: border-box;
                                                          text-align: center;">

                                                        </td>
                                                        <td class="text-center"><?= $row['creation_date']; ?></td>
                                                       
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

                <?php }?>


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


    /* ------------------------- Add student_score_data ------------------------- */
    $('#form_student_score_data').submit(function(e) { 
        e.preventDefault();
        
        var number = document.getElementById("number").value;        
       
        if(number == ""
        ) {

            Swal.fire({
                title: 'ผิดพลาด!',
                text: 'ไม่มีข้อมูลในห้องนักเรียน',
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
                    url: '<?php echo base_url('School/list_student_score_data/');?>',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {

                        swal({
                              title: "สำเร็จ!",
                              text: "ทำการดึงข้อมูลนักเรียนเรียบร้อยแล้ว?",
                              type: "success",
                              showCancelButton: false,
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "ตกลง"
                            },
                            function(isConfirm){

                            if (isConfirm) {

                              setTimeout(function() {

                                location.reload();
                                   
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
    /* ------------------------- End add student_score_data------------------------- */

});

  /* ------------------------- Show edit grade ------------------------- */
    function textgrade(grade,did)
    {
      
      $.ajax({
            type: "post",
            url: "<?php echo base_url() ?>School/update_student_score_data/",
            dataType: 'json',
            cache: false,
            data:{

            did    : did,
            grade  : grade

            },
            
        });

       
    }

    /* ------------------------- End show edit grade ------------------------- */


    /* ------------------------- Show edit note ------------------------- */
    function textnote(note,did)
    {
      
      $.ajax({
            type: "post",
            url: "<?php echo base_url() ?>School/update_student_note_data/",
            dataType: 'json',
            cache: false,
            data:{

            did    : did,
            note  : note

            },
            
        });

       
    }

    /* ------------------------- End show edit note ------------------------- */

</script>