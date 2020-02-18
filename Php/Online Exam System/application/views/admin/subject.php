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
        Add Subject
        <small>Subject List</small>
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
              <h3>Add New Subject </h3>
            </div>
            <form action="<?=base_url()?>Admin/create_subject" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label>Course Category</label>
                    <select data-placeholder="Choose a Category..." class="chosen-select form-control" tabindex="2" name="cId">
                      <option>Select Category</option>
                      <?php
                          foreach ($course_cat as $s) {
                      ?>
                      <option value="<?=$s->id?>" <?php if($s->id == @$edit->cId){echo "selected";}?>><?=$s->cat_name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?=@$edit->name?>">
                  </div>
                  <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-group ckeditor" name="details">
                      <?=@$edit->details?>
                    </textarea>
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
                <h3>Subject List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Category</th>
                    <th width="20%">Subject</th>
                    <th width="30%">Details</th>
                    <th width="15%">Photo</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach($subject as $e){$i++;?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?php foreach($course_cat as $row){if($row->id == $e->cId){
                              echo $row->cat_name;
                            }}?></td>
                            <td><?=$e->name?></td>
                            <td><?=$e->details ?> </td>
                            <td><img src="<?=base_url().'uploads/'.$e->photo?>" width="80" height="60"></td>
                            <td class="center">
                                <a href="<?= base_url()?>Admin/subject/<?php echo $e->id; ?>">
                                    <span class="label label-warning"><i class="icon-edit icon-white"></i>Edit</span>             
                                </a>       

                                <a href="<?= base_url()?>Admin/subject_delete/<?php echo $e->id; ?>" onclick="return confirm('are you sure?')">
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