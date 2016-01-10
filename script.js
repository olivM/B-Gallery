"use strict";
/* global Layzr */

(function() {
	var lastTime = 0;
	var vendors = ['ms', 'moz', 'webkit', 'o'];
	for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
		window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
		window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
	}

	if (!window.requestAnimationFrame) {
		window.requestAnimationFrame = function(callback, element) {
			var currTime = new Date().getTime();
			var timeToCall = Math.max(0, 16 - (currTime - lastTime));
			var id = window.setTimeout(function() {
					callback(currTime + timeToCall);
				},
				timeToCall);
			lastTime = currTime + timeToCall;
			return id;
		};
	}
	if (!window.cancelAnimationFrame) {
		window.cancelAnimationFrame = function(id) {
			clearTimeout(id);
		};
	}
}());

jQuery(function() {

	jQuery(".img-thumbnail").unveil(300);

	jQuery('.btn').on('click', function() {
		jQuery(this).find('i').toggleClass('fa-check');
		setTimeout(function() {
			if (jQuery('.active').length === 0 || jQuery('.active').length === jQuery('.btn').length) {
				jQuery('#filters').attr('class', 'filter-all');
			} else {
				jQuery('#filters').removeClass('filter-all');
				jQuery('.btn').each(function() {
					if (jQuery(this).hasClass('active')) {
						jQuery('#filters').addClass('filter-' + jQuery(this).data('filter'));
					} else {
						jQuery('#filters').removeClass('filter-' + jQuery(this).data('filter'));
					}
				});
			}
		}, 100);
	});

	var inputText;
	var $matching = $();

	var delay = (function() {
		var timer = 0;
		return function(callback, ms) {
			clearTimeout(timer);
			timer = setTimeout(callback, ms);
		};
	})();

	jQuery("#filter-search").keyup(function() {
		delay(function() {
			inputText = jQuery("#filter-search").val().toLowerCase();
			if ((inputText.length) > 0) {
				jQuery('.item').each(function() {
					if (jQuery(this).find('strong').text().toLowerCase().match(inputText)) {
						jQuery(this).show();
					} else {
						jQuery(this).hide();
					}
				});
			} else {
				jQuery('.item').show();
			}
		});
	});

});