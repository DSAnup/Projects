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
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Work Plan </h3>
            </div>
            <form action="<?=base_url()?>Update_Control/add_work_plan" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control date" value="<?php if(isset($edit)){ echo @$edit->date;} else{ echo date('Y-m-d'); }?>">
                  </div>
                  <div class="form-group">
                      <label>Entry Time</label>
                      <input type="text" name="entryTime" class="form-control" value="<?=@$edit->entryTime?>">
                  </div>

                  <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" name="timeStart" class="form-control" value="<?=@$edit->timeStart?>">
                  </div>
                  <div class="form-group">
                      <label>End Time </label>
                      <input type="text" name="endTime" class="form-control" value="<?=@$edit->endTime?>">
                  </div>
                  <div class="form-group">
                      <label>Work Plan </label>
                        <textarea rows="4" name="work" class="form-control ckeditor"  cols="100">
                            <?=@$edit->work?>
                        </textarea>
                    </div>
                  <div class="form-group">
                      <label>Future Plan </label>
                        <textarea rows="4" name="futurePlan" class="form-control ckeditor"  cols="100">
                            <?=@$edit->futurePlan?>
                        </textarea>
                    </div>
                  <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
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
                    <td><?= $s->entryTime;?></td>
                    <td><?= $s->timeStart;?></td>
                    <td><?= $s->endTime;?></td>
                    <td><?= $s->work;?></td>
                    <td><?= $s->futurePlan;?></td> 
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/work_plan/'.$s->id?>">Edit</a>
                      <!-- <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_work_plan/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a> -->
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
