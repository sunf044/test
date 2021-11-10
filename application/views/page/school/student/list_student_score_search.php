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
                                    <h4 class="card-title">แสดงหน้าบันทึกเกรด : ค้นหารายการ</h4>
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

                                <form action="#" method="POST" id="form_student_score_search" class="needs-validation" novalidate>
                                    <div class="card-body card-dashboard">

                                        <div class="row">

                                         <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="syid">ปีการศึกษา</label>
                                                    <select class="select2 form-control" id="syid" name="syid" style="width: 100%;" required>
                                                        <option value="" selected disabled>-- ปีการศึกษา --</option>
                                                        <?php foreach($page_year as $row) { ?>
                                                            <option name="<?= $row['syid']; ?>" value="<?= $row['syid']; ?>">
                                                                <?= $row['year']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกปีการศึกษา
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sgid">กลุ่มวิชา</label>
                                                    <select class="select2 form-control" id="sgid" name="sgid" style="width: 100%;" disabled required>
                                                        <option value="" selected disabled>-- เลือกกลุ่มวิชา --</option>
                                                        
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกกลุ่มวิชา
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sjtid">ประเภทวิชา</label>
                                                    <select class="select2 form-control" id="sjtid" name="sjtid" style="width: 100%;" disabled required>
                                                        <option value="" selected disabled>-- เลือกประเภทวิชา --</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกประเภทวิชา
                                                    </div>
                                                </div>
                                            </div>


                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sjid">รายการวิชา</label>
                                                    <select class="select2 form-control" id="sjid" name="sjid" style="width: 100%;" disabled required>
                                                        <option value="" selected disabled>-- เลือกวิชา --</option>
                                                       
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกรายการวิชา
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="term">เทอม</label>
                                                    <select class="select2 form-control" id="term" name="term" style="width: 100%;" disabled required>
                                                        <option value="" selected disabled>-- เลือกเทอม --</option>
                                                       
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกเทอม
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="room_id">ห้องเรียน</label>
                                                    <select class="select2 form-control" id="room_id" name="room_id" style="width: 100%;" disabled required>
                                                        <option value="" selected disabled>-- เลือกห้องเรียน --</option>
                                                       
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกห้องเรียน
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                    </div>

                                    <div class="card-footer">
                                        <div style="text-align: right;"> 
                                            <button type="submit" class="btn btn-info text-white">
                                                 <i class="fas fa-search"></i> ค้นหา
                                            </button>
                                        </div>
                                    </div>
                                </form>
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

//ปีการศึกษา
    $('#syid').change(function(){

        document.getElementById("sgid").disabled = false;

        document.getElementById("sjtid").disabled = true;
        document.getElementById("sjid").disabled = true;
        document.getElementById("term").disabled = true;
        document.getElementById("room_id").disabled = true;

        var syid = $('#syid').val();

         $('#sgid').html('').select2({data: [{id: '', text: '-- เลือกกลุ่มวิชา --'}]});
         $('#sjtid').html('').select2({data: [{id: '', text: '-- เลือกประเภทวิชา --'}]});
         $('#sjid').html('').select2({data: [{id: '', text: '-- เลือกวิชา --'}]});
         $('#term').html('').select2({data: [{id: '', text: '-- เลือกเทอม --'}]});
         $('#room_id').html('').select2({data: [{id: '', text: '-- เลือกห้องเรียน --'}]});

         $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>School/Get_group_subject_json/",
                dataType: 'json',
                cache: false,
                success: function(data) {

                    $("#sgid").select2({data});
                },

            });

    });

//กลุ่มวิชา
    $('#sgid').change(function(){

         $('#sjtid').html('').select2({data: [{id: '', text: '-- เลือกประเภทวิชา --'}]});
         $('#sjid').html('').select2({data: [{id: '', text: '-- เลือกวิชา --'}]});
         $('#term').html('').select2({data: [{id: '', text: '-- เลือกเทอม --'}]});
         $('#room_id').html('').select2({data: [{id: '', text: '-- เลือกห้องเรียน --'}]});

        document.getElementById("sjtid").disabled = true;
        document.getElementById("sjid").disabled = true;
        document.getElementById("term").disabled = true;
        document.getElementById("room_id").disabled = true;


         var sgid = $('#sgid').val();

         if(sgid == ""){

            document.getElementById("sjtid").disabled = true;
            document.getElementById("sjid").disabled = true;
            document.getElementById("term").disabled = true;
            document.getElementById("room_id").disabled = true;


         }
         else{
            document.getElementById("sjtid").disabled = false;

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>School/Get_type_subject_json/",
                    dataType: 'json',
                    cache: false,
                    success: function(data) {

                        $("#sjtid").select2({data});
                    },

                });


            }

     });

