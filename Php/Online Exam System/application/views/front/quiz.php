<?php
$this->load->view('front/header');
?>
<section class="exercise_section"><!-- start of exercise section -->
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="panel panel-primary pannel_style"><?=$l->name?></div>
				<?php
	$cc=count($quiz);
	if($cc!=0){
	?>
				<?php
				$duration=$l->duration;
				date_default_timezone_set('Asia/Dhaka');
				$now=time();
				$ten=$now+(60*$duration);
				$startDate=date('m/d/Y H:i:s',$now);
				$endDate=date('m/d/Y H:i:s',$ten);
				$ii=1;
				$j=1;
				$closedate = date_format(date_create($endDate), 'm/d/Y H:i:s');
				?>
				<p>Time Left:
					<script language="JavaScript">
						TargetDate<?=$j?> = "<?php echo $closedate ?>";
						BackColor<?=$j?> = "palegreen";
						ForeColor<?=$j?> = "navy";
						CountActive<?=$j?> = true;
						CountStepper<?=$j?> = -1;
						LeadingZero<?=$j?> = true;
						DisplayFormat<?=$j?> = "%%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
						FinishMessage<?=$j?> = "Time Over!";
					</script>
					<script language="JavaScript">
						function calcage<?=$j?>(secs, num1, num2) {
							s = ((Math.floor(secs/num1))%num2).toString();
							if (LeadingZero<?=$j?> && s.length < 2)
								s = "0" + s;
							return "<b>" + s + "</b>";
						}

						function CountBack<?=$j?>(secs) {
							if (secs < 0) {
								document.getElementById("cntdwn<?=$ii?>").innerHTML = FinishMessage<?=$j?>;
	// window.location = "http://www.google.com/"
	$('#form1').submit()
	return;
}
DisplayStr = DisplayFormat<?=$j?>.replace(/%%D%%/g, calcage<?=$j?>(secs,86400,100000));
DisplayStr = DisplayStr.replace(/%%H%%/g, calcage<?=$j?>(secs,3600,24));
DisplayStr = DisplayStr.replace(/%%M%%/g, calcage<?=$j?>(secs,60,60));
DisplayStr = DisplayStr.replace(/%%S%%/g, calcage<?=$j?>(secs,1,60));

document.getElementById("cntdwn<?=$ii?>").innerHTML = DisplayStr;
if (CountActive<?=$j?>)
	setTimeout("CountBack<?=$j?>(" + (secs+CountStepper<?=$j?>) + ")", SetTimeOutPeriod<?=$j?>);
}

function putspan<?=$j?>(backcolor, forecolor) {
	document.write("<span id='cntdwn<?=$ii++?>' style='background-color:" + backcolor + 
		"; color:" + forecolor + "'></span>");
}

if (typeof(BackColor<?=$j?>)=="undefined")
	BackColor<?=$j?> = "white";
if (typeof(ForeColor<?=$j?>)=="undefined")
	ForeColor<?=$j?>= "black";
if (typeof(TargetDate<?=$j?>)=="undefined")
	TargetDate<?=$j?> = "12/31/2020 5:00 AM";
if (typeof(DisplayFormat<?=$j?>)=="undefined")
	DisplayFormat<?=$j?> = "%%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
if (typeof(CountActive<?=$j?>)=="undefined")
	CountActive<?=$j?> = true;
if (typeof(FinishMessage<?=$j?>)=="undefined")
	FinishMessage<?=$j?> = "";
if (typeof(CountStepper<?=$j?>)!="number")
	CountStepper<?=$j?> = -1;
if (typeof(LeadingZero<?=$j?>)=="undefined")
	LeadingZero<?=$j?> = true;


CountStepper<?=$j?> = Math.ceil(CountStepper<?=$j?>);
if (CountStepper<?=$j?> == 0)
	CountActive<?=$j?> = false;
var SetTimeOutPeriod<?=$j?> = (Math.abs(CountStepper<?=$j?>)-1)*1000 + 990;
putspan<?=$j?>(BackColor<?=$j?>, ForeColor<?=$j?>);
var dthen = new Date(TargetDate<?=$j?>);
var dnow = new Date();
if(CountStepper<?=$j?> >0)
	ddiff = new Date(dnow-dthen);
else
	ddiff = new Date(dthen-dnow);
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack<?=$j++?>(gsecs);

</script>
</p>  </br>

<div class="quiz">
	<div class="">
	
		<form id="form1" action="<?=base_url().'Front/check_answer'?>" method="post">
			<input type="hidden" name="l_id" value="<?=$l->id?>">
			<?php
			$i=0;
			foreach($quiz as $q){
				$i++;
				?>
				<div class="">
					<h3><?=$i.'. '. $q->question?></h3>
					<input type="hidden" name="quiz_id[]"  value="<?=$q->q_id?>">
					(A).<input type="radio" class="ra" id="ra" name="answer<?=$i?>" value="1"> <?=$q->option_1?><br>
					(B).<input type="radio" class="ra" id="ra" name="answer<?=$i?>" value="2"> <?=$q->option_2?><br>
					(C).<input type="radio" class="ra" id="ra" name="answer<?=$i?>" value="3"> <?=$q->option_3?><br>
					(D).<input type="radio" class="ra" id="ra" name="answer<?=$i?>" value="4"> <?=$q->option_4?>
				</div>
				<?php } ?>
				<br>
				<input type="hidden" name="count" value="<?=$i?>">
				<a href="#" class="btn btn-primary" onclick="sub()">Submit</a>
			</form>

		</div>
	</div>
	<?php }else{
		echo "No content was found !";
		} ?>
</div>
<div class="col-sm-4">
	<div class="panel panel-primary pannel_style">Others Subject</div>
	<div class="course_name">
		<ul>
			<?php
			$ci =& get_instance();
			$ci->load->model('C_admin_model');
			$std=$this->session->userdata('stdID');
			foreach ($subject as $k) {
				$qq=$ci->C_admin_model->SelectData('enrollment','*',array('course_id'=>$k->id,'std_id'=>$std));
				if(empty($qq)){
				echo "<li><a href='".base_url()."Front/take_quiz/".$k->id."'><i class='fa fa-arrow-right' aria-hidden='true'></i>".$k->name."</a></li>";
				}else{
				echo "<li>".$k->name."</li>";
			}
			}
			?>
		</ul>
	</div><!-- end of others exersice course section -->
</div>
</div>
</div>
</section>

<?php
$this->load->view('front/footer');
?>
<script type="text/javascript">
	function sub(){
		$('#form1').submit();
	}
	$(document).ready(function(){
		$(window).blur(function(){
			alert("You can't access anything before completing exam");
			// $('#form1').submit();
		})
	})
</script>