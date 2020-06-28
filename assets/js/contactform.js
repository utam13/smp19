jQuery(document).ready(function ($) {
	"use strict";

	//Contact
	$('form.contactForm').submit(function () {
		var f = $(this).find('.form-group'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

		f.children('input').each(function () { // run all inputs

			var i = $(this); // current input
			var rule = i.attr('data-rule');

			if (rule !== undefined) {
				var ierror = false; // error flag for current input
				var pos = rule.indexOf(':', 0);
				if (pos >= 0) {
					var exp = rule.substr(pos + 1, rule.length);
					rule = rule.substr(0, pos);
				} else {
					rule = rule.substr(pos + 1, rule.length);
				}

				switch (rule) {
					case 'required':
						if (i.val() === '') {
							ferror = ierror = true;
						}
						break;

					case 'minlen':
						if (i.val().length < parseInt(exp)) {
							ferror = ierror = true;
						}
						break;

					case 'email':
						if (!emailExp.test(i.val())) {
							ferror = ierror = true;
						}
						break;

					case 'checked':
						if (!i.is(':checked')) {
							ferror = ierror = true;
						}
						break;

					case 'regexp':
						exp = new RegExp(exp);
						if (!exp.test(i.val())) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		f.children('textarea').each(function () { // run all inputs

			var i = $(this); // current input
			var rule = i.attr('data-rule');

			if (rule !== undefined) {
				var ierror = false; // error flag for current input
				var pos = rule.indexOf(':', 0);
				if (pos >= 0) {
					var exp = rule.substr(pos + 1, rule.length);
					rule = rule.substr(0, pos);
				} else {
					rule = rule.substr(pos + 1, rule.length);
				}

				switch (rule) {
					case 'required':
						if (i.val() === '') {
							ferror = ierror = true;
						}
						break;

					case 'minlen':
						if (i.val().length < parseInt(exp)) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		if (ferror) return false;
		else
			var str = $(this).serialize();
		var action = $(this).attr('action');
		var lokasi = $("#lokasi").val();
		if (!action) {
			action = lokasi + 'kontak/kirimpesan';
		}
		$.ajax({
			type: "POST",
			url: action,
			data: str,
			success: function (msg) {
				//alert(str);
				if (msg == 'OK') {
					alert("Pesan Anda kami terima, terima kasih");
					$('.contactForm').find("input, textarea").val("");
				} else {
					alert("Mohon maaf, pesan Anda gagal dikirim");
				}
			}
		});
		return false;
	});

});
