function appInit($) {

'use strict';
console.log('jQuery Version is ' + $.fn.jquery);

// Common elements
var $window = $(window);
var $root = $('#root');
var $header = $('#header');

// Window Size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

// Breakpoint for responsive JS
var breakpoint = {
	tablet: 768,
	desktop: 1024,
}

/**
 * Global Navigation Toggle (Mobile)
 */
var $navToggleBtn =  $('#navToggleBtn');
$navToggleBtn.click(function (e) {
	e.preventDefault();

	$root.toggleClass('toRight');
});

/**
 * Smooth scrolling
 */
$('a[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	}
});

/**
 * Responsive JS
 */
function onResizeCallback() {
	var newWindowWidth = window.innerWidth;
	if ( newWindowWidth === windowWidth) return;

	// Update windowWidth
	windowWidth = newWindowWidth;

	// Mobile
	if (windowWidth < breakpoint.tablet) {
		return;
	}

	// Tablet
	if (windowWidth >= breakpoint.tablet) {
		return;
	}

	// Desktop
	if (windowWidth >= breakpoint.tablet) {
		return;
	}
}
$window.on('resize', onResizeCallback);
// Initialize
onResizeCallback();

} // End appInit