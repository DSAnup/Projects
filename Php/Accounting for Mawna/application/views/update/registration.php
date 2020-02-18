<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patient Registration and Profile Form</title>

	<!-- Your META here -->
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0" name="viewport">

	
	<!--[if lt IE 10]>
			<script src="<?= base_url().'admin_file/'?>j-folder/js/jquery.placeholder.min.js"></script>
		<![endif]-->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="<?= base_url().'admin_file/'?>j-folder/css/demo.css">
		<link rel="stylesheet" href="<?= base_url().'admin_file/'?>j-folder/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url().'admin_file/'?>j-folder/css/j-forms.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">

		<!-- Scripts -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
		<script src="<?= base_url().'admin_file/'?>j-folder/js/jquery.1.11.1.min.js"></script>
		<script src="<?= base_url().'admin_file/'?>j-folder/js/j-forms-additions.js"></script>
		<script src="<?= base_url().'admin_file/'?>j-folder/js/jquery.maskedinput.min.js"></script>
		<script src="<?= base_url().'admin_file/'?>j-folder/js/j-forms-multistep.js"></script>

	</head>
	<body class="bg-pic">
		<div class="wrapper wrapper-1220">

			<form action="<?=base_url()?>Update_Control/addNewPatient" method="post" class="j-forms j-multistep" id="j-forms" novalidate enctype="multipart/form-data">

				<div class="header">
					<i class="fa fa-shopping-cart"></i>
					<p>Patient Registration and Profile Form <span style="float: right; font-size: 14px;"><a href="<?= base_url().'Update_Control/patientList'?>" style="text-decoration: none; color: white;">Back To Patient List</a></span></p>

				</div>
				<!-- end /.header-->

				<div class="content">

					<!-- start steps -->
					<div class="span3">
						<div class="j-row">
							<div class="span12 step">
								<div class="steps">
									<span>Step 1:</span>
									<p>Registration</p>
								</div>
							</div>
							<div class="span12 step">
								<div class="steps">
									<span>Step 2:</span>
									<p>Background Features </p>
								</div>
							</div>
							<div class="span12 step">
								<div class="steps">
									<span>Step 3:</span>
									<p>History</p>
								</div>
							</div>


							<div class="span12 step">
								<div class="steps">
									<span>Step 4:</span>
									<p>Physical Examination Findings</p>
								</div>
							</div>
							<div class="span12 step">
								<div class="steps">
									<span>Step 5:</span>
									<p>Investigations Finding</p>
								</div>
							</div>
							<div class="span12 step">
								<div class="steps">
									<span>Step 6:</span>
									<p>Diagnosis</p>
								</div>
							</div>


							<div class="span12 step">
								<div class="steps">
									<span>Step 7:</span>
									<p>Treatment</p>
								</div>
							</div>
							<div class="span12 step">
								<div class="steps">
									<span>Step 8:</span>
									<p>Observations by Patient</p>
								</div>
							</div>
						</div>
					</div>
					<!-- end steps -->
					<div class="span9">
						<fieldset>

							<div class="divider gap-bottom-25"></div>

							<!-- start name -->
							<div class="j-row">
								<div class="span6 unit">
									<!-- <label>Type</label><br> -->
									<div class="unit">
										<label class="input select">
											<select name="patReg" required>
												<option value="">Type</option>
												<option value="1">GRN</option>
												<option value="2">MRN</option>
												<option value="3">PRN</option>
											</select>
											<i></i>
										</label>
									</div>

								</div>
								<div class="span6 unit">
									<div class='input-group date'>
										<input type='text' class="form-control datepicker" name="date" placeholder ="dd-mm-yy" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>


							</div>
							<div class="j-row">
								<div class="span6 unit">
									<div class="unit">
										<label class="input select">
											<select name="regBy">
												<option value="">Registered By</option>
												<?php foreach($employee as $e){?>
													<option value="<?= $e->id?>"><?= $e->name;?></option>
												<?php }?>
											</select>
											<i></i>
										</label>
									</div>
								</div>
								<div class="span6 unit">
									<!-- <label>Data Collected By</label><br> -->
									<div class="unit">
										<label class="input select">
											<select name="dcollect">
												<option value="">Data Collected By</option>
												<?php foreach($employee as $e){?>
													<option value="<?= $e->id?>"><?= $e->name;?></option>
												<?php }?>
											</select>
											<i></i>
										</label>
									</div>
								</div>
							</div>
							<!-- end name -->


							<!-- Previous Registration Details -->
							<!-- start Reffered  Details -->
							<div class="j-row">
								<div class="span6 unit">
									<div class="unit">
										<label class="input select">
											<select name="previousreg">
												<option value="">Previous Registration Type</option>
												<option value="1">GRN</option>
												<option value="2">MRN</option>
												<option value="3">PRN</option>
											</select>
											<i></i>
										</label>
									</div>
								</div>
								<div class="span6 unit">
									<!-- <label>Registration Requesting Doctor's Name</label><br> -->
									<div class="unit">
										<label class="input select">
											<select name="orByDr">
												<option value="">Registration Requesting Doctor's Name</option>
												<?php foreach($dr_list as $e){?>
													<option value="<?= $e->id;?>"><?= $e->name;?></option>
												<?php }?>
											</select>

										</label>
									</div>
								</div>
							</div>
							<!-- Previous Reffered  Details -->
							<div class="j-row">

								<div class="span6 unit">
									<select name="firstmda">
										<option value="">First Visited Doctor at MDA</option>
										<?php foreach($dr_list as $e){?>
											<option value="<?= $e->id;?>"><?= $e->name;?></option>
										<?php }?>
									</select>
								</div>
								<div class="span6 unit">
									<div class="unit">
										<label class="input select">
											<select name="ref">
												<option value="">Introducer or Referred By</option>
												<option value="Self">Self</option>
												<option value="OP">OP</option>
												<option value="OD">OD</option>
												<option value="PC">PC</option>
												<option value="WW">WW</option>
											</select>
											<i></i>
										</label>
									</div>
								</div>
							</div>
						</fieldset>

						<fieldset>

							<div class="divider gap-bottom-25"></div>

							<!-- start country -->
							<div class="j-row">
								<div class="span4 unit">
									<div class="input">
										<input type="text" id="patientName" name="patientName" placeholder="Name of Patient">
									</div>
								</div>

								<div class="span2 unit">
									<div class="input">
										<label class="icon-right" for="first_name">
											<span>Years</span>
										</label>
										<input type="text" id="age" name="age" placeholder="Age">
									</div>
								</div>
								<div class="span2 unit">
									<label class="input select">
										<select name="sex" id="sex">
											<option value="">Sex</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>

										</select>
										<i></i>
									</label>
								</div>
									<div class="span2 unit" > <!---If gender is female then this field applicale----->
									<label class="input select">
										<select name="pregnant" id="pregnant" disabled="true">
											<option value="">Pregnant Status</option>
											<option value="Pregnant">Pregnant</option>
											<option value="Non Pregnant">Non Pregnant</option>

										</select>
										<i></i>
									</label>
								</div>
								<div class="span2 unit">
									<label style="color: #000;padding-bottom: 3px;">Upload Patient Image</label>
									<input type="file" id="image" name="image" placeholder="Upload Patient Image">
								</div>

							</div>
							<div class="j-row">
								<div class="span4 unit">
									<div class="input">
										<input type="text" id="fName" name="fName" placeholder="Father/Husband's Name">
									</div>
								</div>

								<div class="span4 unit">
									<div class="input">
										<input type="text" id="mName" name="mName" placeholder="Mother's Name">
									</div>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="religion">
											<option value="">Religion</option>
											<option value="Muslim">Muslim</option>
											<option value="Hindu">Hindu</option>
											<option value="Cristan">Cristan</option>
											<option value="Budddhu">Budddhu</option>
											<option value="Others">Others</option>
											
										</select>
										<i></i>
									</label>
								</div>

							</div>
							<div class="j-row">
								<div class="span6 unit">
									<div class="input">
										<textarea placeholder="Present Address" spellcheck="false" id="message" name="preAddress"></textarea>
									</div>
								</div>

								<div class="span6 unit">
									<div class="input">
										<textarea placeholder="Permanent Address" spellcheck="false" id="message" name="perAddress"></textarea>
									</div>
								</div>

							</div>
							<div class="j-row">
								<div class="span4 unit">
									<div class="input">
										<input type="text" id="mob1" name="mob1" placeholder="Mobile Number(1)">
									</div>
								</div>
								<div class="span4 unit">
									<div class="input">
										<input type="text" id="mob2" name="mob2" placeholder="Mobile Number (2)/T&T">
									</div>
								</div>

								<div class="span4 unit">
									<div class="input">
										<input type="email" id="email" name="email" placeholder="Email">
									</div>
								</div>


							</div>
							<div class="j-row">
								<div class="span4 unit">
									<div class="input">
										<input type="text" id="nid" name="nid" placeholder="NID Number">
									</div>
								</div>

								<div class="span4 unit">
									<div class="input">
										<input type="text" id="nationality" name="nationality" placeholder="Nationality">
									</div>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="edulevel">
											<option value="">Education Level</option>
											<option value="Post Graduation">Post Graduation</option>
											<option value="Graduation">Graduation</option>
											<option value="Higher Secondary">Higher Secondary</option>
											<option value="Secondary">Secondary</option>
											<option value="Primary">Primary</option>
											<option value="Illiterate">Illiterate</option>

										</select>
										<i></i>
									</label>
								</div>



							</div>
							<div class="j-row">

								<div class="span4 unit">
									<label class="input select">
										<select name="occupation">
											<option value="">Occupation</option>
											<option value="House Wife">House Wife</option>
											<option value="Farmer">Farmer</option>
											<option value="Business">Business</option>
											<option value="Govt. Service">Govt. Service</option>
											<option value="Private Service">Private Service</option>
											<option value="Retried">Retried</option>
											<option value="Student">Student</option>
											<option value="Social Worker">Social Worker</option>
											<option value="Politician">Politician</option>
											<option value="Self-Employment">Self-Employment</option>
											<option value="Unemployment">Unemployment</option>
											<option value="Other">Other</option>
										</select>
										<i></i>
									</label>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="ecoStatus">
											<option value="">Economic Status</option>
											<option value="Low Income=< 85,000 Taka/Year">Low Income=< 85,000 Taka/Year</option>
											<option value="Lower Middle Income (85,001-325,000) Taka/Year">Lower Middle Income (85,001-325,000) Taka/Year</option>
											<option value="Upper Middle Income (325,001-10,00,000) Taka/Year">Upper Middle Income (325,001-10,00,000) Taka/Year</option>
											<option value="High Income >=10,00,001 Taka/Year">High Income >=10,00,001 Taka/Year</option>

										</select>
										<i></i>
									</label>
								</div>

								<div class="span4 unit">
									<label class="input select">
										<select name="physicalAct">
											<option value="">Physical Activity</option>
											<option value="Inactive">Inactive</option>
											<option value="Sedentary Worker">Sedentary Worker</option>
											<option value="Moderately Active">Moderately Active</option>
											<option value="Hard Worker">Hard Worker</option>
										</select>
										<i></i>
									</label>
								</div>


							</div>
							<div class="j-row">
								<div class="span6 unit">
									<label class="input select">
										<select name="hbVaccination">
											<option value="none">HB Vaccination Status</option>
											<option value="male">Full Completed</option>
											<option value="female">Uncompleted</option>
											<option value="male">Not Yet</option>
										</select>
										<i></i>
									</label>
								</div>

								<div class="span6 unit">
									<div class="input">
										<input type="text" id="otherVaccination" name="otherVaccination" placeholder="Other Vaccination Status">
									</div>
								</div>


							</div>
							<!-- end country -->
						</fieldset>

						<fieldset>

							<div class="divider gap-bottom-25"></div>

							<!-- start payment -->
							<div class="j-row">
								<div class="span6 unit">
									<label class="input select">
										<select name="fHistoryDr" id="fHistoryDr">
											<option value="">Family History of DM</option>
											<option value="Positive">Positive</option>
											<option value="Negative">Negative</option>
										</select>
										<i></i>
									</label>
								</div>

								<div class="span6 unit">

									<div class="input">
										<input type="text" id="dmWhom" name="dmWhom" disabled="true" placeholder="Then to Whom">
									</div>

								</div>


							</div>
							<div class="j-row">
								<div class="span6 unit">

									<div class="input">

										<textarea placeholder="Past Medical History with Date and Duration" spellcheck="false" id="message" name="pmhistory" class="ckeditor"></textarea>
									</div>
								</div>

								<div class="span6 unit">

									<div class="input">

										<textarea placeholder="Past Surgical History with Date and Duration" spellcheck="false" id="message" name="pSurHistory" class="ckeditor"></textarea>
									</div>
								</div>


							</div>
							<div class="j-row">
								<div class="span6 unit">

									<div class="input">

										<textarea placeholder="Past Drug History with Dose and Duration" spellcheck="false" id="message" name="drugHistory" class="ckeditor"></textarea>
									</div>
								</div>
                             	<div class="span6 unit" ><!---This is new field------>

									<div class="input">

										<textarea placeholder="Present Drug History with Dose and Duration" spellcheck="false" id="message" name="presentdrugHistory" class="ckeditor"></textarea>
									</div>
								</div>
								<div class="span6 unit">

									<label class="input select">
										<select name="pthistory"><!---Some fields has added------>
											<option value="">Source Of Treatment</option>
											<option value="Diabetic Association">Diabetic Association</option>
											<option value="Govt. Institution">Govt. Institution</option>
											<option value="Private Institutio">Private Institution</option>
											<option value="Private Doctor">Private Doctor</option>
											<option value="Village Doctor">Village Doctor</option>
											<option value="Kwak Doctor">Kwak Doctor</option>
											<option value="Abroad">Abroad</option>
											<option value="Self">Self</option>
											<option value="Others">Others</option>
										</select>
										<i></i>
									</label>
									<input type="text" id="specificname" placeholder="Specific Name" name="specificname"><!--this is new field------>
									<input type="text" id="ldocName" placeholder="Last Visited Doctor's Name" name="ldocName">
								</div>


							</div>
							<div class="j-row">
								<div class="span4 unit">
									<label class="input select">
										<select name="accuteCoplications">
											<option value="">Past History of Acute Complications</option>
											<option value="Hypoglycaemia">Hypoglycaemia</option>
											<option value="DKA">DKA</option>
											<option value="HHS">HHS</option>
											<option value="Others">Others</option>
											<option value="Not Applicable">Not Applicable</option>							
										</select>
										<input type="text" id="accuteCoplicationsOthers" placeholder="Others" name="accuteCoplicationsOthers">

									</label>
								</div>

								<div class="span4 unit" >
									<label class="input select">
										<select name="manageAt">
											<option value="">Managed at</option>
											<option value="Home">Home</option>
											<option value="OPD">OPD</option>
											<option value="IPD">IPD</option>
												<option value="Not Applicable">Not Applicable</option><!-----This is New Field--->
										</select>

									</label>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="personalHistory">
											<option value="">Personal History</option>
											<option value="Smoking">Smoking</option>
											<option value="Alcohol Intake">Alcohol Intake</option>
											<option value="Access Food Intake Habit">Access Food Intake Habit</option>
											<option value="Chronic Stress">Chronic Stress</option>
											<option value="Steroid User">Steroid User</option>
											<option value="Others">Others</option>								
										</select>
										<input type="text" id="personalHistoryOthers" placeholder="Others" name="personalHistoryOthers">

									</label>
								</div>


							</div>
							<div class="j-row">
								<div class="span4 unit">
									<label class="input select">
										<select name="followUp">
											<option value="">Regular Follow-up Habit</option>
											<option value="Present">Present</option>
											<option value="Absent">Absent</option>
										</select>

									</label>
								</div>

								<div class="span4 unit" >
									<span>Last Three Dates of Follow-up</span>
						<!-- <input type="date" id="followUpDate1" placeholder="Address" name="followUpDate1 -->
						
						<input type='text' class="form-control datepicker" name="followUpDate1" placeholder ="dd-mm-yy" />
						<input type="text" id="followUpDate2" class="form-control datepicker"  placeholder="dd-mm-yy" name="followUpDate2"><!---This is new Field--->
						<input type="text" id="followUpDate3" class="form-control datepicker"  placeholder="dd-mm-yy" name="followUpDate3"><!---This is new Field--->
					</label>
				</div>
				<div class="span4 unit" >
					<label class="input select">
						<select name="diabeticStatus">
							<option value="">Diabetes Status</option>
							<option value="Controlled">Controlled</option>
							<option value="Uncontrolled">Uncontrolled</option>
								<option value="Not Applicable">Not Applicable</option><!---This is new Field--->
						</select>

					</label>
				</div>


			</div>
			<div class="j-row">
				<div class="span4 unit"  >
					<label class="input select">
						<select name="patCat">
							<option value="">Patient Category</option>
							<option value="1">Newly Diagnosed DM/IGT at MDA</option>
							<option value="2">Old Diabetic Patient</option>
							<option value="3">Not Applicable</option><!---This is new Field--->

						</select>

					</label>
				</div>

				<div class="span4 unit">
					<div class="input">
						<label class="icon-right" for="address">
							<span>Years</span>
						</label>
						<input type="text" id="durationDm" placeholder="Duration of DM" name="durationDm">
					</div>
				</div>
				<div class="span4 unit" >
					<label class="input select">
						<select name="featureDm">
							<option value="">Features of DM</option>
							<option value="Typical">Typical</option>
							<option value="Atypical">Atypical</option>
							<option value="Both">Both</option>
							<option value="N/A">Not Applicable</option><!---This is new Field--->

						</select>

						
					</div>


				</div>
				<div class="j-row">
					<div class="span6 unit">
						<label class="input select">
							<select name="oAutoimmune" id="oAutoimmune">
								<option value="">Other Autoimmune Diseases</option>
								<option value="Absent">Absent</option>
								<option value="Present">Present</option>
							</select>
							<input type="text" id="oAutoimmunePresent" placeholder="If Present" name="oAutoimmunePresent" disabled="true">
							
						</label>
					</div>

					<div class="span6 unit">
						<label class="input select">
							<select name="allergyHistory" id="allergyHistory">
								<option value="">History of Allergy</option>
								<option value="Drug">Drug</option>
								<option value="Food">Food</option>
								<option value="Others">Others</option>
								<option value="N/A">Not Applicable</option>
							</select>
							<input type="text" id="allergyHistoryPresent" placeholder="If Positive Then to Which" name="allergyHistoryPresent" disabled="true">
						</label>
					</div>
				</div>
				<!-- end payment -->


			</fieldset>
			<fieldset>
				<div class="divider gap-bottom-25"></div>

				<!-- start payment -->
				<div class="j-row">
					<div class="span6 unit">
						<div class="input">
							<label class="icon-right" for="address">
								<span>/min</span>
							</label>
							<input type="text" id="pulse" placeholder="Pulse Rate" name="pulse">
						</div>
					</div>
					
					<div class="span6 unit">
						<label class="input select">
							<select name="pulseCon">
								<option value="">Pulse Rhythm</option>
								<option value="1">Regular</option>
								<option value="2">Irregular</option>
								
							</select>
							
						</label>
					</div>
				</div>
				<div class="j-row">
					<p><b>BP</b></p>
						<div class="span3 unit">
					<span style="display: block;">.</span>
					<div class="input">
						<label class="icon-right" for="sitting">
							<span>mmHg</span>
						</label>
						<input type="text" id="bpsittingLeftH" placeholder="Sitting/Lying: Above" name="bpsittingLeftH">
					</div>
					<div class="input"><label class="icon-right" for="standing">
						<span>mmHg</span>
					</label>
					<input type="text" id="bpLeftstandingH" placeholder="Standing: High" name="bpLeftstandingH">

				</div>
			</div>
					<div class="span3 unit">
						<span>Left</span>

						<div class="input">
							<label class="icon-right" for="sitting">
								<span>mmHg</span>
							</label>
							<input type="text" id="bpsittingLeft" placeholder="Sitting/Lying: Bellow" name="bpsittingLeft">
						</div>
						<div class="input"><label class="icon-right" for="standing">
							<span>mmHg</span>
						</label>
						<input type="text" id="bpLeftstanding" placeholder="Standing: Low" name="bpLeftstanding">
						<input type="hidden" id="leftsittingsystolic" placeholder="Standing: Low" name="leftsittingsystolic">
						<input type="hidden" id="leftstandingsystolic" placeholder="Standing: Low" name="leftstandingsystolic">
						<input type="hidden" id="leftsittingdiastolic" placeholder="Standing: Low" name="leftsittingdiastolic">
						<input type="hidden" id="leftstandingdiastolic" placeholder="Standing: Low" name="leftstandingdiastolic">
					</div>
				</div>
				<div class="span3 unit">
			<span style="display: block;">.</span>

			<div class="input">
				<label class="icon-right" for="sitting">
					<span>mmHg</span>
				</label>
				<input type="text" id="bpRightsittingH" placeholder="Sitting/Lying: Above" name="bpRightsittingH">
			</div>
			<div class="input"><label class="icon-right" for="standing">
				<span>mmHg</span>
			</label>
			<input type="text" id="bpRightstandingH" placeholder="Standing: High" name="bpRightstandingH">
			<input type="hidden" id="rightsittingsystolic" placeholder="Standing: Low" name="rightsittingsystolic">
			<input type="hidden" id="rightstandingsystolic" placeholder="Standing: Low" name="rightstandingsystolic">
			<input type="hidden" id="rightsittingdiastolic" placeholder="Standing: Low" name="rightsittingdiastolic">
			<input type="hidden" id="rightstandingdiastolic" placeholder="Standing: Low" name="rightstandingdiastolic">
		</div>


	</div>
			
			<div class="span3 unit">

				<span>Right</span>
				<div class="input">
					<label class="icon-right" for="sitting">
						<span>mmHg</span>
					</label>
					<input type="text" id="bpRightsitting" placeholder="Sitting/Lying: Bellow" name="bpRightsitting">
				</div>
				<div class="input"><label class="icon-right" for="standing">
					<span>mmHg</span>
				</label>
				<input type="text" id="bpRightstanding" placeholder="Standing: Low" name="bpRightstanding">
				
			</div>


		</div>
		
