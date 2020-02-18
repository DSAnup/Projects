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
         Students Search
        <small>Students Search</small>
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
              <h3>Students </h3>
            </div>
            <form action="<?=base_url()?>Admin/search_std" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label>Subject</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" onchange="get_module(this.value)">
                      <option>Select Subject</option>
                      <?php
                          foreach ($subject as $s) {
                      ?>
                      <option value="<?=$s->id?>" <?php if($s->id == @$edit->subject){echo "selected";}?>><?=$s->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" id="module">
                    <label>Module Name</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="course_id">
                      <option value="">Select Module</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="date" >
                      <option>Select Date</option>
                      <?php
                            foreach ($date as $d) {
                                echo "<option value='".$d->date."'>".$d->date."</option>";
                            }
                            ?>
                    </select>
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
                <h3><?=$sub->s.' ( '.$sub->c.' )'.' Date: '.$date?></h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Name</th>
                    <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                    $i=0;
                        foreach ($std as $k) {
                    ?>
                    <tr>
                        <td><?=++$i?></td>
                        <td><?=$k->username?></td>
                        <td>
                            <a href="<?=base_url().'Admin/result2/'.$k->enroll_id?>" class="btn btn-primary">View Result</a> 
                            <?php
                            if ($k->published=='') {
                            ?><span>
                            <a href="<?=base_url().'Admin/publish/'.$k->enroll_id?>" class="btn btn-primary">Publish Result</a></span>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-success">Published</a>
                            <?php } ?><span>
                            <a href="<?=base_url().'Admin/reset/'.$k->enroll_id?>" class="btn btn-danger">Reset</a></span>
                            <?php
                            if ($k->published!='') {
                            ?><span>
                            <a href="<?=base_url().'Admin/send/'.$k->enroll_id?>" class="btn btn-info">Send Email</a></span><?php }?>
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
    function get_module(id) {
        var base = '<?php echo base_url() ?>';
        $.ajax({
            dataType: "json",
            url: base + 'Admin/get_module',
            type: 'post',
            data: {
                item: id
            },
            success: function (data) {
                html='<select data-rel="chosen" class="input-xlarge focused" name="course_id">';
                html+='<option>Select veriation</option>'
                $.each(data, function(i,v){
                    html+='<option value="'+v.id+'">'+v.name+'</option>'
                })
                html+='</select> </div>'
                $('#module').html(html)
            }
        })
    }
    function publish(id){
        html='<a href="#" class="btn btn-success">Published</a>'
        var base = '<?php echo base_url() ?>';
        $.ajax({
            url: base + 'Admin/set_publish',
            type: 'post',
            data: {
                id: id
            },
            success: function (data) {
                $('#s_'+id).html(html)
            }
        })
    }
    function reset(id){
    var i=id.split('_');
        html='<a href="#" class="btn btn-success">Reseted</a>'
        var base = '<?php echo base_url() ?>';
        $.ajax({
            url: base + 'Admin/reset',
            type: 'post',
            data: {
                id: id
            },
            success: function (data) {
                $('#r_'+i[1]).html(html)
            }
        })
    }
</script>
