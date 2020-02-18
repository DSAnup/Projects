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
        Reagent Stock Update
        <small>Reagent Stock Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Reagent Stock Update </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <?php  
              echo "<h3 style='color:green'>".$this->session->flashdata('msg')."</h3>";
              ?>
              <form action="<?=base_url()?>Control/add_stock_out" method="post">
                <table class="table table-bordered table-striped" border="1">
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Supplier</th>
                      <th>Quantity</th>
                      <th>Remain Quantity</th>
                    </tr>
                  </thead>
                  <tbody id="itembody">
                    <?php
                    $ci=&get_instance();
                    $ci->load->model('Admin_model');
                    $i=0; foreach ($reagent as $s) {
                      $p_id=$ci->Admin_model->get_purchase_id($s->id);
                       $remain_quantity = $ci->Admin_model->remain_lab_product($s->id);
                       // echo $remain_quantity; 
                      ?>
                      <tr>
                        <td><?= ++$i;?></td>
                        <td><?=$s->name?></td>
                        <td>
                          <?php 
                          foreach ($supplier as $k) {
                            if($k->id==$s->supplierID){
                              echo $k->supplier;

                            }
                          }
                          ?></td>
                          <td>
                            <input type="hidden" class="form-control" id="reagentID" name="reagentID[]" value="<?=$s->id?>">
                            <input type="text" class="form-control" id="sold"  onkeyup="ss(this.value)" name="sold[]" <?php if($remain_quantity <= 0 ){ ?>readonly value="Out of stock"<?php }else{?> value="0" <?php } ?>>
                          </td>
                          <td>
                            
                            <input type="text" class="form-control" id="remain_quantity" <?php if($remain_quantity == 0 ){ ?>readonly value="Out of stock"<?php }else{?> value="<?= $remain_quantity;?> pcs" <?php } ?>>
                          </td>
                          <!-- <td>
                            <select class="form-control" name="purchase_id[]" <?php if(empty($p_id)){ ?>readonly value="Out of stock"<?php }?>>
                              <?php foreach ($p_id as $k) {?>
                              <option value="<?=$k?>"><?=$k?></option>
                              <?php } ?>
                            </select>
                          </td> -->
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2">
                            <input type="reset" class="btn btn-block btn-danger" value="Reset">
                          </th>

                          <th colspan="3">
                            <input type="submit" class="btn btn-block btn-primary" value="Submit">
                          </th>
                        </tr>
                      </tfoot>
                    </table>
                  </form>
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
    function if_asm (v) {
      if(v=='asm'){
        $('#zone').css('display','block')
      }else{
        $('#zone').css('display','none')
      }
    }
      // function ss(sold){
      //   var remain_quantity = $("#reagentID").val();
      //   alert(remain_quantity);
      // }

    </script>