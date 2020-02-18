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
        Work Plan
        <small>Work Plan List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        

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
                <h3>Work Plan List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="7%">Date</th>
                    <th width="7%">Employee Name</th>
                    <th width="7%">Entry Time</th>
                    <th width="7%">Start Time</th>
                    <th width="7%">End Time</th>
                    <th>Work Plan</th>
                    <th>Future Plan</th>
                    <th width="7%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($work_plan as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $s->date;?></td>
                    <td><?php 
                      foreach ($users as $k) {
                        if($k->id == $s->userId){
                          echo $k->name;
                        }
                      }
                    ?></td>
                    <td><?= $s->entryTime;?></td>
                    <td><?= $s->timeStart;?></td>
                    <td><?= $s->endTime;?></td>
                    <td><?= $s->work;?></td>
                    <td><?= $s->futurePlan;?></td> 
                    <td>
                      <!-- <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/work_plan/'.$s->id?>">Edit</a> -->
                       <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_work_plan/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a> 
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
