//******* Action selec user for chat
// *********
jQuery(document).ready(function($) {
	$('.captionUsersInLive>div.accordion>div.content>p').remove();
	
	$('.columnChatss>.AlluserReegitradosPorBloque>a, .col-xs-12.col-sm-12.col-md-12.col-lg-12.FriendWithChat>a').click(function(event) {
		// Get data user select
		var dataIdUser = $(this).data('iduserchat');
		var dataNameUser = $(this).find('.blqueDatasUser>p.TitleUserMen').text();
		var dataFotoUser = $(this).find('.vloqImageUser>img').attr('src');

		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.chatVentanan').fadeIn();

		// Asigana valor para chat, del user seleccionado
		$('.ChatWithUser>.ChatWithUserDatas>img').attr('src',dataFotoUser);
		$('.ChatWithUser>.ChatWithUserDatas>p').text(dataNameUser);
		$('.DatIdUserChat').val(dataIdUser);

		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/chatUsers',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idForChat="+dataIdUser+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
		    	// Iniciamos contador
		    	var elem = 1;
		    	var bander = 0;
		    	var arraFechas= [];
		    	var consultResult = result.length;
		    	console.log(consultResult);
		    	if(consultResult > 0){
		    		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box>div').remove();
		    		$.each(result, function(index, element) {
			    		// Obtenemos los datos
			    		elem = elem+1;
			    		
			    		var dataFecha = element.fecha_conver;
			    		var dataWithUserSend = element.userSend;
			    		var dataWithUserReceive = element.userReceive;
			    		var arrayMensagge = element.mensages;
			    		var mensages = '';
			    		/**** si son mensajes que el user envio, lo coloca en un extremo, si no lo coloca al otro
			    		extremo****/

			    		

			    		if(bander == 0){
			    			var updat= arraFechas.push(dataFecha);
			    			console.log(arraFechas);
			    			if(dataWithUserSend == 1){
			    				$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserSend getSenMenIds'+elem+'"><div class="datafechasND datgde'+elem+'">'+dataFecha+'</div></div>');	
			    				$.each(arrayMensagge, function(index, element) {
			    					mensages = element;
			    					$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensga'+elem+'"><p>'+mensages+'</p></div>');
			    				});
			    			}else{
			    				$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserReceive getSenMenIds'+elem+'"><div class="datafechasND datgde'+elem+'">'+dataFecha+'</div></div>');	
			    				$.each(arrayMensagge, function(index, element) {
			    					mensages = element;
			    					$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensgaRce'+elem+'"><p>'+mensages+'</p></div>');
			    				});
			    			}
			    			bander = bander+1;
			    		}else{
			    			var verfiExit = $.inArray(dataFecha, arraFechas);
			    			if(verfiExit == -1){
	    			    		// si no existe la fecha en el array
	    			    		if(dataWithUserSend == 1){
	    			    			arraFechas.push(dataFecha);
	    			    			$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserSend getSenMenIds'+elem+'"><div class="datafechasND datgde'+elem+'">'+dataFecha+'</div></div>');	
	    			    			$.each(arrayMensagge, function(index, element) {
	    			    				mensages = element;
	    			    				$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensga'+elem+'"><p>'+mensages+'</p></div>');
	    			    			});
	    			    		}else{
	    			    			arraFechas.push(dataFecha);
	    			    			$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserReceive getSenMenIds'+elem+'"><div class="datafechasND datgde'+elem+'">'+dataFecha+'</div></div>');	
	    			    			$.each(arrayMensagge, function(index, element) {
	    			    				mensages = element;
	    			    				$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensgaRce'+elem+'"><p>'+mensages+'</p></div>');
	    			    			});
	    			    		}
	    			    	}else{
	    			    		console.log('ya exist');
	    			    		if(dataWithUserSend == 1){
	    			    			$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserSend getSenMenIds'+elem+'"></div>');	
	    			    			$.each(arrayMensagge, function(index, element) {
	    			    				mensages = element;
	    			    				$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensga'+elem+'"><p>'+mensages+'</p></div>');
	    			    			});
	    			    		}else{
	    			    			$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserReceive getSenMenIds'+elem+'"></div>');	
	    			    			$.each(arrayMensagge, function(index, element) {
	    			    				mensages = element;
	    			    				$('.getSenMenIds'+elem+'').append('<div class="col-lg-12 wrapMensage envMensgaRce'+elem+'"><p>'+mensages+'</p></div>');
	    			    			});
	    			    		}
	    			    	}


	    			    }


	    			});
		    	}else{
		    		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box>div').remove();
		    		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 nullCOnversation"><p> :( Aun no tienes mensajes. </br> ¡Inicia una nueva conversación! </p> </div>');	
		    	}


		    },
		    error: function() {
		    	console.log('Error');
		    }
		}); 

});
});


/**** UPLOADS ARCHIVOS POST **/

