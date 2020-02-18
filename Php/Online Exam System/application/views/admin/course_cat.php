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
        Add Course Category
        <small>Course Category List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Admin/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Admin/admin_list' ?>">Add Admin </a></li> -->

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add New Course Category </h3>
            </div>
            <form action="<?=base_url()?>Admin/add_course_cat" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    
                  </div>
                  <div class="form-group">
                    <label>Course Category Name</label>
                    <input type="text" name="cat_name" class="form-control" value="<?=@$edit->cat_name?>">
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
                <h3>Course Category List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Name</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach($adm as $e){$i++;?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?=$e->cat_name?></td>
                            <td class="center">
                                <a href="<?= base_url()?>Admin/course_cat/<?php echo $e->id; ?>">
                                    <span class="label label-warning"><i class="icon-edit icon-white"></i>Edit</span>             
                                </a>       

                                <a href="<?= base_url()?>Admin/delete_course_cat/<?php echo $e->id; ?>" onclick="return confirm('are you sure?')">
                                    <span class="label label-danger"><i class="icon-trash icon-white"></i>Delete</span>                            
                                </a> 
                            </td>
                        </tr>

                        <?php
                        }
                    ?>
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