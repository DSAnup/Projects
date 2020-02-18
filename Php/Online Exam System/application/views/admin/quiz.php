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
        Add Quiz
        <small>Quiz List</small>
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
              <h3>Add New Quiz </h3>
            </div>
            <form action="<?=base_url()?>Admin/create_quiz" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="q_id" value="<?=$edit->q_id?>">
                    <?php } ?>
                    <label>Subject</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" onchange="get_module(this.value)" name="sub_id">
                      <option>Select Subject</option>
                      <?php
                          foreach ($subject as $s) {
                      ?>
                      <option value="<?=$s->id?>" <?php if($s->id == @$edit->sub_id){echo "selected";}?>><?=$s->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <?php if(isset($edit)){ foreach ($course as $k) { if($k->id == $edit->lesson_id){
                    ?>

                  <h5>Selected Course is: <?= $k->name?></h5>
                  <?php } } }?> -->


                  <div class="form-group" id="module">
                    <label>Chapter Name</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="lesson_id">
                      <option value="">Select Chapter</option>
                      <?php
                          foreach ($course as $s) {
                      ?>
                      <option value="<?=$s->id?>" <?php if($s->id == @$edit->lesson_id){echo "selected";}?>><?=$s->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <span id="qq">       
                <div class="control-group" id="r_1">
                    <label class="form-group" for="focusedInput"> Question (1).</label>
                        <textarea class="form-control ckeditor" name="question">
                          <?=@$edit->question?>
                        </textarea>
                    <br>
                    <label class="control-label" for="focusedInput"> Options</label>
                    <div class="controls">
                        ( 1 ). <textarea class="form-control ckeditor" name="option_1">
                          <?=@$edit->option_1?>
                        </textarea>
                        ( 2 ). <textarea class="form-control ckeditor" name="option_2">
                          <?=@$edit->option_2?>
                        </textarea>
                        ( 3 ). <textarea class="form-control ckeditor" name="option_3">
                          <?=@$edit->option_3?>
                        </textarea>
                        ( 4 ). <textarea class="form-control ckeditor" name="option_4">
                          <?=@$edit->option_4?>
                        </textarea>
                    </div><br>
                    <label class="control-label" for="focusedInput"> Answer</label>
                    <div class="controls">
                        <select name="answer" required="required" class="form-control">
                            <option value="">Select Answer</option>
                            <option value="1" <?php if(1 == @$edit->sub_id){echo "selected";}?>>1</option>
                            <option value="2" <?php if(2 == @$edit->sub_id){echo "selected";}?>>2</option>
                            <option value="3" <?php if(3 == @$edit->sub_id){echo "selected";}?>>3</option>
                            <option value="4" <?php if(4 == @$edit->sub_id){echo "selected";}?>>4</option>
                        </select>
                        <!-- <a class="btn btn-danger" onclick="rm(1)">Remove</a> -->
                    </div>
                </div>
                <div class="form-group" id="module">
                    <label>Answer Explains</label>
                    <textarea class="form-control ckeditor" name="answer_explain">
                      <?=@$edit->answer_explain?>
                    </textarea>
                  </div>
                    </span>
                    <!-- <a class="btn btn-success" onclick="add_more()">Add More</a> -->
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
                <h3>Quiz List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="10%">Subject</th>
                    <th width="10%">Chapter</th>
                    <th width="55%">Question</th>
                    <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach($quiz as $e){$i++;?>
                      
                        <tr>
                            <td><?=$i++?></td>
                            <td><?php foreach($course as $row){if($row->id == $e->lesson_id){
                              foreach($subject as $s){
                                if($s->id == $row->subject)
                                  echo $s->name;
                              }
                            }}?></td>
                            <td><?php foreach($course as $row){if($row->id == $e->lesson_id){
                              echo $row->name;
                            }}?></td>
                            <td><?= $e->question ;?></td>
                            <td class="center">
                                <a href="<?= base_url()?>Admin/quiz/<?php echo $e->q_id; ?>">
                                    <span class="label label-warning"><i class="icon-edit icon-white"></i>Edit</span>             
                                </a>       

                                <a href="<?= base_url()?>Admin/lesson_wise_quiz_delete/<?php echo $e->q_id; ?>" onclick="return confirm('are you sure?')">
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

<script type="text/javascript">
    function get_lesson(id){
        var base = '<?php echo base_url() ?>';
        $.ajax({
          url: base + 'Admin/get_lession',
          type: 'post',
          data: {
            id: id
        },
        success: function (data) {
            $('#le').html(data)
        }
    })
    }
var i=1;
    function add_more(){
        i+=1;

        var html='<hr>'
                  html+='  <div class="control-group" id="r_'+i+'">'
                   html+=' <label class="control-label" for="focusedInput"> Question ('+i+').</label>'
                    html+='<div class="controls">'
                        html+='<input type="text" name="question[]" class="form-control">'
                    html+='</div><br>'
                    html+='<label class="control-label" for="focusedInput"> Options</label>'
                    html+='<div class="controls">'
                        html+='( 1 ). <input type="text" name="option_1[]" class="input-small focused">'
                        html+='( 2 ). <input type="text" name="option_2[]" class="input-small focused">'
                        html+='( 3 ). <input type="text" name="option_3[]" class="input-small focused">'
                        html+='( 4 ). <input type="text" name="option_4[]" class="input-small focused">'
                    html+='</div><br>'
                    html+='<label class="control-label" for="focusedInput"> Answer</label>'
                    html+='<div class="controls">'
                        html+='<select name="answer[]" data-rel="chosen"  required="required">'
                        html+='<option value="">Select Answer</option>'
                            html+='<option value="1">1</option>'
                            html+='<option value="2">2</option>'
                            html+='<option value="3">3</option>'
                            html+='<option value="4">4</option>'
                        html+='</select> <a class="btn btn-danger" onclick="rm('+i+')">Remove</a>'
                    html+='</div>'
                html+='</div>'
                $('#qq').append(html)
    }
    function rm(id){
        $('#r_'+id).remove()
    }
    function get_module(id){
        var base = '<?php echo base_url() ?>';
    $.ajax({
        dataType: "json",
        url: base + 'Admin/get_module',
        type: 'post',
        data: {
            item: id
        },
        success: function (data) {
            html='<select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="lesson_id">';
                                html+='<option>Select Chapter</option>'
                                $.each(data, function(i,v){
                                    html+='<option value="'+v.id+'">'+v.name+'</option>'
                                })
                                html+='</select> </div>'
                                $('#module').html(html)
        }
    })
    }
</script>