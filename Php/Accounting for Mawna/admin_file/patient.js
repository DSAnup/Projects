$(document).ready(function(){
			var i = 1;
		
			
			$('#fHistoryDr').change(function(){
				var fHistoryDr = $('#fHistoryDr').val();
				if(fHistoryDr == 'Positive'){
					$('#dmWhom').prop('disabled', false)
				}else{
					$('#dmWhom').prop('disabled', true)
				}
			})
			$('#oAutoimmune').change(function(){
				var oAutoimmune = $('#oAutoimmune').val();
				if(oAutoimmune == 'Present'){
					$('#oAutoimmunePresent').prop('disabled', false)
				}else{
					$('#oAutoimmunePresent').prop('disabled', true)
				}
			})
			$('#allergyHistory').change(function(){
				var allergyHistory = $('#allergyHistory').val();
				if(allergyHistory == 'Drug' || allergyHistory == 'Food' || allergyHistory == 'Others'){
					$('#allergyHistoryPresent').prop('disabled', false)
				}else{
					$('#allergyHistoryPresent').prop('disabled', true)
				}
			})
			$('#lungs').change(function(){
				var lungs = $('#lungs').val();
				if(lungs == 'Abnormal'){
					$('#lungAbnormal').prop('disabled', false)
				}else{
					$('#lungAbnormal').prop('disabled', true)
				}
			})
			$('#heart').change(function(){
				var heart = $('#heart').val();
				if(heart == 'Abnormal'){
					$('#heartAbnormal').prop('disabled', false)
				}else{
					$('#heartAbnormal').prop('disabled', true)
				}
			})
			$('#dpn').change(function(){
				var dpn = $('#dpn').val();
				if(dpn == 'Present'){
					$('#dpnPresent').prop('disabled', false)
				}else{
					$('#dpnPresent').prop('disabled', true)
				}
			})
			$('#dan').change(function(){
				var dan = $('#dan').val();
				if(dan == 'Present'){
					$('#danPresent').prop('disabled', false)
				}else{
					$('#danPresent').prop('disabled', true)
				}
			})
			$('#screatinine, #heightfeet').keyup(function(){
				var scre = $('#screatinine').val();
				var screcon = 88.4 * scre
				$('#screatininemicro').val(screcon);
				var heightcm = $("#heightcm").val();
				var egfr = heightcm * 0.7 /scre
				$('#eGFR').val(egfr)
				var weight = $('#weight').val();
				var bsa1 = (heightcm * weight) / 3600;
				var dd = Math.sqrt(bsa1);
				$('#bsa').val(dd)
				var realegfr = (egfr * dd) / 1.73;
				$('#realegfr').val(realegfr)
				var dneph = $('#dneph').val();
				if(dneph == 'Present'){

					if( egfr > 120 ){
						$("#dnephPresent").val('Fully Normal Kidney function');
					}
					if( egfr >= 90 && egfr <=120){
						$("#dnephPresent").val('Kidney damage but functioning normal yet');
					}
					if( egfr >= 60 && egfr <=89){
						$("#dnephPresent").val('Mid CKD');
					}
					if( egfr >= 30 && egfr <=59){
						$("#dnephPresent").val('Moderate CKD');
					}
					if( egfr >= 15 && egfr <=29){
						$("#dnephPresent").val('Severe CKD');
					}
					if( egfr < 15){
						$("#dnephPresent").val('Kidney failure ESRD');
					}
				}
			})

			$('#ecg').change(function(){
				var ecg = $('#ecg').val();
				if(ecg == 'Abnormal'){
					$('#ecgAbnormal').prop('disabled', false)
				}else{
					$('#ecgAbnormal').prop('disabled', true)
				}
			})
			$('#cxr').change(function(){
				var cxr = $('#cxr').val();
				if(cxr == 'Abnormal'){
					$('#cxrAbnormal').prop('disabled', false)
				}else{
					$('#cxrAbnormal').prop('disabled', true)
				}
			})
			$('#usg').change(function(){
				var usg = $('#usg').val();
				if(usg == 'Abnormal'){
					$('#usgAbnormal').prop('disabled', false)
				}else{
					$('#usgAbnormal').prop('disabled', true)
				}
			})
			$('#oedema').change(function(){
				var oedema = $('#oedema').val();
				if(oedema == 'Present'){
					$('#oedemapresent').prop('disabled', false)
				}else{
					$('#oedemapresent').prop('disabled', true)
				}
			})
			$('#leftEye').change(function(){
				var leftEye = $('#leftEye').val();
				if(leftEye == 'Impaired'){
					$('#leftEyeAcuity').prop('disabled', false)
				}else{
					$('#leftEyeAcuity').prop('disabled', true)
				}
			})
			$('#rightEye').change(function(){
				var rightEye = $('#rightEye').val();
				if(rightEye == 'Impaired'){
					$('#rightEyeAcuity').prop('disabled', false)
				}else{
					$('#rightEyeAcuity').prop('disabled', true)
				}
			})
			$('#funduscopy').change(function(){
				var funduscopy = $('#funduscopy').val();
				if(funduscopy == 'Abnormal'){
					$('#fundsleft').prop('disabled', false)
				}else{
					$('#fundsleft').prop('disabled', true)
				}
			})
			$('#funduscopyRight').change(function(){
				var funduscopyRight = $('#funduscopyRight').val();
				if(funduscopyRight == 'Abnormal'){
					$('#fundsright').prop('disabled', false)
				}else{
					$('#fundsright').prop('disabled', true)
				}
			})


			$('#sex').change(function(){
				var sex = $('#sex').val();
				// alert(sex);
				if(sex == 'female'){

					$('#pregnant').prop('disabled', false)
				}else{
					$('#pregnant').prop('disabled', true)
				}
			})
			$('#hb').keyup(function(){
				var hb = $('#hb').val();
				var weight = $('#weight').val();
				var iron = (15-hb)*2.4*weight+500;
				var ampole = iron / 100 ;
				// alert(iron);
				var anemia = $('#anemia').val();
				if(anemia == 'Present'){

					if( hb >= 8 && hb <=10){
						$("#anemiapresent").val('Mild');
					}
					if( hb > 5 && hb <=7.9){
						$("#anemiapresent").val('Moderate');
					}
					if( hb <= 5){
						$("#anemiapresent").val('Severe');
					}
					$('#ironrequirement').val(iron);
					$('#ampoleNo').val(ampole);
				}
			})
			
			
			
		});
