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
        Edit Quiz
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
              <h3>Edit Quiz </h3>
            </div>
            <form action="<?=base_url()?>Admin/edit_quiz_post" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label class="control-label" for="focusedInput">Course Name</label>
                    <div class="form-group">
                        <select name="lesson_id" data-rel="chosen" class="form-control" disabled>
                            <option value="">Select Course</option>
                            <?php
                            foreach ($course as $e) {
                                ?>
                                <option value='<?=$e->id?>' <?php if($e->id==$id){ echo "selected";} ?>><?=$e->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>  
                    <?php
                    foreach ($quiz as $k) {
                        
                    ?>         
                    <div class="form-group" id="r_1">
                        <label class="control-label" for="focusedInput"> Question (1).</label>
                        <div class="form-group">
                            <input type="text" value="<?=$k->question?>" name="question[]" class="form-control">
                            <a href="<?= base_url()?>Admin/quiz_delete/<?php echo $id.'_'.$k->q_id; ?>" onclick="return confirm('are you sure?');">
                                    <span class="label label-danger"><i class="icon-trash icon-white"></i>Delete</span>                            
                                </a>
                        </div><br>
                        <label class="control-label" for="focusedInput"> Options</label>
                        <div class="form-group">
                            ( 1 ). <input type="text" value="<?=$k->option_1?>" name="option_1[]" class="input-small focused">
                            ( 2 ). <input type="text" value="<?=$k->option_2?>" name="option_2[]" class="input-small focused">
                            ( 3 ). <input type="text" value="<?=$k->option_3?>" name="option_3[]" class="input-small focused">
                            ( 4 ). <input type="text" value="<?=$k->option_4?>" name="option_4[]" class="input-small focused">
                        </div><br>
                        <label class="control-label" for="focusedInput"> Answer</label>
                        <div class="form-group">
                            <select name="answer[]" class="form-control">
                                <option>Select Answer</option>
                                <option value="1" <?php if($k->answer==1){ echo "selected";} ?>>1</option>
                                <option value="2" <?php if($k->answer==2){ echo "selected";} ?>>2</option>
                                <option value="3" <?php if($k->answer==3){ echo "selected";} ?>>3</option>
                                <option value="4" <?php if($k->answer==4){ echo "selected";} ?>>4</option>
                            </select>
                        </div>
                        <input type="hidden" name="q_id[]" value="<?=$k->q_id?>">
                    </div>
                    <?php } ?>
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

      
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
