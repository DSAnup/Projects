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
        Expense Sub Category
        <small>Expense Sub Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Expense Sub Category </a></li>

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
                <h3>Sub Category List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Category</th>
                    <th width="20%">Name</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($sub_category as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td>
                      <?php foreach ($category as $k) {
                        if($s->categoryID==$k->id){
                          echo $k->category;
                        }
                      } ?>
                    </td>
                    <td><?= $s->sub_category;?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/expense_sub_category/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_expense_sub_category/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
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
              <h3>Add New Sub Category </h3>
            </div>
            <form action="<?=base_url()?>Control/add_expense_sub_category" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="categoryID">
                      <option>Select Category</option>
                      <?php foreach ($category as $k) {?>
                        <option value="<?=$k->id?>" <?php  if(@$edit->categoryID==$k->id){ echo "selected";} ?>><?=$k->category?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <label>Sub Category Name</label>
                    <input type="text" name="sub_category" class="form-control" <?php if(isset($edit)){ echo 'autofocus';} ?> value="<?=@$edit->sub_category?>">
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
  function if_asm (v) {
    if(v=='asm'){
      $('#zone').css('display','block')
    }else{
      $('#zone').css('display','none')
    }
  }
</script>