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
        Add Module
        <small>Module List</small>
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
              <h3>Add New Module </h3>
            </div>
            <form action="<?=base_url()?>Admin/create_course" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <label>Subject</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="subject" required="required">
                      <option value="">Select Subject</option>
                      <?php
                          foreach ($subject as $s) {
                      ?>
                      <option value="<?=$s->id?>" <?php if($s->id == @$edit->subject){echo "selected";}?>><?=$s->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" id="module">
                    <label>Chapter Name</label>
                    <input type="text" name="name" class="form-control" value="<?=@$edit->name?>" required>
                  </div>
                  <div class="form-group">
                    <label>Duration</label>
                    <input type="number" name="duration" class="form-control" value="<?=@$edit->duration?>" required>
                  </div>
                  <div class="form-group">
                    <label>How much Questions Published at a time</label>
                    <input type="number" name="totalquestion" class="form-control" value="<?=@$edit->totalquestion?>" required>
                  </div>
                  <div class="form-group">
                    <label>How much time take exam per student</label>
                    <input type="number" name="howmuchtime" class="form-control" value="<?=@$edit->howmuchtime?>" required>
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
                <h3>Module List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Subject</th>
                    <th width="20%">Name</th>
                    <th width="15%">Duration</th>
                    <th width="15%">Questions</th>
                    <th width="15%">How Much Time</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach($course as $e){$i++;?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?php foreach($subject as $row){if($row->id == $e->subject){
                              echo $row->name;
                            }}?></td>
                            <td><?=$e->name?></td>
                            <td><?=$e->duration?> Minute(s)</td>
                            <td><?=$e->totalquestion?></td>
                            <td><?=$e->howmuchtime?></td>
                            <td class="center">
                                <a href="<?= base_url()?>Admin/course/<?php echo $e->id; ?>">
                                    <span class="label label-warning"><i class="icon-edit icon-white"></i>Edit</span>             
                                </a>       

                                <a href="<?= base_url()?>Admin/course_delete/<?php echo $e->id; ?>" onclick="return confirm('are you sure?')">
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