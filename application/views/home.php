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

              <!-- สินสุด: เนื้อหา -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $this->load->view('template/footer'); ?>