//ประเภทวิชา
    $('#sjtid').change(function(){
    $('#sjid').html('').select2({data: [{id: '', text: '-- เลือกวิชา --'}]});
    $('#term').html('').select2({data: [{id: '', text: '-- เลือกเทอม --'}]});
    $('#room_id').html('').select2({data: [{id: '', text: '-- เลือกห้องเรียน --'}]});

    document.getElementById("sjid").disabled = true;
    document.getElementById("term").disabled = true;
    document.getElementById("room_id").disabled = true;


     var sgid = $('#sgid').val();
     var sjtid = $('#sjtid').val();

     if(sjtid == ""){

        document.getElementById("sjid").disabled = true;
        document.getElementById("term").disabled = true;
        document.getElementById("room_id").disabled = true;

     }
     else{

        document.getElementById("sjid").disabled = false;

         $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>School/Get_subject_json/",
                dataType: 'json',
                cache: false,
                data:{

                sgid    : sgid,
                sjtid   : sjtid

                },
                success: function(data) {

                    $("#sjid").select2({data});

                    console.log(data);

                },

            });
        }

     });

//รายการวิชา
    $('#sjid').change(function(){

       $('#term').html('').select2({data: [{id: '', text: '-- เลือกเทอม --'}]});
       $('#room_id').html('').select2({data: [{id: '', text: '-- เลือกห้องเรียน --'}]});

        document.getElementById("term").disabled = true;
        document.getElementById("room_id").disabled = true;

        var sjid = $('#sjid').val();
        var syid = $('#syid').val();

        if(sjid == ""){

        document.getElementById("term").disabled = true;
        document.getElementById("room_id").disabled = true;

     }
     else{

        document.getElementById("term").disabled = false;

        $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>School/Get_term_json/",
                dataType: 'json',
                cache: false,
                data:{

                sjid   : sjid,
                syid   : syid

                },
                success: function(data) {

                    $("#term").select2({data});

                },

            });

        }

    });


 //เทอม   
     $('#term').change(function(){

        $('#room_id').html('').select2({data: [{id: '', text: '-- เลือกห้องเรียน --'}]});

        document.getElementById("room_id").disabled = true;

        var sjid = $('#sjid').val();
        var syid = $('#syid').val();
        var term = $('#term').val();

        if(term == ""){

            document.getElementById("room_id").disabled = true;

        }
        else{

            document.getElementById("room_id").disabled = false;

            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>School/Get_room_json/",
                dataType: 'json',
                cache: false,
                data:{

                sjid   : sjid,
                syid   : syid,
                term   : term

                },
                success: function(data) {

                    $("#room_id").select2({data});

                },

            });


        }

     });

//ห้องเรียน   
     $('#room_id').change(function(){ 

        var room_id = $('#room_id').val();
     });


    $('#form_student_score_search').submit(function(e) {
        e.preventDefault();

        var syid = $('#syid').val(); //ปี
        var sgid = $('#sgid').val(); //กลุ่ม
        var sjtid = $('#sjtid').val(); //ประเภทวิชา
        var sjid = $('#sjid').val(); //รายวิชา
        var term = $('#term').val(); //เทอม
        var room_id = $('#room_id').val(); //ห้องเรียน

        if(syid == "" || syid == null ||
           sgid == "" || sgid == null ||
           sjtid == "" || sjtid == null ||
           sjid == "" || sjid == null ||
           term == "" || term == null ||
           room_id == "" || room_id == null
          ){

             Swal.fire({
                title: 'ผิดพลาด!',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                confirmButtonText: 'ตกลง'
            })

        }else{

        window.location.href = "<?php echo base_url('School/list_student_score/');?>"+syid+"/"+sgid+"/"+sjtid+"/"+sjid+"/"+term+"/"+room_id;

        }


    });


  });
</script>