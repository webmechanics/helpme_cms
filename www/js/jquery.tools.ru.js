$.tools.dateinput.localize("russian", {
   months:			'Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь',
   shortMonths:		'Янв,Фев,Мар,Апр,Май,Июн,Июл,Авг,Сен,Окт,Ноя,Дек',
   days:			'Воскресенье,Понедельник,Вторник,Среда,Четверг,Пятница,Суббота',
   shortDays:		'Вс,Пн,Вт,Ср,Чт,Пт,Сб'
});

$.tools.validator.localize("russian", {
	'*'				: 'Неизвестная ошибка ввода',
	':email'  		: 'Неверный формат e-mail',
	':number' 		: 'Неверный числовой формат',
	':url' 			: 'Неверный URL',
	'[max]'	 		: 'Значение должно быть меньше $1',
	'[min]'			: 'Значение должно быть больше $1',
	'[required]'	: 'Обязательное поле'
});

// проверка цифрового ввода в поле типа digits

$.tools.validator.fn("[type=digit]", { russian: "Неверный числовой формат" }, function(input, value) { 
	
	if(value == "") {
		return true;
	}
	
	else {
		return /^[0-9]{1,12}$/.test(value);
	}
});

// сравнение паролей валидатором
	
$.tools.validator.fn("#password2", { russian: "Пароли не совпадают" } , function() { 
	
	if($('#password').val() == $('#password2').val()){ 
		return true; 
	} 
	
	else { 
		return false; 
	}
});

// показывать сообщения валидатора через jGrowl

$.tools.validator.addEffect("growl", function(errors, event) {

		$.each(errors, function(index, error) {
			$.jGrowl(error.messages[0]);
		});
	}, 
	
	function()  {}
);