</div>
<div class="j-row">
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>Kg</span>
			</label>
			<input type="text" id="weight" placeholder="Weight(WT)" name="weight">
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>ft-inch</span>
			</label>
			<input type="text" id="heightfeet" placeholder="Height(HT)" name="heightfeet">
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>inch</span>
			</label>
			<input type="text" id="heightinch" placeholder="Height(HT)" name="heightinch" readonly>
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>cm</span>
			</label>
			<input type="text" id="heightcm" placeholder="Height(HT)" name="heightcm" readonly>
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>m</span>
			</label>
			<input type="text" id="heightmeter" placeholder="Height(HT)" name="heightmeter" readonly>
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>cm</span>
			</label>
			<input type="text" id="waist" placeholder="Waist" name="waist">
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>cm</span>
			</label>
			<input type="text" id="hip" placeholder="Hip" name="hip">
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			
			<input type="text" id="waiststatus" placeholder="Waist Circumference" name="waiststatus" readonly>
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			
			<input type="text" id="waisthip" placeholder="Waist Hip Ratio" name="waisthip" readonly>
		</div>
	</div>
	<div class="span3 unit">
		<div class="input">
			<label class="icon-right" for="address">
				<span>Kg/m<sup>2</sup></span>
			</label>
			<input type="text" id="bmi" placeholder="BMI" name="bmi" readonly>
			<input type="text" id="bmiStatus" placeholder="BMI Status" name="bmiStatus" readonly>
			<input type="text" id="whoclass" placeholder="Who Classification Status" name="whoclass" readonly>
			<input type="text" id="dietchartnew" placeholder="Diet Chart New" name="dietchartnew" readonly>
		</div>
	</div>
	<div class="span6 unit" >
		<div class="span3">
			<span style="text-align:left">Standard Body Weight</span>
		</div>
		<div class="span3 unit">
			<div class="input">
				<input type="text" id="sbw" placeholder="Lowest" name="sbw" readonly>
			</div>
		</div>
		<div class="span3 unit">
			<div class="input">
				<input type="text" id="sbw2" placeholder="Highest" name="sbw2" readonly>
			</div>
		</div>
		<div class="span3 unit">
			<div class="input">
				<input type="text" id="sbw3" placeholder="Average" name="sbw3" readonly>
			</div>
		</div>
	</div>

