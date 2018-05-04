// Enter your own Pusher App key
	  var pusher=new Pusher('1699db0a3a3aec4d93c6');
	  // Enter a unique channel you wish your users to be subscribed in.
	  var channel=pusher.subscribe('test_channel');
	  channel.bind('my_event', function(data) {
	  	// $('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').append('<div class="col-lg-12 MensaGedate getUserSend getSenMenIds">fecha</div>');	
	    // Add the new message to the container
	    $('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box>div:last').append('<div class="col-lg-12 MensaGedate getUserSend getSenMenIds3"><div class="col-lg-12 wrapMensage envMensga"><p>'+data.message+'</p></div></div>');
	    // Display the send button
	    $('.input_send_holder').html('<input type="submit" value="Send" class="btn btn-primary input_send" />');
	    // Scroll to the bottom of the container when a new message becomes available
	    $('.col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box').scrollTop($(".col-xs-12.col-sm-12.col-md-12.col-lg-12.userCOntentChat.chat_box")[0].scrollHeight);
	  });
	 
	 // AJAX request
	 function ajaxCall(ajax_url, ajax_data) {
	  $.ajax({
	    type: "POST",
	    url: ajax_url,
	    dataType: "json",
	    data: ajax_data,
	    success: function(response, textStatus, jqXHR) {
	      console.log(jqXHR.responseText);
	    },
	    error: function(msg) {}
	  });
	 }

	 // Trigger for the Enter key when clicked.
	 $.fn.enterKey=function(fnc) {
	  return this.each(function() {
	    $(this).keypress(function(ev) {
	      var keycode=(ev.keyCode ? ev.keyCode : ev.which);
	      if (keycode == '13') {
	        fnc.call(this, ev);
	      }
	    });
	  });
	 }

	 // Send the Message
	 $('body').on('click', '.chat_box .input_send', function(e) {
	  e.preventDefault();
	  
	  var message =$('.chat_box .input_message').val();
	  var id_Usuario_conversation =$('.chat_box .input_name').val();
	  var id_Usuario =$('.chat_box .input_id_user_logi').val();

	  var formData = new FormData(document.getElementById("formuploadajax"));

	  // Si envia un archivo usa esta funcion
	  var file_data = $('.fileInputImageChat1').prop('files')[0];   
      var form_data = new FormData();                  
      form_data.append('file', file_data);

	  $.ajaxSetup({
	      headers: { 'X-CSRF-Token': $('input[name=_token]').attr('value') }
	  });

      $.ajax({
          url: "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/message_relay.php",
          type: "post",
          headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
          data: form_data,
          cache: false,
          contentType: false,
     	  processData: false
      }).done(function(res){
        alert('sefue');
	  });

	  

      $.ajax({
          url: "http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/uploadArchive",
          type: "post",
          headers: { 'X-CSRF-Token': $('input[name=_tokens]').attr('value') },
          data: form_data,
          cache: false,
          contentType: false,
     	  processData: false,
     	  dataType: 'json',
     	  success: function(result, index, value, data) {
     	  	var dataFile = '';
     	  	var dataFileType = '';
  	    	$.each(result, function(index, element) {
  				var dataFile = element.file;  				
  				var dataFileType = element.fileType;
  				console.log(dataFile);
  				console.log(dataFileType);

  				// Validate Name field
  				if (id_Usuario_conversation === '') {
  				  bootbox.alert('<br /><p class="bg-danger">Please enter a Name.</p>');
  				
  				} else if (message !== '') {
  				  // Define ajax data
  				  var chat_message={
  				    id_Usuario_conversation: $('.chat_box .input_name').val(),
  				    id_Usuario: $('.chat_box .input_id_user_logi').val(),
  				    file: dataFile,
  				    fileType: dataFileType,
  				    conversation: message,
  				    // message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
  				    message: message
  				  }
  				  // Send the message to the server
  				  ajaxCall('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/message_relay.php', chat_message);
  				  
  				  // Clear the message input field
  				  $('.chat_box .input_message').val('');
  				  // Show a loading image while sending
  				  $('.input_send_holder').html('<input type="submit" value="Send" class="btn btn-primary" disabled /> &nbsp;<img src="loading.gif" />');
  				}
  			});
	 	 },
	    error: function() {
	        console.log('Error');
	    }
	  });

	  
	  
	 });
	 
	 // Send the message when enter key is clicked
	 $('.chat_box .input_message').enterKey(function(e) {
	  e.preventDefault();
	  $('.chat_box .input_send').click();
	 });