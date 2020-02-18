<?php
$this->load->view('front/header');
?>
<section class="exercise_section"><!-- start of exercise section -->
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="panel panel-primary pannel_style"><?=$l->name?></div>
				<div class="quiz">
					<div class="">
						<h2> Number of Questions: <?=$num?></h2>
						<h2>Correct answer: <?=$correct?></h2>
						<?php

						$ci =& get_instance();
						$ci->load->model('C_admin_model');
						$i=0;
						foreach($qu as $q){
							$i++;
							$ann=$ci->C_admin_model->SelectData_1('quiz','*',array('q_id'=>$q->q_id));

							?>
							<div class="">
								<h3>
									<div class="alert <?php if($ann->answer!=$sub['an'][$i]){echo 'alert-danger';}else{ echo 'alert-success';} ?>"><?=$i.'. '. $q->question?> 
									<?php if($ann->answer!=$sub['an'][$i]){echo '<span class="glyphicon glyphicon-remove"></span>';}else{ echo '<span class="glyphicon glyphicon-ok"></span>';} ?>
								</div></h3>


								(A).<input type="radio" disabled name="answer<?=$i?>" <?php if($sub['an'][$i]==1){ echo "checked";} ?> value="1"> <?=$q->option_1?><br>
								(B).<input type="radio" disabled name="answer<?=$i?>" <?php if($sub['an'][$i]==2){ echo "checked";} ?> value="2"> <?=$q->option_2?><br>
								(C).<input type="radio" disabled name="answer<?=$i?>" <?php if($sub['an'][$i]==3){ echo "checked";} ?> value="3"> <?=$q->option_3?><br>
								(D).<input type="radio" disabled name="answer<?=$i?>" <?php if($sub['an'][$i]==4){ echo "checked";} ?> value="4"> <?=$q->option_4?>
								<?php if($ann->answer!=$sub['an'][$i]){echo '<h5> ANSWER: ';
								switch ($ann->answer) {
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
						<?php } 
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-primary pannel_style">Others Subject</div>
				<div class="course_name">
					<ul>
						<?php
						foreach ($subject as $k) {
							echo "<li><a href='".base_url()."Front/take_quiz/".$k->id."'><i class='fa fa-arrow-right' aria-hidden='true'></i>".$k->name."</a></li>";
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