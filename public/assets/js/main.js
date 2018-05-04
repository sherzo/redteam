
//******* Action selec user for chat
// *********
jQuery(document).ready(function($) {
	$('.captionUsersInLive>div.accordion>div.content>p').remove();
});

// CHANGE COLOR PANEL USER
jQuery(document).ready(function($) {
	$('.paleytaIco').click(function(event) {
		$('.nonnePapletaUser').toggleClass('activePalteUser');
	});

	$('.col-xs-12.col-sm-12.col-md-12.captionSelectColorPlat>.col-xs-12.col-sm-12.col-md-12>.bloqCOlors').click(function(event) {
		var dataColor = $(this).data('color');
		var dataIdChangeColor = $('.userLogiColo').val();

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/changeColorUser',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: "idUserChangeCOlor="+dataIdChangeColor+"&dataColor="+dataColor+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	console.log(result);
		    	if( result == 'cambiado'){
		    		window.location = "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/home";
		    	}

		    },
		    error: function() {
		        console.log('Error');
		    }
		});

	});
});

// chats

$('body').on('click', '.columnChatss>.AlluserReegitradosPorBloque>a, .col-xs-12.col-sm-12.col-md-12.col-lg-12.FriendWithChat>a, .captionCircleUser.captionDenoews.AlluserReegitradosPorBloque>a', function() {
	 $('.lnvmodal-loader').css({
	  	display: 'block'
	 });	
	// Get data user select
	var dataIdUser = $(this).data('iduserchat');
	var dataNameUser = $(this).find('.blqueDatasUser>p.TitleUserMen').text();
	var dataFotoUser = $(this).find('.vloqImageUser>div.dataPrubeIm').css('background-image');
	console.log(dataFotoUser);

	$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.chatVentanan').fadeIn();

	// Asigana valor para chat, del user seleccionado
	// $('.ChatWithUser>.ChatWithUserDatas>img').attr('src',dataFotoUser);
	$('.ChatWithUser>.ChatWithUserDatas>div.recibeSelectChat').css('background-image',''+dataFotoUser+'');
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
	    	$('.lnvmodal-loader').css({
	    		display: 'none'
	    	});	
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

// FILTER BUSQUEDA CANDIDATE CHAT

$(document).ready(function () {
    (function ($) {
        $('#filtrar').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.AlluserReegitradosPorBloque>a').hide();
            $('.AlluserReegitradosPorBloque>a').filter(function () {
                return rex.test($(this).text());
            }).show();
        })
    }(jQuery));
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
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
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


// like dislike
jQuery(document).ready(function($) {
	$('.clkLike').click(function(event) {
		$('.lnvmodal-loader').css({
			display: 'block'
		});
		var finLikeUser = $(this).find('input.idUseLike').val();
		var finLikePost = $(this).find('input.idPubliLike').val();
		var finDisLikePost = $(this).find('input.dislike').val();
		var finUserPublicPost = $(this).find('input.idUserPublicoPost').val();
		var textClick = $(this).text();
		var Click = $(this);

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/likeUserd',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: "idLikeUser="+finLikeUser+"&idLikePost="+finLikePost+"&idUserPublicPost="+finUserPublicPost+"&idDislikePost="+finDisLikePost+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	$('.lnvmodal-loader').css({
		    		display: 'none'
		    	});
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
		$('.lnvmodal-loader').css({
			display: 'block'
		});
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
	    		window.location = "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/home";
		    },
		    error: function() {
		        console.log('Error');
		    }
		});
	});
});


// Window chat
$(".continerChatVent>.bg-bar-name").click(function(){
    $(this).parent().parent().toggleClass("heightMinCHatFloat");
});

// select edit profile
jQuery(document).ready(function($) {
	$('.dataeditarProfile').click(function(event) {
		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.InformacionEmpleado>form>div.dataEmpleados>div.ColumnsData>div.ColumnsDataText>input.dtaYesEdit').prop( "disabled", false );
		$('.col-xs-12.col-sm-12.col-md-12.col-lg-12.InformacionEmpleado>form>div.dataEmpleados>div.ColumnsData>div.ColumnsDataText>input.dtaYesEdit').toggleClass("profileEidtars");
		$('.dataSaveChanges').addClass('dataSaveChangesActive');
		$('.activeEditar').addClass('disabelBOtEdit');
	});
});

// Save Change edit profile
jQuery(document).ready(function($) {
	$('.dataSaveChanges').click(function(event) {
		var finidPostPersonaUser = $(this).find('input.idUserPostPersona').val();
		var finPostPersonalizado = $(this).find('input.idPostPersona').val();
		var Click = $(this);

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});

		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/profileUpdateUser',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: $('.profile_userEdit').serialize(),
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	console.log(result);
		    	
		    	setTimeout(function(){ 
		    		window.location = "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/profile";
		    	}, 2000);
		    },
		    error: function() {
		        console.log('Error');
		    }
		});
	});
});

