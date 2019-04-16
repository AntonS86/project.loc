'use strict';

//скрипт валидации
(function () {
	jQuery(function ($) {
		//console.log($('#sendmail'));
		$('#sendmail').on('submit', function (e) {
			event.preventDefault();

			let form = $(this);
			let _token, name, phone, message, url;

			url = form.attr('action');

			_token = stringLength(form.find("input[name='_token']").val(), 40);
			name = stringLength(form.find("input[name='name']").val(), 2, 'Поле Имя, минимум 2 символа');
			message = stringLength(form.find("textarea[name='message']").val(), 5, 'Поле Сообщение, минимум 5 символов');
			phone = validPhone(form.find("input[name='phone']").val(), 'Номер телефона только цифры, минимум 5 символов');

			if (!(_token && name && phone && message)) {
				alertMessage('Все поля обязательны к заполнению');
				return false;
			}

			form.find('input:not([name="_token"]), textarea').prop('disabled', true);
			var submit = form.find('input[type="submit"]');

			$.ajax({
				url: url,
				method: "post",
				headers: {'X-CSRF-TOKEN': _token},
				dataType: "json",
				data: {
					name: name,
					phone: phone,
					message: message
				},
				success: function (data) {
					
					infoMessage('Ваше сообщение успешно отправленно');
					form.find('input:not([name="_token"], [type="submit"]), textarea').prop('disabled', false).val('');
					submit.prop('disabled', false);
				},
				error: function (data) {
					if (data.responseJSON && data.responseJSON.errors) {
						let errors = data.responseJSON.errors;
						for (let key in errors) {
							errors[key].forEach(element => {
								alertMessage(element);
							});
						}
					}
					if (data.status === 500) {
						alertMessage('Технические работы на сервере, попробуйте позже');
					}
				
					form.find('input:not([name="_token"]), textarea').prop('disabled', false);
				}
			});
			
		});

	});


	

	function stringLength(str, lengthCount, message)
	{
		if (str.length >= lengthCount) return str;
		alertMessage(message);
		return null;
	}

	function validPhone(phone, message)
	{
		if (/^[0-9]{5,11}$/.test(phone)) return phone;
		alertMessage(message);
		return null;
	}

	function validEmail(email, message)
	{
		if (/^[a-zA-Z-.]+@[a-z]+\.[a-z]{2,3}$/.test(email)) return email;
		alertMessage(message);
		return null;
	}

	
})();


/**
 * 
 * @param {string} message 
 */
function alertMessage(message) {
	jQuery.notify({
		message: message
	},{
		// settings
		type: 'danger',
		delay: 4000,
		offset : {
			y: 100,
			x: 20
		}
	});
}

/**
 * 
 * @param {string} message 
 */
function infoMessage(message) {
	jQuery.notify({
		message: message
	},{
		// settings
		type: 'info',
		delay: 4000,
		offset : {
			y: 100,
			x: 20
		}
	});
}


/**
 *
 * пагинация
 */
(function () {

	$('.main').on('click', '#pagination a', function (e) {
		e.preventDefault();
		
		var url = $(this).attr('href');
		if (!url) return false;

		$.ajax({
			url: url,
			method: "get",
			dataType: "json",

			success: function (data) {
				if (data.success === true && $('#articles')) {

					var newArticles;
					$(data.articles).each(function (key, item) {
						if ($(item).is('#articles')) {
							newArticles = $(item);
						}
					});

					$('html, body').animate({ scrollTop: 100 }, 'slow');
					$('#articles').replaceWith(newArticles);
				}
			
			},
			error: function (data) {
				alertMessage('Технические работы на сервере, попробуйте позже');
			}
		});
	});


}());
