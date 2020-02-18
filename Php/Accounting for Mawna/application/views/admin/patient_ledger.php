<?php $this->load->view('admin/head_c');?>
<div class="wrapper">

  <?php
  $this->load->view('admin/leftMenu');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient
        <small>Patient Ledger</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Patient Ledger </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="box">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-12" style="color: #79a0e0">
                  <h3>Patient Ledger</h3>
                </div>
                <table id="example1" class="table table-bordered table-striped" border="1">
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th>SL</th>
                      <th>Patient</th>
                      <th>Due</th>
                      <th>Paid</th>
                      <th>Balance Due</th>
                    </tr>
                  </thead>
                  <tbody id="itembody">
                    <?php $ci=&get_instance(); $ci->load->model('Admin_model'); $i=0; foreach ($patient as $s) {
                      $due=$ci->Admin_model->get_patient_due($s->id);
                      $due_paid=$ci->Admin_model->get_patient_due_paid($s->id);
                      ?>
                    <tr>
                      <td><?= ++$i;?></td>
                      <td><?=$s->patientName?></td>
                      <td><?=$due?></td>
                      <td><?=$due_paid?></td>
                      <td><?=$due-$due_paid?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view('admin/footer_c');?>
  