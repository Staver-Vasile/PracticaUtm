jQuery(document).ready(function () {
	$("#suma").ionRangeSlider({
		from: 4,
		step: 1000,
		values: [
		1000, 2000, 3000, 4000, 5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,50000
		],
		grid: true,
		onChange: function (data) {
			if(data.from_value>15000){
				$('#infp-sum').html('Peste 15 000');
			}else{
				$('#infp-sum').html(data.from_value);
				//$('#plLunara').html(data.from_value);
				//$('#CostImpr_id').html(data.from_value);
				
			}


			if(data.from_value>3000 && $("#perioada").data("ionRangeSlider").input.value==1){
				$("#perioada").data("ionRangeSlider").update({
					from: 2
				});

				$('#infp-luni').html(data.from + 2);
				//$('#plLunara').html(data.from_value + 2);
				//$('#CostImpr_id').html(data.from_value + 2);

																	//document.getElementById('PlataLn_id').value  = data.from_value;
																}
															},
															onUpdate: function (data) {

																if(data.from_value>15000){
																	$('#infp-sum').html('Peste 15 000');
																}else{

																	$('#infp-sum').html(data.from_value);
																	//$('#plLunara').html(data.from_value);
																//	$('#CostImpr_id').html(data.from_value);
																}

															}




		//$('#value').text($('#slider').slider('value'));
	});

	



	var addCommas = function(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ' ' + '$2');
		}
		return x1 + x2;
	}
	$("#perioada").ionRangeSlider({

		from: 12,
		step: 1,
		values: [
		2, 3, 4, 5,6,7,8,9,10,11,12,13,13,15,16,17,18,19,20,21,22,23,24
		],
		grid: true,
		onChange: function (data) {
			$('#infp-luni').html(data.from + 2);

		},
		onUpdate: function (data) {
			$('#infp-luni').html(data.from + 2);

		}
	});


	$('#calculator-form .in input').on('input', function () {
		calc();
	});
	$('#calculator-form .in-block input').on('input', function () {
		if ($('#fnume').val() != "" && $('#fcod').val() != "" && $('#ftel').val() != "") {
			$('.terms').addClass('act');
		} else {
			$('.terms').removeClass('act');
		}
		if ($('#terms-input').is(':checked')) {
			$('#btn-pc').removeAttr('disabled');
		} else {
			$('#btn-pc').attr('disabled', 'disabled');
		}

	});
	$('#terms-input').on('click', function () {
		if ($('#terms-input').is(':checked')) {
			$('#btn-pc').removeAttr('disabled');
		} else {
			$('#btn-pc').attr('disabled', 'disabled');
		}
	});
	if ($('#terms-input').is(':checked')) {
		$('#btn-pc').removeAttr('disabled');

	} else {
		$('#btn-pc').attr('disabled', 'disabled');

	}



	 

	calc();

});


function calc(){

	var suma = $('#suma').val();
	var perioada = $('#perioada').val();




}



$(document).ready(function(){
	$('.tooltipped').tooltip({delay: 50});
});



$(document).ready(function(){

	$("#chkId").click(function() {
		$("#submit-btn").attr("disabled", !this.checked);
	});

	$('#submit-btn').click(function(){

		var codP = $('#codPersonal').val().length;
		var tel = $('#telefon').val().length;
		var name = $('#Nume_Prenume').val().length;
		console.log(name);
		console.log(codP);
		if(codP == 13 && tel >=6 && tel <= 15 && name != 0){
			event.preventDefault();
			$.ajax({
				dataType: 'JSON',
				url: 'CreditRequest.php',
				type: 'POST',
				data: $('#contact').serialize(),
				beforeSend: function(xhr){
					$('#submit-btn').html('SENDING...');
					$('.tap-target').tapTarget('open');
				},
				success: function(response){
					if(response){
						console.log(response);
						if(response['signal'] == 'ok'){
							$('#msg').html('<div class="alert alert-success">'+ response['msg']  +'</div>');
							$('input, textarea').val(function() {
								return this.defaultValue;
							});

						}
						else{
							$('#msg').html('<div class="alert alert-danger">'+ response['msg'] +'</div>');
						}
					}

				},
				error: function(){
					$('#msg').html('<div class="alert alert-danger">Errors occur. Please try again later.</div>');
				},
				complete: function(){
					$('#submit-btn').html('TRIMITE CERERE');
				 
				document.getElementById('Nume_Prenume').value = "";
				document.getElementById('telefon').value = "";
				document.getElementById('codPersonal').value = "";

					
				}
			});
		}

		else{

			if(codP != 13){
				Materialize.toast('Codul Personal nu a fost introdust corect!', 4000, 'rounded');
			}
			else if(tel <= 6 || tel >= 15){
				Materialize.toast('Telefonul nu a fost introdust corect!', 4000, 'rounded');
			}
			else if(name == 0){
				Materialize.toast('Introduceti numele si prenumele!', 4000, 'rounded');
			}


		}

	});
});