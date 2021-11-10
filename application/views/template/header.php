<?php
  $this->admin->login_system();
  $type = $this->session->userdata('type_id');
  $user_id = $this->session->userdata('user_id');
  $student_id = $this->session->userdata('student_id');
  if ($type == 1 or $type == 2 or $type == 3)
  {
    $user_data = $this->admin->get_user($user_id);
  }
  else
  {
    $user_data = $this->admin->get_student($student_id);
  }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Education Sandbox">
    <meta name="keywords" content="Education Sandbox">
    <meta name="author" content="Education Sandbox">
    <title>Education Sandbox | <?php echo $title; ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>app-assets/images/ico/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Mitr:400|Pridi:300|Prompt" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/material-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/FontAwesome.Pro.5.15.1/css/all.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/menu/menu-types/material-horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/formvalidation/formValidation.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/pages/gallery.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <!-- END: Custom CSS-->
    <style media="screen">
      body, h1, h2, h3, h4, h5, h6, span, a
      {
        font-family: 'Prompt', sans-serif!important;
        font-style: normal;
      }
      footer a
      {
        color: #4db9ff !important;
      }
      hr {
          box-sizing: content-box;
          height: 0;
          overflow: visible;
      }
      .modal-body
      {
        padding: 15px 1.5rem !important;
      }
      .modal-footer
      {
        justify-content: flex-start !important;
        padding: 15px 1.2rem;
        border-top: 1px solid #bfbfbf;
      }
      .heading-elements
      {
        right: 15px !important
      }
      .help-block
      {
        color: #dc3545;
        font-size: 14px;
        padding-top: 5px;
      }

      .form-group.has-error input, .form-group.has-error select, .form-group.has-error textarea {
        color: #dc3545;
        border-color: #dc3545;
      }
    </style>


    <!-- DATA TABLE CSS-->
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/tables/datatable/datatables.min.css">
   
    <!-- END: DATA TABLE CSS-->

    <!-- File Input -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/fileinput/css/fileinput.min.css">
    <!-- END: File Input-->

   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/glyphicon.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/sweetalert/sweetalert2.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/forms/selects/select2.min.css">

   <!-- Datetime Picker -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/datetimepicker/css/jquery-ui.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding material-horizontal-layout material-layout 2-columns  " data-open="click" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                      <a class="navbar-brand" href="<?php echo base_url();?>">
                      <!-- <img class="brand-logo" alt="modern admin logo" src="<?php echo base_url();?>app-assets/images/logo/logo.png"> -->
                        <h3 class="brand-text"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education Sandbox</h3>
                      </a>
                    </li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container container center-layout">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item"><a class="nav-link nav-link-expand mr-0" href="#"><i class="ficon ft-maximize"></i></a></li>

                            <div class="search-input">
                                <input class="input round form-control search-box" type="text" placeholder="Explore Modern Admin" tabindex="0" data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                                <div class="dropdown-menu arrow">
                                    <div class="dropdown-item">
                                        <input class="round form-control" type="text" placeholder="Search Here">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                      <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <span class="avatar avatar-online">
                            <img src="<?php echo base_url();?>app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i>
                          </span>
                          <span class="mr-1 user-name text-bold-700"><?php echo $user_data->first_name.' '.$user_data->last_name; ?></span>
                        </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="user-profile.html">
                                <i class="material-icons">person_outline</i> ข้อมูลส่วนตัว</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout">
                                  <i class="material-icons">power_settings_new</i> ออกจากระบบ
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <!-- แอดมิน -->
                <?php if ($type == 1) { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin');?>">
                      <i class="fa fa-home"></i>
                      <span>หน้าแรก</span>
                    </a>
                  </li>
                  <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-school"></i>
                      <span>จัดการโรงเรียน</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                          <a class="dropdown-item" href="<?php echo base_url('admin/select');?>" data-toggle="">
                            <i class="far fa-clone"></i>
                            <span>เลือกโรงเรียน</span>
                          </a>
                        </li>
                        <li data-menu="">
                          <a class="dropdown-item" href="<?php echo base_url('admin/school');?>" data-toggle="">
                            <i class="fas fa-cogs"></i>
                            <span>จัดการโรงเรียน</span>
                          </a>
                        </li>
                    </ul>
                  <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-users"></i>
                      <span>จัดการผู้ใช้งาน</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                          <a class="dropdown-item" href="<?php echo base_url('admin/user');?>" data-toggle="">
                            <i class="fas fa-user-alt"></i>
                            <span>รายชื่อผู้ใช้งาน</span>
                          </a>
                        </li>
                        <li data-menu="">
                          <a class="dropdown-item" href="<?php echo base_url('admin/user_type');?>" data-toggle="">
                            <i class="fas fa-user-cog"></i>
                            <span>ประเภทผู้ใช้งาน</span>
                          </a>
                        </li>
                    </ul>
                <!-- /แอดมิน -->


                <!-- ธุรการ-->
                <?php } else if ($type == 2) { ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('school');?>">
                      <i class="fa fa-home"></i>
                      <span>หน้าแรก</span>
                    </a>
                  </li>
                  <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-users"></i>
                      <span>จัดการนักเรียน</span>
                    </a>
                    <ul class="dropdown-menu">

                       <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/form_add_student/');?>" data-toggle=""><i class="la la-sitemap"></i><span data-i18n="Crypto">เพิ่มข้อมูลนักเรียน</span></a>
                      </li>

                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/list_student/');?>" data-toggle=""><i class="la la-cart-plus"></i><span data-i18n="eCommerce">รายการนักเรียน</span></a>
                      </li>
                     
                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/list_student_room/');?>" data-toggle=""><i class="la la-sitemap"></i><span data-i18n="Crypto">เพิ่มนักเรียนเข้าห้อง</span></a>
                      </li>

                       <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/list_student_score_search/');?>" data-toggle=""><i class="la la-sitemap"></i><span data-i18n="Crypto">จัดการเกรดของนักเรียน</span></a>
                      </li>

                    </ul>

                  </li>

                  <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-users"></i>
                      <span>จัดการครู</span>
                    </a>
                    <ul class="dropdown-menu">
    
                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/form_add_teacher/');?>" data-toggle=""><i class="la la-sitemap"></i><span data-i18n="Crypto">เพิ่มข้อมูลครู</span></a>
                      </li>

                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('School/list_teacher/');?>" data-toggle=""><i class="la la-cart-plus"></i><span data-i18n="eCommerce">รายการข้อมูลครู</span></a>
                      </li>
      
                    </ul>

                  </li>


                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('school/room_class');?>">
                      <i class="fa fa-home"></i>
                      <span>จัดการระดับชั้น</span>
                    </a>
                  </li>


                  <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-book-open"></i>
                      <span>จัดการรายวิชา</span>
                    </a>
                    <ul class="dropdown-menu">
    
                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('school/subject');?>" data-toggle=""><i class="far fa-clipboard"></i><span data-i18n="Crypto">จัดการข้อมูลรายวิชา</span></a>
                      </li>

                      <li data-menu=""><a class="dropdown-item" href="<?php echo base_url('school/subject_group/');?>" data-toggle=""><i class="la la-sitemap"></i><span data-i18n="eCommerce">จัดการกลุ่มวิชา</span></a>
                      </li>
      
                    </ul>

                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('school/registered_subjects');?>">
                      <i class="fas fa-sign-in-alt"></i>
                      <span>ลงทะเบียนรายวิชา</span>
                    </a>
                  </li>


              

                  
                <!-- /ธุรการ-->

                <!-- ครู -->
                <?php } else if ($type == 3) { ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('teacher');?>">
                      <i class="fa fa-home"></i>
                      <span>หน้าแรก</span>
                    </a>
                  </li>
                <!-- /ครู -->
                <!-- นักเรียน -->
                <?php } else if ($type == 4) { ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('student');?>">
                      <i class="fa fa-home"></i>
                      <span>หน้าแรก</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>">
                      <i class="fa fa-book"></i>
                      <span>ผลการเรียน</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>">
                      <i class="fa fa-exchange"></i>
                      <span>ยื่นคำร้องเทียบโอน</span>
                    </a>
                  </li>
                <?php } ?>
                <!-- /นักเรียน -->
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
