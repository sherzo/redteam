jQuery(document).ready(function($) {
	
	$('.bloqueHorarioCompletos.bloOONes>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
			     console.log(valueBloqueOne);
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneTime');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneTime" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});

	// 2 bloque tiempos completos


	$('.bloqueHorarioCompletos.block2>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2" name="get_horariosc2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne2Time" name="get_horariosc2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});		


	// 3 bloque tiempos completos

	$('.bloqueHorarioCompletos.block3>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOne3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOne3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3" name="get_horariosc3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOne3Time" name="get_horariosc3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});	

	// 1 bloque tiempos medios

	$('.bloqueHorarioCompletos.blockMedio1>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio1Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1" name="get_horariosm1" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio1Time" name="get_horariosm1_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});	

	// 2 bloque tiempos medios

	$('.bloqueHorarioCompletos.blockMedio2>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio2Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2" name="get_horariosm2" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio2Time" name="get_horariosm2_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});

	// 3 bloque tiempos medios

	$('.bloqueHorarioCompletos.blockMedio3>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDay').click(function(event) {
		var getDay = $(this).data('day');
		var parent = $(this).parent().parent().parent().parent();
		var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
		var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
		var FindAlert = $(parent).find('.mnsAlertVacio');

		if(FindEntrada != '' && FindSalida != ''){
			$(FindAlert).fadeOut();
			var selectDay = $(this).addClass('DaySelectActive');
			if(getDay == 'Domingo'){
			   $('.domin').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

			   var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
			   var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');
			   if(finExsitElemnt.length > 0){
			   	var valueBloqueOne = finExsitElemnt.val();
			   	var newText = ''+valueBloqueOne+','+getDay+'';
			   	$(finExsitElemnt).remove();
			   	$(finExsitElemntTime).remove();
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }else{
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
			   	$('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
			   }
			   
			}else if(getDay == 'Lunes'){
			   $('.lune').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
	           	 var newText = ''+valueBloqueOne+','+getDay+'';
	           	 $(finExsitElemnt).remove();
	           	 $(finExsitElemntTime).remove();
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
	           	 $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Martes'){
			   $('.marte').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
 			     var newText = ''+valueBloqueOne+','+getDay+'';
 			     $(finExsitElemnt).remove();
 			     $(finExsitElemntTime).remove();
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
 			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Miercoles'){
			   $('.mierco').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');
	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           }

			}else if(getDay == 'Jueves'){
			   $('.jueve').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');
	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Viernes'){
			   $('.vierne').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}else if(getDay == 'Sabado'){
			   $('.saba').addClass('disabledbutton')
			   $(this).removeClass('disabledbutton');

	           var finExsitElemnt = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3');
	           var finExsitElemntTime = $('.bloqueAddHorarios').find('input.repeatBloqOneMedio3Time');

	           if(finExsitElemnt.length > 0){
	           	 var valueBloqueOne = finExsitElemnt.val();
  			     var newText = ''+valueBloqueOne+','+getDay+'';
  			     $(finExsitElemnt).remove();
  			     $(finExsitElemntTime).remove();
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+newText+'" />');
  			     $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}else{
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3" name="get_horariosm3" value="'+getDay+'" />');
	             $('.bloqueAddHorarios').append('<input type="hidden" class="repeatBloqOneMedio3Time" name="get_horariosm3_time" value="'+FindEntrada+','+FindSalida+'" />');
	           	}

			}
		}else{			
			$(FindAlert).fadeIn();
		}

	});		
});