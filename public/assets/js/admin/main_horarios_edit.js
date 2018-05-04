
jQuery.fn.EditUserHorarios = function(ValInput,ValInputTime,BloqueHorarioOther,BloqueHorarioOther2,BloqueHorarioOther3,BloqueHorarioOther4,BloqueHorarioOther5,ValInputOther,ValInputOther2,ValInputOther3,ValInputOther4,ValInputOther5)  //damos nombre ala funcion
{
   $(this).click(function(event) {
	   var getDay = $(this).data('day');
	   var element = $(this);
	   var parent = $(this).parent().parent().parent().parent();
	   var FindEntrada = $(parent).find('.daataEntrada>div>div>div>input').val();
	   var FindSalida = $(parent).find('.daataSalida>div>div>div>input').val();
	   var FindAlert = $(parent).find('.mnsAlertVacio');

	   if(FindEntrada != '' && FindSalida != ''){
	      $(FindAlert).fadeOut();
	      var selectDay = $(this).addClass('DaySelectActiveEdit');
	      var VerifiDat = $(ValInput).val();
	      	$('.DayForDayEdit').each(function(index, el) { 
	      	    var nameDay = $(this).data('day');
	      	    if(nameDay == getDay){
	      	    	$(this).addClass('disabledbutton');
	      	    	$(this).removeClass('DaySelectActiveEdit');
	      	    	$(element).addClass('DaySelectActiveEdit');
	      	    	$(element).removeClass('disabledbutton');
	      	    }
	      	});
      		/*// Si el campo que guarda los dias esta a vacio solo coloca el dia seleccionado si no 
      		lo busca o agrega en un array*/
	      if(VerifiDat == ''){	
	      	$(ValInput).val(getDay);
  	      	// Encontrame los otros bloues de horario completto, si el dia que viene en este momentos lo encuentra en los otros bloques lo desselaccionqa
  	      	finElementsActive2 = $(BloqueHorarioOther);
  	      	finElementsActive3 = $(BloqueHorarioOther2);
  	      	finElementsActive4 = $(BloqueHorarioOther3);
  	      	finElementsActive5 = $(BloqueHorarioOther4);
  	      	finElementsActive6 = $(BloqueHorarioOther5);

  	    	$(finElementsActive2).each(function(index, el) { 
  	    	    var finDataElementActive = $(this).data('day');
  	    	    if(finDataElementActive == getDay){
  	    	    	$(this).removeClass('DaySelectActiveEdit');
  		    		// Buscamos dentro del otro bloque horarios 2 el dia que viene y si existe lo elimina
  		    		var cadena2 = $(ValInputOther).val(),
  		    	    separador2 = ",",
  		    	    arregloDeSubCadenas2 = cadena2.split(separador2);
  		    	    PosicionElemento2 = arregloDeSubCadenas2.indexOf(getDay);
  		    	    if(PosicionElemento2 == '-1'){

  		    	    }else{
  		    			function removeItemFromArr ( arr, item ) {
  		    				var i = '';
  		    			    var i = arr.indexOf( item );
  		    			    arr.splice( i, 1 );
  		    			}    	    			 
  		    			removeItemFromArr(arregloDeSubCadenas2, getDay);
  		    			NewConetenidoDays2 = arregloDeSubCadenas2.join();
  		    			newValorDays2 = $(ValInputOther).val(NewConetenidoDays2);
  		    	    }

  	    	    	
  	    	    }
  	    	});

  	    	$(finElementsActive3).each(function(index, el) { 
  	    	    var finDataElementActive = $(this).data('day');
  	    	    if(finDataElementActive == getDay){
  	    	    	$(this).removeClass('DaySelectActiveEdit');

  		    		var cadena3 = $(ValInputOther2).val(),
  		    	    separador3 = ",",
  		    	    arregloDeSubCadenas3 = cadena3.split(separador3);
  		    	    PosicionElemento3 = arregloDeSubCadenas3.indexOf(getDay);
  		    	    if(PosicionElemento3 == '-1'){

  		    	    }else{
  		    			function removeItemFromArr ( arr, item ) {
  		    				var i = '';
  		    			    var i = arr.indexOf( item );
  		    			    arr.splice( i, 1 );
  		    			}    	    			 
  		    			removeItemFromArr(arregloDeSubCadenas3, getDay);
  		    			NewConetenidoDays3 = arregloDeSubCadenas3.join();
  		    			newValorDays3 = $(ValInputOther2).val(NewConetenidoDays3);
  		    	    }
  	    	    }
  	    	});

	    	$(finElementsActive4).each(function(index, el) { 
	    	    var finDataElementActive = $(this).data('day');
	    	    if(finDataElementActive == getDay){
	    	    	$(this).removeClass('DaySelectActiveEdit');

		    		var cadena4 = $(ValInputOther3).val(),
		    	    separador4 = ",",
		    	    arregloDeSubCadenas4 = cadena4.split(separador4);
		    	    PosicionElemento4 = arregloDeSubCadenas4.indexOf(getDay);
		    	    if(PosicionElemento4 == '-1'){

		    	    }else{
		    			function removeItemFromArr ( arr, item ) {
		    				var i = '';
		    			    var i = arr.indexOf( item );
		    			    arr.splice( i, 1 );
		    			}    	    			 
		    			removeItemFromArr(arregloDeSubCadenas4, getDay);
		    			NewConetenidoDays4 = arregloDeSubCadenas4.join();
		    			newValorDays4 = $(ValInputOther3).val(NewConetenidoDays4);
		    	    }
	    	    }
	    	});

	    	$(finElementsActive5).each(function(index, el) { 
	    	    var finDataElementActive = $(this).data('day');
	    	    if(finDataElementActive == getDay){
	    	    	$(this).removeClass('DaySelectActiveEdit');

		    		var cadena5 = $(ValInputOther4).val(),
		    	    separador5 = ",",
		    	    arregloDeSubCadenas5 = cadena5.split(separador5);
		    	    PosicionElemento5 = arregloDeSubCadenas5.indexOf(getDay);
		    	    if(PosicionElemento5 == '-1'){

		    	    }else{
		    			function removeItemFromArr ( arr, item ) {
		    				var i = '';
		    			    var i = arr.indexOf( item );
		    			    arr.splice( i, 1 );
		    			}    	    			 
		    			removeItemFromArr(arregloDeSubCadenas5, getDay);
		    			NewConetenidoDays5 = arregloDeSubCadenas5.join();
		    			newValorDays5 = $(ValInputOther4).val(NewConetenidoDays5);
		    	    }
	    	    }
	    	});

	    	$(finElementsActive6).each(function(index, el) { 
	    	    var finDataElementActive = $(this).data('day');
	    	    if(finDataElementActive == getDay){
	    	    	$(this).removeClass('DaySelectActiveEdit');

		    		var cadena6 = $(ValInputOther5).val(),
		    	    separador6 = ",",
		    	    arregloDeSubCadenas6 = cadena6.split(separador6);
		    	    PosicionElemento6 = arregloDeSubCadenas6.indexOf(getDay);
		    	    if(PosicionElemento6 == '-1'){

		    	    }else{
		    			function removeItemFromArr ( arr, item ) {
		    				var i = '';
		    			    var i = arr.indexOf( item );
		    			    arr.splice( i, 1 );
		    			}    	    			 
		    			removeItemFromArr(arregloDeSubCadenas6, getDay);
		    			NewConetenidoDays6 = arregloDeSubCadenas6.join();
		    			newValorDays6 = $(ValInputOther5).val(NewConetenidoDays6);
		    	    }
	    	    }
	    	});
	      }else{
	     	var cadena = $(ValInput).val(),
	      	separador = ",",
	      	arregloDeSubCadenas = cadena.split(separador);
	      	PosicionElemento = arregloDeSubCadenas.indexOf(getDay);

	  	      if(PosicionElemento == '-1'){
	  	      	arregloDeSubCadenas.push(getDay); 
	  	      	AddNewConetenidoDays = arregloDeSubCadenas.join();
	  	      	newValorDays = $(ValInput).val(AddNewConetenidoDays);
	  	      	$(ValInputTime).val(''+FindEntrada+','+FindSalida+'');

	  	      	// Encontrame los otros bloues de horario completto, si el dia que viene en este momentos lo encuentra en los otros bloques lo desselaccionqa
	  	      	finElementsActive2 = $(BloqueHorarioOther);
	  	      	finElementsActive3 = $(BloqueHorarioOther2);
	  	      	finElementsActive4 = $(BloqueHorarioOther3);
	  	      	finElementsActive5 = $(BloqueHorarioOther4);
	  	      	finElementsActive6 = $(BloqueHorarioOther5);

	  	    	$(finElementsActive2).each(function(index, el) { 
	  	    	    var finDataElementActive = $(this).data('day');
	  	    	    if(finDataElementActive == getDay){
	  	    	    	$(this).removeClass('DaySelectActiveEdit');
	  		    		// Buscamos dentro del otro bloque horarios 2 el dia que viene y si existe lo elimina
	  		    		var cadena2 = $(ValInputOther).val(),
	  		    	    separador2 = ",",
	  		    	    arregloDeSubCadenas2 = cadena2.split(separador2);
	  		    	    PosicionElemento2 = arregloDeSubCadenas2.indexOf(getDay);
	  		    	    if(PosicionElemento2 == '-1'){

	  		    	    }else{
	  		    			function removeItemFromArr ( arr, item ) {
	  		    				var i = '';
	  		    			    var i = arr.indexOf( item );
	  		    			    arr.splice( i, 1 );
	  		    			}    	    			 
	  		    			removeItemFromArr(arregloDeSubCadenas2, getDay);
	  		    			NewConetenidoDays2 = arregloDeSubCadenas2.join();
	  		    			newValorDays2 = $(ValInputOther).val(NewConetenidoDays2);
	  		    	    }

	  	    	    	
	  	    	    }
	  	    	});

	  	    	$(finElementsActive3).each(function(index, el) { 
	  	    	    var finDataElementActive = $(this).data('day');
	  	    	    if(finDataElementActive == getDay){
	  	    	    	$(this).removeClass('DaySelectActiveEdit');

	  		    		var cadena3 = $(ValInputOther2).val(),
	  		    	    separador3 = ",",
	  		    	    arregloDeSubCadenas3 = cadena3.split(separador3);
	  		    	    PosicionElemento3 = arregloDeSubCadenas3.indexOf(getDay);
	  		    	    if(PosicionElemento3 == '-1'){

	  		    	    }else{
	  		    			function removeItemFromArr ( arr, item ) {
	  		    				var i = '';
	  		    			    var i = arr.indexOf( item );
	  		    			    arr.splice( i, 1 );
	  		    			}    	    			 
	  		    			removeItemFromArr(arregloDeSubCadenas3, getDay);
	  		    			NewConetenidoDays3 = arregloDeSubCadenas3.join();
	  		    			newValorDays3 = $(ValInputOther2).val(NewConetenidoDays3);
	  		    	    }
	  	    	    }
	  	    	});

    	    	$(finElementsActive4).each(function(index, el) { 
    	    	    var finDataElementActive = $(this).data('day');
    	    	    if(finDataElementActive == getDay){
    	    	    	$(this).removeClass('DaySelectActiveEdit');

    		    		var cadena4 = $(ValInputOther3).val(),
    		    	    separador4 = ",",
    		    	    arregloDeSubCadenas4 = cadena4.split(separador4);
    		    	    PosicionElemento4 = arregloDeSubCadenas4.indexOf(getDay);
    		    	    if(PosicionElemento4 == '-1'){

    		    	    }else{
    		    			function removeItemFromArr ( arr, item ) {
    		    				var i = '';
    		    			    var i = arr.indexOf( item );
    		    			    arr.splice( i, 1 );
    		    			}    	    			 
    		    			removeItemFromArr(arregloDeSubCadenas4, getDay);
    		    			NewConetenidoDays4 = arregloDeSubCadenas4.join();
    		    			newValorDays4 = $(ValInputOther3).val(NewConetenidoDays4);
    		    	    }
    	    	    }
    	    	});

    	    	$(finElementsActive5).each(function(index, el) { 
    	    	    var finDataElementActive = $(this).data('day');
    	    	    if(finDataElementActive == getDay){
    	    	    	$(this).removeClass('DaySelectActiveEdit');

    		    		var cadena5 = $(ValInputOther4).val(),
    		    	    separador5 = ",",
    		    	    arregloDeSubCadenas5 = cadena5.split(separador5);
    		    	    PosicionElemento5 = arregloDeSubCadenas5.indexOf(getDay);
    		    	    if(PosicionElemento5 == '-1'){

    		    	    }else{
    		    			function removeItemFromArr ( arr, item ) {
    		    				var i = '';
    		    			    var i = arr.indexOf( item );
    		    			    arr.splice( i, 1 );
    		    			}    	    			 
    		    			removeItemFromArr(arregloDeSubCadenas5, getDay);
    		    			NewConetenidoDays5 = arregloDeSubCadenas5.join();
    		    			newValorDays5 = $(ValInputOther4).val(NewConetenidoDays5);
    		    	    }
    	    	    }
    	    	});

    	    	$(finElementsActive6).each(function(index, el) { 
    	    	    var finDataElementActive = $(this).data('day');
    	    	    if(finDataElementActive == getDay){
    	    	    	$(this).removeClass('DaySelectActiveEdit');

    		    		var cadena6 = $(ValInputOther5).val(),
    		    	    separador6 = ",",
    		    	    arregloDeSubCadenas6 = cadena6.split(separador6);
    		    	    PosicionElemento6 = arregloDeSubCadenas6.indexOf(getDay);
    		    	    if(PosicionElemento6 == '-1'){

    		    	    }else{
    		    			function removeItemFromArr ( arr, item ) {
    		    				var i = '';
    		    			    var i = arr.indexOf( item );
    		    			    arr.splice( i, 1 );
    		    			}    	    			 
    		    			removeItemFromArr(arregloDeSubCadenas6, getDay);
    		    			NewConetenidoDays6 = arregloDeSubCadenas6.join();
    		    			newValorDays6 = $(ValInputOther5).val(NewConetenidoDays6);
    		    	    }
    	    	    }
    	    	});

	  	      }
  	          else{
  	      	    	// Del array que ya existe con datos encontrame si ya existe el dia que se selecciono y eliminalo
  	      			function removeItemFromArr ( arr, item ) {
  	      				var i = '';
  	      			    var i = arr.indexOf( item );
  	      			    arr.splice( i, 1 );
  	      			}
  	      			 
  	      			removeItemFromArr(arregloDeSubCadenas, getDay);
  	      			NewConetenidoDays = arregloDeSubCadenas.join();
  	      			newValorDays = $(ValInput).val(NewConetenidoDays);

  	      			$(ValInputTime).val(''+FindEntrada+','+FindSalida+'');
  	      			if($(element).hasClass('DaySelectActiveEdit')){
  	      				$(element).removeClass('DaySelectActiveEdit');
  	      				$('.DayForDayEdit').each(function(index, el) { 
  	      				    var nameDay = $(this).data('day');
  	      				    if(nameDay == getDay){
  	      				    	$(this).removeClass('disabledbutton');
  	      				    	$(element).removeClass('disabledbutton');
  	      				    }
  	      				});
  	      			}
  	          }
	      }
	      
	      

	   }else{			
			$(FindAlert).fadeIn();
	   }
   });

   
};

