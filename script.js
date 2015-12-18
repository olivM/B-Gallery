"use strict";
jQuery(function() {

	jQuery('.btn').on('click', function() {
		setTimeout(function() {
			if (jQuery('.active').length === 0 || jQuery('.active').length === jQuery('.btn').length) {
				jQuery('.items > div').show();
			} else {
				jQuery('.btn').each(function() {
					if (jQuery(this).hasClass('active')) {
						jQuery('.items > [data-type="' + jQuery(this).data('filter') + '"]').show();
					} else {
						jQuery('.items > [data-type="' + jQuery(this).data('filter') + '"]').hide();
					}
				});
			}
		}, 100);
	});

	var inputText;
	var $matching = $();

	// Delay function
	var delay = (function() {
		var timer = 0;
		return function(callback, ms) {
			clearTimeout(timer);
			timer = setTimeout(callback, ms);
		};
	})();

	jQuery("#filter-search").keyup(function() {
		// Delay function invoked to make sure user stopped typing
		delay(function() {
			inputText = jQuery("#filter-search").val().toLowerCase();
			console.log(inputText);

			// Check to see if input field is empty
			if ((inputText.length) > 0) {
				jQuery('.items > div').each(function() {
					console.log(jQuery(this).find('strong').text());
					// add item to be filtered out if input text matches items inside the title
					if (jQuery(this).find('strong').text().toLowerCase().match(inputText)) {
						jQuery(this).show();
					} else {
						jQuery(this).hide();
					}
				});
			} else {
				jQuery('.items > div').show();
			}
		});
	});

	setTimeout(function() {
		// jQuery('.filters .btn:first').click();
	}, 250);

});