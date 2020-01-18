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
        Generate Reports 
        <small>New Generate Reports </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">New Invoice  </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <div class="col-md-6">
                  <p>Patient Name : <?= $edit[0]->pname;?></p>
                  <p>Patient Age : <?= $edit[0]->age;?></p>
                  <p>Patient Phone : <?= $edit[0]->phone;?></p>
                </div>
                <div class="col-md-6">
                  <p>Patient Address : <?= $edit[0]->present_address;?></p>
                  
                </div>
                
              </div>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Test Name</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($edit as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $s->name;?></td>
                    
                  </tr>
                  <?php } ?>
                </tbody>

              </table>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Test Name</th>
                  </tr>
                </thead>
                <tbody id="b">
                  
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Generate Reports </h3>
              <a class="btn btn-sm btn-success" href="<?=base_url().'Control/print_reports/'.$edit[0]->invoice_id?>">Print Reports</a>
            </div>
            <form action="<?=base_url()?>Control/update_reports" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <input type="hidden" value="<?= $edit[0]->invoice_id ;?>" name="id">
                <div class="form-group"> 
                <label>Select Test</label>
                    <select data-placeholder="Choose a test..." class="chosen-select form-control" tabindex="2" name="tId" required="required" onchange="ss(this.value)">
                      <option value=""></option>
                      <?php foreach($test as $p){?>
                        <option value="<?= $p->id?>"> <?= $p->name?></option>
                      <?php }?>
                    </select>
                  </div>
                  <?php foreach($test_element_list as $p){?>
                  <div id="dynamic<?= $p->id?>">
                    
                  </div>
                <?php }?>
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
<!-- chosen script start -->
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

          <!-- chosen script end -->

          <script type="text/javascript">
            function ss(id){
               // var d= $('#reg').val();
                // alert(id);
                $.ajax({
                    url:'<?= base_url()?>Control/viewTestElement',
                    type: 'post',
                    dataType: 'json',
                    data: {val: id},

                    success: function(data){

                        $.each(data, function(key, value) {
                            $('#dynamic'+value.id).append('<div class="col-md-4"><div class="form-group"><label>Test Element Name</label><input type="text" name="tEName" value="'+value.tEName+'" class="form-control"></div><div class="form-group"><label>Test Element Result</label><input type="text" name="result" class="form-control"></div><div class="form-group"><label>Test Element Unit</label><input type="text" name="unit" class="form-control"></div><div class="form-group"><label>Test Element Refference</label><textarea name="refference" class="form-control"></textarea></div><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+value.id+')">-</a></div>');
                        });


                }   

            });
            }

            function remove_test(id) {
              alert(id);
              $('#dynamic'+id).remove()
            
            }
        </script>



        
  public function generateReports($id){
    $userID = $this->session->userdata('userID');
    if (isset($userID)) {
      $data['edit'] = $this->Admin_model->get_testSaleName1($id);
      $data['test'] = $this->Rest_model->SelectDataOrder('test','*','','id','desc');
      $data['test_element_list'] = $this->Rest_model->SelectDataOrder('test_element_list','*','','id','desc');
      $this->load->view('admin/generateReports', $data);
    }else{
      redirect(base_url().'Control', 'refresh');
    }
  }
  public function viewTestElement(){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Control','refresh');
        }else{
            $id = $this->input->post('val');
        
        $data = $this->Admin_model->get_testName1($id);
        
        echo json_encode($data); 
        }
    }