</div>
<div class="j-row">
	<div class="span3 unit">
		<label class="icon-right" for="address">
			<span><sup>o</sup>F</span>
		</label>
		<div class="input">
			<input type="text" id="temp" placeholder="Temperature" name="temp">
		</div>
	</div>
	<div class="span3 unit">
		<label class="icon-right" for="address">
			<span>min</span>
		</label>
		<div class="input">
			<input type="text" id="resp" placeholder="Respiration" name="resp">
		</div>
	</div>
	<div class="span3 unit">
		<label class="input select">
			<select name="anemia" id="anemia">
				<option value="">Anaemia</option>
				<option value="Present">Present</option>
				<option value="Absent">Absent</option>

			</select>

		</label>
	</div>
	<div class="span3 unit">
		<div class="input">
			<input type="text" id="anemiapresent" placeholder="If present (Iron Requirement-auto)" name="anemiapresent" readonly>
		</div>
	</div>

</div>
<div class="j-row">
	<div class="span3 unit">
		<label class="input select">
			<select name="oedema" id="oedema">
				<option value="">Oedema</option>
				<option value="Present">Present</option>
				<option value="Absent">Absent</option>

			</select>

		</label>
	</div>
	<div class="span3 unit">
		<label class="input select">
			<select name="oedemapresent" disabled="true" id="oedemapresent">
				<option value="">If present Oedema</option>
				<option value="localized">localized</option>
				<option value="generalizd">generalized</option>

			</select>

		</label>
	</div>
	<div class="span3 unit">
		<label class="input select">
			<select name="heart" id="heart">
				<option value="">Heart</option>
				<option value="NAD">NAD</option>
				<option value="Abnormal">Abnormal</option>

			</select>
			<input type="text" id="heartAbnormal" placeholder="If Abnormal" name="heartAbnormal" disabled="true">
		</label>
	</div>
	<div class="span3 unit">
		<label class="input select">
			<select name="lungs" id="lungs">
				<option value="">Lungs</option>
				<option value="NAD">NAD</option>
				<option value="Abnormal">Abnormal</option>

			</select>
			<input type="text" id="lungAbnormal" placeholder="If Abnormal" name="lungAbnormal" disabled="true">
		</label>
	</div>
