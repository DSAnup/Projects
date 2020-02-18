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
        <small>Patient List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Control/fixed_asset' ?>">Fixed Product List </a></li> -->

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
                <h3>Patient List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Registration Type</th>
                    <th>Registration Number</th>
                    <th>Registration Monthly Number</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($patient_new as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->patientName?></td>
                    <td><?php 
                        if($s->grnNum != 0){echo "GRN";}
                        if($s->mrnNum != 0){echo "MRN";}
                        if($s->prnNum != 0){echo "PRN";}
                    ?>  
                    </td>
                    <td><?php 
                        if($s->grnNum != 0){echo '000'.$s->grnNum;}
                        if($s->mrnNum != 0){echo '000'.$s->mrnNum;}
                        if($s->prnNum != 0){echo '000'.$s->prnNum;}
                    ?>  
                    </td>
                    <td><?php 
                        if($s->grnMNum != 0){echo date('m-Y', strtotime($s->dmonth)).'-'.'000'.$s->grnMNum;}
                        if($s->mrnMNum != 0){echo date('m-Y', strtotime($s->dmonth)).'-'.'000'.$s->mrnMNum;}
                        if($s->prnMNum != 0){echo date('m-Y', strtotime($s->dmonth)).'-'.'000'.$s->prnMNum;}
                    ?>  
                    </td>
                    <td><?= date('d-m-Y', strtotime($s->date))?></td>
                    <td>
                      <?php if($s->grnNum == 0){?>
                      <a class="btn btn-sm btn-info" href="<?=base_url().'Update_Control/convertreg/'.$s->id?>">Convert GRN</a>
                      <?php }?>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/viewpatient/'.$s->id?>">View</a> 
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_patientNew/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
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
