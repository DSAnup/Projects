<?php
$this->load->view('front/header');
?>
<section class="exercise_section"><!-- start of exercise section -->
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<!-- <div class="panel panel-primary pannel_style"><?=$sub->s.'('.$sub->c.')'?></div> -->
				<div class="quiz">
					<div class="">
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
            	<h4>Answer Explain:</h4>
              <?= $q->answer_explain;?>
            </div>
          <?php } ?>  
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-primary pannel_style">Others Modules</div>
				<div class="course_name">
					<ul>
						<?php
						$d=$this->session->userdata('stdID');
						$enrollment=$ci->C_admin_model->SelectData('enrollment','*',array('std_id'=>$d));
						foreach ($course as $k) {
							$enrollment=$ci->C_admin_model->SelectData('enrollment','*',array('course_id'=>$k->id, 'std_id'=>$d));
							if(count($enrollment) <= $k->howmuchtime){
									echo "<li><a href='".base_url()."Front/take_quiz/".$k->id."'><i class='fa fa-arrow-right' aria-hidden='true'></i>".$k->name."</a></li>";
							}

						}
						
						?>
					</ul>
				</div><!-- end of others exersice course section -->
			</div>
		</div>
	</div>
</section><!-- end of exersice section -->

<?php
$this->load->view('front/footer');
?>