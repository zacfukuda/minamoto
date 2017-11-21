'use strict';

// Modify href containing URL into the relative path.

const links = document.querySelectorAll('a');
const regex = new RegExp('(http[s]?:\\/\\/.[-a-zA-Z0-9@:%._\+~#=]{2,256}\.dev)');

links.forEach( (element) => {
	let href = element.getAttribute('href');
	href = href.replace(regex, '');
	element.setAttribute('href', href);
});