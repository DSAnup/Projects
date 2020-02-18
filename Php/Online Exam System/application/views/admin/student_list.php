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
        Add Student
        <small>Student List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Admin/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add New Student </h3>
            </div>
            <form action="<?=base_url()?>Admin/add_student" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?=@$edit->username?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?=@$edit->password?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?=@$edit->email?>">
                  </div>
                  <div class="form-group">
                    <label>Guardian Email</label>
                    <input type="text" name="guardian_email" class="form-control" value="<?=@$edit->guardian_email?>">
                  </div>
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?=@$edit->first_name?>">
                  </div>
                  <div class="form-group">
                    <label>Surname</label>
                    <input type="text" name="surname" class="form-control" value="<?=@$edit->surname?>">
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="<?=@$edit->city?>">
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control" value="<?=@$edit->country?>">
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
                <h3>Student List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Username</th>
                    <th width="20%">Password</th>
                    <th width="20%">Email</th>
                    <th width="20%">Guardian Email</th>
                    <th width="20%">First Name</th>
                    <th width="20%">Surname</th>
                    <th width="20%">City</th>
                    <th width="20%">Country</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($adm as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $s->username;?></td>
                    <td><?= $s->password;?></td>
                    <td><?= $s->email;?></td>
                    <td><?= $s->guardian_email;?></td>
                    <td><?= $s->first_name;?></td>
                    <td><?= $s->surname;?></td>
                    <td><?= $s->city;?></td>
                    <td><?= $s->country;?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Admin/student_list/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Admin/delete_student/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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