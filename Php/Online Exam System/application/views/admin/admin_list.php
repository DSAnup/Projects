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
        Add Admin
        <small>Admin List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Admin/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Admin/admin_list' ?>">Add Admin </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add New Admin </h3>
            </div>
            <form action="<?=base_url()?>Admin/add_admin" method="post" enctype="multipart/form-data">
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
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?=@$edit->email?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?=@$edit->password?>">
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label>Status</label>
                    Active <input type="radio" <?php if(@$edit->status=='active'){ echo "checked";} ?>  value="active" name="status">
                    Inactive <input type="radio" <?php if(@$edit->status=='inactive'){ echo "checked";} ?>  value="inactive" name="status">
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
                <h3>Admin List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Name</th>
                    <th width="20%">Email</th>
                    <th width="5%">Photo</th>
                    <th width="5%">Status</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($adm as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $s->name;?></td>
                    <td><?= $s->email;?></td>
                    <td><img src="<?= base_url().'uploads/'.$s->photo;?>" height ="100px" width="100px"/></td>
                    <td>
                      <a class="btn btn-sm <?php if($s->status=='active'){ echo 'btn-success';}else{ echo 'btn-danger';} ?>" href="<?=base_url().'Admin/change_status/'.$s->id?>">
                        <?php if($s->status=='active'){ echo "Active"; }else{ echo 'Inactive'; };?>
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Admin/admin_list/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Admin/delete_admin/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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