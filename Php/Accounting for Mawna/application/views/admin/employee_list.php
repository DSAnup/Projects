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
        Add Employee
        <small>Employee List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Add Employee </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add New Employee </h3>
            </div>
            <form action="<?=base_url()?>Control/add_employee" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?=@$edit->name?>">
                  </div>
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" class="form-control" value="<?=@$edit->designation?>">
                  </div>
                  <div class="form-group">
                    <label>Bank Account Number</label>
                    <input type="text" name="bank" class="form-control" value="<?=@$edit->bank?>">
                  </div>
                  <div class="form-group">
                    <label>Joining Date</label>
                    <input type="text" name="join_date" class="form-control date" value="<?=@$edit->join_date?>">
                  </div>
                  <div class="form-group">
                    <label>Provident Fund Start Date</label>
                    <input type="text" name="pf_start" class="form-control date" value="<?=@$edit->pf_start?>">
                  </div>
                  <div class="form-group">
                    <label>Weekly Personal Off Day</label>
                    <input type="checkbox" name="off_day[]" value="Fri">Friday
                    <input type="checkbox" name="off_day[]" value="Sat">Saturday
                    <input type="checkbox" name="off_day[]" value="Sun">Sunday
                    <input type="checkbox" name="off_day[]" value="Mon">Monday
                    <input type="checkbox" name="off_day[]" value="Tue">Tuesday
                    <input type="checkbox" name="off_day[]" value="Wed">Wednesday
                    <input type="checkbox" name="off_day[]" value="Thu">Thursday
                   <!--  <select name="off_day" class="form-control">
                      <option>Select Off Day</option>
                      <option value="Fri" <?php if(@$edit->off_day=='Fri'){ echo "selected";} ?>>Friday</option>
                      <option value="Sat" <?php if(@$edit->off_day=='Sat'){ echo "selected";} ?>>Saturday</option>
                      <option value="Sun" <?php if(@$edit->off_day=='Sun'){ echo "selected";} ?>>Sunday</option>
                      <option value="Mon" <?php if(@$edit->off_day=='Mon'){ echo "selected";} ?>>Monday</option>
                      <option value="Tue" <?php if(@$edit->off_day=='Tue'){ echo "selected";} ?>>Tuesday</option>
                      <option value="Wed" <?php if(@$edit->off_day=='Wed'){ echo "selected";} ?>>Wednesday</option>
                      <option value="Thu" <?php if(@$edit->off_day=='Thu'){ echo "selected";} ?>>Thursday</option>
                    </select> -->
                  </div>
                  <div class="form-group">
                    <label>Basic Salary</label>
                    <input type="text" name="salary" class="form-control" value="<?=@$edit->salary?>">
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
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
                <h3>Employee List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Bank Account</th>
                    <th>Joining Date</th>
                    <th>PF Start </th>
                    <th>Pf End</th>
                    <th>Basic Salary</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($emp as $k) {?>
                  <pre>
                  <?php 
                    //$off=explode('-', $k->off_day); var_dump($off); 
                  // if (in_array('Fri', $off)) {
                  //   echo "string";
                  // }
                  ?>
                </pre>
                    <tr>
                      <td><?=++$i?></td>
                      <td><img src="<?=base_url().'uploads/'.$k->photo?>" width="100" height="100"></td>
                      <td><?=$k->name?></td>
                      <td><?=$k->designation?></td>
                      <td><?=$k->bank?></td>
                      <td><?=$k->join_date?></td>
                      <td><?=$k->pf_start?></td>
                      <td><?=$k->pf_end?></td>
                      <td><?=$k->salary?></td>
                      <td>
                        <a href="<?=base_url().'Control/employee_list/'.$k->id?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="<?=base_url().'Control/delete_employee/'.$k->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
<script type="text/javascript">
  function if_asm (v) {
    if(v=='asm'){
      $('#zone').css('display','block')
    }else{
      $('#zone').css('display','none')
    }
  }
</script>