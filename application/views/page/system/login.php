<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Education Sandbox | เข้าสู่ระบบ สำหรับครู / ผู้ดูแล</title>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Mitr:400|Pridi:300|Prompt" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
  <script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <style media="screen">
    body, h1, h2, h3, h4, h5, h6
    {
      font-family: 'Prompt', sans-serif!important;
      font-style: normal;
    }
  </style>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?php echo base_url();?>assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?php echo base_url();?>assets/images/Sandbox-logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">ลงชื่อเข้าใช้งานระบบ | สำหรับครู</p>
              <form id="login" action="<?php echo base_url('login/check_login'); ?>" method="post">
                  <div class="form-group">
                    <label for="username" class="sr-only">ชื่อผู้ใช้งาน</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <input class="btn btn-block login-btn mb-4" type="submit" value="เข้าสู่ระบบ">
                </form>
                <a href="<?php echo base_url('login/reset');?>" class="forgot-password-link">ลืมรหัสผ่าน?</a>
                <p class="login-card-footer-text">มีปัญหาเข้าใช้งาน! <a href="<?php echo base_url('login/contact');?>" class="text-reset">ติดต่อผู้ดูแล</a></p>
                <nav class="login-card-footer-nav">
                  <a href="<?php echo base_url('login/system');?>">สำหรับครู / ผู้ดูแล</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $("#login").submit(function(e){
    $(".login-btn").attr("disabled", true);
    $(".login-btn").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> กำลังตรวจสอบ');
    $.post("<?php echo base_url('login/check_login'); ?>", $('#login').serialize())
        .done(function(data) {
            var $arr = jQuery.parseJSON(data);
            var $status = $arr['status'];
            if ($status === "success") {
                setTimeout(function() {
                    $(location).attr("href", "<?php echo base_url('admin'); ?>");
                }, 500);
            } else if ($status === "warning") {
                setTimeout(function() {
                    Swal.fire('ผิดพลาด!', $arr['message'], 'warning');
                    $(".login-btn").attr("disabled", false);
                    $(".login-btn").html('<i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ');
                }, 500);
            } else {
                Swal.fire('ผิดพลาด!', $arr['message'], 'error');
                setTimeout(function() {
                    $(location).attr("href",
                        "<?php echo base_url('login/system'); ?>");
                }, 1000);
            }
        });
    e.preventDefault();
  });
</script>