</div>
						<!-- <div class="j-row">
					<div class="span6 unit">
								<div class="input">
							<label class="icon-right" for="address">
								<span>/min</span>
							</label>
							<input type="text" id="address" placeholder="Pulse Rate" name="address">
						</div>
							</div>
							<div class="span6 unit">
								<label class="input select">
							<select name="typpe">
								<option value="none">Pulse Rhythm</option>
								<option value="male">Regular</option>
								<option value="female">Irregular</option>
								
							</select>
							
						</label>
							</div>
						</div> -->
						<div class="j-row">
							<p><b>Eye/Vision</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="leftEye" id="leftEye">
											<option value="Intact">Intact</option>
											<option value="Impaired">Impaired</option>
										</select>
										<input type="text" id="leftEyeAcuity" disabled="true" placeholder="If Impaired" name="leftEyeAcuity">
										<input type="text" id="address" placeholder="Visual Acuity" name="evisualleft">
									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="rightEye" id="rightEye">
											<option value="Intact">Intact</option>
											<option value="Impaired">Impaired</option>
										</select>
										<input type="text" id="rightEyeAcuity" disabled="true" placeholder="If Impaired" name="rightEyeAcuity">
										<input type="text" id="address" placeholder="Visual Acuity" name="evisualright">
									</label>


								</div>
							</div>
						</div>
						<div class="j-row">
							<p><b>Fundoscopy</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="funduscopy" id="funduscopy">
											<option value="Normal">Normal</option>
											<option value="Abnormal">Abnormal</option>
										</select>
										<input type="text" id="fundsleft" disabled="true" placeholder="If Abnormal" name="fundsleft">
									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="funduscopyRight" id="funduscopyRight">
											<option value="Normal">Normal</option>
											<option value="Abnormal">Abnormal</option>
										</select>
										<input type="text" id="fundsright" disabled="true" placeholder="If Abnormal" name="fundsright">
									</label>


								</div>
							</div>
						</div>
						<div class="j-row">
							<p><b>Diabetic Retinopathy</b></p>
							<div class="span6 unit" >
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="retinopathyLeft">
											<option value="Grade-1">Grade-1</option>
											<option value="Grade-2">Grade-2</option>
											<option value="Grade-3">Grade-3</option>
											<option value="Grade-4">Grade-4</option>
											<option value="Not Applicable">Not Applicable</option><!----This is New Filed--->

										</select>
										<!-- <input type="text" id="retinopathyLeftAcuity" placeholder="Visual Acuity" name="retinopathyLeftAcuity"> -->
									</label>


								</div>
							</div>
							<div class="span6 unit" >
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="retinopathyRight">
											<option value="Grade-1">Grade-1</option>
											<option value="Grade-2">Grade-2</option>
											<option value="Grade-3">Grade-3</option>
											<option value="Grade-4">Grade-4</option>
											<option value="Not Applicable">Not Applicable</option><!----This is New Filed--->
										</select>

									</label>


								</div>
							</div>
						</div>
						<div class="j-row">

							<div class="span6 unit" >
								<span>Diabetic Peripheral Neuropathy(DPN)</span>
								<div class="input">
									<label class="input select">
										<select name="dpn" id="dpn">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>
										<input type="text" id="dpnPresent" placeholder="If Present" name="dpnPresent" disabled="true">
									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Diabetic Autonomic Neuropathy(DAN)</span>
								<div class="input">
									<label class="input select">
										<select name="dan" id="dan">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>
										<input type="text" id="danPresent" placeholder="If Present" name="danPresent" disabled="true">
									</label>


								</div>
							</div>
						</div>
						<div class="j-row">

							<div class="span6 unit">
								<span>Diabetic Nephropathy Kidney Diseases</span>
								<div class="input">
									<label class="input select">
										<select name="dneph" id="dneph">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>
										<!-- <input type="text" id="dnephPresent" placeholder="If Present Then Stage of CKD" name="dnephPresent" disabled="true"> -->
									</label>


								</div>
							</div>
							<div class="span3 unit">
								<span>Liver Function (SGPT)</span>
								<div class="input">
									<label class="input select">
										<select name="liversgpt">
											<option value="Normal">Normal</option>
											<option value="Impaired">Impaired</option>
										</select>
										
									</label>
									
									
								</div>
							</div>
							<div class="span3 unit">
								<span>Fatty Change in Liver</span>
								<div class="input">
									<label class="input select">
										<select name="liver">
											<option value="Grade-1-mild">Grade-1-mild</option>
											<option value="Grade-2-moderate">Grade-2-moderate</option>
											<option value="Grade-3-servere">Grade-3-servere</option>
											<option value="Grade-2-advanced">Grade-2-advanced</option>
										</select>

									</label>


								</div>
							</div>
						</div> 
						<div class="j-row">
							<div class="span12" style="text-align:left">
								<h4>Foot Examination</h4>
							</div>
						</div>
						<div class="j-row">
							<p><b>ADPP</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="padpLeft">
											<option value="Present">Present</option>
												<option value="Sluggish">Sluggish</option>
											<option value="Absent">Absent</option>
										
										</select>

									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="padpRight">
											<option value="Present">Present</option>
											<option value="Absent">Absent</option>
											<option value="Sluggish">Sluggish</option>
										</select>

									</label>


								</div>
							</div>
						</div>
						<div class="j-row">
							<p><b>Foot Ulcer</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="fUlcerLeft">

											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>

									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="fUlcerRight">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>

									</label>


								</div>
							</div>
						</div>
						<div class="j-row">
							<p><b>Gangrene</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="gangreneLeft">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>

									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="gangreneRight">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>

									</label>


								</div>
							</div>
						</div>
						<div class="j-row">
							<p><b>Joint Deformtry</b></p>
							<div class="span6 unit">
								<span>Left</span>
								<div class="input">
									<label class="input select">
										<select name="jDeformtryLeft">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>

									</label>


								</div>
							</div>
							<div class="span6 unit">
								<span>Right</span>
								<div class="input">
									<label class="input select">
										<select name="jDeformtryRight">
											<option value="Absent">Absent</option>
											<option value="Present">Present</option>
										</select>



									</div>
								</div>
							</div>
							<div class="j-row">
								<p><b>Amputation</b></p>
								<div class="span6 unit">
									<span>Left</span>
									<div class="input">
										<label class="input select">
											<select name="amputationLeft">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
								<div class="span6 unit">
									<span>Right</span>
									<div class="input">
										<label class="input select">
											<select name="amputationRight">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
							</div>
							<div class="j-row">
								<div class="span12" style="text-align:left">
									<h4>Skin</h4>
								</div>
							</div>
							<div class="j-row">
								<p><b>Diabetic Dermopathy</b></p>
								<div class="span6 unit">
									<span>Left Leg</span>
									<div class="input">
										<label class="input select">
											<select name="dermopathyLeft">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
								<div class="span6 unit">
									<span>Right Leg</span>
									<div class="input">
										<label class="input select">
											<select name="dermopathyRight">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
							</div>
							<div class="j-row">

								<div class="span6 unit">
									<span>Lipotrophy</span>
									<div class="input">
										<label class="input select">
											<select name="lipotripsy">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
								<div class="span6 unit">
									<span>Lipohypertrophy</span>
									<div class="input">
										<label class="input select">
											<select name="lipohypertrophy">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
								<div class="span6 unit">
									<span>Bullous Lesion</span>
									<div class="input">
										<label class="input select">
											<select name="bullous">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>
								<div class="span6 unit">
									<span>Abscess</span>
									<div class="input">
										<label class="input select">
											<select name="abscess">
												<option value="Absent">Absent</option>
												<option value="Present">Present</option>
											</select>

										</label>


									</div>
								</div>

							</div>
						</fieldset>
						<fieldset>
						<div class="j-row">
							<div class="span12 unit">
								<div class="input">
									<textarea placeholder="Previous tests result with date" spellcheck="false" id="message" name="pastresult" class="ckeditor"></textarea>
								</div>

							</div>
							<div class="span12 unit">
								<div class="input">
									<textarea placeholder="Current test result with date" spellcheck="false" id="message" name="presentresult" class="ckeditor"></textarea>
								</div>

							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Blood Sugar</h4>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/L</span>
									</label>
									<input type="text" id="fbs" placeholder="FBS" name="fbs">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/L</span>
									</label>
									<input type="text" id="hag" placeholder="2hAG" name="hag">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/L</span>
									</label>
									<input type="text" id="habf" placeholder="2hABF" name="habf">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/L</span>
									</label>
									<input type="text" id="rbs" placeholder="RBS" name="rbs">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>%</span>
									</label>
									<input type="text" id="hbac" placeholder="HbA1C" name="hbac">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Kidney Function</h4>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="screatinine" placeholder="S.Creatinine" name="screatinine">
								</div>
							</div>
							<div class="span4 unit" >
								<div class="input">
									<label class="icon-right" for="address">
										<span>micromol/L</span>
									</label>
									<input type="text" id="screatininemicro" placeholder="S.Creatinine" name="screatininemicro" readonly>
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="bloodUrea" placeholder="Blood Urea" name="bloodUrea">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="eGFR" placeholder="eGFR" name="eGFR" readonly>
									<input type="text" id="bsa" placeholder="bsa" name="bsa" readonly>
									<input type="text" id="realegfr" placeholder="realegfr" name="realegfr" readonly>
								</div>
							</div>
							<!-- <div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="screatininemicro" placeholder="S.Creatinine in Micromol" name="screatininemicro" readonly>
								</div>
							</div> -->

							
							<input type="text" id="dnephPresent" placeholder="If Diabetic Nephropathy Present Then Stage of CKD" name="dnephPresent" readonly>
							<br>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="scalcium" placeholder="S.Calcium" name="scalcium">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="uricAcid" placeholder="S.Uric Acid" name="uricAcid">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>S.Electrolytes</h4>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/l</span>
									</label>
									<input type="text" id="na" placeholder="Na" name="na">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/l</span>
									</label>
									<input type="text" id="k" placeholder="K" name="k">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/l</span>
									</label>
									<input type="text" id="cl" placeholder="Cl" name="cl">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/l</span>
									</label>
									<input type="text" id="hco3" placeholder="HCO3" name="hco3">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mmol/l</span>
									</label>
									<input type="text" id="co2" placeholder="CO2" name="co2">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Liver Function</h4>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="sgpt" placeholder="SGPT" name="sgpt">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="sgot" placeholder="SGOT" name="sgot">
								</div>
							</div>

						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Lipid Profile</h4>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="tchole" placeholder="T.Cholesterol" name="tchole">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="hdl" placeholder="HDL" name="hdl">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="ldl" placeholder="LDL" name="ldl">
								</div>
							</div>
							<div class="span6 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mg/dl</span>
									</label>
									<input type="text" id="tg" placeholder="TG" name="tg">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>CBC/FBC</h4>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>gm/dl</span>
									</label>
									<input type="text" id="hb" placeholder="Hb" name="hb">
									<input type="text" id="ironrequirement" placeholder="Hb" name="ironrequirement" readonly>
									<input type="text" id="ampoleNo" placeholder="Hb" name="ampoleNo" readonly>
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">
									<label class="icon-right" for="address">
										<span>mm in 1st hr</span>
									</label>
									<input type="text" id="esr" placeholder="ESR" name="esr">
								</div>
							</div>
							<div class="span4 unit">
								<div class="input">

									<input type="text" id="tc" placeholder="TC" name="tc">
								</div>
							</div>

						</div>
						<div class="j-row">
							<div class="span12" style="text-align:left">
								<h5>DC</h5>
							</div>
							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcN" placeholder="N" name="dcN">
								</div>
							</div>

							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcL" placeholder="L" name="dcL">
								</div>
							</div>
							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcM" placeholder="M" name="dcM">
								</div>
							</div>
							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcE" placeholder="E" name="dcE">
								</div>
							</div>
							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcB" placeholder="B" name="dcB">
								</div>
							</div>
							<div class="span2 unit">
								<div class="input">
									<input type="text" id="dcTpc" placeholder="TPC" name="dcTpc">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span6 unit">
								<label class="input select">
									<select name="bloodGroup">
										<option value="">Blood Group</option>
										<option value="A+">A+</option>
										<option value="O+">O+</option>
										<option value="B+">B+</option>
										<option value="AB+">AB+</option>
										<option value="A-">A-</option>
										<option value="O-">O-</option>
										<option value="B-">B-</option>
										<option value="AB-">AB-</option>
									</select>
									<i></i>
								</label>
							</div>
							<div class="span6 unit">
								<label class="input select">
									<select name="hbsag">
										<option value="">HBsAg</option>
										<option value="Positive">Positive</option>
										<option value="Negative">Negative</option>
									</select>
									<i></i>
								</label>
							</div>
						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Thyroid Function</h4>
							</div>
							<div class="span3 unit">
								<label class="icon-right" for="post">
									<span>IU/L</span>
								</label>
								<div class="input">
									<input type="text" id="tsh" placeholder="TSH" name="tsh">
								</div>
							</div>

							<div class="span3 unit">
								<div class="input">
									<input type="text" id="ft4" placeholder="FT4" name="ft4">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="ft3" placeholder="FT3" name="ft3">
								</div>
							</div>
							<div class="span3 unit">
								<label class="input select">
									<select name="tpoab">
										<option value="none">Anti TPOAb</option>
										<option value="Positive">Positive</option>
										<option value="Negative">Negative</option>
									</select>
									<i></i>
								</label>
							</div>

						</div>
						<div class="j-row">
							<div class="span12" style="text-align:center">
								<h4>Urine</h4>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="sugar" placeholder="Sugar" name="sugar">
								</div>
							</div>

							<div class="span3 unit">
								<div class="input">
									<input type="text" id="alb" placeholder="Alb" name="alb">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="pByc" placeholder="P/C" name="pByc">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="cBys" placeholder="C/S" name="cBys">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="umalb" placeholder="uMalb" name="umalb">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="rbc" placeholder="RBC" name="rbc">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="keton" placeholder="Keton body" name="keton">
								</div>
							</div>
							<div class="span3 unit">
								<div class="input">
									<input type="text" id="urineOthers" placeholder="Others" name="urineOthers">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span6 unit">
								<label class="input select">
									<select name="ecg" id="ecg">
										<option value="">ECG</option>
										<option value="NAD">NAD</option>
										<option value="Abnormal">Abnormal</option>
									</select>
									<i></i>
								</label>
								<input type="text" id="ecgAbnormal" placeholder="If Abnormal" name="ecgAbnormal" disabled="true">
							</div>
							<div class="span6 unit">
								<label class="input select">
									<select name="cxr" id="cxr">
										<option value="">CXR</option>
										<option value="NAD">NAD</option>
										<option value="Abnormal">Abnormal</option>
									</select>
									<i></i>
								</label>
								<input type="text" id="cxrAbnormal" placeholder="If Abnormal" name="cxrAbnormal" disabled="true">
							</div>
						</div>
						<div class="j-row">
							<div class="span6 unit">
								<label class="input select" id="show-elements-select">
									<select name="usg" id="usg">
										<option value="">USG</option>
										<option value="NAD">NAD</option>
										<option value="Abnormal">Abnormal</option>
									</select>
									<i></i>
								</label>
								<div class="unit hidden" id="ucgabnormal">					
									<div class="input">
										<input type="text" id="usgAbnormal" placeholder="If Abnormal" name="usgAbnormal" disabled="true">
									</div>
								</div>

							</div>
							<div class="span6 unit">
								<label>Others</label>
								<label class="input select">
									<div class="input">
										<textarea placeholder="Others" spellcheck="false" id="ucgOthers" name="ucgOthers" class="ckeditor"></textarea>
									</div>
								</div>
							</div>

						</fieldset>
						<fieldset>
							<div class="j-row">
								<div class="span4 unit">
									<label class="input select">
										<select name="diabeticType">
											<option value="Diabetic">Diabetic</option>
											<option value="IFG">IFG</option>
										</select>
										<i></i>
									</label>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="ifdiabetic">
											<option value="">If Diabetic</option>
											<option value="Type-1">Type-1</option>
											<option value="Type-2">Type-2</option>
											<option value="Type-3">Type-3</option>
											<option value="Type-4">Type-4</option>
										</select>
										<i></i>
									</label>
								</div>
								<div class="span4 unit">
									<label class="input select">
										<select name="prediabetic">
											<option value="">Diabetic/Pre Diabetic</option>
											<option value="IFG">IFG</option>
											<option value="Complication">Complication</option>
											<option value="LGT">LGT</option>
										</select>
										<i></i>
									</label>
								</div>
								<div class="span6 unit">
									<label>Diabetic Complications</label>
									<div class="input">
										<textarea placeholder="Diabetic Complications" spellcheck="false" id="diabeticComplications" name="diabeticComplications" class="ckeditor"></textarea>
									</div>
								</div>
								<div class="span6 unit">
									<label>Risk Factor of DM</label>
									<div class="input">
										<textarea placeholder="Risk Factor of DM" spellcheck="false" id="rFactorDM" name="rFactorDM" class="ckeditor"></textarea>
									</div>
								</div>
								<div class="span6 unit">
									<label>Others Co-morbidities</label>
									<div class="input">
										<textarea placeholder="Others Co-morbidities" spellcheck="false" id="oComorbidities" name="oComorbidities" class="ckeditor"></textarea>
									</div>
								</div>

							</div>
						</fieldset>
						<fieldset>
							<div class="j-row">
								<div class="span6 unit">
									<div class="input">
										<input type="text" id="dietchart" placeholder="Recommended Diet Chart No" name="dietchart">
									</div>
								</div>
								<div class="span3 unit">
									<div class="input">
										<input type="text" id="kcal" placeholder="Kcal" name="kcal">
									</div>
								</div>
								<div class="span3 unit">
									<div class="input">
										<input type="text" id="pageNo" placeholder="Page No" name="pageNo">
									</div>
								</div>
								<div class="span6 unit">
									<label class="input select">
										<select name="excersize">
											<option value="">Exercise</option>
											<option value="N/A">N/A</option>
											<option value="20 min">20 min</option>
											<option value="30 min">30 min</option>
											<option value="45 min">45 min</option>
											<option value="60 min">60 min</option>

										</select>
										<i></i>
									</label>

								</div>
								<div class="span6 unit">
									<label class="input select">
										<select name="perWeek">
											<option value="">Per Week</option>
											<option value="3 Days">3 Days</option>
											<option value="5 Days">5 Days</option>
											<option value="7 Days">7 Days</option>
										</select>
										<i></i>
									</label>

								</div>
								<div class="span6 unit">
									<label>Medicine with Dose</label>
									<div class="input">
										<textarea placeholder="Medicine with Dose" spellcheck="false" id="medicineDose" name="medicineDose"  class="ckeditor"></textarea>
									</div>
								</div>
								<div class="span6 unit">
									<span>Next Follow-up Date</span>
									<div class="input">
										<input type="text" id="nfollowUpDate" placeholder="dd-mm-yyyy" class="datepicker" name="nfollowUpDate">
									</div>
								</div>
							</div>
							<div class="j-row">
								<div class="span6 unit">
									<label>Next Follow-up Advice</label>
									<div class="input">
										<textarea placeholder="Next Follow-up Advice" spellcheck="false" id="followUpAdvice" name="followUpAdvice" class="ckeditor"></textarea>
									</div>
								</div>
								<div class="span6 unit">
									<div class="input">
										<input type="text" id="address" placeholder="Referred By" name="refferedby">
									</div>
								</div>
							</div>


						</fieldset>
						<fieldset>
							<div class="j-row">
								<div class="span6 unit">
									<span>About overall Management System and quality of MDA</span>
									<label class="input select">
										<select name="mdaoveral">
											<option value="Worst">Worst</option>
											<option value="Bad">Bad</option>
											<option value="Good">Good</option>
											<option value="Very Good">Very Good</option>
											<option value="Excellent">Excellent</option>
										</select>
										<i></i>
									</label>

								</div>
							</div>
							<div class="j-row">
								<div class="input">
									<textarea placeholder="Comments" spellcheck="false" id="message" name="advices"></textarea>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<!-- end /.content -->

				<div class="footer">
					<button type="submit" class="primary-btn multi-submit-btn">Send</button>
					<button type="button" class="primary-btn multi-next-btn">Next</button>
					<button type="button" class="secondary-btn multi-prev-btn">Back</button>
				</div>
				<!-- end /.footer -->

			</form>
		</div>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="<?= base_url().'admin_file/patient.js'?>"></script>
		<script type="text/javascript" src="<?= base_url().'admin_file/standardweight.js'?>"></script>
		<script type="text/javascript">
			$(function(){
				$('.datepicker').datepicker({
					format: 'dd-mm-yyyy'
				});
			});
		</script>
	<script>
		$(document).ready(function(){

			// Phone masking
			$('#phone').mask('(999) 999-9999', {placeholder:'x'});

			// Post code masking
			$('#post').mask('999-9999', {placeholder:'x'});

			// Credit card masking
			$('#card_number').mask('9999-9999-9999-9999', {placeholder:'x'});

			// CVV2 masking
			$('#cvv2').mask('999', {placeholder:'x'});
			

		});
	</script>
	<script type="text/javascript">
		$('#bpsittingLeft, #bpsittingLeftH').keyup(function(){
			var bpsittingLeft = $('#bpsittingLeft').val();
			var bpsittingLeftH = $('#bpsittingLeftH').val();
			var diff = bpsittingLeftH - bpsittingLeft;
			
				if( diff >= 20 ){
					$("#leftsittingsystolic").val('Present');
				}else{
					$("#leftsittingsystolic").val('Absent');
				}
				if( diff >= 10 ){
					$("#leftsittingdiastolic").val('Absent');
				}else{
					$("#leftsittingdiastolic").val('Present');
				}
		})
		$('#bpLeftstanding, #bpLeftstandingH').keyup(function(){
			var bpLeftstanding = $('#bpLeftstanding').val();
			var bpLeftstandingH = $('#bpLeftstandingH').val();
			var diff = bpLeftstandingH - bpLeftstanding;

				if( diff >= 20 ){
					$("#leftstandingsystolic").val('Present');
				}else{
					$("#leftstandingsystolic").val('Absent');
				}
				if( diff >= 10 ){
					$("#leftstandingdiastolic").val('Absent');
				}else{
					$("#leftstandingdiastolic").val('Present');
				}
		})
		$('#bpRightsitting, #bpRightsittingH').keyup(function(){
			var bpRightsitting = $('#bpRightsitting').val();
			var bpRightsittingH = $('#bpRightsittingH').val();
			var diff = bpRightsittingH - bpRightsitting;
				if( diff >= 20 ){
					$("#rightsittingsystolic").val('Present');
				}else{
					$("#rightsittingsystolic").val('Absent');
				}
				if( diff >= 10 ){
					$("#rightsittingdiastolic").val('Absent');
				}else{
					$("#rightsittingdiastolic").val('Present');
				}
		})
		$('#bpRightstanding, #bpRightstandingH').keyup(function(){

			var bpRightstanding = $('#bpRightstanding').val();
			var bpRightstandingH = $('#bpRightstandingH').val();
			var diff = bpRightstandingH - bpRightstanding;
				if( diff >= 20 ){
					$("#rightstandingsystolic").val('Present');
				}else{
					$("#rightstandingsystolic").val('Absent');
				}
				if( diff >= 10 ){
					$("#rightstandingdiastolic").val('Absent');
				}else{
					$("#rightstandingdiastolic").val('Present');
				}
		})
	</script>
</body>
</html>