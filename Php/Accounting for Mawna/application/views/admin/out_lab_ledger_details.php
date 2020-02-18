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
        Lab
        <small>Lab List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Lab List </a></li>

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
                <h3><?=$lab->name?></h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Pt. Name</th>
                    <th>Test Name</th>
                    <th>MDA Rate</th>
                    <th>Rate to <?=$lab->name?></th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($test as $s) {?>
                  <tr>
                    <td><?=$s->date?></td>
                    <td>
                      <?php foreach ($pt as $p) {
                        if($p->id==$s->patientID){
                          echo $p->name;
                        }
                      } ?>
                    </td>
                    <td>
                      <?php foreach ($te as $t) {
                        if($t->id==$s->testID){
                          echo $t->name;
                        }
                      } ?>
                    </td>
                    <td>
                      <?php foreach ($te as $t) {
                        if($t->id==$s->testID){
                          echo $t->price;
                        }
                      } ?>
                    </td>
                    <td><?=$s->price?></td>
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
function if_asm (v) {
  if(v=='asm'){
    $('#zone').css('display','block')
  }else{
    $('#zone').css('display','none')
  }
}

</script>