function showResponse(responseText, statusText)  { 
	if (statusText == 'success') {
		$('#contact-container').html('<h3>Сообщение отправлено успешно!</h3>'); 
		$('#output').html('<p>' + $('someText', responseText).html()  + '</p>'); 
	} else {
		alert('status: ' + statusText + '\n\nОшибка!');
	}
}

function showRequest(formData, jqForm, options) { 
	var form = jqForm[0];
	var validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
	// or use 
	// if (!$('input[@name=email]').fieldValue()) { 
	if (!form.author.value) { 
		$('#output').html('<div class="output2">Пожалуйста, заполните поле "Имя"!</div>'); 
		return false; 
	} else if (!form.email.value) {
		$('#output').html('<div class="output2">Пожалуйста, заполните поле c Email!</div>'); 
		return false; 
	} else if (form.email.value.search(validRegExp) == -1) {
		$('#output').html('<div class="output2">Пожалуйста, проверьте правильность заполнения Email адреса!</div>'); 
		return false; 
	}
	else if (!form.title.value) {
		$('#output').html('<div class="output2">Пожалуйста, заполните поле "Тема"!</div>'); 
		return false; 
	}
	else if (!form.message.value) {
		$('#output').html('<div class="output2">Пожалуйста, заполните текстовое поле!</div>'); 
		return false; 
	}
	 else {	   
	 $('#output').html('Выполняется отправка сообщения...');  		
		return true;
	}
}

$(document).ready(function() { 
    var options = { success: showResponse, beforeSubmit: showRequest}; 
    $('#my-form').submit(function() { 
        $(this).ajaxSubmit(options); 
        return false; 
    });
}); 