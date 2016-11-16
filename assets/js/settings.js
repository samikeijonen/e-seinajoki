/**
 * Settings for font face observer.
 *
 */
(function() {
	var font = new FontFaceObserver( 'PT Sans' );

	var body = document.getElementsByTagName( 'body' )[0];

	font.load().then(function () {
		body.className += " fonts-loaded";
	});
})();
