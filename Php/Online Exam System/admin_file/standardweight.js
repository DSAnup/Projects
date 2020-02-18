$(document).ready(function(){

	$('#waist, #hip').keyup(function(){
		var waist = $("#waist").val();
		var hip = $("#hip").val();
		var sex = $("#sex").val();
		var pregnant = $('#pregnant').val();
		var waisthip = parseFloat(waist)/parseFloat(hip);
		if(sex == 'male' && waist < 90){
			$("#waiststatus").val('Healty or nonobese');
		}
		if(sex == 'male' && waist >= 90 && waist <=102){
			$("#waiststatus").val('Viscerally or Centrally obese');
		}
		if(sex == 'male' && waist > 120){
			$("#waiststatus").val('Greatly increased risk of metabolic syndrome  like DM, HTN, Dyslipid-aemia, IHD etc.');
		}
		if(sex == 'female' && pregnant !="Pregnant" && waist < 80){
			$("#waiststatus").val('Healty or nonobese');
		}
		if(sex == 'female' && pregnant !="Pregnant" && waist >= 80 && waist <=88){
			$("#waiststatus").val('Viscerally or Centrally obese');
		}
		if(sex == 'female' && pregnant !="Pregnant" && waist > 88){
			$("#waiststatus").val('Greatly increased risk of metabolic syndrome  like DM, HTN, Dyslipid-aemia, IHD etc.');
		}
		if(sex == 'male' && waisthip >= 0.9){
			$("#waisthip").val('Centrally obese');
		}
		if(sex == 'female' && pregnant !="Pregnant" && waisthip >= 0.85){
			$("#waisthip").val('Centrally obese');
		}
		if(sex == 'male' && waisthip < 0.9){
			$("#waisthip").val('Healty or nonobese');
		}
		if(sex == 'female' && pregnant !="Pregnant" && waisthip < 0.85){
			$("#waisthip").val('Healty or nonobese');
		}
	});
	$('#heightfeet, #weight').keyup(function(){
				var heightfeet = $("#heightfeet").val();
				var heightmeter = parseFloat(heightfeet)*0.3048;
				$("#heightmeter").val(heightmeter);
				var heightcm = parseFloat(heightfeet)*30.48;
				$("#heightcm").val(heightcm);
				var heightinch = parseFloat(heightfeet)*12;
				$("#heightinch").val(heightinch);
				var weight = $("#weight").val();
				var bmi = parseFloat(weight)/(parseFloat(heightmeter)**2);
				$("#bmi").val(bmi);
				var sex = $("#sex").val();

				var roundcm = Math.round(heightcm);
				if(bmi<18.5){
					$("#whoclass").val('Underweight');
				}
				if(bmi >= 18.5 && bmi <=24.9){
					$("#whoclass").val('Normal Weight');
				}
				if(bmi >= 25 && bmi <=29.9){
					$("#whoclass").val('Overweight');
				}
				if(bmi >= 30 && bmi <=34.9){
					$("#whoclass").val('Obesity Class-1');
				}
				if(bmi >= 35 && bmi <=39.9){
					$("#whoclass").val('Obesity Class-2');
				}
				if(bmi >= 40){
					$("#whoclass").val('Morbid or Extreme Obesity Class-3');
				}
				if(sex == 'male' && bmi >= 20 && bmi <=25){
					$("#bmiStatus").val('Normal');
					var sbw = $('#sbw3').val();
					var diet = 30 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					if(consub % 2 == 1){
						var newnum = parseInt(dietsub) + 1 +"00";
						$("#dietchartnew").val(newnum);		
					}else{
						var newnum = parseInt(dietsub)  +"00";
						$("#dietchartnew").val(newnum);	
					}
				}
				if(sex == 'male' && bmi >= 25 && bmi <=30){
					$("#bmiStatus").val('Over');
					var sbw = $('#sbw3').val();
					var diet = 24 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					if(consub % 2 == 1){
						var newnum = parseInt(dietsub) + 1 +"00";
						$("#dietchartnew").val(newnum);		
					}else{
						var newnum = parseInt(dietsub)  +"00";
						
						$("#dietchartnew").val(newnum);	
					}
				}
				if(sex == 'male' && bmi > 30){
					$("#bmiStatus").val('Obese');
					var sbw = $('#sbw3').val();
					var diet = 24 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					if(consub % 2 == 1){
						var newnum = parseInt(dietsub) + 1 +"00";
						$("#dietchartnew").val(newnum);		
					}else{
						var newnum = parseInt(dietsub)  +"00";
						$("#dietchartnew").val(newnum);	
					}
				}
				if(sex == 'male' && bmi < 20){
					$("#bmiStatus").val('Under');
					var sbw = $('#sbw3').val();
					var diet = 36 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					if(consub % 2 == 1){
						var newnum = parseInt(dietsub) + 1 +"00";
						$("#dietchartnew").val(newnum);		
					}else{
						var newnum = parseInt(dietsub)  +"00";
						$("#dietchartnew").val(newnum);	
					}
				}
				if(sex == 'female' && bmi >= 19 && bmi <=24){
					$("#bmiStatus").val('Normal');
					var sbw = $('#sbw3').val();
					var pregnant = $('#pregnant').val();
					var diet = 30 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					console.log(consub)
					if(pregnant == 'Pregnant'){
						// alert('ok');
						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							var paint = parseInt(newnum) + 400;
							console.log(newnum)
							console.log(paint)
							$("#dietchartnew").val(paint);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							var paint = parseInt(newnum) + 400;
							console.log(newnum)
							console.log(paint)
							$("#dietchartnew").val(paint);	
						}	
					}else{

						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							$("#dietchartnew").val(newnum);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							$("#dietchartnew").val(newnum);	
						}
					}
				}
				if(sex == 'female' && bmi >= 24 && bmi <=29){
					$("#bmiStatus").val('Over');
					var sbw = $('#sbw3').val();
					var pregnant = $('#pregnant').val();
					var diet = 24 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					console.log(consub)
					if(pregnant == 'Pregnant'){
							
						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);	
						}	
					}else{

						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							$("#dietchartnew").val(newnum);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							$("#dietchartnew").val(newnum);	
						}
					}
				}
				if(sex == 'female' && bmi > 29){
					$("#bmiStatus").val('Obese');
					var sbw = $('#sbw3').val();
					var sbw = $('#sbw3').val();
					var pregnant = $('#pregnant').val();
					var diet = 24 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					console.log(consub)
					if(pregnant == 'Pregnant'){
	
						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);	
						}	
					}else{

						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							$("#dietchartnew").val(newnum);		
						}else{
							var newnum = parseInt(dietsub) +"00";
							$("#dietchartnew").val(newnum);	
						}
					}
				}
				if(sex == 'female' && bmi < 19){
					$("#bmiStatus").val('Under');
					var sbw = $('#sbw3').val();
					var pregnant = $('#pregnant').val();
					var diet = 36 * sbw;
					var numst = diet.toString();
					var cdiet = diet.toString().length;
					
					var dietsub = numst.substr(0, 2);
					var consub = parseInt(dietsub);
					console.log(consub)
					if(pregnant == 'Pregnant'){
						
						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);		
						}else{
							var newnum = parseInt(dietsub) + "00";
							var paint = parseInt(newnum) + 400;
							$("#dietchartnew").val(paint);	
						}	
					}else{

						if(consub % 2 == 1){
							var newnum = parseInt(dietsub) + 1 +"00";
							$("#dietchartnew").val(newnum);		
						}else{
							var newnum = parseInt(dietsub) + "00";
							$("#dietchartnew").val(newnum);	
						}
					}
				}
				if(sex == 'male' && roundcm == '136'){
					$('#sbw').val('37');
					$('#sbw2').val('46');
					$('#sbw3').val('41.5');
				}
				if(sex == 'male' && roundcm == '138'){
					$('#sbw').val('38');
					$('#sbw2').val('47');
					$('#sbw3').val('42.5');
				}
				if(sex == 'male' && roundcm == '140'){
					$('#sbw').val('39');
					$('#sbw2').val('48');
					$('#sbw3').val('43.5');
				}
				if(sex == 'male' && roundcm == '142'){
					$('#sbw').val('40');
					$('#sbw2').val('49');
					$('#sbw3').val('44.5');
				}
				if(sex == 'male' && roundcm == '144'){
					$('#sbw').val('41');
					$('#sbw2').val('51');
					$('#sbw3').val('46');
				}
				if(sex == 'male' && roundcm == '146'){
					$('#sbw').val('43');
					$('#sbw2').val('53');
					$('#sbw3').val('48');
				}
				if(sex == 'male' && roundcm == '148'){
					$('#sbw').val('44');
					$('#sbw2').val('55');
					$('#sbw3').val('49.5');
				}
				if(sex == 'male' && roundcm == '150'){
					$('#sbw').val('45');
					$('#sbw2').val('56');
					$('#sbw3').val('50.5');
				}
				if(sex == 'male' && roundcm == '152'){
					$('#sbw').val('46');
					$('#sbw2').val('58');
					$('#sbw3').val('52');
				}
				if(sex == 'male' && roundcm == '154'){
					$('#sbw').val('47');
					$('#sbw2').val('59');
					$('#sbw3').val('53');
				}
				if(sex == 'male' && roundcm == '156'){
					$('#sbw').val('49');
					$('#sbw2').val('61');
					$('#sbw3').val('55');
				}
				if(sex == 'male' && roundcm == '158'){
					$('#sbw').val('50');
					$('#sbw2').val('62');
					$('#sbw3').val('56');
				}
				if(sex == 'male' && roundcm == '160'){
					$('#sbw').val('51');
					$('#sbw2').val('64');
					$('#sbw3').val('57.5');
				}
				if(sex == 'male' && roundcm == '162'){
					$('#sbw').val('52');
					$('#sbw2').val('66');
					$('#sbw3').val('59');
				}
				if(sex == 'male' && roundcm == '164'){
					$('#sbw').val('54');
					$('#sbw2').val('67');
					$('#sbw3').val('60.5');
				}
				if(sex == 'male' && roundcm == '166'){
					$('#sbw').val('55');
					$('#sbw2').val('69');
					$('#sbw3').val('62');
				}
				if(sex == 'male' && roundcm == '168'){
					$('#sbw').val('56');
					$('#sbw2').val('71');
					$('#sbw3').val('63.5');
				}
				if(sex == 'male' && roundcm == '170'){
					$('#sbw').val('58');
					$('#sbw2').val('72');
					$('#sbw3').val('65');
				}
				if(sex == 'male' && roundcm == '172'){
					$('#sbw').val('59');
					$('#sbw2').val('74');
					$('#sbw3').val('66.5');
				}
				if(sex == 'male' && roundcm == '174'){
					$('#sbw').val('61');
					$('#sbw2').val('76');
					$('#sbw3').val('68.5');
				}
				if(sex == 'male' && roundcm == '176'){
					$('#sbw').val('62');
					$('#sbw2').val('77');
					$('#sbw3').val('69.5');
				}
				if(sex == 'male' && roundcm == '178'){
					$('#sbw').val('63');
					$('#sbw2').val('79');
					$('#sbw3').val('71');
				}
				if(sex == 'male' && roundcm == '180'){
					$('#sbw').val('65');
					$('#sbw2').val('81');
					$('#sbw3').val('73');
				}
				if(sex == 'male' && roundcm == '182'){
					$('#sbw').val('66');
					$('#sbw2').val('83');
					$('#sbw3').val('74.5');
				}
				if(sex == 'male' && roundcm == '184'){
					$('#sbw').val('68');
					$('#sbw2').val('85');
					$('#sbw3').val('76.5');
				}
				if(sex == 'male' && roundcm == '186'){
					$('#sbw').val('69');
					$('#sbw2').val('86');
					$('#sbw3').val('77.5');
				}
				if(sex == 'male' && roundcm == '188'){
					$('#sbw').val('71');
					$('#sbw2').val('88');
					$('#sbw3').val('79.5');
				}
				if(sex == 'male' && roundcm == '190'){
					$('#sbw').val('72');
					$('#sbw2').val('90');
					$('#sbw3').val('81');
				}

				if(sex == 'female' && roundcm == '136'){
					$('#sbw').val('35');
					$('#sbw2').val('44');
					$('#sbw3').val('39.5');
				}
				if(sex == 'female' && roundcm == '138'){
					$('#sbw').val('36');
					$('#sbw2').val('46');
					$('#sbw3').val('41.5');
				}
				if(sex == 'female' && roundcm == '140'){
					$('#sbw').val('37');
					$('#sbw2').val('47');
					$('#sbw3').val('42');
				}
				if(sex == 'female' && roundcm == '142'){
					$('#sbw').val('38');
					$('#sbw2').val('48');
					$('#sbw3').val('43');
				}
				if(sex == 'female' && roundcm == '144'){
					$('#sbw').val('39');
					$('#sbw2').val('49');
					$('#sbw3').val('44.5');
				}
				if(sex == 'female' && roundcm == '146'){
					$('#sbw').val('41');
					$('#sbw2').val('51');
					$('#sbw3').val('46');
				}
				if(sex == 'female' && roundcm == '148'){
					$('#sbw').val('41');
					$('#sbw2').val('53');
					$('#sbw3').val('47.5');
				}
				if(sex == 'female' && roundcm == '150'){
					$('#sbw').val('43');
					$('#sbw2').val('54');
					$('#sbw3').val('48.5');
				}
				if(sex == 'female' && roundcm == '152'){
					$('#sbw').val('44');
					$('#sbw2').val('55');
					$('#sbw3').val('49.5');
				}
				if(sex == 'female' && roundcm == '154'){
					$('#sbw').val('45');
					$('#sbw2').val('56');
					$('#sbw3').val('50.5');
				}
				if(sex == 'female' && roundcm == '156'){
					$('#sbw').val('46');
					$('#sbw2').val('58');
					$('#sbw3').val('52');
				}
				if(sex == 'female' && roundcm == '158'){
					$('#sbw').val('47');
					$('#sbw2').val('60');
					$('#sbw3').val('53.5');
				}
				if(sex == 'female' && roundcm == '160'){
					$('#sbw').val('49');
					$('#sbw2').val('61');
					$('#sbw3').val('55');
				}
				if(sex == 'female' && roundcm == '162'){
					$('#sbw').val('50');
					$('#sbw2').val('63');
					$('#sbw3').val('56.5');
				}
				if(sex == 'female' && roundcm == '164'){
					$('#sbw').val('51');
					$('#sbw2').val('64');
					$('#sbw3').val('58');
				}
				if(sex == 'female' && roundcm == '166'){
					$('#sbw').val('52');
					$('#sbw2').val('66');
					$('#sbw3').val('59');
				}
				if(sex == 'female' && roundcm == '168'){
					$('#sbw').val('54');
					$('#sbw2').val('68');
					$('#sbw3').val('61');
				}
				if(sex == 'female' && roundcm == '170'){
					$('#sbw').val('55');
					$('#sbw2').val('69');
					$('#sbw3').val('62');
				}
				if(sex == 'female' && roundcm == '172'){
					$('#sbw').val('56');
					$('#sbw2').val('71');
					$('#sbw3').val('63.5');
				}
				if(sex == 'female' && roundcm == '174'){
					$('#sbw').val('58');
					$('#sbw2').val('73');
					$('#sbw3').val('65.5');
				}
				if(sex == 'female' && roundcm == '176'){
					$('#sbw').val('59');
					$('#sbw2').val('74');
					$('#sbw3').val('66.5');
				}
				if(sex == 'female' && roundcm == '178'){
					$('#sbw').val('60');
					$('#sbw2').val('76');
					$('#sbw3').val('68');
				}
				if(sex == 'female' && roundcm == '180'){
					$('#sbw').val('62');
					$('#sbw2').val('78');
					$('#sbw3').val('70');
				}
			});


})