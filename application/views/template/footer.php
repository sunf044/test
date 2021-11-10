    </br></br>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer fixed-bottom footer-dark navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
          <span class="float-md-left d-block d-md-inline-block">สงวนลิขสิทธิ์ &copy; 2021
            <a class="text-bold-800 grey darken-2" href="<?php echo base_url();?>">Education Sandbox</a>
          </span>
          <span class="float-md-right d-none d-lg-block"><span id="scroll-top"></span></span>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>app-assets/js/scripts/pages/material-app.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/extensions/ex-component-sweet-alerts.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/formvalidation/formValidation.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/formvalidation/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js"></script>

    <!-- END: Page JS-->

    <!-- DATA TABLE JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
    <!-- END: DATA TABLE JS-->

    <!-- Fileinput -->
    <script src="<?php echo base_url();?>app-assets/fileinput/js/plugins/piexif.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/fileinput/js/plugins/sortable.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/fileinput/js/fileinput.js"></script>
    <script src="<?php echo base_url();?>app-assets/fileinput/themes/fas/theme.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/fileinput/js/locales/th.js"></script>

    <script src="<?php echo base_url();?>app-assets/sweetalert/sweetalert2.min.js"></script>

    <script src="<?php echo base_url();?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>

    <script src="<?php echo base_url();?>app-assets/js/scripts/modal/components-modal.js"></script>

    <!-- Datetime Picker -->
    <script src="<?php echo base_url();?>assets/plugins/datetimepicker/js/jquery-ui.js"></script>

</body>
<!-- END: Body-->

</html>
<script type="text/javascript">
  let url = window.location.href;
  $('ul.nav li.nav-item a.nav-link').each(function() {
    if (this.href === url) {
      $(this).closest('a').addClass('active');
      //$(this).parent('li').closest('ul.nav-sidebar > li.nav-item').addClass('menu-is-opening menu-open');
    }
  });
  $(".logout").click(function()
  {
      Swal.fire({
          icon: 'warning',
          title: 'ออกจากระบบ',
          text: "คุณต้องการออกจากระบบหรือไม่?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ตกลง',
          cancelButtonText: 'ยกเลิก'
      }).then((result) => {
          if (result.value) {
              $.post("<?php echo base_url("login/logout"); ?>")
              .done(function() {
                  Swal.fire('Success!', 'ออกจากระบบสำเร็จ.', 'success')
                  setTimeout(function() {
                    $(location).attr("href", '<?php
                    $type = $this->session->userdata('type_id');
                    if ($type == 1 or $type == 2)
                    { echo base_url("login/system"); }
                    else if ($type == 3)
                    { echo base_url("login"); }
                    else { echo base_url("login");}
                    ?>');
                  }, 1000);
              })
              .fail(function() {
                  Swal.fire("Error!", "เกิดข้อผิดพลาด.", "error");
              });
          }
      });
  });
</script>