// 1File Docum
function chooseFileDocu() {
	var file =  $(".fileInput").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput").change(function(){
	$('.img1Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img2Do" onclick="chooseFileDocu2()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 2File Docum
function chooseFileDocu2() {
	var file =  $(".fileInput2").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput2").change(function(){
	$('.img2Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img3Do" onclick="chooseFileDocu3()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 3File Docum
function chooseFileDocu3() {
	var file =  $(".fileInput3").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput3").change(function(){
	$('.img3Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img4Do" onclick="chooseFileDocu4()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 4File Docum
function chooseFileDocu4() {
	var file =  $(".fileInput4").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput4").change(function(){
	$('.img4Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img5Do" onclick="chooseFileDocu5()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 5File Docum
function chooseFileDocu5() {
	var file =  $(".fileInput5").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput5").change(function(){
	$('.img5Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img6Do" onclick="chooseFileDocu6()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 6File Docum
function chooseFileDocu6() {
	var file =  $(".fileInput6").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput6").change(function(){
	$('.img6Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img7Do" onclick="chooseFileDocu7()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 7File Docum
function chooseFileDocu7() {
	var file =  $(".fileInput7").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInput7").change(function(){
	$('.img7Do').remove();
	$('.Adjuntar').append('<img class="img-responsive img8Do" onclick="chooseFileDocu8()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocument+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// 1File Image
function chooseFileImage() {
	var file =  $(".fileInputImage").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage").change(function(){
	$('.imImga').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga2" onclick="chooseFileImage2()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	var varParenyDivg = $(varParenytdImg).parent().find('.bloqueImageretu');
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
	$(varParenyDivg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});



// 2File Image
function chooseFileImage2() {
	var file =  $(".fileInputImage2").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage2").change(function(){
	$('.imImga2').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga3" onclick="chooseFileImage3()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// 3File Image
function chooseFileImage3() {
	var file =  $(".fileInputImage3").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage3").change(function(){
	$('.imImga3').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga4" onclick="chooseFileImage4()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 4File Image
function chooseFileImage4() {
	var file =  $(".fileInputImage4").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage4").change(function(){
	$('.imImga4').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga5" onclick="chooseFileImage5()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 5File Image
function chooseFileImage5() {
	var file =  $(".fileInputImage5").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage5").change(function(){
	$('.imImga5').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga6" onclick="chooseFileImage6()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 6File Image
function chooseFileImage6() {
	var file =  $(".fileInputImage6").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage6").change(function(){
	$('.imImga6').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga7" onclick="chooseFileImage7()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 7File Image
function chooseFileImage7() {
	var file =  $(".fileInputImage7").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage7").change(function(){
	$('.imImga7').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga8" onclick="chooseFileImage8()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 8File Image
function chooseFileImage8() {
	var file =  $(".fileInputImage8").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage8").change(function(){
	$('.imImga8').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga9" onclick="chooseFileImage9()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 9File Image
function chooseFileImage9() {
	var file =  $(".fileInputImage9").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage9").change(function(){
	$('.imImga9').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga10" onclick="chooseFileImage10()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// 10File Image
function chooseFileImage10() {
	var file =  $(".fileInputImage10").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage10").change(function(){
	$('.imImga10').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga11" onclick="chooseFileImage11()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// 11File Image
function chooseFileImage11() {
	var file =  $(".fileInputImage11").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputImage11").change(function(){
	$('.imImga11').remove();
	$('.AdjuntarFoto').append('<img class="img-responsive imImga12" onclick="chooseFileImage12()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});





// Remove Adjunto in Post
jQuery(document).ready(function($) {
	$('body').on('click', '.contenMoreDocuments>i', function() {
		console.log('cli');
		var parentAdjunt = $(this).parent();
		$(parentAdjunt).remove();
	});
	$('body').on('click', '.contenMoreImages>i', function() {
		console.log('cli');
		var parentAdjunt = $(this).parent();
		$(parentAdjunt).remove();
	});
});


// Action Post Urgente or Personalizado
jQuery(document).ready(function($) {
	$('.DestacarPuslish>img').click(function(event) {
		
		if($('.DestacarPuslish').hasClass('active')){
			$('.DestacarPuslish').removeClass('active');
			$('.post_perso').val('');
		}else{
			$('.DestacarPuslish').addClass('active');
			$('.AlertPublish').removeClass('active');
			$('.post_perso').val('1');
			$('.post_urgente').val('');
		}
	});

	$('.AlertPublish>img').click(function(event) {
		if($('.AlertPublish').hasClass('active')){
			$('.AlertPublish').removeClass('active');
			$('.post_urgente').val('');
		}else{
			$('.AlertPublish').addClass('active');
			$('.DestacarPuslish').removeClass('active');
			$('.post_urgente').val('1');
			$('.post_perso').val('');
		}
	});

});


// Notifi View
jQuery(document).ready(function($) {
	$('.datanotifiNew').click(function(e) {	
		var getUrl = $(this).data('href');
		var findInput = $(this).find('input.notifiview').val();
		var findInputIdUser = $(this).find('input.notifiviewUser').val();
		e.preventDefault();

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/notifiViewHi',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: "idnotifi="+findInput+"&iduserNotifi="+findInputIdUser+"",
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	if(result == 'vista'){
		    		setTimeout(function(){ 
		    			window.location = getUrl;
		    		}, 200);
		    	}	
		    },
		    error: function() {
		        console.log('Error');
		    }
		});
		return false;
	});
});



// like dislike
jQuery(document).ready(function($) {
	$('.clkLike').click(function(event) {
		var finLikeUser = $(this).find('input.idUseLike').val();
		var finLikePost = $(this).find('input.idPubliLike').val();
		var finDisLikePost = $(this).find('input.dislike').val();
		var textClick = $(this).text();
		var Click = $(this);

		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/likeUserd',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idLikeUser="+finLikeUser+"&idLikePost="+finLikePost+"&idDislikePost="+finDisLikePost+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
				console.log(result);
				$(Click).text(result+' Me gustas');	

			},
			error: function() {
				console.log('Error');
			}
		});
	});
});

// Public coment
jQuery(document).ready(function($) {
	$('.dataComenyt').click(function(event) {	
		$('.lnvmodal-loader').css({
			display: 'block'
		});	
		var parentFormComent = $(this).parent();
		var parentPost = $(this).parent().parent();
		var CaptionComentsPost = $(parentPost).find('div.captionlokComen');
		var findComent = $(parentFormComent).find('textarea').val();
		var findIdUserComent = $(parentFormComent).find('input.iduserComent').val();
		var findIdPostPublic = $(parentFormComent).find('input.idDataPost').val();
		var finUserPublicPostComent = $(parentFormComent).find('input.idUserPublicoPostComent').val();

		setTimeout(function(){ 
			$.ajaxSetup({
			    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
			});

			$.ajax({
			    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/CcomentsUsers',
			    type: 'POST',
			    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			    data: "idComentUser="+findIdUserComent+"&ComentPost="+findComent+"&idPostComent="+finUserPublicPostComent+"&idDtasPost="+findIdPostPublic+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			  }).done(function(rmd) {        
			      	$('.lnvmodal-loader').css({
			      		display: 'none'
			      	});
			      	$('form.ui.form.formComentUser>div>textarea').val('');
			      	$(CaptionComentsPost).append(rmd);			      
			  });
		}, 2000);			
		return false;
	});
});

jQuery(document).ready(function($) {
	$('img.img-responsive.clImgView ').click(function(event) {
		var NameImagen = $(this).attr('src');
		$('#myModalswPost>div>div>div>img').attr('src',NameImagen);
	});
});	


// Post personalizado
jQuery(document).ready(function($) {
	$('.clickPostPerson').click(function(event) {
		var finidPostPersonaUser = $(this).find('input.idUserPostPersona').val();
		var finPostPersonalizado = $(this).find('input.idPostPersona').val();
		var Click = $(this);

		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/postPersonalidadoUser',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idPostPersonalizadoUser="+finidPostPersonaUser+"&idDataPostpersona="+finPostPersonalizado+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
				console.log(result);
				$(".alert.alert-info.dataClMoPosPEr").css({
					display: 'block',
				});
				setTimeout(function(){ 
					$(".alert.alert-info.dataClMoPosPEr").css({
						display: 'none',
					});
				}, 3000);
				setTimeout(function(){ 
					window.location = "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/home";
				}, 1000);
			},
			error: function() {
				console.log('Error');
			}
		});
	});
});


// For Admin Home
jQuery(document).ready(function($) {
	$('.col-xs-12.col-sm-1.col-md-1.col-lg-1.checkMEnsagge>form>input').click(function(event) {
		var parent = $(this).parent().parent().parent();
		$(parent).addClass('bg-selectMensage');
		$('.col-xs-12.col-sm-2.col-md-2.col-lg-2.chexAllsMensages>div.dwropOptionMensgae').addClass('dwropOptionMensgaeActive');
	});
});

// For Admin Sugerencias

jQuery(document).ready(function($) {
	$('.col-xs-12.col-sm-1.col-md-1.col-lg-1.checkMEnsagge>form>input').click(function(event) {
		// Si activan el cheebox
		if($(this).is(':checked')) {  
			var valueCheeboxSelec = $(this).val();
			var valueCheeboxNameClass = $(this).attr('class');
			var parent = $(this).parent().parent().parent();
			$(parent).addClass('bg-selectMensage');
			$('.col-xs-12.col-sm-10.col-md-10.col-lg-10.textAllsMensages.dataSguerenciaD>.col-xs-12.col-sm-4.col-md-6.col-lg-6.dropsetionMensgae>.dropdown.dwropOptionMensgae').addClass('dwropOptionMensgaeActive');
			$('.formGrupoCheckData').append('<input type="hidden" name="group_select_action_solictudes[]" value="'+valueCheeboxSelec+'" class="'+valueCheeboxNameClass+'" />');
		} else {  
        	// SI lo desactivan
        	var valueCheeboxSelec = $(this).val();
        	console.log(valueCheeboxSelec);
        	var valueCheeboxNameClass = $(this).attr('class');
        	console.log(valueCheeboxNameClass);
        	var parent = $(this).parent().parent().parent();
        	$(parent).removeClass('bg-selectMensage');
        	$('.formGrupoCheckData').find('input.'+valueCheeboxNameClass+'').remove();

        }  
    });

	$('.dataSguerenciaDCheck>form>input').click(function(event) {
		if($(this).is(':checked')) { 
			var parentBlockSolicitude = $(this).parent().parent().parent().parent();
			var findAllInputsCheebox = $(parentBlockSolicitude).find('div.contectAllMenssages');
			console.log(parentBlockSolicitude);

			$('.col-xs-12.col-sm-10.col-md-10.col-lg-10.textAllsMensages.dataSguerenciaD>.col-xs-12.col-sm-4.col-md-6.col-lg-6.dropsetionMensgae>.dropdown.dwropOptionMensgae').addClass('dwropOptionMensgaeActive');
			$(findAllInputsCheebox).each(function(index, el) { 
				var valueCheeboxSelecGroup = $(this).find('div.checkMEnsagge>form>input').val();
				var valueCheeboxNameClassGroup = $(this).find('div.checkMEnsagge>form>input').attr('class');
				var parentGroup = $(this).addClass('bg-selectMensage');			
				$('.formGrupoCheckData').append('<input type="hidden" name="group_select_action_solictudes[]" value="'+valueCheeboxSelecGroup+'" class="'+valueCheeboxNameClassGroup+'" />');

			});
		}else{
			var parentBlockSolicitude = $(this).parent().parent().parent().parent();
			var findAllInputsCheebox = $(parentBlockSolicitude).find('div.contectAllMenssages');
			console.log(parentBlockSolicitude);

			$('.col-xs-12.col-sm-10.col-md-10.col-lg-10.textAllsMensages.dataSguerenciaD>.col-xs-12.col-sm-4.col-md-6.col-lg-6.dropsetionMensgae>.dropdown.dwropOptionMensgae').removeClass('dwropOptionMensgaeActive');
			$(findAllInputsCheebox).each(function(index, el) { 
				var valueCheeboxSelecGroup = $(this).find('div.checkMEnsagge>form>input').val();
				var valueCheeboxNameClassGroup = $(this).find('div.checkMEnsagge>form>input').attr('class');
				var parentGroup = $(this).removeClass('bg-selectMensage');			
				$('.formGrupoCheckData').find('input.'+valueCheeboxNameClassGroup+'').remove();

			});
		}
		

	});;
});


// Events Drap & Drop Seccion Docuemnts
var finNameArchivo;
var finIDArchivo;
var finUbicacionArchivo;

function drag(parrafo, evento) {
	evento.dataTransfer.setData('Text', parrafo.id);
	finNameArchivo = $(parrafo).find('p').text();
	finIDArchivo = $(parrafo).find('p').data('element');
	finUbicacionArchivo = $(parrafo).find('p').data('ubicaciom');
	console.log(finUbicacionArchivo);
	// console.log(evento.srcElement.currentSrc); 

}

function drop(contenedor, evento) {
	var id = evento.dataTransfer.getData('Text');
	contenedor.appendChild(document.getElementById(id));
	// Get nombre carpeta
	var NameContenedor = $(contenedor).parent().parent().find('p.namedataCarpeta').text();
	var UbicacionContenedor = $(contenedor).parent().parent().find('p.namedataCarpeta').data('ubicacarpeta');
	// var dtaCOnt = $(contenedor).parent().parent().parent().find('div.dataDowload');
	// Get name archivo
	// var dataImage = evento.srcElement.currentSrc;

	$.ajaxSetup({
		headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	});

	$.ajax({
		url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/upload_change_direct',
		type: 'POST',
		headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		data: "dataNameArchivo="+finNameArchivo+"&idDaArchivo="+finIDArchivo+"&ubicaArchivo="+finUbicacionArchivo+"&nameCarpeta="+NameContenedor+"&ubicacionCarpeta="+UbicacionContenedor+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
		dataType: 'json',
		success: function(result, index, value, data) {
			console.log(result);
		},
		error: function() {
			console.log('Error');
		}
	});

	evento.preventDefault();
}


// view more horarios
jQuery(document).ready(function($) {
	$('.newHorario').click(function(event) {
		if($('.block2').hasClass('active2Hcom')){
			$('.block3').fadeIn();
			$(this).fadeOut();
		}else{
			$('.block2').fadeIn();
			$('.block2').addClass('active2Hcom');
		}
	});

	$('.newHorarioMedio').click(function(event) {
		if($('.blockMedio2').hasClass('active2Hcom')){
			$('.blockMedio3').fadeIn();
			$(this).fadeOut();
		}else{
			$('.blockMedio2').fadeIn();
			$('.blockMedio2').addClass('active2Hcom');
		}
	});
});


// FILTER BUSQUEDAS

jQuery.fn.FilerSearch = function(removeMagin,sectionFilter)  //damos nombre ala funcion
{
	$(this).keyup(function () {
		$(removeMagin).addClass('RestMargin');
		var rex = new RegExp($(this).val(), 'i');
		$(sectionFilter).hide();
		$(sectionFilter).filter(function () {
			return rex.test($(this).text());
			$(removeMagin).removeClass('RestMargin');
		}).show();
	});
};

$('#filtrar').FilerSearch('','.AlluserReegitradosPorBloque>a'); 
$('#filtrar').FilerSearch('.col-xs-12.col-sm-12.col-md-12.col-lg-12.DataUserRankings','.AlluserRankinSearch>div.ranlingSty'); 
$('#filtrarHistory').FilerSearch('.col-xs-12.col-sm-12.col-md-12.col-lg-12.DataUserRankings.DataUserRankingsHistory','.dataHitorySear>div.searchHis'); 
$('#filtrarUser').FilerSearch('.col-xs-12.col-sm-12.col-md-12.col-lg-12.dataAllUserSer','.dataAllUserSer>div.allDatasUser'); 


// 1File Image
function chooseFileImageSuAd() {
	var file =  $(".fileInputAdminImage").click();
	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputAdminImage").change(function(){
	$('.imImga').remove();
	$('.img1Do').remove();
	$('.col-md-2.Adjuntar ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	var varParenyDivg = $(varParenytdImg).parent().find('.bloqueImageretu');
	$(varParenytdImg).fadeIn();
	$(varParenyDivg).append('<p class="nameValue">'+valImage+'</p>');
});

// 1File Docum
function chooseFileDocuSuAd() {
	var file =  $(".fileInputAdmin").click();

	var nameArchivo = $(file).val();
	console.log(nameArchivo);
}

$(".fileInputAdmin").change(function(){
	$('.img1Do').remove();
	$('.imImga').remove();
	$('.col-md-2.AdjuntarFoto ').hide();
	var valDocument = $(this).val();
	console.log(valDocument);
	var varParenytd = $(this).parent();
	var varParenyDivg = $(varParenytd).parent().find('.bloqueImageretu');
	console.log(varParenyDivg);
	$(varParenytd).fadeIn();
	$(varParenyDivg).append('<p class="nameValue">'+valDocument+'</p>');
});


// Ajax view Solicitud sugerencia
jQuery(document).ready(function($) {
	$('.dataClicDEsplace').click(function(event) {
		var findIco = $(this).find('div.accordion>div.title>i').data('idsolicitud');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_View',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idSugerencia="+findIco+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
				console.log(result);
			},
			error: function() {
				console.log('Error');
			}
		});
	});
});

$('.collapseDataPermisos').click(function(event) {
	$('.conteFormSolicitru').fadeIn().toggleClass('validaSendMnessa');
});


// Solicitud aceptada
jQuery(document).ready(function($) {
	$('.truwsolos>a').click(function(event) {
		var datasAceptaSolicitud = $(this).data('idsolicitudacep');
		var datasIdUserSolicitud = $(this).data('idusersoli');
		var parentActionEvent = $(this).parent();
		var parentActionEventGeneral = $(this).parent().parent().find('div.DenegeSolicituc');
		var findTypeDescuento = $(this).find('p').data('tydescuento');


		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/solicitud_actiond',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idSoliAcepta="+datasAceptaSolicitud+"&typeDescuento="+findTypeDescuento+"&idUSerSOlictud="+datasIdUserSolicitud+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
				if(result == 'descuento'){
					$(parentActionEvent).addClass('disabledbutton');
					$(parentActionEventGeneral).addClass('disabledbutton');
					$(parentActionEvent).removeClass('truwsolos');
					$('.descuenDia').hide();
					$('.DeneSoli').hide();
					$('.userDayFaltante').hide();
					$('.captionDiasvaciones').fadeOut();
					$('div.clActiveMOdalS').click();
				}else{
					$(parentActionEvent).addClass('disabledbutton');
					$(parentActionEventGeneral).addClass('disabledbutton');
					$(parentActionEvent).removeClass('truwsolos');
					$('.DescripSoliUser').hide();
					$('.DeneSoli').hide();
					$('.captionDiasvaciones>div.capsubDays>p').text(result);
					$('p.userDayFaltante>span').text(''+result+' días');
					$('div.clActiveMOdalS').click();
				}
			},
			error: function() {
				console.log('Error');
			}
		});

	});
});


// Solicitud denengada
jQuery(document).ready(function($) {
	$('.densons>a').click(function(event) {
		var datasNIegaSolicitud = $(this).data('idsolicitudde');
		var parentActionEvent = $(this).parent();
		var parentActionEventGeneral = $(this).parent().parent().find('div.trueSolicituc');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
			url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/solicitud_actiondenegada',
			type: 'POST',
			headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
			data: "idSoliDenega="+datasNIegaSolicitud+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
			dataType: 'json',
			success: function(result, index, value, data) {
				console.log(result);
				if(result == 'true'){
					$(parentActionEvent).addClass('disabledbutton');
					$(parentActionEventGeneral).addClass('disabledbutton');
					$(parentActionEvent).removeClass('densons');

					$('.aceptSol').hide();
					$('.DescripSoliUser').hide();
					$('.descuenDia').hide();
					$('.userDayFaltante').hide();
					$('.captionDiasvaciones').hide();
					$('.userDayFaltante').hide();
					$('div.clActiveMOdalS').click();

				}
			},
			error: function() {
				console.log('Error');
			}
		});

	});
});



// ACTIVE ACTION DOCUMENTS

jQuery(document).ready(function($) {
	$(".col-xs-12.col-sm-12.col-md-12.col-lg-12.bloquesAdjuntoArchives>div").mouseover(function(){
        $(this).addClass('activeActionDocument');
        var findLinkA = $(this).find('a').addClass('activeDecoration');
        var findIco = $(this).find('i.noneIcon').removeClass('noneIcon');
    });
    $(".col-xs-12.col-sm-12.col-md-12.col-lg-12.bloquesAdjuntoArchives>div").mouseout(function(){
        $(this).removeClass('activeActionDocument');
        var findLinkA = $(this).find('a').removeClass('activeDecoration');
        var findIco = $(this).find('i').addClass('noneIcon');
    });

    $(".col-xs-12.col-sm-12.col-md-12.col-lg-12.bloquesAdjuntoArchives>div>i.direCar").click(function(event) {    	
    	if($(this).hasClass('activeActiondee')){
    		var finParentIco = $(this).parent().removeClass('bg-activeDocuemm');
    		var parentClass = $(this).parent().data('identificador');
    		$('.moveELements').find('input.'+parentClass+'').remove();
    		$('.removeElement').find('input.'+parentClass+'').remove();
    	}else{
    		var finParentIco = $(this).parent().addClass('bg-activeDocuemm');
    		var findNameArchivo = $(this).parent().find('p').text();
    		var parentClass = $(this).parent().data('identificador');
    		$('.moveELements').append('<input type="hidden" class="'+parentClass+'" name="dta_move_element_car[]" value="'+findNameArchivo+'" />');
    		$('.removeElement').append('<input type="hidden" class="'+parentClass+'" name="dta_move_element_car[]" value="'+findNameArchivo+'" />');
    		$(this).addClass('activeActiondee');
    	}
    	
    });
    $(".col-xs-12.col-sm-12.col-md-12.col-lg-12.bloquesAdjuntoArchives>div>i.FilCa").click(function(event) {    	
    	if($(this).hasClass('activeActiondee')){
    		var finParentIco = $(this).parent().removeClass('bg-activeDocuemm');
    		var parentClass = $(this).parent().data('identificador');
    		$('.moveELements').find('input.'+parentClass+'').remove();
    		$('.removeElement').find('input.'+parentClass+'').remove();
    	}else{
    		var finParentIco = $(this).parent().addClass('bg-activeDocuemm');
    		var findNameArchivo = $(this).parent().find('p').text();
    		var parentClass = $(this).parent().data('identificador');
    		$('.moveELements').append('<input type="hidden" class="'+parentClass+'" name="dta_move_element[]" value="'+findNameArchivo+'" />');
    		$('.removeElement').append('<input type="hidden" class="'+parentClass+'" name="dta_move_element[]" value="'+findNameArchivo+'" />');
    		$(this).addClass('activeActiondee');
    	}
    	
    });

});

// Dowload Document Submit form
jQuery(document).ready(function($) {
	$('.dataDowload >a').click(function(event) {
	 var parentDowload = $(this).parent().find('form').submit();
	});
});


// Upload new file section docuemnts

function FileNewDocu() {
	var file =  $(".fileInputUploadDocu").click();
}

$(".fileInputUploadDocu").change(function(){
	$('.uploadArchivoNew').submit();
});

$(".fileInputUploadDocu2").change(function(){
	$('.uploadArchivoNew2').submit();
});

$(".fileInputUploadDocu2").change(function(){
	$('.uploadArchivoNew2').submit();
});

$('.createCarpeta').click(function(event) {
	var valDirectory = prompt("Escribe nombre de la carpeta");
	if (valDirectory != null) {
      $('.CreateNewActionDirective').val(valDirectory);
      $('.createNewDirec').submit();
    }
});


// GET UPDATE PHOTO PROFILE EDIT USER
$(document).ready(function()
{
	 $.ajaxSetup({
	   headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	 });
	 // Get id user Editando
	 var getIdUserEdit = $('.idUserEdits').val();

	 setInterval(function(){ 
	 	$('.ajax-upload-dragdrop>span').hide();	 	
	 }, 1000);

	  $("#fileuploader").uploadFile({
	  url:""+getIdUserEdit+"/uploadFotoProfile",
	  fileName:"myfile",
	  acceptFiles:"image/*",
	  showPreview:true,
	   previewHeight: "100px",
	   previewWidth: "100px",
	  });

	  interval = setInterval(updateProfileUser,3000);

	  function updateProfileUser(){
	     if($('.ajax-file-upload-statusbar').length >0){
	       $DataFoto = $('.ajax-file-upload-statusbar > img').attr('src');
	       $('.col-xs-12.col-sm-4.col-md-2.col-lg-2.imgProfiEdit>div.dataProfileEditUsers').css('background-image', 'url("'+$DataFoto+'")');
	       $('.ajax-file-upload-statusbar').fadeOut();
	       $('#fileuploader').fadeOut();
	       clearInterval(interval);
	     }
	   }
});

// Select option Edit Group Users
$('.selecEdit').click(function(event) {
	$('.imgAndNameUser>input.datSelectEdit').fadeIn();
});
$('.imgAndNameUser>input.datSelectEdit').click(function(event) {
	$('form.formSelectGropu').fadeIn();
	var idSelectEdit = $(this).val();
	$('form.formSelectGropu').append('<input type="hidden" value="'+idSelectEdit+'" name="select_user_edit[]" />')
});


$("form.formSaveEditGruop").submit(function(e){	
    var dataEntrada = $('.daataEntrada>div>div>div>input').val();
    var dataSalidas = $('.daataSalida>div>div>div>input').val();
   if(dataEntrada != '' && dataSalidas != ''){
   		$('.mnsAlertVacio').fadeOut();
   		$('form.formSaveEditGruop').submit();
   	}else{
   		e.preventDefault();
   		$('.mnsAlertVacio').fadeIn();
   	}
});


// VALIDA EVALUACTION DE USUARIOS

jQuery.fn.SelecRespuestasEvaluaction = function(selectPregunta,getValueInput)  //damos nombre ala funcion
{
	$(this).click(function(event) {
	  var findParent = $(this).parent().find('li>div>img.activeSeleccionCarita').fadeOut();
	  var findImgActive = $(this).find(selectPregunta).fadeIn();
	  var findValueInput = $(this).find(getValueInput).val();
	  var findClassInput = $(this).find(getValueInput).data('class');
	  var findInputsWithData = $('.SendFormDataRes').find('input.'+findClassInput+'');
	  
	  // Si ya se creo la respuesta entonces actualiza el valor que viene sleeccionado, si no lo crea
	  if(findInputsWithData.length > 0){
	  	$(findInputsWithData).val(findValueInput);
	  }else{
	  	$('.SendFormDataRes').append('<input type="hidden" class="'+findClassInput+'" name="nota_'+findClassInput+'" value="'+findValueInput+'" />');
	  }
	});
  
};

$('ul.Redconocistes>li.oneLi').SelecRespuestasEvaluaction('div.OnePregunt>img.activeSeleccionCarita','div.OnePregunt>input'); 
$('ul.Redconocistes>li.twoLi').SelecRespuestasEvaluaction('div.TwoPregunt>img.activeSeleccionCarita','div.TwoPregunt>input'); 
$('ul.Redconocistes>li.threLi').SelecRespuestasEvaluaction('div.ThreePregunt>img.activeSeleccionCarita','div.ThreePregunt>input'); 
$('ul.Redconocistes>li.forLi').SelecRespuestasEvaluaction('div.FourPregunt>img.activeSeleccionCarita','div.FourPregunt>input'); 
$('ul.Redconocistes>li.fiveLi').SelecRespuestasEvaluaction('div.FivePregunt>img.activeSeleccionCarita','div.FivePregunt>input'); 
$('ul.Redconocistes>li.sixLi').SelecRespuestasEvaluaction('div.SixPregunt>img.activeSeleccionCarita','div.SixPregunt>input'); 
$('ul.Redconocistes>li.seveLi').SelecRespuestasEvaluaction('div.SevenPregunt>img.activeSeleccionCarita','div.SevenPregunt>input'); 
$('ul.Redconocistes>li.eigLi').SelecRespuestasEvaluaction('div.EightPregunt>img.activeSeleccionCarita','div.EightPregunt>input'); 
$('ul.Redconocistes>li.nineLi').SelecRespuestasEvaluaction('div.NinePregunt>img.activeSeleccionCarita','div.NinePregunt>input'); 
$('ul.Redconocistes>li.tenLi').SelecRespuestasEvaluaction('div.tenPregunt>img.activeSeleccionCarita','div.tenPregunt>input'); 


// validacion de que todo las preguntas vayan contestadas
$("form.formEvaliuacion").submit(function(e){	
	if($('.onePregu').length > 0 && $('.twoPregu').length > 0&& $('.threPregu').length > 0&& $('.fourPregu').length > 0&& $('.fivePregu').length > 0&& $('.sixPregu').length > 0 && $('.sevenPregu').length > 0&& $('.EithPregu').length > 0 && $('.ninePregu').length > 0 && $('.tenPregu').length > 0){
		$('errorSelec').fadeOut();
	}else{
		e.preventDefault();
		$('.errorSelec').fadeIn();
	}
});


// FORM ADPS

$('.AcepAdp').click(function(event) {
	var parentFormADp = $(this).parent().find('form.placeADP');
	$(parentFormADp).submit();
});

$('.coloADP').click(function(event) {
	var parentFormADp = $(this).parent().parent().find('.UserImgData>.dataProfileHistory');
	console.log(parentFormADp);
});


// Notifi home admin

$('.ayerActivi').click(function(e) {
	$.ajaxSetup({
	    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	});
	$.ajax({
	    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/notifiViewAnterior',
	    type: 'POST',
	    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
	    dataType: 'json',
	    success: function(result, index, value, data) {
	    	console.log(result);
	    	$('body').click();
	    	$('.counNumberNotifis>h1').text(result);
	    	$('form.formNotifisDetall>li.dropNOtifis>a').text('Ayer');
	    	var nexDay = $('.dropDetallNotify>li>a').data('daynext');
	    	$('.dropDetallNotify>li>a').attr('href','HistoryNotify/'+nexDay);
	    },
	    error: function() {
	        console.log('Error');
	    }
	});
	return false;
});


// Asistencia home admin

$('.ayerAsistencia').click(function(e) {
	var yesterdayAsietemcia = $('.dropDetallAsiste>li>a').data('daynext');
	$.ajaxSetup({
	    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	});
	$.ajax({
	    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/HistoryLlegadas/histo/Asist/Date/'+yesterdayAsietemcia+'',
	    type: 'POST',
	    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
	    dataType: 'json',
	    success: function(result, index, value, data) {
	    	console.log(result);
	    	$('body').click();
	    	$('.counNumberAsisten>h1').text(result);
	    	$('form.formNotifisDetall>li.dropLLegadas>a').text('Ayer');
	    	var nexDay = $('.dropDetallAsiste>li>a').data('daynext');
	    	$('.dropDetallAsiste>li>a').attr('href','HistoryLlegadas/histo/Asist/'+nexDay);
	    },
	    error: function() {
	        console.log('Error');
	    }
	});
	return false;
});

// Emergencias home admin

$('.ayerEmergenci').click(function(e) {
	var yesterdayEmergenci = $('.dropDetallEmerge>li>a').data('daynext');
	$.ajaxSetup({
	    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	});
	$.ajax({
	    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/emergencias/data/fech/emergenci/cont/'+yesterdayEmergenci+'',
	    type: 'POST',
	    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
	    dataType: 'json',
	    success: function(result, index, value, data) {
	    	console.log(result);
	    	$('body').click();
	    	$('.counNumberEmergenci>h1').text(result);
	    	$('form.formNotifisDetall>li.dropEmergenci>a').text('Ayer');
	    	var nexDay = $('.dropDetallEmerge>li>a').data('daynext');
	    	$('.dropDetallEmerge>li>a').attr('href','emergencias/data/fech/emergenci/'+nexDay);
	    },
	    error: function() {
	        console.log('Error');
	    }
	});
	return false;
});


// Permiso home admin

$('.ayerPermiso').click(function(e) {
	var yesterdayPermiso = $('.dropDetallPermiso>li>a').data('daynext');
	$.ajaxSetup({
	    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	});
	$.ajax({
	    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/solicitud-permisos/data/fech/permiso/coun/'+yesterdayPermiso+'',
	    type: 'POST',
	    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
	    dataType: 'json',
	    success: function(result, index, value, data) {
	    	console.log(result);
	    	$('body').click();
	    	$('.counNumberPermiso>h1').text(result);
	    	$('form.formNotifisDetall>li.dropPermiso>a').text('Ayer');
	    	var nexDay = $('.dropDetallPermiso>li>a').data('daynext');
	    	$('.dropDetallPermiso>li>a').attr('href','solicitud-permisos/data/fech/permiso/'+nexDay);
	    },
	    error: function() {
	        console.log('Error');
	    }
	});
	return false;
});



// GET COMENTARIOS USUARIOS POST

 $('.getComents').click(function(event) {
   var dataIdPost = $(this).find('input.postIdCom').val();
   var ParentContentPost = $(this).parent();
   var findLoader = $(ParentContentPost).find('.lnvmodal-loadermin');
   $(findLoader).css({
     display: 'block'
   });

   $.ajaxSetup({
       headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
   });

   $.ajax({
       url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/getComents',
       type: 'POST',
       headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
       data: "idpostComents="+dataIdPost+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
     }).done(function(rmd) {         
         setTimeout(function(){ 
         	$(findLoader).css({
         	  display: 'none'
         	});
         	$(ParentContentPost).append(rmd);
     	 }, 1000);
         
     });
   
 });