// Para solicitud de permiso
jQuery(document).ready(function($) {
	$('.dayCompletoSelec').click(function(event) {
		$(this).addClass('slectccionadoAction');
		$('.dayMedioSelec').removeClass('slectccionadoAction');
		$('.TimePermiso').val('Dia_completo');
	});
	$('.dayMedioSelec').click(function(event) {
		$(this).addClass('slectccionadoAction');
		$('.dayCompletoSelec').removeClass('slectccionadoAction');
		$('.TimePermiso').val('Medio dia');
	});
	$('.SelecVacations').click(function(event) {
		$(this).addClass('slectccionadoAction');
		$('.selectDIaSeven').removeClass('slectccionadoAction');
		$('.TipeDescuento').val('Vacaciones');
	});
	$('.selectDIaSeven').click(function(event) {
		$(this).addClass('slectccionadoAction');
		$('.SelecVacations').removeClass('slectccionadoAction');
		$('.TipeDescuento').val('Dia septimo');
	});

	$('.formMotivoPermission').on('submit', function(e) { 
        var fechasSelecCita = $('div#datetimepicker12>div.timepicker-sbs>div>div.datepicker>div.datepicker-days>table.table-condensed>tbody>tr>td.active').data('day');
        var GetFechaYear = fechasSelecCita,
		inicioYear = 6,
	    finYear   = 10,
	    subCadenaFechaYear = GetFechaYear.substring(inicioYear, finYear);

    	var GetFechaMes = fechasSelecCita,
    	inicioMes = 0,
        finMes   = 2,
        subCadenaFechaMes = GetFechaMes.substring(inicioMes, finMes);


    	var GetFechaDia = fechasSelecCita,
    	inicioDia = 3,
        finDia   = 5,
        subCadenaFechaDia = GetFechaDia.substring(inicioDia, finDia);

        var createFecha = ''+subCadenaFechaYear+'-'+subCadenaFechaMes+'-'+subCadenaFechaDia+'';
        $('.DtaPermiso').val(createFecha);
    });

});



/**** UPLOADS ARCHIVOS MOTIVO EMERGENCIA **/

// 1File Docum Emergenci
function chooseFileDocuEmer() {
  var file =  $(".fileInputEmergenci").click();

  var nameArchivo = $(file).val();
  console.log(nameArchivo);
}

