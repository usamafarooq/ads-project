$.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
}, function(value, element) {
        return 'only allow alphabet';
});
$.validator.addMethod("phone-number", function(value, element) {
    return this.optional(element) || value == value.match(/^(?=.*[0-9])[- +()0-9]+$/);
}, function(value, element) {
        return 'Please enter a valid phone number.';
});


$.validator.addMethod("cnic", function(value, element) {
    return this.optional(element) || value == value.match(/^(?=.*[0-9])[- +()0-9]+$/);
}, function(value, element) {
        return 'Please enter a valid cnic.';
});

jQuery.validator.addMethod("notEqual", function(value, element, param) {
 return this.optional(element) || value != $(param).val();
}, "This has to be different...");

jQuery.extend(jQuery.validator.messages, {
    required: "This field is required.",
    email: "Please enter a valid email address.",
    equalTo: "Please enter the same value again.",
});
$(document).ready(function() {
	$('.validate-signup').validate({
		errorPlacement: function(error, element) {
			var placement = $(element).parents('.col-md-6').find('.help-block');
			// debugger;
			if (placement) {
				$(placement).append(error)
			} else {
				error.insertAfter(element);
			}
		}
		// errorLabelContainer: '.help-block',
	})
	// $('.validate-forget-form').validate()
	// $('.validate-login-form').validate()
	// $('.edit-form').validate()
	if ($('#c-password').length) {
		$('#c-password').rules( "add", {
		  	equalTo: '#password',
		  	messages: {
		    	equalTo: "Your password and confirmation password do not match."
			}
		})
	}
	if ($('#name').length) {
		$('#name').rules( "add", {
		  	alpha: true,
		  	maxlength: 50,
		  	messages: {
		  		maxlength: 'Max length:50',
		  	}
		})
	}

	if ($('#referrer').length) {
		$('#referrer').rules( "add", {
		  	notEqual: '#email'
		})
	}

	if ($('#phone').length) {
		$('#phone').rules( "add", {
		  	'phone-number': true,
		  	// maxlength: 12,
		})
	}
	if ($('#jazz_no').length) {
		$('#jazz_no').rules( "add", {
		  	'phone-number': true,
		  	// maxlength: 12,
		})
	}
	if ($('#cnic').length) {
		$('#cnic').rules( "add", {
		  	'cnic': true,
		  	// maxlength: 12,
		})
	}
	

	
})