// Horarios completos
$('.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEdit",'.repeatBloqOneEditTime','.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEdit2",".repeatBloqOneEdit3",".repeatBloqOneEditMedio",".repeatBloqOneEdit2Medio",".repeatBloqOneEdit3Medio"); 
$('.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEdit2",'.repeatBloqOneEdit2Time','.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEdit",".repeatBloqOneEdit3",".repeatBloqOneEditMedio",".repeatBloqOneEdit2Medio",".repeatBloqOneEdit3Medio"); 
$('.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEdit3",'.repeatBloqOneEdit3Time','.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEdit",".repeatBloqOneEdit2",".repeatBloqOneEditMedio",".repeatBloqOneEdit2Medio",".repeatBloqOneEdit3Medio"); 

// Horarios medios
$('.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEditMedio",'.repeatBloqOneEdit1TimeMedio','.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEdit2Medio",".repeatBloqOneEdit3Medio",".repeatBloqOneEdit",".repeatBloqOneEdit2",".repeatBloqOneEdit3"); 
$('.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEdit2Medio",'.repeatBloqOneEdit2TimeMedio','.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEditMedio",".repeatBloqOneEdit3Medio",".repeatBloqOneEdit",".repeatBloqOneEdit2",".repeatBloqOneEdit3"); 
$('.bloqueHorarioCompletos.blockMedio3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit').EditUserHorarios(".repeatBloqOneEdit3Medio",'.repeatBloqOneEdit3TimeMedio','.bloqueHorarioCompletos.blockMedio1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.blockMedio2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block1Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block2Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit','.bloqueHorarioCompletos.block3Edit>.DaysOfSelect>.formseledDiasCOmple>.bloqueDayss>.DayForDayEdit',".repeatBloqOneEditMedio",".repeatBloqOneEdit2Medio",".repeatBloqOneEdit",".repeatBloqOneEdit2",".repeatBloqOneEdit3"); 