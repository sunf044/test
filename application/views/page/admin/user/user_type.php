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
                                  <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user');?>">ผู้ใช้งาน</a></li>
                                  <li class="breadcrumb-item active"><?php echo $title; ?></a></li>
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
              <div class="row">
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                                <h4 class="card-title"><i class="fas fa-users"></i> รายการชื่อประเภทผู้ใช้งาน</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                      <button type="button" class="btn btn-icon btn-info btn-sm mr-1 mb-1 waves-effect waves-light btn-add" data-toggle="modal" data-target="#modal_form" data-backdrop="static">
                                        <i class="fas fa-plus-square"></i> เพิ่มข้อมูล
                                      </button>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <?php if ( ! empty($type)){ ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center" style="width: 10px">#</th>
                                                <th>ประเภทผู้ใช้งาน</th>
                                                <th class="text-center" style="width: 150px">แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; foreach ($type as $data) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                <td><?php echo $data->name_type; ?></td>
                                                <td class="text-center">
                                                  <div class="btn-group btn-group-sm" role="group" aria-label="Second Group">
                                                    <a class="btn btn-icon btn-outline-info waves-effect waves-light" onclick="edit('<?php echo $data->utid; ?>')"><i class="fal fa-edit"></i></a>
                                                    <a class="btn btn-icon btn-outline-danger waves-effect waves-light" onclick="del('<?php echo $data->utid; ?>')"><i class="far fa-trash"></i></a>
                                                  </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo $pages; ?>
                              <?php } else { ?>
                                <div class="col-12">
                                  <div class="alert alert-icon-left alert-warning alert-dismissible mb-2" role="alert">
                                    <span class="alert-icon">
                                      <i class="la la-warning"></i>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Data Not Found!</strong> Please add info
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- สินสุด: เนื้อหา -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- Modal -->
    <div class="modal fade text-left" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-black white">
            <h4 class="modal-title white" id="myModal">เพิ่มข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form" method="post" action="<?php echo base_url('admin/add_user_type'); ?>" autocomplete="off" class="form-horizontal">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" name="utid" value="">
              <label class="text-blue">ชื่อประเภทผู้ใช้งาน :</label>
              <input type="text" placeholder="ระบุชื่อประเภทผู้ใช้งาน..." class="form-control" name="name_type" id="name_type" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success waves-effect waves-light">บันทึก</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">ยกเลิก</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
  $(".btn-add").click(function()
  {
    $('#form')[0].reset();
    $('.modal-title').text('เพิ่มข้อมูลประเภทผู้ใช้งาน');
  });
  $('#modal_form').on('shown.bs.modal', function(e)
  {
    $('#name_type').focus();
  });
  /* form */
  $('#form').formValidation(
    {
      framework: 'bootstrap',
      excluded: ':disabled',
          fields: {
              name_type: {
                  validators: {
                      notEmpty: {
                          message: 'กรุณากรอกข้อมูล',
                      }
                  }
              }
          }
  })
  .on('success.form.fv', function(e)
  {
    $.post("<?php echo base_url('admin/add_user_type'); ?>", $('#form').serialize())
      .done(function(data)
      {
        $('#modal_form').modal('hide');
        Swal.fire('Success!', 'บันทึกสำเร็จ.', 'success')
        setTimeout(function()
        {
          $(location).attr("href", "<?php echo base_url('admin/user_type'); ?>");
        }, 1000);

      })
      .fail(function()
      {
        Swal.fire('Error!', 'บันทึกข้อมูลผิดพลาด.', 'error')
      });
    e.preventDefault();
  });
  function edit(id)
  {
    $('#form').formValidation('resetForm', true);
    $.get("<?php echo base_url('admin/get_user_type_id/')?>"+ id, function( data )
    {
      $('[name="utid"]').val(data.utid);
      $('[name="name_type"]').val(data.name_type);
      $('#modal_form').modal('show');
      $('.modal-title').text('แก้ไขชื่อประเภทผู้ใช้งาน');
    }, "json" );
  }
  function del(id)
  {
    Swal.fire({
      title: 'ยืนยันการลบข้อมูล!',
      text: "คุณต้องการลบข้อมูลหรือไม่?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ยกเลิก',
      confirmButtonText: 'ตกลง'
    }).then(function (result) {
      if (result.value) {
        $.post("<?php echo base_url('admin/del_user_type/');?>"+id)
        .done(function() {
          Swal.fire({
            type: "success",
            title: 'สำเร็จ!',
            text: "ลบข้อมูลสำเร็จ",
            confirmButtonClass: 'btn btn-success',
          })
          setTimeout(function() {
            $(location).attr("href", "<?php echo base_url('admin/user_type'); ?>");
          }, 1500);
        })
        .fail(function() {
          Swal.fire('Error!','ลบข้อมูลผิดพลาด.','error');
        });
      }
    });
  }
</script>