$(".fileInputEmergenci").change(function(){
	$('.img1DoEmer').remove();
	$('.adjunEmerImg').append('<img class="img-responsive img2DoEmer" onclick="chooseFileDocuEmer2()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFotoEmergency ').hide();
	var valDocumentEmer = $(this).val();
	console.log(valDocumentEmer);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocumentEmer+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 2File Docum Emergenci
function chooseFileDocuEmer2() {
  var file =  $(".fileInputEmergenci2").click();

  var nameArchivo = $(file).val();
  console.log(nameArchivo);
}

$(".fileInputEmergenci2").change(function(){
	$('.img2DoEmer').remove();
	$('.adjunEmerImg').append('<img class="img-responsive img3DoEmer" onclick="chooseFileDocuEmer3()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">');
	$('.col-md-2.AdjuntarFotoEmergency ').hide();
	var valDocumentEmer = $(this).val();
	console.log(valDocumentEmer);
	var varParenytd = $(this).parent();
	$(varParenytd).fadeIn();
	$(varParenytd).append('<p class="nameValue">'+valDocumentEmer+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// 1File Imagen Emergenci
function chooseFileIMGEmer() {
  var file =  $(".fileInputEmergenciImg").click();
  var nameArchivo = $(file).val();
  console.log(nameArchivo);
}

$(".fileInputEmergenciImg").change(function(){
	$('.img1FotEmer').remove();
	$('.AdjuntarFotoEmergency').append('<img class="img-responsive img2FotEmer" onclick="chooseFileIMGEmer2()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.adjunEmerImg ').hide();
	var valImgEmer = $(this).val();
	console.log(valImgEmer);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImgEmer+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});

// 2File Imagen Emergenci
function chooseFileIMGEmer2() {
  var file =  $(".fileInputEmergenciImg2").click();
  var nameArchivo = $(file).val();
  console.log(nameArchivo);
}

$(".fileInputEmergenciImg2").change(function(){
	$('.img2FotEmer').remove();
	$('.AdjuntarFotoEmergency').append('<img class="img-responsive img3FotEmer" onclick="chooseFileIMGEmer3()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.col-md-2.adjunEmerImg ').hide();
	var valImgEmer = $(this).val();
	console.log(valImgEmer);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImgEmer+'</p><i class="fa fa-times" aria-hidden="true"></i>');
});


// MARCANDO HORA ENTRADA Y SALIDA
jQuery(document).ready(function($) {

	$('.marEntrada').click(function(event) {
		$('.lnvmodal-loader').css({
			display: 'block'
		});
		var findIdeUserlogin = $(this).find('div.secEntrada>input.IdloginUser').val();

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});
		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/marcarEntrada',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: "idUserLoginMarcar="+findIdeUserlogin+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	if(result == 'true'){
		    		$(".alert.alert-info.yaMarcado").css({
		    			display: 'block',
		    		});
		    		$('.lnvmodal-loader').css({
		    			display: 'none'
		    		});
		    		setTimeout(function(){ 
		    			$(".alert.alert-info.yaMarcado").css({
		    				display: 'none',
		    			});
		    		}, 3000);
		    	}else{
		    		$(".alert.alert-info.dataENtradaMarcada").css({
		    			display: 'block',
		    		});
		    		setTimeout(function(){ 
		    			$(".alert.alert-info.dataENtradaMarcada").css({
		    				display: 'none',
		    			});

		    			setTimeout(function(){ 
		    				window.location = "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/home";
		    			}, 200);
		    		}, 3000);
		    		
		    	}
		    	
		    },
		    error: function() {
		        console.log('Error');
		    }
		});
	});

	$('.marSalida').click(function(event) {
		$('.lnvmodal-loader').css({
			display: 'block'
		});
		var findIdeUserlogin = $(this).find('div.secEntrada>input.IdloginUser').val();

		$.ajaxSetup({
		    headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
		});
		$.ajax({
		    url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/marcarSalida',
		    type: 'POST',
		    headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
		    data: "idUserLoginMarcar="+findIdeUserlogin+"&_tokens=YIIXEDMNztyGoKqDrX7B9V20THP2hP0fAZFeiK3L",
		    dataType: 'json',
		    success: function(result, index, value, data) {
		    	$(".alert.alert-info.dataSalidas").css({
		    		display: 'block',
		    	});
		    	setTimeout(function(){ 
		    		$(".alert.alert-info.dataSalidas").css({
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

$('.collapseDataPermisos').click(function(event) {
	var findSendMensajeComent = $('.conteFormSolicitru').parent().parent().parent().parent().parent().parent().parent().find('form.conteFormSolicitru');
	$(findSendMensajeComent).fadeIn().toggleClass('validaSendMnessa');
});


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


$('.chatVentanan').keypress(function(e) {
    if(e.which == 13) {
    	e.preventDefault();
       $('.col-lg-12.nullCOnversation>p').hide();
    }
});



// file img CHat
function chooseFileImageChat1() {
  var file =  $(".fileInputImageChat1").click();
  var nameArchivo = $(file).val();
  console.log(nameArchivo);
}

$(".fileInputImageChat1").change(function(){
	$('.imImgaChat').remove();
	$('.anjunFoto').append('<img class="img-responsive imImgaChat2" onclick="chooseFileImageChat2()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">');
	$('.anjunDocu ').hide();
	var valImage = $(this).val();
	console.log(valImage);
	var varParenytdImg = $(this).parent();
	$(varParenytdImg).fadeIn();
	$(varParenytdImg).append('<p class="nameValue">'+valImage+'</p><i class="fa fa-times" aria-hidden="true"></i>');
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


 // GET LOAD ALL USUARIOS

  $('.loadUserJa').click(function(event) {
  	var findLoader = $(this).parent().find('div.title>.getUserLoad>.lnvmodal-loadermin');
    $(findLoader).css({
      display: 'block'
    });

    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
    });

    $.ajax({
        url: 'http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/getAllUse',
        type: 'POST',
        headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
      }).done(function(rmd) {         
          setTimeout(function(){ 
          	$(findLoader).css({
          	  display: 'none'
          	});
          	$('.getUserLoad').append(rmd);
      	 }, 1000);
          
      });
    
  });



  // ACTIVE DESPLACE MENU
  $("#gn-menuData").click(function(){
      $("nav.gn-menu-wrapper").toggleClass("gn-open-all");
      $("a.gn-icon.gn-icon-menu").toggleClass("gn-selected");
  });

  /*  $("body").click(function(){
    	if($('nav.gn-menu-wrapper').hasClass("gn-open-all")){
    		$("nav.gn-menu-wrapper").removeClass("gn-open-all");
  	    $("a.gn-icon.gn-icon-menu").removeClass("gn-selected");
    	});
    });*/