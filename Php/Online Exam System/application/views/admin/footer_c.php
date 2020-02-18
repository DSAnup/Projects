<footer class="main-footer">
  <strong>Copyright &copy;<?php echo date('Y');?> <?php echo date("Y")?> - <?php echo date('Y', strtotime('+1 years'))?> <a href="http://youthfireit.com">YouthFireIT</a>.</strong> All rights
  reserved.
</footer>
<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() . 'admin_file/admin/' ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() . 'admin_file/admin/' ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() . 'admin_file/admin/' ?>dist/js/demo.js"></script>

<script src="<?= base_url() . 'admin_file/admin/' ?>plugins/ckeditor/ckeditor.js"></script>
<!-- page script -->
<script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>

<script src="<?=base_url()?>jquery-ui-1.12.1/jquery-ui.min.js"></script>

<!-- chosen script start -->
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

          <!-- chosen script end -->
<script>
$(function () {
  $("#example1").DataTable({
    buttons: [
    'print'
    ]
  } );
  $("#example_1").DataTable({
    buttons: [
    'print'
    ]
  } );
  $("#example_2").DataTable({
    buttons: [
    'print'
    ]
  } );
  $("#example3").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });
});

</script>
<script>
$( function() {
  $( ".date" ).datepicker({
    dateFormat: "yy-mm-dd"
  });
} );
</script>

</body>
</html>