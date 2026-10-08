(function () {
	'use strict';

	var button = document.querySelector('.menu-toggle');
	var navigation = document.querySelector('.primary-navigation');

	if (!button || !navigation) {
		return;
	}

	document.documentElement.classList.add('js');

	button.addEventListener('click', function () {
		var isExpanded = button.getAttribute('aria-expanded') === 'true';

		button.setAttribute('aria-expanded', String(!isExpanded));
		navigation.classList.toggle('is-open', !isExpanded);
	});

	navigation.addEventListener('click', function (event) {
		if (event.target.closest('a')) {
			button.setAttribute('aria-expanded', 'false');
			navigation.classList.remove('is-open');
		}
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && navigation.classList.contains('is-open')) {
			button.setAttribute('aria-expanded', 'false');
			navigation.classList.remove('is-open');
			button.focus();
		}
	});
})();
