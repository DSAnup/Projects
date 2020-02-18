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
        Add Withdrawal
        <small>Withdrawal List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Add Withdrawal </a></li>

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
                <h3>Employee List</h3>
              </div>
              <form action="<?=base_url()?>Control/add_withdrawal" method="post">
                <table class="table">
                  <tr>
                    <?php if(isset($edit)){ ?>
                      <input type="hidden" name="id" value="<?=@$edit->id?>">
                    <?php } ?>
                    <th>Employee</th>
                    <td>
                      <select name="empID" class="form-control">
                        <option>Select Employee</option>
                        <?php foreach ($emp as $e) {?>
                        <option value="<?=$e->id?>" <?php if(@$edit->empID==$e->id){ echo "selected";} ?>><?=$e->name?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <th>Date</th>
                    <td><input type="text" name="date" class="form-control date" value="<?=@$edit->date?>"></td>
                    <th>Purpose</th>
                    <td>
                      <select class="form-control" name="type">
                        <option>Select Purpose</option>
                        <option value="pf" <?php if(@$edit->type=='pf'){ echo "selected";} ?>>Provident Fund Windrawal</option>
                        <option value="salary" <?php if(@$edit->type=='salary'){ echo "selected";} ?>>Advance Salary</option>
                      </select>
                    </td>
                    <th>Amount</th>
                    <td><input type="text" name="amount" class="form-control" value="<?=@$edit->amount?>"></td>
                  </tr>
                  <tr>
                    <td colspan="4"><input type="reset" value="Reset" class="btn btn-block btn-danger"></td>
                    <td colspan="4"><input type="submit" value="Submit" class="btn btn-block btn-success"></td>
                  </tr>
                </table>
              </form>
              </div>
            </div>
          </div>
        </div>


      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Employee List</h3>
              </div>
              <form action="<?=base_url()?>Control/add_attendance" method="post">
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Purpose</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($withdraw as $k) {?>
                    <tr>
                      <td><?=++$i?></td>
                      <td>
                        <?php foreach ($emp as $s) {
                          if($k->empID==$s->id){
                            echo $s->name;
                          }
                        } ?>
                      </td>
                      <td><?php if($k->type=='pf'){ echo "Provident Fund Withdrawal";}else{ echo "Advance Salary";} ?></td>
                      <td><?=$k->amount?></td>
                      <td><?=$k->date?></td>
                      <td><?php if($k->status==1){ echo "Not refunded";}else{ echo "Refunded";} ?></td>
                      <td>
                        <a class="btn btn-sm btn-primary" onclick="return confirm('are you sure?')" href="<?=base_url().'Control/withdrawal_refund/'.$k->id?>">Refund</a>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/withdrawal/'.$k->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_withdrawal/'.$k->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>

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
</script>