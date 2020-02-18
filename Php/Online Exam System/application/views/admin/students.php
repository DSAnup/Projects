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
                html='<select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="course_id">';
                html+='<option>Select veriation</option>'
                $.each(data, function(i,v){
                    html+='<option value="'+v.id+'">'+v.name+'</option>'
                })
                html+='</select> </div>'
                $('#module').html(html)
            }
        })
    }
</script>