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
                    Add New Test Package Feature
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Update_Control/add_test_package" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12" id="dynamic">
                                            <div class="form-group">
                                                <label>Package Name</label>
                                                <input type="text" name="packagename" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Test Name</label>
                                                <input type="text" name="name[]" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price[]" onkeyup="calculate_price()" class="form-control price">
                                            </div>
                                        </div>
                                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br>

                                            <div class="form-group">
                                                <label>Grand Total</label>
                                                <input type="text" name="grandTotal" id="grandTotal" class="form-control" readonly>
                                            </div>
                                        <div class="form-group">
                                                <label></label>

                                                <input type="submit" class="btn btn-primary btn-block" value="Add Test Package Feature">
                                            </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px">
                            <div class="box">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            <h3>Test Package List</h3>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th width="10%">Test Package Name</th>
                                                    <th width="10%">Test Package Price</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($test_package as $s) {?>
                                                <tr>
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->packagename;?></td>
                                                  <td><?= $s->grandTotal;?></td>
                                                  <td><a href="<?=base_url().'Admin_panel/edit_keyTest Package/'.$s->id?>">Edit |<a href="<?=base_url().'Admin_panel/delete_keyTest Package/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red">Delete</a></td>
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


          <script>
            $(document).ready(function(){
              var i = 1;
              $('#add').click(function(){
                i++;
                // var t="this.value"+"+'_'+"+ii;
        // html='<fieldset id="dynamic'+i+'">'
        html='<div class="form-group">'
        html+='<label>Test Name</label>'
        html+='<input type="text" name="name[]" class="form-control">'
        html+='</div>'
        html+='<div class="form-group">'
        html+='<label>Price</label>'
        html+='<input type="text" name="price[]" onkeyup="calculate_price()" class="form-control price">'
        html+='</div>'
        // html+='</fieldset>'
        $('#dynamic').append(html);
      });
              
            });
            function calculate_price() {

              var sum = 0.0;
              $('.price').each(function()
              {
                sum += parseFloat($(this).val());
              });
              $('#grandTotal').val(sum)
            }

          </script>