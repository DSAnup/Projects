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
            <!-- <h3>Students </h3> -->
          </div>
          <b> <?=$st->username?></b><br>
          <?php
          
          $ci =& get_instance();
          $ci->load->model('C_admin_model');
          $totalAnswer=0;
          $totalQuestion=0;
          // echo $en->enroll_id;
          foreach ($answer as $q) {
            $s=$ci->C_admin_model->SelectData_1('quiz','*',array('q_id'=>$q->quiz_id));
            if($q->answer==$s->answer){
              $totalAnswer+=1;
            }
            $totalQuestion+=1;
          }
          echo "<b>Total Correct Answer: </b> ".$totalAnswer."<b> out of </b>".$totalQuestion;        
          ?> 
           <?php
          $i=0;
          foreach ($answer as $s) {
            $q=$ci->C_admin_model->SelectData_1('quiz','*',array('q_id'=>$s->quiz_id));
            $i++;
            ?>  
            <div class="">
              <h3>
                <div class="alert <?php if($q->answer!=$s->answer){echo 'alert-danger';}else{ echo 'alert-success';} ?>"><?=$i.'. '. $q->question?> 
                <?php if($q->answer!=$s->answer){echo '<span class="glyphicon glyphicon-remove"></span>';}else{ echo '<span class="glyphicon glyphicon-ok"></span>';} ?>
              </div></h3>
              <input type="hidden" name="quiz_id[]"  value="<?=$q->q_id?>">
              (A).<input type="radio" <?php if($s->answer==1){ echo "checked";} ?> disabled class="ra" id="ra" name="answer<?=$i?>" value="1"> <?=$q->option_1?><br>
              (B).<input type="radio" <?php if($s->answer==2){ echo "checked";} ?> disabled class="ra" id="ra" name="answer<?=$i?>" value="2"> <?=$q->option_2?><br>
              (C).<input type="radio" <?php if($s->answer==3){ echo "checked";} ?> disabled class="ra" id="ra" name="answer<?=$i?>" value="3"> <?=$q->option_3?><br>
              (D).<input type="radio" <?php if($s->answer==4){ echo "checked";} ?> disabled class="ra" id="ra" name="answer<?=$i?>" value="4"> <?=$q->option_4?>
              <?php if($q->answer!=$s->answer){echo '<h5> ANSWER: ';
              switch ($q->answer) {
                case '1':
                echo "A";
                break;
                case '2':
                echo "B";
                break;
                case '3':
                echo "C";
                break;
                case '4':
                echo "D";
                break;
              }
              echo '</h5>';} ?>
            </div>
            <div>
              <?= $q->answer_explain;?>
            </div>
          <?php } ?>  
        </div>
      </div>
    </div>

    
  </section>
  <!-- /.content -->
</div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
