<?php $this->load->view('head_c');?>
    <div class="wrapper">

        <?php
        $this->load->view('leftMenu');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Add New Product Feature
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/keyproduct' ?>">Add Product Feature </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/add_keyproduct" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12" id="dynamic">
                                            <div class="form-group">
                                                <label>Product</label>
                                                <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="pId">
                                                  <option value=""></option>
                                                  <?php foreach($product as $p){?>
                                                  <option value="<?= $p->id?>"> <?= $p->procode?> | <?= $p->name?></option>
                                                  <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Key Feature</label>
                                                <input type="text" name="keyName[]" class="form-control">
                                            </div>
                                            
                                            
                                        </div>
                                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br>
                                        <div class="form-group">
                                                <label></label>

                                                <input type="submit" class="btn btn-primary btn-block" value="Add Product Feature">
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
                                            <h3>Product Feature List</h3>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th width="10%">Product Name</th>
                                                    <th width="10%">Product Model</th>
                                                    <th width="10%">Product Code</th>
                                                    <th width="10%">Product Feature</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($keyproduct as $s) {?>
                                                <tr>
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->name;?></td>
                                                  <td><?= $s->model;?></td>
                                                  <td><?= $s->procode;?></td>
                                                  <td><?= $s->keyName;?></td>
                                                  <td><a href="<?=base_url().'Admin_panel/edit_keyproduct/'.$s->id?>">Edit |<a href="<?=base_url().'Admin_panel/delete_keyproduct/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red">Delete</a></td>
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

          <?php $this->load->view('footer_c');?>


          <script>
            $(document).ready(function(){
              var i = 1;
              $('#add').click(function(){
                i++;
                // var t="this.value"+"+'_'+"+ii;
        // html='<fieldset id="dynamic'+i+'">'
        html='<div class="form-group">'
        html+='<label>Key Feature</label>'
        html+='<input type="text" name="keyName[]" class="form-control">'
        html+='</div>'
        // html+='</fieldset>'
        $('#dynamic').append(html);
      });
            });
          </script>