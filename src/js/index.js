import $ from 'jquery';

const $window = $(window);
// const $root = $('#root');

// Breakpoint for responsive JS evnets
const tabletBreakpoint = 768;
const desktopBreakpoint = 1024;

let windowWidth;

// Responsive Event
// turn on/off based on the window width.
const onResizeCallback = () => {
	
	// window resized, but width not changed.
	let newWindowWidth = $window.width();
	if (windowWidth === newWindowWidth) return;

	// Update windowWidth.
	windowWidth = newWindowWidth;

	// Mobile
	if (tabletBreakpoint > windowWidth) {
		return;
	}

	// Tablet
	if (tabletBreakpoint <= windowWidth) {
		return;
	}

	// Desktop
	if (desktopBreakpoint <= windowWidth) {
		return;
	}
}

// Initialize
$window.on('resize', onResizeCallback);
$window.on('load', () => {
	onResizeCallback();
});