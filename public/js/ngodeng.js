$(document).ready(function() {
	$('#navbarSideCollapse').click(function() {
		$('.offcanvas-collapse').toggleClass('open');
		if ($('.offcanvas-collapse').children().first().hasClass('container')) {
			setTimeout(() => {
				$('.offcanvas-collapse').children().children().unwrap();
			}, 99);
		} else {
			$('.offcanvas-collapse').children().wrapAll('<div class="container"></div>');
		}
	})
	$('.hamburger').click(function() {
		$(this).toggleClass('is-active');
	})
});